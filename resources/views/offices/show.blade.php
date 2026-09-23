<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="application/ld+json">
{!! json_encode(
    $structuredData,
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
) !!}
</script>
    <title>
    {{ $office->name }}
    @if($office->city)
        في {{ $office->city }}
    @endif
    | SOWLFA
</title>

<meta
    name="description"
    content="{{ \Illuminate\Support\Str::limit(
        'تعرف على ' . $office->name .
        ($office->city ? ' في ' . $office->city : '') .
        ' واكتشف العقارات المتاحة وطرق التواصل مع المكتب على SOWLFA.',
        160,
        ''
    ) }}"
>

<meta name="robots" content="index, follow">

<link
    rel="canonical"
    href="{{ route('offices.show', $office->slug) }}"
>

<meta
    property="og:title"
    content="{{ $office->name }}@if($office->city) في {{ $office->city }}@endif | SOWLFA"
>

<meta
    property="og:description"
    content="{{ \Illuminate\Support\Str::limit(
        'تعرف على ' . $office->name .
        ($office->city ? ' في ' . $office->city : '') .
        ' واكتشف العقارات المتاحة وطرق التواصل مع المكتب على SOWLFA.',
        160,
        ''
    ) }}"
>

<meta property="og:type" content="website">

<meta
    property="og:url"
    content="{{ route('offices.show', $office->slug) }}"
>

<meta property="og:site_name" content="SOWLFA">

<meta name="twitter:card" content="summary">

<meta
    name="twitter:title"
    content="{{ $office->name }}@if($office->city) في {{ $office->city }}@endif | SOWLFA"
>

<meta
    name="twitter:description"
    content="{{ \Illuminate\Support\Str::limit(
        'تعرف على ' . $office->name .
        ($office->city ? ' في ' . $office->city : '') .
        ' واكتشف العقارات المتاحة وطرق التواصل مع المكتب على SOWLFA.',
        160,
        ''
    ) }}"
>

   <meta name="twitter:card" content="summary">

<meta
    name="twitter:title"
    content="{{ $office->name }}@if($office->city) في {{ $office->city }}@endif | SOWLFA"
>

<meta
    name="twitter:description"
    content="{{ \Illuminate\Support\Str::limit(
        'تعرف على ' . $office->name .
        ($office->city ? ' في ' . $office->city : '') .
        ' واكتشف العقارات المتاحة وطرق التواصل مع المكتب على SOWLFA.',
        160,
        ''
    ) }}"
