<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        SubscriptionPlan::updateOrCreate(
            ['name' => 'الخطة الأساسية'],
            [
                'price' => 0,
                'max_agents' => 1,
                'status' => 'active',
            ]
        );

        SubscriptionPlan::updateOrCreate(
            ['name' => 'الخطة الاحترافية'],
            [
                'price' => 49,
                'max_agents' => 5,
                'status' => 'active',
            ]
        );

        SubscriptionPlan::updateOrCreate(
            ['name' => 'الخطة المتقدمة'],
            [
                'price' => 99,
                'max_agents' => null,
                'status' => 'active',
            ]
        );
    }
}