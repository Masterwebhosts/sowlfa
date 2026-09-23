@extends('layouts.app')

@section('title', 'إضافة وسيط - SOWLFA')

@section('content')

<style>

    .page-header {
        margin-bottom: 20px;
    }

    .page-header h1 {
        margin: 0;
    }

    .card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .info {
        background: #f3f4f6;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .info p {
        margin: 6px 0;
        line-height: 1.6;
    }

    .error {
        background: #fee2e2;
        color: #991b1b;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error p {
        margin: 5px 0;
    }

    .field {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
    }

    input {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        font-family: inherit;
        font-size: 14px;
    }

    input:focus {
        outline: none;
        border-color: #111827;
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .submit-button,
    .back {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 7px;
        font-family: inherit;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
    }

    .submit-button {
        border: 0;
        background: #111827;
        color: white;
    }

    .back {
        background: #e5e7eb;
        color: #111827;
    }

</style>

<div class="page-header">

    <h1>
        إضافة وسيط جديد
    </h1>

</div>

<div class="card">

    <div class="info">

        <p>

            <strong>
                المكتب:
            </strong>

            {{ $office->name }}

        </p>

        @if ($subscription)

            <p>

                <strong>
                    الخطة:
                </strong>

                {{ $subscription->plan->name }}

            </p>

            <p>

                <strong>
                    الحد الأقصى للوسطاء:
                </strong>

                @if ($subscription->plan->max_agents === null)

                    غير محدود

                @else

                    {{ $subscription->plan->max_agents }}

                @endif

            </p>

            <p>

                <strong>
                    الاشتراك:
                </strong>

                نشط

            </p>

        @else

            <p>
                لا يوجد اشتراك نشط لهذا المكتب.
            </p>

        @endif

    </div>

    @if ($errors->any())

        <div class="error">

            @foreach ($errors->all() as $error)

                <p>
                    {{ $error }}
                </p>

            @endforeach

        </div>

    @endif

    <form
        method="POST"
        action="{{ route('agents.store') }}"
    >

        @csrf

        <div class="field">

            <label for="name">
                اسم الوسيط
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >

        </div>

        <div class="field">

            <label for="email">
                البريد الإلكتروني
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
            >

        </div>

        <div class="field">

            <label for="phone">
                الهاتف
            </label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
            >

        </div>

        <div class="actions">

            <button
                type="submit"
                class="submit-button"
            >
                إنشاء الوسيط
            </button>

            <a
                class="back"
                href="{{ route('agents.index') }}"
            >
                العودة إلى الوسطاء
            </a>

        </div>

    </form>

</div>

@endsection