>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #173f5f;
            --primary-dark: #0d2940;
            --accent: #f4b942;
            --green: #159957;
            --green-dark: #0d7a43;
            --blue-light: #eaf4fb;
            --gold-light: #fff7df;
            --green-light: #eaf8f0;
            --background: #f5f7fa;
            --text: #172033;
            --muted: #6b7280;
            --border: #e5e7eb;
            --white: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Tahoma, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font-family: inherit;
        }

        .page {
            min-height: 100vh;
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;
            overflow: hidden;
            min-height: 560px;
            display: flex;
            align-items: center;
            color: #fff;

            background-image:
                linear-gradient(
                    90deg,
                    rgba(7, 22, 35, .94) 0%,
                    rgba(7, 22, 35, .82) 45%,
                    rgba(7, 22, 35, .62) 100%
                ),
                url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1800&q=85');

            background-size: cover;
            background-position: center;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    135deg,
                    rgba(23, 63, 95, .28),
                    transparent 60%
                );
            pointer-events: none;
        }

        .container {
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
        }

        .hero-container {
            position: relative;
            z-index: 2;
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
            padding: 90px 0 110px;
        }

        .hero-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 55px;
        }

        .brand {
            font-size: 17px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .owner-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 0 17px;
            border-radius: 10px;

            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.25);

            color: #fff;
            font-size: 13px;
            font-weight: 700;

            backdrop-filter: blur(8px);
            transition: .2s ease;
        }

        .owner-login:hover {
            background: rgba(255,255,255,.2);
            transform: translateY(-1px);
        }

        .hero-content {
            max-width: 820px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 14px;
            margin-bottom: 20px;

            border-radius: 999px;

            background: rgba(244,185,66,.16);
            border: 1px solid rgba(244,185,66,.4);

            color: #ffe29a;
            font-size: 13px;
            font-weight: 700;
        }

        .badge::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--accent);
        }

        h1 {
            margin: 0;

            font-size: clamp(36px, 6vw, 64px);
            line-height: 1.08;
            letter-spacing: -1px;
        }

        .hero-location {
            margin-top: 18px;
            color: #dce6ee;
            font-size: 18px;
        }

        .hero-description {
            margin-top: 22px;
            color: #d4dee7;
            font-size: 16px;
            line-height: 1.9;
            max-width: 720px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 11px;
            margin-top: 30px;
        }


        /* =========================
           BUTTONS
        ========================= */

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 47px;
            padding: 0 21px;

            border-radius: 10px;
            border: 1px solid transparent;

            font-size: 14px;
            font-weight: 800;

            cursor: pointer;
            transition: .2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .button-primary {
            background: #fff;
            color: var(--primary);
            box-shadow: 0 8px 20px rgba(0,0,0,.12);
        }

        .button-secondary {
            background: rgba(255,255,255,.1);
            color: #fff;
            border-color: rgba(255,255,255,.2);
            backdrop-filter: blur(8px);
        }

        .button-whatsapp {
            background: var(--green);
            color: #fff;
        }


        /* =========================
           MAIN
        ========================= */

        .main {
            padding: 0 0 70px;
        }


        /* =========================
           STATS
        ========================= */

        .stats {
            position: relative;
            z-index: 5;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 16px;

            margin-top: -45px;
        }

        .stat {
            min-height: 125px;

            padding: 24px;

            border-radius: 16px;

            border: 1px solid rgba(0,0,0,.04);

            box-shadow:
                0 14px 35px rgba(15,23,42,.08);

            background: #fff;
        }

        .stat:nth-child(1) {
            background: var(--blue-light);
            border-color: #d6e9f6;
        }

        .stat:nth-child(2) {
            background: var(--gold-light);
            border-color: #f5e7b8;
        }

        .stat:nth-child(3) {
            background: var(--green-light);
            border-color: #d4efdf;
        }

        .stat-value {
            font-size: 25px;
            font-weight: 900;
        }

        .stat:nth-child(1) .stat-value {
            color: var(--primary);
        }

        .stat:nth-child(2) .stat-value {
            color: #9a6900;
        }

        .stat:nth-child(3) .stat-value {
            color: var(--green-dark);
        }

        .stat-label {
            margin-top: 8px;
            color: var(--muted);
            font-size: 13px;
        }


        /* =========================
           CONTENT
        ========================= */

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;

            gap: 24px;
            margin-top: 30px;

            align-items: start;
        }

        .section,
        .sidebar-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 17px;

            box-shadow: 0 8px 25px rgba(15,23,42,.035);
        }

        .section {
            padding: 28px;
        }

        .section-title {
            margin: 0;
            font-size: 23px;
            color: var(--primary);
        }

        .section-description {
            margin: 8px 0 24px;
            color: var(--muted);
            font-size: 14px;
        }


        /* =========================
           PROPERTIES
        ========================= */

        .properties {
            display: grid;
            gap: 14px;
        }

        .property-card {
            position: relative;

            padding: 21px;

            border-radius: 14px;

            border: 1px solid #e2e8f0;

            background:
                linear-gradient(
                    135deg,
                    #ffffff 0%,
                    #f8fbfd 100%
                );

            transition: .2s ease;
        }

        .property-card:hover {
            transform: translateY(-2px);

            border-color: #cbdce8;

            box-shadow:
                0 10px 25px rgba(23,63,95,.08);
        }

        .property-card::before {
            content: "";

            position: absolute;
            top: 0;
            right: 0;

            width: 5px;
            height: 100%;

            border-radius: 0 14px 14px 0;

            background: var(--primary);
        }

        .property-card:nth-child(even)::before {
            background: var(--accent);
        }

        .property-card-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin-bottom: 13px;
        }

        .property-card-badges span {
            padding: 6px 10px;

            background: var(--blue-light);

            border-radius: 7px;

            color: var(--primary);

            font-size: 12px;
            font-weight: 700;
        }

        .property-card-badges span:nth-child(2) {
            background: var(--gold-light);
            color: #8a6200;
        }

        .property-title {
            margin: 0;
            font-size: 19px;
            color: #172033;
        }

        .property-location {
            margin-top: 8px;
            color: var(--muted);
            font-size: 13px;
        }

        .property-price {
            margin-top: 16px;

            color: var(--primary);

            font-size: 21px;
            font-weight: 900;
        }

        .property-details {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;

            margin-top: 17px;
            padding-top: 15px;

            border-top: 1px solid #edf0f3;

            color: #596579;

            font-size: 13px;
        }

        .property-details span {
            padding: 6px 9px;

            background: #f3f5f7;

            border-radius: 7px;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            display: grid;
            gap: 16px;
        }

        .sidebar-card {
            padding: 23px;
        }

        .sidebar-title {
            margin: 0 0 17px;
            font-size: 18px;
            color: var(--primary);
        }

        .contact-item {
            padding: 12px 0;
            border-bottom: 1px solid #eef0f2;
        }

        .contact-item:last-child {
            border-bottom: 0;
        }

        .contact-label {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 5px;
        }

        .contact-value {
            font-size: 14px;
            font-weight: 700;
            word-break: break-word;
        }

        .contact-actions {
            display: grid;
            gap: 9px;
            margin-top: 16px;
        }

        .contact-actions .button {
            width: 100%;
        }


        /* =========================
           SHARE
        ========================= */

        .share-card {
            background:
                linear-gradient(
                    145deg,
                    #173f5f,
                    #0d2940
                );

            border: 0;

            color: #fff;
        }

        .share-card .sidebar-title {
            color: #fff;
        }

        .share-description {
            margin: -7px 0 15px;

            color: #cbd8e2;

            font-size: 13px;
            line-height: 1.7;
        }

        .share-url {
            width: 100%;
            min-height: 43px;

            padding: 9px 11px;

            border: 1px solid rgba(255,255,255,.18);
            border-radius: 8px;

            direction: ltr;
            text-align: left;

            font-size: 12px;

            background: rgba(255,255,255,.08);
            color: #fff;
        }

        .share-url:focus {
            outline: none;
            border-color: rgba(255,255,255,.4);
        }

        .share-button {
            width: 100%;
            margin-top: 10px;
        }

        .share-card .button-primary {
            color: var(--primary);
        }


        /* =========================
           EMPTY
        ========================= */

        .empty {
            padding: 40px 20px;

            text-align: center;

            border-radius: 12px;

            background: #f8fafc;

            color: var(--muted);

            font-size: 14px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 800px) {

            .hero {
                min-height: 570px;

                background-position: center;
            }

            .hero-container {
                padding: 35px 0 90px;
            }

            .hero-top {
                margin-bottom: 55px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: 1fr;
                margin-top: -30px;
            }

            .stat {
                min-height: auto;
            }
        }


        @media (max-width: 500px) {

            .container,
            .hero-container {
                width: min(100% - 22px, 1120px);
            }

            .hero-top {
                align-items: flex-start;
            }

            .brand {
                font-size: 15px;
            }

            .owner-login {
                min-height: 38px;
                padding: 0 12px;
                font-size: 12px;
            }

            h1 {
                font-size: 38px;
            }

            .hero-location {
                font-size: 16px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .hero-actions .button {
                width: 100%;
            }

            .section,
            .sidebar-card {
                padding: 20px;
            }

            .section-title {
                font-size: 20px;
            }

            .property-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    {{-- =========================
         HERO
    ========================== --}}

    <section class="hero">

        <div class="hero-container">

            <div class="hero-top">

                <div class="brand">
                    SOWLFA
                </div>

                <a
                    href="{{ route('login') }}"
                    class="owner-login"
                >
                    دخول صاحب المكتب
                </a>

            </div>


            <div class="hero-content">

                <div class="badge">
                    مكتب عقاري
                </div>

                <h1>
                    {{ $office->name }}
                </h1>


                @if($office->city || $office->country)

                    <div class="hero-location">

                        {{ $office->city }}

                        @if($office->city && $office->country)
                            ،
                        @endif

                        {{ $office->country }}

                    </div>

                @endif


                @if($office->description)

                    <div class="hero-description">
                        {{ $office->description }}
                    </div>

                @else

                    <div class="hero-description">
                        اكتشف العقارات المتاحة من {{ $office->name }}
                        وتواصل مع المكتب مباشرة.
                    </div>

                @endif


                <div class="hero-actions">

                    @if($office->phone)

                        <a
                            href="tel:{{ $office->phone }}"
                            class="button button-primary"
                        >
                            اتصال بالمكتب
                        </a>

                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $office->phone) }}"
                            target="_blank"
                            rel="noopener"
                            class="button button-whatsapp"
                        >
                            WhatsApp
                        </a>

                    @endif


                    <button
                        type="button"
                        class="button button-secondary"
                        onclick="shareOfficePage()"
                    >
                        مشاركة الصفحة
                    </button>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         MAIN
    ========================== --}}

    <main class="main">

        <div class="container">


            {{-- =========================
                 STATS
            ========================== --}}

            <div class="stats">

                <div class="stat">

                    <div class="stat-value">
                        {{ $office->properties->count() }}
                    </div>

                    <div class="stat-label">
                        عقار متاح
                    </div>

                </div>


                <div class="stat">

                    <div class="stat-value">
                        {{ $office->city ?: '—' }}
                    </div>

                    <div class="stat-label">
                        المدينة
                    </div>

                </div>


                <div class="stat">

                    <div class="stat-value">
                        {{ $office->phone ? 'متاح' : '—' }}
                    </div>

                    <div class="stat-label">
                        التواصل
                    </div>

                </div>

            </div>


            {{-- =========================
                 CONTENT
            ========================== --}}

            <div class="content-grid">


                {{-- =========================
                     PROPERTIES
                ========================== --}}

                <section class="section">

                    <h2 class="section-title">
                        العقارات المتاحة
                    </h2>

                    <p class="section-description">
                        اكتشف أحدث العقارات المعروضة من {{ $office->name }}
                    </p>


                    @if($office->properties->count())

                        <div class="properties">

                            @foreach($office->properties->take(4) as $property)

                                <article class="property-card">


                                    @if($property->property_type || $property->listing_type)

                                        <div class="property-card-badges">

                                            @if($property->property_type)

                                                <span>
                                                    {{ $property->property_type }}
                                                </span>

                                            @endif


                                            @if($property->listing_type)

                                                <span>
                                                    {{ $property->listing_type }}
                                                </span>

                                            @endif

                                        </div>

                                    @endif


                                    <h3 class="property-title">
                                        {{ $property->title }}
                                    </h3>


                                    @if($property->city || $property->address)

                                        <div class="property-location">

                                            {{ $property->city }}

                                            @if($property->city && $property->address)
                                                ،
                                            @endif

                                            {{ $property->address }}

                                        </div>

                                    @endif


                                    @if($property->price)

                                        <div class="property-price">

                                            {{ number_format((float) $property->price, 0, '.', ',') }}

                                            {{ $property->currency }}

                                        </div>

                                    @endif


                                    <div class="property-details">

                                        @if($property->bedrooms !== null)

                                            <span>
                                                غرف النوم:
                                                {{ $property->bedrooms }}
                                            </span>

                                        @endif


                                        @if($property->bathrooms !== null)

                                            <span>
                                                الحمامات:
                                                {{ $property->bathrooms }}
                                            </span>

                                        @endif


                                        @if($property->area)

                                            <span>
                                                المساحة:
                                                {{ $property->area }}
                                            </span>

                                        @endif

                                    </div>


                                </article>

                            @endforeach

                        </div>


                    @else

                        <div class="empty">
                            لا توجد عقارات متاحة حاليًا.
                        </div>

                    @endif

                </section>


                {{-- =========================
                     SIDEBAR
                ========================== --}}

                <aside class="sidebar">


                    {{-- OFFICE INFO --}}

                    <div class="sidebar-card">

                        <h2 class="sidebar-title">
                            بيانات المكتب
                        </h2>


                        @if($office->address)

                            <div class="contact-item">

                                <div class="contact-label">
                                    العنوان
                                </div>

                                <div class="contact-value">
                                    {{ $office->address }}
                                </div>

                            </div>

                        @endif


                        @if($office->city)

                            <div class="contact-item">

                                <div class="contact-label">
                                    المدينة
                                </div>

                                <div class="contact-value">
                                    {{ $office->city }}
                                </div>

                            </div>

                        @endif


                        @if($office->phone)

                            <div class="contact-item">

                                <div class="contact-label">
                                    الهاتف
                                </div>

                                <div class="contact-value">
                                    {{ $office->phone }}
                                </div>

                            </div>

                        @endif


                        @if($office->email)

                            <div class="contact-item">

                                <div class="contact-label">
                                    البريد الإلكتروني
                                </div>

                                <div class="contact-value">
                                    {{ $office->email }}
                                </div>

                            </div>

                        @endif


                        @if($office->phone)

                            <div class="contact-actions">

                                <a
                                    href="tel:{{ $office->phone }}"
                                    class="button button-primary"
                                >
                                    اتصل الآن
                                </a>

                                <a
                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $office->phone) }}"
                                    target="_blank"
                                    rel="noopener"
                                    class="button button-whatsapp"
                                >
                                    تواصل عبر WhatsApp
                                </a>

                            </div>

                        @endif

                    </div>


                    {{-- SHARE --}}

                    <div class="sidebar-card share-card">

                        <h2 class="sidebar-title">
                            شارك صفحة المكتب
                        </h2>

                        <p class="share-description">
                            انسخ الرابط وشاركه مباشرة مع العملاء عبر وسائل التواصل الاجتماعي.
                        </p>


                        <input
                            id="office-page-url"
                            class="share-url"
                            type="text"
                            value="{{ url()->current() }}"
                            readonly
                        >


                        <button
                            type="button"
                            class="button button-primary share-button"
                            onclick="copyOfficePageUrl()"
                        >
                            نسخ الرابط
                        </button>


                        <div
                            id="copy-message"
                            style="
                                display:none;
                                margin-top:9px;
                                color:#b9f0ce;
                                font-size:12px;
                            "
                        >
                            تم نسخ الرابط بنجاح.
                        </div>

                    </div>


                </aside>

            </div>

        </div>

    </main>

</div>


<script>

    async function shareOfficePage() {

        const url = window.location.href;

        if (navigator.share) {

            try {

                await navigator.share({
                    title: @json($office->name . ' | SOWLFA'),
                    text: @json(
                        'اكتشف عقارات ' .
                        $office->name .
                        ' على SOWLFA'
                    ),
                    url: url
                });

            } catch (error) {

                // تم إغلاق نافذة المشاركة

            }

            return;
        }


        try {

            await navigator.clipboard.writeText(url);

            alert('تم نسخ رابط الصفحة. يمكنك مشاركته الآن.');

        } catch (error) {

            alert('انسخ الرابط من مربع رابط المشاركة.');

        }

    }


    async function copyOfficePageUrl() {

        const input =
            document.getElementById('office-page-url');

        const message =
            document.getElementById('copy-message');


        try {

            await navigator.clipboard.writeText(input.value);

            message.style.display = 'block';

            setTimeout(() => {

                message.style.display = 'none';

            }, 2200);

        } catch (error) {

            input.select();

            document.execCommand('copy');

            message.style.display = 'block';

        }

    }

</script>

</body>
</html>