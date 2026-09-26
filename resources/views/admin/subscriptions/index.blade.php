@extends('admin.layouts.app')

@section('title', 'إدارة الاشتراكات - SOWLFA')

@section('content')

<div class="admin-page">

<div class="admin-page-header"
     style="display:flex;align-items:flex-start;justify-content:space-between;gap:16px;flex-wrap:wrap;">

    <div>
        <h1 class="admin-page-title">
            إدارة الاشتراكات
        </h1>

        <p class="admin-page-description">
            إدارة اشتراكات المكاتب وحالاتها وفتراتها.
        </p>
    </div>

    <a
        href="{{ route('admin.subscriptions.create') }}"
        class="admin-button admin-button-primary"
    >
        + إنشاء اشتراك
    </a>

</div>

@if(session('success'))
    <div class="admin-alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="admin-alert-error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<div class="admin-table-wrapper">

    <table class="admin-table">

        <thead>
            <tr>
                <th>المكتب</th>
                <th>الخطة</th>
                <th>تاريخ البداية</th>
                <th>تاريخ الانتهاء</th>
                <th>الحالة</th>
                <th>الإجراء</th>
            </tr>
        </thead>

        <tbody>

            @forelse($subscriptions as $subscription)

                <tr>

                    <td>
                        <strong>
                            {{ $subscription->office?->name ?? '—' }}
                        </strong>
                    </td>

                    <td>
                        {{ $subscription->plan?->name ?? '—' }}
                    </td>

                    <td>
                        {{ $subscription->starts_at?->format('Y-m-d') ?? '—' }}
                    </td>

                    <td>
                        {{ $subscription->ends_at?->format('Y-m-d') ?? '—' }}
                    </td>

                    <td>

                        @if($subscription->status === 'active')

                            <span class="admin-badge admin-badge-success">
                                نشط
                            </span>

                        @elseif($subscription->status === 'suspended')

                            <span
                                class="admin-badge"
                                style="background:#fef3c7;color:#92400e;"
                            >
                                موقوف
                            </span>

                        @elseif($subscription->status === 'expired')

                            <span
                                class="admin-badge"
                                style="background:#fee2e2;color:#b91c1c;"
                            >
                                منتهي
                            </span>

                        @else

                            <span class="admin-badge admin-badge-neutral">
                                {{ $subscription->status }}
                            </span>

                        @endif

                    </td>

                    <td>

                        <form
                            method="POST"
                            action="{{ route('admin.subscriptions.update-status', $subscription) }}"
                            style="display:flex;align-items:center;gap:8px;min-width:190px;"
                        >

                            @csrf
@method('PUT')

                            <select
                                name="status"
                                class="form-select"
                                style="height:40px;padding:8px 10px;"
                            >
                                <option
                                    value="active"
                                    @selected($subscription->status === 'active')
                                >
                                    نشط
                                </option>

                                <option
                                    value="suspended"
                                    @selected($subscription->status === 'suspended')
                                >
                                    موقوف
                                </option>

                                <option
                                    value="expired"
                                    @selected($subscription->status === 'expired')
                                >
                                    منتهي
                                </option>
                            </select>

                            <button
                                type="submit"
                                class="admin-button admin-button-secondary"
                                style="min-height:40px;padding:8px 12px;white-space:nowrap;"
                            >
                                تحديث
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="6"
                        style="text-align:center;padding:40px 16px;color:#6b7280;"
                    >
                        لا توجد اشتراكات حاليًا.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</div>

@endsection
