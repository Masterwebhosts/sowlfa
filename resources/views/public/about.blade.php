@extends('public.layouts.app')

@section(
'title',
'من نحن | SOWLFA'
)

@section(
'meta_description',
'تعرف على SOWLFA، منصة عقارية للمكاتب والوسطاء تساعد على عرض العقارات، اكتشاف العقارات المناسبة، ومعاينة العقار والتواصل مباشرة مع المكتب صاحب العقار.'
)

@section(
'og_title',
'من نحن | SOWLFA'
)

@section(
'og_description',
'SOWLFA منصة عقارية للمكاتب والوسطاء لعرض العقارات واكتشافها والتواصل مباشرة مع المكاتب بعد المعاينة.'
)

@section('content')

<div class="about-page" dir="rtl">

<style>
    .about-page {
        --about-primary: #2563eb;
        --about-primary-dark: #1d4ed8;
        --about-navy: #0f172a;
        --about-text: #334155;
        --about-muted: #64748b;
        --about-border: #e2e8f0;
        --about-bg: #f8fafc;
        background: #fff;
        color: var(--about-navy);
        overflow: hidden;
    }

    .about-page *,
    .about-page *::before,
    .about-page *::after {
        box-sizing: border-box;
    }

    .about-container {
        width: min(1160px, calc(100% - 32px));
        margin: 0 auto;
    }

    /* Hero */
    .about-hero {
        position: relative;
        padding: 90px 0 85px;
        background:
            radial-gradient(circle at 85% 15%, rgba(37, 99, 235, 0.12), transparent 28%),
            radial-gradient(circle at 15% 70%, rgba(245, 158, 11, 0.08), transparent 23%),
            linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    }

    .about-hero::before {
        content: "";
        position: absolute;
        width: 360px;
        height: 360px;
        border: 1px solid rgba(37, 99, 235, 0.08);
        border-radius: 50%;
        top: -160px;
        right: -110px;
    }

    .about-hero-grid {
        position: relative;
        display: grid;
        grid-template-columns: 1.05fr 0.95fr;
        gap: 60px;
        align-items: center;
    }

    .about-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border: 1px solid #dbeafe;
        border-radius: 999px;
        background: #eff6ff;
        color: var(--about-primary-dark);
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .about-eyebrow-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--about-primary);
    }

    .about-hero h1 {
        margin: 0;
        font-size: clamp(40px, 5vw, 60px);
        line-height: 1.08;
        letter-spacing: -1.5px;
        font-weight: 900;
    }

    .about-hero h1 span {
        color: var(--about-primary);
    }

    .about-hero-text {
        max-width: 690px;
        margin: 22px 0 0;
        color: var(--about-muted);
        font-size: 18px;
        line-height: 1.95;
    }

    .about-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 30px;
    }

    .about-btn {
        min-height: 50px;
        padding: 0 22px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-weight: 800;
        transition: 0.2s ease;
    }

    .about-btn-primary {
        background: var(--about-primary);
        color: #fff;
        box-shadow: 0 12px 28px rgba(37, 99, 235, 0.22);
    }

    .about-btn-primary:hover {
        background: var(--about-primary-dark);
        transform: translateY(-2px);
    }

    .about-btn-secondary {
        background: #fff;
        color: var(--about-navy);
        border: 1px solid var(--about-border);
    }

    .about-btn-secondary:hover {
        border-color: #cbd5e1;
        transform: translateY(-2px);
    }

    /* Hero visual */
    .about-visual {
        position: relative;
    }

    .about-visual-card {
        position: relative;
        background: var(--about-navy);
        color: #fff;
        border-radius: 28px;
        padding: 32px;
        overflow: hidden;
        box-shadow: 0 28px 70px rgba(15, 23, 42, 0.18);
    }

    .about-visual-card::before {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border-radius: 50%;
        background: rgba(37, 99, 235, 0.25);
        top: -100px;
        left: -80px;
    }

    .about-visual-content {
        position: relative;
        z-index: 1;
    }

    .about-logo {
        font-size: 29px;
        font-weight: 900;
        letter-spacing: 2px;
        margin-bottom: 30px;
    }

    .about-visual-card h2 {
        margin: 0;
        font-size: 25px;
        line-height: 1.5;
    }

    .about-visual-card p {
        margin: 12px 0 25px;
        color: #cbd5e1;
        line-height: 1.85;
    }

    .about-visual-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .about-visual-item {
        padding: 17px;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 15px;
        background: rgba(255,255,255,0.07);
    }

    .about-visual-item strong {
        display: block;
        margin-bottom: 5px;
        font-size: 16px;
    }

    .about-visual-item span {
        color: #cbd5e1;
        font-size: 13px;
    }

    /* Sections */
    .about-section {
        padding: 85px 0;
    }

    .about-section-gray {
        background: var(--about-bg);
    }

    .about-section-head {
        max-width: 720px;
        margin: 0 auto 48px;
        text-align: center;
    }

    .about-label {
        display: inline-block;
        color: var(--about-primary);
        font-size: 13px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    .about-section-head h2 {
        margin: 0 0 12px;
        font-size: clamp(30px, 4vw, 43px);
        line-height: 1.2;
        font-weight: 900;
        letter-spacing: -0.8px;
    }

    .about-section-head p {
        margin: 0;
        color: var(--about-muted);
        line-height: 1.9;
        font-size: 16px;
    }

    /* Story */
    .about-story {
        display: grid;
        grid-template-columns: 0.8fr 1.2fr;
        gap: 50px;
        align-items: center;
    }

    .about-story-badge {
        padding: 32px;
        border-radius: 26px;
        background: linear-gradient(145deg, #eff6ff, #ffffff);
        border: 1px solid #dbeafe;
    }

    .about-story-badge strong {
        display: block;
        font-size: 32px;
        font-weight: 900;
        color: var(--about-primary);
        margin-bottom: 8px;
    }

    .about-story-badge span {
        color: var(--about-muted);
        line-height: 1.8;
    }

    .about-story-content h2 {
        margin: 0 0 16px;
        font-size: 32px;
        font-weight: 900;
    }

    .about-story-content p {
        margin: 0 0 14px;
        color: var(--about-muted);
        line-height: 2;
    }

    .about-story-content p:last-child {
        margin-bottom: 0;
    }

    /* Values / Features */
    .about-features {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .about-feature {
        display: flex;
        gap: 18px;
        padding: 25px;
        background: #fff;
        border: 1px solid var(--about-border);
        border-radius: 20px;
        transition: 0.2s ease;
    }

    .about-feature:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
    }

    .about-feature-icon {
        width: 52px;
        height: 52px;
        flex: 0 0 52px;
        display: grid;
        place-items: center;
        border-radius: 16px;
        background: #eff6ff;
        color: var(--about-primary);
    }

    .about-feature h3 {
        margin: 0 0 8px;
        font-size: 18px;
    }

    .about-feature p {
        margin: 0;
        color: var(--about-muted);
        font-size: 14px;
        line-height: 1.85;
    }

    /* Audience */
    .about-audience {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .about-audience-card {
        padding: 28px;
        border: 1px solid var(--about-border);
        border-radius: 20px;
        background: #fff;
        transition: 0.2s ease;
    }

    .about-audience-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
    }

    .about-audience-number {
        font-size: 13px;
        color: var(--about-primary);
        font-weight: 900;
        margin-bottom: 15px;
    }

    .about-audience-card h3 {
        margin: 0 0 10px;
        font-size: 20px;
    }

    .about-audience-card p {
        margin: 0;
        color: var(--about-muted);
        line-height: 1.85;
        font-size: 14px;
    }

    /* Direct contact */
    .about-contact {
        padding: 42px;
        display: grid;
        grid-template-columns: 0.95fr 1.05fr;
        gap: 45px;
        align-items: center;
        border-radius: 28px;
        background: linear-gradient(135deg, #eff6ff 0%, #ffffff 65%);
        border: 1px solid #dbeafe;
    }

    .about-contact h2 {
        margin: 0 0 12px;
        font-size: 31px;
        font-weight: 900;
    }

    .about-contact p {
        margin: 0;
        color: var(--about-muted);
        line-height: 1.9;
    }

    .about-contact-list {
        display: grid;
        gap: 12px;
    }

    .about-contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 17px;
        background: #fff;
        border: 1px solid var(--about-border);
        border-radius: 14px;
        font-size: 14px;
        font-weight: 700;
    }

    .about-check {
        width: 25px;
        height: 25px;
        flex: 0 0 25px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: #dcfce7;
        color: #15803d;
        font-size: 13px;
        font-weight: 900;
    }

    /* CTA */
    .about-cta {
        padding: 85px 0;
    }

    .about-cta-card {
        position: relative;
        overflow: hidden;
        padding: 55px 35px;
        border-radius: 30px;
        background: var(--about-navy);
        color: #fff;
        text-align: center;
        box-shadow: 0 25px 60px rgba(15, 23, 42, 0.16);
    }

    .about-cta-card::before,
    .about-cta-card::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }

    .about-cta-card::before {
        width: 240px;
        height: 240px;
        top: -120px;
        right: -70px;
        background: rgba(37, 99, 235, 0.22);
    }

    .about-cta-card::after {
        width: 180px;
        height: 180px;
        bottom: -90px;
        left: -40px;
        background: rgba(255,255,255,0.04);
    }

    .about-cta-content {
        position: relative;
        z-index: 1;
    }

    .about-cta-card h2 {
        margin: 0 0 12px;
        font-size: clamp(30px, 4vw, 43px);
        font-weight: 900;
    }

    .about-cta-card p {
        max-width: 680px;
        margin: 0 auto;
        color: #cbd5e1;
        line-height: 1.9;
    }

    .about-cta-actions {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 26px;
    }

    .about-cta-white {
        background: #fff;
        color: var(--about-navy);
    }

    .about-cta-outline {
        background: rgba(255,255,255,0.06);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.18);
    }

    /* Mobile */
    @media (max-width: 980px) {
        .about-hero-grid,
        .about-story,
        .about-contact {
            grid-template-columns: 1fr;
        }

        .about-visual {
            max-width: 700px;
        }

        .about-audience {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 700px) {
        .about-hero {
            padding: 60px 0 55px;
        }

        .about-section,
        .about-cta {
            padding: 60px 0;
        }

        .about-features,
        .about-audience {
            grid-template-columns: 1fr;
        }

        .about-hero h1 {
            font-size: 40px;
        }

        .about-hero-text {
            font-size: 16px;
        }

        .about-visual-card,
        .about-contact,
        .about-cta-card {
            padding: 26px;
        }

        .about-btn {
            width: 100%;
        }
    }
</style>


{{-- Hero --}}
<section class="about-hero">

    <div class="about-container">

        <div class="about-hero-grid">

            <div>

                <div class="about-eyebrow">
                    <span class="about-eyebrow-dot"></span>
                    عن SOWLFA
                </div>

                <h1>
                    منصة عقارية
                    <span>أقرب لاحتياجاتك</span>
                </h1>

                <p class="about-hero-text">
                    SOWLFA منصة رقمية للمكاتب والوسطاء العقاريين،
                    تساعدهم على عرض عقاراتهم، اكتشاف العقارات المناسبة،
                    والوصول إلى المكتب صاحب العقار والتواصل معه مباشرة بعد المعاينة.
                </p>

                <div class="about-actions">

                    <a
                        href="{{ url('/subscribe') }}"
                        class="about-btn about-btn-primary"
                    >
                        ابدأ الآن
                    </a>

                    <a
                        href="{{ url('/how-it-works') }}"
                        class="about-btn about-btn-secondary"
                    >
                        كيف تعمل SOWLFA؟
                    </a>

                </div>

            </div>


            <div class="about-visual">

                <div class="about-visual-card">

                    <div class="about-visual-content">

                        <div class="about-logo">
                            SOWLFA
                        </div>

                        <h2>
                            مكان واحد للمكتب والعقار
                        </h2>

                        <p>
                            حضور خاص بمكتبك، عرض منظم لعقاراتك،
                            وسيلة أسهل للاكتشاف والتواصل المباشر.
                        </p>

                        <div class="about-visual-grid">

                            <div class="about-visual-item">
                                <strong>مكتبك</strong>
                                <span>صفحة مخصصة لمكتبك</span>
                            </div>

                            <div class="about-visual-item">
                                <strong>عقاراتك</strong>
                                <span>عرض منظم لعقارات المكتب</span>
                            </div>

                            <div class="about-visual-item">
                                <strong>البحث</strong>
                                <span>اكتشاف العقارات المناسبة</span>
                            </div>

                            <div class="about-visual-item">
                                <strong>التواصل</strong>
                                <span>مباشرة بعد المعاينة</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- What is SOWLFA --}}
