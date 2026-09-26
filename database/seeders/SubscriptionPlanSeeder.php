<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        SubscriptionPlan::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'الأساسية',
                'price' => 0.00,
                'max_agents' => 0,
                'status' => 'active',
            ]
        );

        SubscriptionPlan::updateOrCreate(
            ['id' => 2],
            [
                'name' => 'المتقدمة',
                'price' => 49.00,
                'max_agents' => 10,
                'status' => 'active',
            ]
        );

        SubscriptionPlan::updateOrCreate(
            ['id' => 3],
            [
                'name' => 'الذهبية',
                'price' => 99.00,
                'max_agents' => null,
                'status' => 'active',
            ]
        );
    }
}