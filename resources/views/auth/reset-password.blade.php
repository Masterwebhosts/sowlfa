<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        إعادة تعيين كلمة المرور - SOWLFA
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

        .box {
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

        input {
            width: 100%;

            padding: 12px;

            margin-bottom: 18px;

            border: 1px solid #ddd;
            border-radius: 8px;

            font-size: 16px;
        }

        button {
            width: 100%;

            padding: 13px;

            border: 0;
            border-radius: 8px;

            background: #111827;
            color: white;

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

        .back {
            display: block;

            margin-top: 18px;

            text-align: center;

            color: #111827;

            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

<div class="box">

    <h1>
        SOWLFA
    </h1>

    <p class="subtitle">
        إعادة تعيين كلمة المرور
    </p>

    @if ($errors->any())

        <div class="error">

            {{ $errors->first() }}

        </div>

    @endif

    <form
        method="POST"
        action="{{ route('password.update') }}"
    >

        @csrf

        <input
            type="hidden"
            name="token"
            value="{{ $token }}"
        >

        <label for="email">
            البريد الإلكتروني
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $email) }}"
            required
            autocomplete="email"
        >

        <label for="password">
            كلمة المرور الجديدة
        </label>

        <input
            type="password"
            id="password"
            name="password"
            required
            minlength="8"
            autocomplete="new-password"
        >

        <label for="password_confirmation">
            تأكيد كلمة المرور الجديدة
        </label>

        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
            minlength="8"
            autocomplete="new-password"
        >

        <button type="submit">
            تغيير كلمة المرور
        </button>

    </form>

    <a
        href="{{ route('login') }}"
        class="back"
    >
        العودة إلى تسجيل الدخول
    </a>

</div>

</body>

</html>