<section class="about-section">

    <div class="about-container">

        <div class="about-story">

            <div class="about-story-badge">
                <strong>SOWLFA</strong>

                <span>
                    منصة رقمية تركز على جعل الوصول إلى العقارات
                    والمكاتب العقارية أكثر وضوحًا وسهولة.
                </span>
            </div>


            <div class="about-story-content">

                <div class="about-label">
                    ما هي SOWLFA؟
                </div>

                <h2>
                    نربط بين العقار والمكتب بطريقة أبسط
                </h2>

                <p>
                    SOWLFA هي منصة مخصصة لقطاع العقارات،
                    تجمع المكاتب والوسطاء والعقارات في بيئة رقمية واحدة.
                </p>

                <p>
                    يستطيع المكتب إنشاء حضور خاص به،
                    وإضافة عقاراته والوسطاء التابعين له،
                    بينما يمكن للمستخدمين البحث عن العقارات
                    والاطلاع على تفاصيلها.
                </p>

                <p>
                    بعد العثور على العقار المناسب ومعاينته،
                    يكون التواصل مباشرة مع المكتب صاحب العقار،
                    لتستمر بقية التفاصيل والاتفاقات خارج المنصة.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- Features --}}
<section class="about-section about-section-gray">

    <div class="about-container">

        <div class="about-section-head">

            <div class="about-label">
                ماذا نقدم؟
            </div>

            <h2>
                أدوات بسيطة لمكتبك العقاري
            </h2>

            <p>
                نركز على الأشياء التي يحتاجها المكتب يوميًا:
                حضور واضح، عقارات منظمة، واكتشاف أسهل.
            </p>

        </div>


        <div class="about-features">

            <div class="about-feature">

                <div class="about-feature-icon">
                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                        <path d="M3 21V9L12 3L21 9V21H3Z"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linejoin="round"/>
                        <path d="M8 21V13H16V21"
                              stroke="currentColor"
                              stroke-width="1.8"/>
                    </svg>
                </div>

                <div>
                    <h3>مكتب مخصص لك</h3>

                    <p>
                        صفحة خاصة بمكتبك تعرض بياناته وعقاراته
                        بشكل منظم وسهل الوصول.
                    </p>
                </div>

            </div>


            <div class="about-feature">

                <div class="about-feature-icon">
                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                        <circle cx="11" cy="11" r="6"
                                stroke="currentColor"
                                stroke-width="1.8"/>
                        <path d="M16 16L21 21"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linecap="round"/>
                    </svg>
                </div>

                <div>
                    <h3>سهولة اكتشاف العقارات</h3>

                    <p>
                        البحث عن العقارات المناسبة والاطلاع
                        على تفاصيلها من خلال منصة واحدة.
                    </p>
                </div>

            </div>


            <div class="about-feature">

                <div class="about-feature-icon">
                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                        <path d="M21 11.5C21 16.19 17 20 12 20C10.58 20 9.24 19.69 8.05 19.13L3 21L4.87 16.8C4.32 15.61 4 14.28 4 12.9C4 8.21 8 4.4 13 4.4C17.42 4.4 21 7.55 21 11.5Z"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linejoin="round"/>
                    </svg>
                </div>

                <div>
                    <h3>تواصل مباشر</h3>

                    <p>
                        بعد معاينة العقار، يتم التواصل مباشرة
                        مع المكتب صاحب العقار.
                    </p>
                </div>

            </div>


            <div class="about-feature">

                <div class="about-feature-icon">
                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                        <path d="M10 13C10.78 13.78 12.05 13.78 12.83 13L15 10.83C15.78 10.05 15.78 8.78 15 8C14.22 7.22 12.95 7.22 12.17 8L11.3 8.87"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linecap="round"/>
                        <path d="M14 11C13.22 10.22 11.95 10.22 11.17 11L9 13.17C8.22 13.95 8.22 15.22 9 16C9.78 16.78 11.05 16.78 11.83 16L12.7 15.13"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linecap="round"/>
                    </svg>
                </div>

                <div>
                    <h3>رابط خاص بمكتبك</h3>

                    <p>
                        رابط خاص بصفحة مكتبك يمكنك مشاركته
                        مع العملاء ونشره بسهولة.
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>


