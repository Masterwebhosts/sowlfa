<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $office = $user->office;

        $subscription = null;

        if ($office) {
            $subscription = $office->subscriptions()
                ->with('plan')
                ->where('status', 'active')
                ->latest('ends_at')
                ->first();

            if ($subscription && ! $subscription->isActive()) {
                $subscription = null;
            }
        }

        $agentsCount = $office
            ? $office->agents()->count()
            : 0;

        return view('dashboard.index', [
            'office' => $office,
            'subscription' => $subscription,
            'agentsCount' => $agentsCount,
        ]);
    }
}