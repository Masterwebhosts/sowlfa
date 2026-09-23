<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        تسجيل الدخول - SOWLFA
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: Arial, sans-serif;
            background: #f5f7fa;
        }

        .login-box {
            width: 100%;
            max-width: 420px;

            padding: 32px;

            background: #fff;
            border-radius: 12px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        h1 {
            margin: 0 0 8px;
            text-align: center;
        }

        .subtitle {
            margin: 0 0 28px;
            text-align: center;
            color: #666;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;

            margin-bottom: 18px;

            border: 1px solid #ddd;
            border-radius: 8px;

            font-size: 16px;
        }

        .options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 12px;

            margin-bottom: 18px;
        }

        .remember {
            display: flex;
            align-items: center;

            gap: 8px;

            margin: 0;

            font-weight: normal;
            cursor: pointer;
        }

        .remember input {
            width: auto;
            margin: 0;

            cursor: pointer;
        }

        .forgot-password {
            color: #111827;
            text-decoration: none;
            font-size: 14px;

            white-space: nowrap;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .privacy {
            display: flex;
            align-items: flex-start;

            gap: 8px;

            margin-bottom: 20px;

            font-size: 14px;
            line-height: 1.6;

            font-weight: normal;
        }

        .privacy input {
            width: auto;
            margin-top: 4px;

            flex-shrink: 0;

            cursor: pointer;
        }

        .privacy a {
            color: #111827;
            text-decoration: underline;
        }

        button {
            width: 100%;

            padding: 13px;

            border: 0;
            border-radius: 8px;

            background: #111827;
            color: #fff;

            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1f2937;
        }

        .error {
            margin-bottom: 18px;

            padding: 12px;

            background: #fee2e2;
            color: #991b1b;

            border-radius: 8px;
        }

        .privacy-error {
            margin-top: -10px;
            margin-bottom: 18px;

            color: #991b1b;
            font-size: 14px;
        }

        @media (max-width: 480px) {

            .login-box {
                margin: 20px;
                padding: 24px;
            }

            .options {
                align-items: flex-start;
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<div class="login-box">

    <h1>
        SOWLFA
    </h1>

    <p class="subtitle">
        تسجيل الدخول
    </p>

    @if ($errors->any())

        <div class="error">

            {{ $errors->first() }}

        </div>

    @endif

    <form
        method="POST"
        action="{{ route('login') }}"
    >

        @csrf

        <label for="email">
            البريد الإلكتروني
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
            autofocus
            autocomplete="email"
        >

        <label for="password">
            كلمة المرور
        </label>

        <input
            type="password"
            id="password"
            name="password"
            required
            autocomplete="current-password"
        >

        <div class="options">

            <label
                for="remember"
                class="remember"
            >

                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    value="1"
                    {{ old('remember') ? 'checked' : '' }}
                >

                <span>
                    ذكرني
                </span>

            </label>

            <a
             href="{{ route('password.request') }}"
             class="forgot-password"
            >
               نسيت كلمة المرور؟
            </a>

        </div>

        <label
            for="privacy"
            class="privacy"
        >

            <input
                type="checkbox"
                id="privacy"
                name="privacy"
                value="1"
                required
            >

            <span>

                أوافق على
                <a href="#">
                    سياسة الخصوصية
                </a>

                وأقر بقراءة شروط استخدام SOWLFA.

            </span>

        </label>

        <button type="submit">
            تسجيل الدخول
        </button>

    </form>

</div>

</body>

</html>