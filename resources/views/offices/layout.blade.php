<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'المكاتب') - {{ config('app.name', 'Sowlfa') }}</title>

    <meta name="description" content="@yield('description', 'تصفح المكاتب العقارية على Sowlfa')">

    <style>
        :root {
            --office-primary: #111827;
            --office-secondary: #4f46e5;
            --office-accent: #6366f1;
            --office-bg: #f8fafc;
            --office-card: #ffffff;
            --office-text: #0f172a;
            --office-muted: #64748b;
            --office-border: #e2e8f0;
            --office-success: #16a34a;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family:
                Tahoma,
                Arial,
                sans-serif;
            background: var(--office-bg);
            color: var(--office-text);
            line-height: 1.7;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .office-page {
            min-height: 100vh;
        }

        /* Header */

        .office-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--office-border);
        }

        .office-header-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .office-logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .office-logo span {
            color: var(--office-secondary);
        }

        .office-nav {
            display: flex;
            align-items: center;
            gap: 24px;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .office-nav a {
            transition: color .2s ease;
        }

        .office-nav a:hover {
            color: var(--office-secondary);
        }

        .office-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        /* Hero */

        .office-hero {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at top right, rgba(99, 102, 241, .22), transparent 35%),
                linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
        }

        .office-hero::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            left: -100px;
            bottom: -160px;
            border-radius: 50%;
            background: rgba(99, 102, 241, .15);
        }

        .office-hero-inner {
            position: relative;
            z-index: 2;
            max-width: 1180px;
            margin: 0 auto;
            padding: 85px 24px;
        }

        .office-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 13px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 999px;
            background: rgba(255,255,255,.08);
            font-size: 13px;
            color: #cbd5e1;
        }

        .office-hero h1 {
            max-width: 760px;
            font-size: clamp(36px, 5vw, 62px);
            line-height: 1.15;
            letter-spacing: -1.5px;
            margin-bottom: 18px;
        }

        .office-hero p {
            max-width: 650px;
            color: #cbd5e1;
            font-size: 18px;
        }

        /* Main */

        .office-container {
            max-width: 1180px;
            margin: 0 auto;
            padding: 65px 24px;
        }

        .office-section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .office-section-head h2 {
            font-size: 30px;
            line-height: 1.3;
        }

        .office-section-head p {
            color: var(--office-muted);
            margin-top: 5px;
        }

        /* Office Cards */

        .office-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .office-card {
            background: var(--office-card);
            border: 1px solid var(--office-border);
            border-radius: 22px;
            overflow: hidden;
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .office-card:hover {
            transform: translateY(-5px);
            border-color: #c7d2fe;
            box-shadow: 0 18px 45px rgba(15, 23, 42, .10);
        }

        .office-card-top {
            height: 150px;
            padding: 25px;
            display: flex;
            align-items: end;
            background:
                radial-gradient(circle at 85% 20%, rgba(255,255,255,.18), transparent 30%),
                linear-gradient(135deg, #312e81, #6366f1);
            color: white;
        }

        .office-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 17px;
            background: rgba(255,255,255,.16);
            border: 1px solid rgba(255,255,255,.2);
            font-size: 27px;
        }

        .office-card-body {
            padding: 24px;
        }

        .office-card h3 {
            font-size: 21px;
            margin-bottom: 12px;
        }

        .office-meta {
            display: flex;
            flex-direction: column;
            gap: 9px;
            color: var(--office-muted);
            font-size: 14px;
        }

        .office-meta-row {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .office-property-count {
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid var(--office-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .office-property-count strong {
            font-size: 14px;
        }

        .office-view-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 11px;
            background: var(--office-primary);
            color: white;
            font-size: 13px;
            font-weight: 700;
            transition: background .2s ease;
        }

        .office-view-btn:hover {
            background: var(--office-secondary);
        }

        /* Details */

        .office-detail-grid {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 28px;
            align-items: start;
        }

        .office-info-card {
            position: sticky;
            top: 100px;
            background: white;
            border: 1px solid var(--office-border);
            border-radius: 22px;
            padding: 27px;
        }

        .office-info-logo {
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            border-radius: 20px;
            background: #eef2ff;
            color: var(--office-secondary);
            font-size: 32px;
        }

        .office-info-card h2 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .office-info-location {
            color: var(--office-muted);
            font-size: 14px;
            margin-bottom: 25px;
        }

        .office-contact-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .office-contact {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px;
            border-radius: 13px;
            background: #f8fafc;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .office-contact-icon {
            flex: 0 0 auto;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: white;
            border: 1px solid var(--office-border);
        }

        .office-contact-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 18px;
        }

        .office-contact-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            padding: 12px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
        }

        .office-call-btn {
            background: var(--office-primary);
            color: white;
        }

        .office-whatsapp-btn {
            background: #dcfce7;
            color: #166534;
        }

        /* Property cards */

        .property-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .property-card {
            background: white;
            border: 1px solid var(--office-border);
            border-radius: 18px;
            padding: 21px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .property-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(15,23,42,.08);
        }

        .property-card h3 {
            font-size: 18px;
            margin-bottom: 9px;
        }

        .property-card p {
            color: var(--office-muted);
            font-size: 13px;
        }

        .property-price {
            margin-top: 18px;
            font-size: 20px;
            font-weight: 800;
            color: var(--office-secondary);
        }

        .property-details {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .property-tag {
            padding: 5px 9px;
            border-radius: 8px;
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
        }

        /* Empty */

        .office-empty {
            padding: 60px 25px;
            text-align: center;
            background: white;
            border: 1px dashed #cbd5e1;
            border-radius: 20px;
        }

        .office-empty-icon {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .office-empty h3 {
            margin-bottom: 6px;
        }

        .office-empty p {
            color: var(--office-muted);
        }

        /* Footer */

        .office-footer {
            margin-top: 30px;
            padding: 35px 24px;
            border-top: 1px solid var(--office-border);
            background: white;
            color: var(--office-muted);
            text-align: center;
            font-size: 13px;
        }

        /* Responsive */

        @media (max-width: 900px) {
            .office-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .office-detail-grid {
                grid-template-columns: 1fr;
            }

            .office-info-card {
                position: static;
            }
        }

        @media (max-width: 650px) {
            .office-header-inner {
                padding: 15px 18px;
            }

            .office-nav {
                display: none;
            }

            .office-hero-inner {
                padding: 60px 20px;
            }

            .office-container {
                padding: 45px 18px;
            }

            .office-grid,
            .property-grid {
                grid-template-columns: 1fr;
            }

            .office-section-head {
                align-items: start;
                flex-direction: column;
            }

            .office-section-head h2 {
                font-size: 25px;
            }

            .office-hero h1 {
                font-size: 39px;
            }

            .office-hero p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

<div class="office-page">

    <header class="office-header">
        <div class="office-header-inner">

            <a href="{{ url('/') }}" class="office-logo">
                Sowlfa<span>.</span>
            </a>

            <nav class="office-nav">
                <a href="{{ url('/') }}">الرئيسية</a>
                <a href="{{ route('properties.index') }}">العقارات</a>
                <a href="{{ route('offices.index') }}">المكاتب</a>
            </nav>

            <a href="{{ url('/') }}" class="office-back">
                العودة للموقع ←
            </a>

        </div>
    </header>

    @yield('content')

    <footer class="office-footer">
        © {{ date('Y') }} Sowlfa — منصة العقارات
    </footer>

</div>

</body>
</html>
