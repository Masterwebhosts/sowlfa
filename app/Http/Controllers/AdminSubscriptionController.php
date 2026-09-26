<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Notifications\SubscriptionNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with([
            'office',
            'plan',
        ])
            ->latest()
            ->get();

        return view(
            'admin.subscriptions.index',
            compact('subscriptions')
        );
    }

    public function create()
    {
        $offices = Office::where('status', 'active')
            ->orderBy('name')
            ->get();

        $plans = SubscriptionPlan::where('status', 'active')
            ->orderBy('price')
            ->get();

        return view(
            'admin.subscriptions.create',
            compact('offices', 'plans')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'office_id' => [
                'required',
                Rule::exists('offices', 'id')
                    ->where('status', 'active'),
            ],
            'subscription_plan_id' => [
                'required',
                Rule::exists('subscription_plans', 'id')
                    ->where('status', 'active'),
            ],
            'starts_at' => ['required', 'date'],
            'ends_at' => [
                'required',
                'date',
                'after_or_equal:starts_at',
            ],
        ]);

        $hasOverlappingSubscription = Subscription::where(
            'office_id',
            $data['office_id']
        )
            ->where('status', 'active')
            ->whereDate('starts_at', '<=', $data['ends_at'])
            ->whereDate('ends_at', '>=', $data['starts_at'])
            ->exists();

        if ($hasOverlappingSubscription) {
            return back()
                ->withErrors([
                    'office_id' =>
                        'لا يمكن إنشاء الاشتراك. يوجد اشتراك نشط لهذا المكتب ضمن الفترة المحددة.',
                ])
                ->withInput();
        }

        $data['status'] = 'active';

        Subscription::create($data);

        return redirect()
            ->route('admin.subscriptions.index')
            ->with('success', 'تم إنشاء الاشتراك بنجاح.');
    }

    public function updateStatus(
        Request $request,
        Subscription $subscription
    ) {
        $data = $request->validate([
            'status' => [
                'required',
                'in:active,suspended,expired',
            ],
        ]);

        if ($data['status'] === 'active') {
            $hasAnotherActiveSubscription = Subscription::where(
                'office_id',
                $subscription->office_id
            )
                ->where('status', 'active')
                ->where('id', '!=', $subscription->id)
                ->exists();

            if ($hasAnotherActiveSubscription) {
                return back()->withErrors([
                    'status' =>
                        'لا يمكن تفعيل الاشتراك. يوجد اشتراك نشط آخر لهذا المكتب.',
                ]);
            }
        }

        $subscription->update([
            'status' => $data['status'],
        ]);

        $user = $subscription->office
            ?->users()
            ->first();

        if ($user) {
            $messages = [
                'active' => [
                    'title' => 'تم تفعيل الاشتراك',
                    'message' => 'تم تفعيل اشتراكك في SOWLFA بنجاح.',
                    'type' => 'success',
                ],
                'suspended' => [
                    'title' => 'تم إيقاف الاشتراك',
                    'message' => 'تم إيقاف اشتراكك في SOWLFA مؤقتًا.',
                    'type' => 'warning',
                ],
                'expired' => [
                    'title' => 'انتهى الاشتراك',
                    'message' => 'تم إنهاء اشتراكك في SOWLFA.',
                    'type' => 'danger',
                ],
            ];

            $notification = $messages[$data['status']];

            $user->notify(
                new SubscriptionNotification(
                    $notification['title'],
                    $notification['message'],
                    $notification['type'],
                )
            );
        }

        return redirect()
            ->route('admin.subscriptions.index')
            ->with('success', 'تم تحديث حالة الاشتراك بنجاح.');
    }
}