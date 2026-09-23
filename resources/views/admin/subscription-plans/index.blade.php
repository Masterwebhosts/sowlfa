@extends('admin.layouts.app')

@section('title', 'خطط الاشتراك - SOWLFA')

@section('content')

<style>

    .page-header {
        background: white;
        padding: 24px;
        border-radius: 12px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);

        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .page-header h1 {
        margin: 0 0 8px;
    }

    .page-header p {
        margin: 0;
        color: #666;
    }

    .create-button {
        display: inline-block;
        background: #198754;
        color: white;
        text-decoration: none;
        padding: 11px 16px;
        border-radius: 8px;
        white-space: nowrap;
    }

    .plans {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .plan {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .plan h2 {
        margin-top: 0;
        margin-bottom: 10px;
    }

    .price {
        font-size: 30px;
        font-weight: bold;
        margin: 15px 0;
    }

    .detail {
        margin: 10px 0;
        color: #555;
    }

    .status {
        margin-top: 15px;
        font-weight: bold;
    }

    .active {
        color: #166534;
    }

    .inactive {
        color: #991b1b;
    }

    .empty {
        background: white;
        padding: 24px;
        border-radius: 12px;
        color: #666;
    }

    @media (max-width: 800px) {

        .plans {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
            align-items: stretch;
        }

        .create-button {
            text-align: center;
        }

    }

</style>

<div class="page-header">

    <div>

        <h1>
            خطط الاشتراك
        </h1>

        <p>
            إدارة الخطط المتاحة لمكاتب SOWLFA.
        </p>

    </div>

    <a
        class="create-button"
        href="{{ route('admin.subscriptions.create') }}"
    >
        + إنشاء اشتراك جديد
    </a>

</div>

<div class="plans">

    @forelse ($plans as $plan)

        <div class="plan">

            <h2>
                {{ $plan->name }}
            </h2>

            <div class="price">
                ${{ number_format($plan->price, 2) }}
            </div>

            <div class="detail">

                @if ($plan->max_agents === null)

                    الحد الأقصى للوسطاء: غير محدود

                @else

                    الحد الأقصى للوسطاء:
                    {{ $plan->max_agents }}

                @endif

            </div>

            <div class="status">

                الحالة:

                @if ($plan->status === 'active')

                    <span class="active">
                        نشطة
                    </span>

                @else

                    <span class="inactive">
                        غير نشطة
                    </span>

                @endif

            </div>

        </div>

    @empty

        <div class="empty">
            لا توجد خطط اشتراك.
        </div>

    @endforelse

</div>

@endsection