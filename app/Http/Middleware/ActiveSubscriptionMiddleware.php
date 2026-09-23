<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveSubscriptionMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $user = $request->user();

        if (! $user || ! $user->office_id) {
            abort(403);
        }

        $office = $user->office;

        $subscription = $office?->subscriptions()
            ->where('status', 'active')
            ->latest('ends_at')
            ->first();

        if (! $subscription || ! $subscription->isActive()) {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'subscription' =>
                        'لا يوجد اشتراك نشط لهذا المكتب.',
                ]);
        }

        return $next($request);
    }
}