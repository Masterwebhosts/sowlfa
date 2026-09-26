@extends('admin.layouts.app')

@section('title', 'إنشاء اشتراك جديد - SOWLFA')

@section('content')

<style>

    .page-header {
        background: white;
        padding: 24px;
        border-radius: 12px;
        margin-bottom: 20px;

        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .page-header h1 {
        margin: 0;
    }

    .back-button {
        background: #eee;
        color: #222;
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
        white-space: nowrap;
    }

    .card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        max-width: 700px;
    }

    .field {
        margin-bottom: 20px;
    }

    .field label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: #1f2937;
    }

    .field select,
    .field input {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        min-height: 46px;
        border: 1px solid #d1d5db;
        border-radius: 9px;
        font-size: 15px;
        color: #111827;
        background: #fff;
        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease;
    }

    .field select:focus,
    .field input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }

    .field-hint {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
    }

    .plan-select {
        background: #f8fafc !important;
        border-color: #cbd5e1 !important;
    }

    .plan-select:focus {
        background: #fff !important;
        border-color: #2563eb !important;
    }

    button {
        background: #111827;
        color: white;
        border: 0;
        padding: 12px 22px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        transition:
            background 0.2s ease,
            transform 0.15s ease;
    }

    button:hover {
        background: #1f2937;
    }

    button:active {
        transform: translateY(1px);
    }

    .error {
        background: #fee2e2;
        color: #991b1b;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error ul {
        margin: 0;
        padding-right: 20px;
    }

</style>


<div class="page-header">

    <h1>
        إنشاء اشتراك جديد
    </h1>

    <a
        class="back-button"
        href="{{ route('admin.subscriptions.index') }}"
    >
        العودة إلى الاشتراكات
    </a>

</div>


<div class="card">

    @if ($errors->any())

        <div class="error">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.subscriptions.store') }}"
    >

        @csrf


        <div class="field">

            <label for="office_id">
                المكتب
            </label>

            <select
                name="office_id"
                id="office_id"
                required
            >

                <option value="">
                    اختر المكتب
                </option>

                @foreach ($offices as $office)

                    <option
                        value="{{ $office->id }}"
                        @selected(old('office_id') == $office->id)
                    >
                        {{ $office->name }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="field">

            <label for="subscription_plan_id">
                خطة الاشتراك
            </label>

            <select
                name="subscription_plan_id"
                id="subscription_plan_id"
                class="plan-select"
                required
            >

                <option value="">
                    اختر الخطة
                </option>

                @foreach ($plans as $plan)

                    <option
                        value="{{ $plan->id }}"
                        @selected(old('subscription_plan_id') == $plan->id)
                    >
                        {{ $plan->name }} -

                        @if ((float) $plan->price <= 0)

                            مجانية

                        @else

                            ${{ number_format((float) $plan->price, 2) }} / شهر

                        @endif

                        -

                        @if (is_null($plan->max_agents))

                            وسطاء غير محدودين

                        @elseif ((int) $plan->max_agents === 0)

                            بدون وسطاء

                        @elseif ((int) $plan->max_agents === 1)

                            وسيط واحد

                        @elseif ((int) $plan->max_agents === 2)

                            وسيطان

                        @else

                            حتى {{ $plan->max_agents }} وسطاء

                        @endif

                    </option>

                @endforeach

            </select>

            <p class="field-hint">
                اختر الخطة المناسبة للمكتب وفقًا للسعر والحد الأقصى للوسطاء.
            </p>

        </div>


        <div class="field">

            <label for="starts_at">
                تاريخ البداية
            </label>

            <input
                type="date"
                name="starts_at"
                id="starts_at"
                value="{{ old('starts_at', now()->toDateString()) }}"
                required
            >

        </div>


        <div class="field">

            <label for="ends_at">
                تاريخ النهاية
            </label>

            <input
                type="date"
                name="ends_at"
                id="ends_at"
                value="{{ old('ends_at', now()->addMonth()->toDateString()) }}"
                required
            >

            <p class="field-hint">
                مدة الاشتراك الافتراضية شهر واحد.
            </p>

        </div>


        <button type="submit">
            إنشاء الاشتراك
        </button>

    </form>

</div>

@endsection