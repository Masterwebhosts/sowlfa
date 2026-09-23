<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;

class AdminController extends Controller
{
    public function index()
    {
        $officesCount = Office::count();

        $plansCount = SubscriptionPlan::count();

        $activeSubscriptionsCount = Subscription::where(
            'status',
            'active'
        )->count();

        return view('admin.index', compact(
            'officesCount',
            'plansCount',
            'activeSubscriptionsCount'
        ));
    }
}