{{-- Audience --}}
<section class="about-section">

    <div class="about-container">

        <div class="about-section-head">

            <div class="about-label">
                لمن صُممت؟
            </div>

            <h2>
                لسوق العقارات المهني
            </h2>

            <p>
                صُممت SOWLFA لتكون مساحة رقمية عملية للمكاتب
                والوسطاء والمهتمين بالعقارات.
            </p>

        </div>


        <div class="about-audience">

            <div class="about-audience-card">

                <div class="about-audience-number">
                    01
                </div>

                <h3>
                    المكاتب العقارية
                </h3>

                <p>
                    أنشئ حضورًا خاصًا لمكتبك،
                    اعرض عقاراتك، ونظّم بيانات فريقك.
                </p>

            </div>


            <div class="about-audience-card">

                <div class="about-audience-number">
                    02
                </div>

                <h3>
                    الوسطاء العقاريون
                </h3>

                <p>
                    اكتشف العقارات المناسبة وتابع
                    تفاصيلها من خلال حساب المكتب.
                </p>

            </div>


            <div class="about-audience-card">

                <div class="about-audience-number">
                    03
                </div>

                <h3>
                    الباحثون عن العقارات
                </h3>

                <p>
                    ابحث عن العقارات، اطلع على التفاصيل،
                    ثم تواصل مع المكتب مباشرة بعد المعاينة.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- Direct Contact --}}
