<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;

class AdminSubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::latest()->get();

        return view('admin.subscription-plans.index', compact('plans'));
    }
}
