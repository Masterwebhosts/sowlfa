<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        نسيت كلمة المرور - SOWLFA
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

            line-height: 1.7;
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

        .success {
            margin-bottom: 18px;

            padding: 12px;

            background: #dcfce7;
            color: #166534;

            border-radius: 8px;
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

        نسيت كلمة المرور؟

        <br>

        أدخل بريدك الإلكتروني وسنرسل لك رابط إعادة تعيين كلمة المرور.

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
        action="{{ route('password.email') }}"
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

        <button type="submit">

            إرسال رابط إعادة التعيين

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