<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        تفعيل الحساب - SOWLFA
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

        .activation-box {
            width: 100%;
            max-width: 460px;

            padding: 32px;

            background: #ffffff;

            border-radius: 14px;

            box-shadow:
                0 12px 35px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin: 0 0 10px;

            text-align: center;

            color: #111827;
        }

        .subtitle {
            margin: 0 0 26px;

            text-align: center;

            color: #64748b;

            line-height: 1.8;
        }

        .info {
            margin-bottom: 22px;

            padding: 13px 15px;

            background: #eff6ff;
            border: 1px solid #bfdbfe;

            color: #1e40af;

            border-radius: 8px;

            line-height: 1.7;

            font-size: 14px;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;

            margin-bottom: 7px;

            font-weight: 600;

            color: #374151;
        }

        input {
            width: 100%;

            padding: 12px 13px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            font-size: 15px;
        }

        input:focus {
            outline: none;

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        button {
            width: 100%;

            padding: 13px;

            border: 0;

            border-radius: 8px;

            background: #111827;

            color: #ffffff;

            font-size: 16px;

            cursor: pointer;
        }

        button:hover {
            background: #1f2937;
        }

        .error {
            margin-bottom: 20px;

            padding: 12px;

            background: #fee2e2;

            color: #991b1b;

            border-radius: 8px;
        }

        .error ul {
            margin: 0;

            padding-right: 20px;
        }

    </style>

</head>

<body>

<div class="activation-box">

    <h1>
        تفعيل حسابك
    </h1>

    <p class="subtitle">
        مرحبًا بك في SOWLFA.
        أنشئ كلمة المرور الخاصة بك لإكمال تفعيل الحساب.
    </p>

    <div class="info">
        عند حفظ كلمة المرور سيتم أيضًا تأكيد بريدك الإلكتروني تلقائيًا.
    </div>

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
        action="{{ route('account.activation.store') }}"
    >

        @csrf

        <input
            type="hidden"
            name="token"
            value="{{ $token }}"
        >

        <div class="field">

            <label for="email">
                البريد الإلكتروني
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $email) }}"
                readonly
                required
            >

        </div>

        <div class="field">

            <label for="password">
                كلمة المرور الجديدة
            </label>

            <input
                type="password"
                id="password"
                name="password"
                minlength="8"
                required
                autocomplete="new-password"
            >

        </div>

        <div class="field">

            <label for="password_confirmation">
                تأكيد كلمة المرور
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                minlength="8"
                required
                autocomplete="new-password"
            >

        </div>

        <button type="submit">
            تفعيل الحساب وإنشاء كلمة المرور
        </button>

    </form>

</div>

</body>

</html>