<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        تحقق من بريدك الإلكتروني - SOWLFA
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

            padding: 20px;

            font-family: Arial, sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f8fafc,
                    #eef2ff
                );
        }

        .verify-box {
            width: 100%;
            max-width: 500px;

            padding: 36px;

            background: #ffffff;

            border-radius: 16px;

            box-shadow:
                0 15px 40px rgba(15, 23, 42, 0.08);

            text-align: center;
        }

        .icon {
            width: 70px;
            height: 70px;

            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #eff6ff;
            color: #2563eb;

            font-size: 30px;
        }

        h1 {
            margin: 0 0 12px;

            color: #111827;

            font-size: 28px;
        }

        .description {
            margin: 0;

            color: #64748b;

            line-height: 1.9;
        }

        .message {
            margin-top: 22px;

            padding: 12px;

            background: #ecfdf5;
            color: #047857;

            border-radius: 8px;
        }

        .status {
            margin-top: 22px;

            padding: 12px;

            background: #eff6ff;
            color: #1d4ed8;

            border-radius: 8px;
        }

        button {
            width: 100%;

            margin-top: 24px;

            padding: 13px 18px;

            border: 0;
            border-radius: 9px;

            background: #111827;
            color: #ffffff;

            font-size: 16px;

            cursor: pointer;
        }

        button:hover {
            background: #1f2937;
        }

        .logout {
            margin-top: 16px;
        }

        .logout button {
            margin-top: 0;

            background: transparent;
            color: #475569;

            border: 1px solid #d1d5db;
        }

        .logout button:hover {
            background: #f8fafc;
        }

    </style>
</head>

<body>

<div class="verify-box">

    <div class="icon">
        ✉
    </div>

    <h1>
        تحقق من بريدك الإلكتروني
    </h1>

    <p class="description">
        أرسلنا رابط تحقق إلى بريدك الإلكتروني.
        افتح الرسالة واضغط على رابط التحقق لتفعيل حسابك
        والبدء باستخدام SOWLFA.
    </p>

    @if (session('status'))
        <div class="status">
            {{ session('status') }}
        </div>
    @endif

    @if (session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('verification.send') }}"
    >
        @csrf

        <button type="submit">
            إعادة إرسال رسالة التحقق
        </button>
    </form>

    <form
        class="logout"
        method="POST"
        action="{{ route('logout') }}"
    >
        @csrf

        <button type="submit">
            تسجيل الخروج
        </button>
    </form>

</div>

</body>

</html>