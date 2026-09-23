<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إنشاء اشتراك</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .field {
            margin-bottom: 20px;
        }

        select,
        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            background: #111827;
            color: white;
            border: 0;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #374151;
            text-decoration: none;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <a class="back" href="{{ route('admin.subscriptions.index') }}">
        ← العودة إلى الاشتراكات
    </a>

    <div class="card">

        <h1>إنشاء اشتراك جديد</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.subscriptions.store') }}">
            @csrf

            <div class="field">
                <label for="office_id">المكتب</label>

                <select name="office_id" id="office_id" required>
                    <option value="">اختر المكتب</option>

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
                <label for="subscription_plan_id">خطة الاشتراك</label>

                <select
                    name="subscription_plan_id"
                    id="subscription_plan_id"
                    required
                >
                    <option value="">اختر الخطة</option>

                    @foreach ($plans as $plan)
                        <option
                            value="{{ $plan->id }}"
                            @selected(old('subscription_plan_id') == $plan->id)
                        >
                            {{ $plan->name }} -
                            ${{ number_format($plan->price, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="starts_at">تاريخ البداية</label>

                <input
                    type="date"
                    name="starts_at"
                    id="starts_at"
                    value="{{ old('starts_at', now()->toDateString()) }}"
                    required
                >
            </div>

            <div class="field">
                <label for="ends_at">تاريخ النهاية</label>

                <input
                    type="date"
                    name="ends_at"
                    id="ends_at"
                    value="{{ old('ends_at', now()->addDays(30)->toDateString()) }}"
                    required
                >
            </div>

            <button type="submit">
                إنشاء الاشتراك
            </button>
        </form>

    </div>

</div>

</body>
</html>