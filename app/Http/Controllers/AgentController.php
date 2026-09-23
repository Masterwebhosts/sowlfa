<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $officeId = Auth::user()->office_id;

        $agents = Agent::with('office')
            ->where('office_id', $officeId)
            ->latest()
            ->get();

        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        $officeId = Auth::user()->office_id;

        $office = Office::findOrFail($officeId);

        $subscription = $office->subscriptions()
            ->with('plan')
            ->where('status', 'active')
            ->latest('ends_at')
            ->first();

        if ($subscription && ! $subscription->isActive()) {
            $subscription = null;
        }

        return view('agents.create', compact(
            'office',
            'subscription'
        ));
    }

    public function store(Request $request)
    {
        $officeId = Auth::user()->office_id;

        $office = Office::findOrFail($officeId);

        $subscription = $office->subscriptions()
            ->with('plan')
            ->where('status', 'active')
            ->latest('ends_at')
            ->first();

        if ($subscription && ! $subscription->isActive()) {
            $subscription = null;
        }

        if (! $subscription) {
            return back()
                ->withErrors([
                    'name' => 'لا يوجد اشتراك نشط لهذا المكتب.',
                ])
                ->withInput();
        }

        $maxAgents = $subscription->plan->max_agents;

        $agentsCount = $office->agents()->count();

        if ($maxAgents !== null && $agentsCount >= $maxAgents) {
            return back()
                ->withErrors([
                    'name' => 'لا يمكن إضافة وسيط جديد. لقد وصلت إلى الحد المسموح في اشتراكك.',
                ])
                ->withInput();
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
        ]);

        $data['office_id'] = $officeId;

        Agent::create($data);

        return redirect()
            ->route('agents.index')
            ->with('success', 'تم إنشاء الوسيط بنجاح.');
    }
}