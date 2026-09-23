<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>الصفحة غير موجودة - SOWLFA</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Tahoma, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-page {
            width: 100%;
            max-width: 600px;
            padding: 30px;
            text-align: center;
        }

        .logo {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #111827;
            margin-bottom: 35px;
        }

        .error-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 50px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .error-code {
            font-size: 90px;
            line-height: 1;
            font-weight: 800;
            color: #111827;
            margin-bottom: 20px;
        }

        .error-title {
            margin: 0 0 12px;
            font-size: 26px;
            font-weight: 700;
        }

        .error-message {
            margin: 0 auto 30px;
            max-width: 450px;
            color: #6b7280;
            font-size: 16px;
            line-height: 1.8;
        }

        .home-button {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 8px;
            background: #111827;
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .home-button:hover {
            background: #374151;
        }

        @media (max-width: 600px) {
            .error-page {
                padding: 20px;
            }

            .error-card {
                padding: 40px 20px;
            }

            .error-code {
                font-size: 70px;
            }

            .error-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<div class="error-page">

    <div class="logo">
        SOWLFA
    </div>

    <div class="error-card">

        <div class="error-code">
            404
        </div>

        <h1 class="error-title">
            الصفحة غير موجودة
        </h1>

        <p class="error-message">
            عذرًا، الصفحة التي تبحث عنها غير موجودة أو ربما تم نقلها إلى مكان آخر.
        </p>

        <a href="{{ url('/') }}" class="home-button">
            العودة إلى الصفحة الرئيسية
        </a>

    </div>

</div>

</body>
</html>