<section class="about-section about-section-gray">

    <div class="about-container">

        <div class="about-contact">

            <div>

                <div class="about-label">
                    التواصل المباشر
                </div>

                <h2>
                    من المعاينة إلى التواصل
                </h2>

                <p>
                    هدف SOWLFA هو تسهيل الوصول إلى العقار والمكتب المناسب،
                    دون تحويل المنصة إلى مكان لإتمام البيع أو إدارة الصفقات.
                </p>

            </div>


            <div class="about-contact-list">

                <div class="about-contact-item">
                    <span class="about-check">✓</span>
                    اكتشف العقار المناسب
                </div>

                <div class="about-contact-item">
                    <span class="about-check">✓</span>
                    اطلع على تفاصيل العقار
                </div>

                <div class="about-contact-item">
                    <span class="about-check">✓</span>
                    قم بالمعاينة
                </div>

                <div class="about-contact-item">
                    <span class="about-check">✓</span>
                    تواصل مباشرة مع المكتب
                </div>

            </div>

        </div>

    </div>

</section>


{{-- CTA --}}
<section class="about-cta">

    <div class="about-container">

        <div class="about-cta-card">

            <div class="about-cta-content">

                <h2>
                    اجعل لمكتبك حضورًا على SOWLFA
                </h2>

                <p>
                    أنشئ صفحتك الخاصة، أضف عقاراتك،
                    وابدأ في الوصول إلى المهتمين والمكاتب عبر المنصة.
                </p>

                <div class="about-cta-actions">

                    <a
                        href="{{ url('/subscribe') }}"
                        class="about-btn about-cta-white"
                    >
                        ابدأ الآن
                    </a>

                    <a
                        href="{{ url('/pricing') }}"
                        class="about-btn about-cta-outline"
                    >
                        عرض الخطط
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

</div>

@endsection
