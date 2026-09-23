@extends('admin.layouts.app')

@section('title', 'الاشتراكات - SOWLFA')

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

    .subscriptions {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .subscription {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .subscription h2 {
        margin-top: 0;
        margin-bottom: 10px;
    }

    .plan-name {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
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

    .suspended {
        color: #92400e;
    }

    .expired {
        color: #991b1b;
    }

    .empty {
        background: white;
        padding: 24px;
        border-radius: 12px;
        color: #666;
        grid-column: 1 / -1;
    }

    @media (max-width: 800px) {
        .subscriptions {
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

```
<div>

    <h1>
        الاشتراكات
    </h1>

    <p>
        إدارة اشتراكات مكاتب SOWLFA.
    </p>

</div>

<a
    class="create-button"
    href="{{ route('admin.subscriptions.create') }}"
>
    + إنشاء اشتراك جديد
</a>

</div>

<div class="subscriptions">

@forelse ($subscriptions as $subscription)

    <div class="subscription">

        <h2>
            {{ $subscription->office?->name ?? 'مكتب غير محدد' }}
        </h2>

        <div class="plan-name">

            الخطة:
            {{ $subscription->plan?->name ?? 'خطة غير محددة' }}

        </div>

        <div class="detail">

            تاريخ البداية:
            {{ $subscription->starts_at }}

        </div>

        <div class="detail">

            تاريخ الانتهاء:
            {{ $subscription->ends_at }}

        </div>

        <div class="status">

            الحالة:

            @if ($subscription->status === 'active')

                <span class="active">
                    نشط
                </span>

            @elseif ($subscription->status === 'suspended')

                <span class="suspended">
                    موقوف
                </span>

            @elseif ($subscription->status === 'expired')

                <span class="expired">
                    منتهي
                </span>

            @else

                <span>
                    {{ $subscription->status }}
                </span>

            @endif

        </div>

    </div>

@empty

    <div class="empty">
        لا توجد اشتراكات حاليًا.
    </div>

@endforelse

</div>

@endsection
