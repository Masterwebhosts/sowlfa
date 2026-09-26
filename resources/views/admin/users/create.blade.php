@extends('admin.layouts.app')

@section('title', 'إنشاء مستخدم - SOWLFA')

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
    }

    .card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        max-width: 700px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        box-sizing: border-box;
        padding: 11px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    .info-box {
        background: #eff6ff;
        color: #1e40af;
        border: 1px solid #bfdbfe;
        padding: 14px 16px;
        border-radius: 9px;
        margin-bottom: 22px;
        line-height: 1.8;
        font-size: 14px;
    }

    .button {
        border: none;
        background: #222;
        color: white;
        padding: 11px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    .button:hover {
        background: #111827;
    }

    .errors {
        background: #fff0f0;
        color: #a00;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .errors ul {
        margin: 0;
        padding-right: 20px;
    }

    .field-hint {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
    }

</style>


<div class="page-header">

    <h1>
        إنشاء حساب مشترك
    </h1>

    <a
        href="{{ route('admin.users.index') }}"
        class="back-button"
    >
        المستخدمون
    </a>

</div>


<div class="card">

    <div class="info-box">
        بعد إنشاء الحساب، سيرسل SOWLFA رسالة إلى البريد الإلكتروني
        للمستخدم تحتوي على رابط آمن لتفعيل الحساب وإنشاء كلمة المرور.
    </div>


    @if($errors->any())

        <div class="errors">

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.users.store') }}"
    >

        @csrf


        <div class="form-group">

            <label for="name">
                الاسم
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
                autocomplete="name"
            >

        </div>


        <div class="form-group">

            <label for="email">
                البريد الإلكتروني
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
            >

            <p class="field-hint">
                سيتم إرسال رسالة إنشاء الحساب ورابط التفعيل إلى هذا البريد.
            </p>

        </div>


        <div class="form-group">

            <label for="office_id">
                المكتب
            </label>

            <select
                id="office_id"
                name="office_id"
                required
            >

                <option value="">
                    اختر المكتب
                </option>

                @foreach($offices as $office)

                    <option
                        value="{{ $office->id }}"
                        @selected(old('office_id') == $office->id)
                    >
                        {{ $office->name }}
                    </option>

                @endforeach

            </select>

        </div>


        <button
            type="submit"
            class="button"
        >
            إنشاء الحساب وإرسال رسالة التفعيل
        </button>

    </form>

</div>

@endsection