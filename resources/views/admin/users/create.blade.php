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

    .button {
        border: none;
        background: #222;
        color: white;
        padding: 11px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
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
            >

        </div>


        <div class="form-group">

            <label for="password">
                كلمة المرور
            </label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

        </div>


        <div class="form-group">

            <label for="password_confirmation">
                تأكيد كلمة المرور
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required
            >

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
            إنشاء الحساب
        </button>

    </form>

</div>

@endsection