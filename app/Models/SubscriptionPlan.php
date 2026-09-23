<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'max_agents',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'max_agents' => 'integer',
        ];
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(
            Subscription::class,
            'subscription_plan_id'
        );
    }
}