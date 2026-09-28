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
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px;

            border: 1px solid #ddd;
            border-radius: 8px;

            font-size: 16px;
        }

        .password-wrapper {
            position: relative;
            margin-bottom: 18px;
        }

        .password-wrapper input {
            margin-bottom: 0;
            padding-left: 48px;
        }

        .password-toggle {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);

            width: 34px;
            height: 34px;

            padding: 0;
            margin: 0;

            border: 0;
            background: transparent;

            color: #666;

            font-size: 18px;
            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle:hover {
            background: transparent;
            color: #111827;
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

        .success {
            margin-bottom: 18px;

            padding: 12px;

            background: #ecfdf5;
            color: #047857;

            border: 1px solid #a7f3d0;
            border-radius: 8px;
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

    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

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

        <div class="password-wrapper">

            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
            >

            <button
                type="button"
                id="togglePassword"
                class="password-toggle"
                aria-label="إظهار كلمة المرور"
                title="إظهار كلمة المرور"
            >
                👁
            </button>

        </div>

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

        <button type="submit">
            تسجيل الدخول
        </button>

    </form>

</div>

<script>

    const passwordInput =
        document.getElementById('password');

    const togglePassword =
        document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function () {

        const isHidden =
            passwordInput.type === 'password';

        passwordInput.type =
            isHidden ? 'text' : 'password';

        this.textContent =
            isHidden ? '🙈' : '👁';

        this.setAttribute(
            'aria-label',
            isHidden
                ? 'إخفاء كلمة المرور'
                : 'إظهار كلمة المرور'
        );

        this.setAttribute(
            'title',
            isHidden
                ? 'إخفاء كلمة المرور'
                : 'إظهار كلمة المرور'
        );

    });

</script>

</body>

</html>