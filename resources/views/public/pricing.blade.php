@extends('public.layouts.app')

@section(
    'title',
    'أسعار SOWLFA | خطط الاشتراك للمكاتب العقارية'
)

@section(
    'meta_description',
    'تعرف على خطط اشتراك SOWLFA للمكاتب العقارية: الأساسية والمتقدمة والذهبية، مع عدد الوسطاء المسموح بهم ومزايا كل خطة.'
)

@section(
    'og_title',
    'أسعار SOWLFA'
)

@section(
    'og_description',
    'اختر خطة الاشتراك المناسبة لمكتبك واستفد من حضور مكتبك وعقاراتك على SOWLFA.'
)

@section('content')

<div class="pricing-page" dir="rtl">

    <style>
        .pricing-page {
            --pricing-primary: #2563eb;
            --pricing-primary-dark: #1d4ed8;
            --pricing-navy: #0f172a;
            --pricing-text: #334155;
            --pricing-muted: #64748b;
            --pricing-border: #e2e8f0;
            --pricing-bg: #f8fafc;
            background: #fff;
            color: var(--pricing-navy);
            overflow: hidden;
        }

        .pricing-page *,
        .pricing-page *::before,
        .pricing-page *::after {
            box-sizing: border-box;
        }

        .pricing-container {
            width: min(1160px, calc(100% - 32px));
            margin: 0 auto;
        }

        /* Hero */
        .pricing-hero {
            position: relative;
            padding: 90px 0 80px;
            background:
                radial-gradient(circle at 85% 15%, rgba(37, 99, 235, 0.12), transparent 28%),
                radial-gradient(circle at 15% 75%, rgba(245, 158, 11, 0.08), transparent 23%),
                linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        }

        .pricing-hero::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            border: 1px solid rgba(37, 99, 235, 0.08);
            top: -160px;
            right: -110px;
        }

        .pricing-hero-content {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .pricing-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border: 1px solid #dbeafe;
            border-radius: 999px;
            background: #eff6ff;
            color: var(--pricing-primary-dark);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .pricing-eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--pricing-primary);
        }

        .pricing-hero h1 {
            margin: 0;
            font-size: clamp(40px, 5vw, 58px);
            line-height: 1.1;
            font-weight: 900;
            letter-spacing: -1.3px;
        }

        .pricing-hero h1 span {
            color: var(--pricing-primary);
        }

        .pricing-hero p {
            max-width: 740px;
            margin: 22px auto 0;
            color: var(--pricing-muted);
            font-size: 18px;
            line-height: 1.95;
        }

        /* Plans */
        .pricing-section {
            padding: 85px 0;
        }

        .pricing-section-gray {
            background: var(--pricing-bg);
        }

        .pricing-section-heading {
            max-width: 720px;
            margin: 0 auto 45px;
            text-align: center;
        }

        .pricing-label {
            display: inline-block;
            color: var(--pricing-primary);
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .pricing-section-heading h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: -0.7px;
        }

        .pricing-section-heading p {
            margin: 0;
            color: var(--pricing-muted);
            line-height: 1.9;
            font-size: 16px;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            align-items: stretch;
        }

        .pricing-card {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 30px;
            border: 1px solid var(--pricing-border);
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            transition: 0.2s ease;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
        }

        .pricing-card.featured {
            border: 2px solid var(--pricing-primary);
            box-shadow: 0 20px 50px rgba(37, 99, 235, 0.12);
            transform: translateY(-6px);
        }

        .pricing-card.featured:hover {
            transform: translateY(-10px);
        }

        .pricing-card-gold {
            border-color: #f1d58a;
        }

        .pricing-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            padding: 6px 11px;
            border-radius: 999px;
            background: var(--pricing-primary);
            color: #fff;
            font-size: 12px;
            font-weight: 900;
        }

        .pricing-card-gold .pricing-badge {
            background: #d4a017;
        }

        .pricing-name {
            font-size: 22px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .pricing-subtitle {
            color: var(--pricing-muted);
            font-size: 14px;
            line-height: 1.7;
            min-height: 48px;
        }

        .pricing-price {
            margin-top: 22px;
            font-size: 42px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .pricing-price small {
            font-size: 14px;
            color: var(--pricing-muted);
            font-weight: 700;
            letter-spacing: 0;
        }

        .pricing-separator {
            height: 1px;
            background: var(--pricing-border);
            margin: 24px 0;
        }

        .pricing-limit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 0 13px;
            border-radius: 999px;
            background: #eff6ff;
            color: var(--pricing-primary-dark);
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 20px;
            align-self: flex-start;
        }

        .pricing-card-gold .pricing-limit {
            background: #fff8df;
            color: #9a7200;
        }

        .pricing-features {
            display: grid;
            gap: 13px;
            margin-bottom: 28px;
        }

        .pricing-feature {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: var(--pricing-text);
            font-size: 14px;
            line-height: 1.75;
        }

        .pricing-check {
            width: 24px;
            height: 24px;
            flex: 0 0 24px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #dcfce7;
            color: #15803d;
            font-size: 12px;
            font-weight: 900;
            margin-top: 1px;
        }

        .pricing-action {
            width: 100%;
            min-height: 50px;
            margin-top: auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 900;
            transition: 0.2s ease;
        }

        .pricing-action-primary {
            background: var(--pricing-primary);
            color: #fff;
        }

        .pricing-action-primary:hover {
            background: var(--pricing-primary-dark);
            transform: translateY(-2px);
        }

        .pricing-action-secondary {
            background: #eff6ff;
            color: var(--pricing-primary-dark);
            border: 1px solid #dbeafe;
        }

        .pricing-action-secondary:hover {
            background: #dbeafe;
            transform: translateY(-2px);
        }

        .pricing-action-gold {
            background: #fff8df;
            color: #856404;
            border: 1px solid #f1d58a;
        }

        .pricing-action-gold:hover {
            background: #fff1b8;
            transform: translateY(-2px);
        }

        /* What you get */
        .pricing-benefits {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            max-width: 950px;
            margin: 0 auto;
        }

        .pricing-benefit {
            padding: 26px;
            border: 1px solid var(--pricing-border);
            border-radius: 20px;
            background: #fff;
        }

        .pricing-benefit h3 {
            margin: 0 0 9px;
            font-size: 18px;
            font-weight: 900;
        }

        .pricing-benefit p {
            margin: 0;
            color: var(--pricing-muted);
            font-size: 14px;
            line-height: 1.85;
        }

        /* Comparison */
        .pricing-compare {
            max-width: 950px;
            margin: 0 auto;
            border: 1px solid var(--pricing-border);
            border-radius: 22px;
            overflow: hidden;
            background: #fff;
        }

        .pricing-row {
            display: grid;
            grid-template-columns: 1.2fr repeat(3, 1fr);
            align-items: center;
        }

        .pricing-row > div {
            padding: 17px 18px;
            border-bottom: 1px solid var(--pricing-border);
            font-size: 14px;
        }

        .pricing-row:last-child > div {
            border-bottom: 0;
        }

        .pricing-row.header {
            background: var(--pricing-navy);
            color: #fff;
            font-weight: 900;
        }

        .pricing-row.header > div {
            border-bottom: 0;
        }

        .pricing-row:not(.header) > div:first-child {
            font-weight: 800;
            color: var(--pricing-text);
        }

        .pricing-yes {
            color: #15803d;
            font-weight: 900;
            text-align: center;
        }

        .pricing-value {
            text-align: center;
            color: var(--pricing-muted);
        }

        /* FAQ note */
        .pricing-note {
            max-width: 850px;
            margin: 35px auto 0;
            padding: 25px;
            border-radius: 18px;
            background: #fff;
            border: 1px solid var(--pricing-border);
        }

        .pricing-note h3 {
            margin: 0 0 9px;
            font-size: 18px;
            font-weight: 900;
        }

        .pricing-note p {
            margin: 0;
            color: var(--pricing-muted);
            line-height: 1.9;
            font-size: 14px;
        }

        /* CTA */
        .pricing-cta {
            padding: 85px 0;
        }

        .pricing-cta-card {
            position: relative;
            overflow: hidden;
            padding: 55px 35px;
            border-radius: 30px;
            background: var(--pricing-navy);
            color: #fff;
            text-align: center;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.16);
        }

        .pricing-cta-card::before,
        .pricing-cta-card::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .pricing-cta-card::before {
            width: 240px;
            height: 240px;
            top: -120px;
            right: -70px;
            background: rgba(37, 99, 235, 0.22);
        }

        .pricing-cta-card::after {
            width: 180px;
            height: 180px;
            bottom: -90px;
            left: -40px;
            background: rgba(255,255,255,0.04);
        }

        .pricing-cta-content {
            position: relative;
            z-index: 1;
        }

        .pricing-cta-card h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 900;
        }

        .pricing-cta-card p {
            max-width: 680px;
            margin: 0 auto;
            color: #cbd5e1;
            line-height: 1.9;
        }

        .pricing-actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .pricing-cta-btn {
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

        .pricing-cta-white {
            background: #fff;
            color: var(--pricing-navy);
        }

        .pricing-cta-outline {
            color: #fff;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.18);
        }

        .pricing-cta-btn:hover {
            transform: translateY(-2px);
        }

        /* Mobile */
        @media (max-width: 950px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 620px;
                margin: 0 auto;
            }

            .pricing-card.featured {
                transform: none;
            }

            .pricing-card.featured:hover {
                transform: translateY(-5px);
            }
        }

        @media (max-width: 760px) {
            .pricing-hero {
                padding: 60px 0 55px;
            }

            .pricing-section,
            .pricing-cta {
                padding: 60px 0;
            }

            .pricing-hero h1 {
                font-size: 40px;
            }

            .pricing-hero p {
                font-size: 16px;
            }

            .pricing-benefits {
                grid-template-columns: 1fr;
            }

            .pricing-row {
                grid-template-columns: 1.2fr repeat(3, 0.8fr);
            }

            .pricing-row > div {
                padding: 14px 8px;
                font-size: 12px;
            }

            .pricing-card,
            .pricing-cta-card {
                padding: 26px;
            }

            .pricing-cta-btn {
                width: 100%;
            }
        }
    </style>


    {{-- Hero --}}
    <section class="pricing-hero">

        <div class="pricing-container">

            <div class="pricing-hero-content">

                <div class="pricing-eyebrow">
                    <span class="pricing-eyebrow-dot"></span>
                    خطط SOWLFA
                </div>

                <h1>
                    اختر الخطة
                    <span>المناسبة لمكتبك</span>
                </h1>

                <p>
                    خطط بسيطة وواضحة تساعد مكتبك على بناء حضوره على SOWLFA،
                    عرض عقاراته، وإدارة الوسطاء وفق احتياجاته.
                </p>

            </div>

        </div>

    </section>


    {{-- Pricing plans --}}
    <section class="pricing-section">

        <div class="pricing-container">

            <div class="pricing-section-heading">

                <div class="pricing-label">
                    الأسعار
                </div>

                <h2>
                    خطط مصممة للمكاتب
                </h2>

                <p>
                    اختر الخطة التي تناسب حجم مكتبك وعدد الوسطاء الذين تريد إضافتهم.
                </p>

            </div>


            <div class="pricing-grid">

                {{-- Basic --}}
                <article class="pricing-card">

                    <div class="pricing-name">
                        الأساسية
                    </div>

                    <div class="pricing-subtitle">
                        بداية بسيطة للمكتب بدون وسطاء.
                    </div>

                    <div class="pricing-price">
                        مجانًا
                    </div>

                    <div class="pricing-separator"></div>

                    <div class="pricing-limit">
                        بدون وسطاء
                    </div>

                    <div class="pricing-features">

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            مكتب مخصص على SOWLFA
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            عرض عقارات المكتب
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            الظهور ضمن البحث داخل المنصة
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            رابط خاص بمكتبك
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            التواصل المباشر بعد المعاينة
                        </div>

                    </div>

                    <a
                        href="{{ url('/subscribe') }}"
                        class="pricing-action pricing-action-secondary"
                    >
                        ابدأ بالخطة الأساسية
                    </a>

                </article>


                {{-- Advanced --}}
                <article class="pricing-card featured">

                    <div class="pricing-badge">
                        الأكثر مرونة
                    </div>

                    <div class="pricing-name">
                        المتقدمة
                    </div>

                    <div class="pricing-subtitle">
                        مناسبة للمكاتب التي لديها فريق وسطاء.
                    </div>

                    <div class="pricing-price">
                        $49
                        <small>/ شهر</small>
                    </div>

                    <div class="pricing-separator"></div>

                    <div class="pricing-limit">
                        حتى 10 وسطاء
                    </div>

                    <div class="pricing-features">

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            مكتب مخصص على SOWLFA
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            عرض وإدارة عقارات المكتب
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            الظهور ضمن البحث داخل المنصة
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            رابط خاص بمكتبك
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            إضافة حتى 10 وسطاء
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            التواصل المباشر بعد المعاينة
                        </div>

                    </div>

                    <a
                        href="{{ url('/subscribe') }}"
                        class="pricing-action pricing-action-primary"
                    >
                        اختر الخطة المتقدمة
                    </a>

                </article>


                {{-- Gold --}}
                <article class="pricing-card pricing-card-gold">

                    <div class="pricing-name">
                        الذهبية
                    </div>

                    <div class="pricing-subtitle">
                        للمكاتب التي تحتاج إلى إدارة فريق أكبر.
                    </div>

                    <div class="pricing-price">
                        $99
                        <small>/ شهر</small>
                    </div>

                    <div class="pricing-separator"></div>

                    <div class="pricing-limit">
                        وسطاء غير محدودين
                    </div>

                    <div class="pricing-features">

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            مكتب مخصص على SOWLFA
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            عرض وإدارة عقارات المكتب
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            الظهور ضمن البحث داخل المنصة
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            رابط خاص بمكتبك
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            إضافة وسطاء غير محدودين
                        </div>

                        <div class="pricing-feature">
                            <span class="pricing-check">✓</span>
                            التواصل المباشر بعد المعاينة
                        </div>

                    </div>

                    <a
                        href="{{ url('/subscribe') }}"
                        class="pricing-action pricing-action-gold"
                    >
                        اختر الخطة الذهبية
                    </a>

                </article>

            </div>

        </div>

    </section>


    {{-- Benefits --}}
    <section class="pricing-section pricing-section-gray">

        <div class="pricing-container">

            <div class="pricing-section-heading">

                <div class="pricing-label">
                    مع اشتراكك
                </div>

                <h2>
                    ماذا تحصل مع SOWLFA؟
                </h2>

                <p>
                    كل اشتراك يمنح المكتب حضورًا وأدوات تساعده على الوصول إلى المهتمين.
                </p>

            </div>


            <div class="pricing-benefits">

                <div class="pricing-benefit">
                    <h3>
                        مكتب مخصص لك
                    </h3>

                    <p>
                        صفحة خاصة بمكتبك تعرض بياناته وعقاراته
                        بشكل منظم وسهل الوصول.
                    </p>
                </div>


                <div class="pricing-benefit">
                    <h3>
                        ظهور في محركات البحث
                    </h3>

                    <p>
                        صفحة مكتبك وعقاراتك مهيأة لتكون قابلة
                        للاكتشاف عبر محركات البحث.
                    </p>
                </div>


                <div class="pricing-benefit">
                    <h3>
                        تواصل مباشر مع المكاتب
                    </h3>

                    <p>
                        بعد معاينة العقار يمكنك التواصل مباشرة
                        مع المكتب صاحب العقار.
                    </p>
                </div>


                <div class="pricing-benefit">
                    <h3>
                        رابط مشاركة خاص بمكتبك
                    </h3>

                    <p>
                        رابط خاص بصفحة مكتبك يمكنك مشاركته
                        مع العملاء ونشره بسهولة.
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- Comparison --}}
    <section class="pricing-section">

        <div class="pricing-container">

            <div class="pricing-section-heading">

                <div class="pricing-label">
                    مقارنة سريعة
                </div>

                <h2>
                    الفرق بين الخطط
                </h2>

                <p>
                    مقارنة مختصرة تساعدك على اختيار الخطة المناسبة.
                </p>

            </div>


            <div class="pricing-compare">

                <div class="pricing-row header">

                    <div>
                        الميزة
                    </div>

                    <div>
                        الأساسية
                    </div>

                    <div>
                        المتقدمة
                    </div>

                    <div>
                        الذهبية
                    </div>

                </div>


                <div class="pricing-row">

                    <div>
                        سعر الاشتراك
                    </div>

                    <div class="pricing-value">
                        مجانًا
                    </div>

                    <div class="pricing-value">
                        $49 / شهر
                    </div>

                    <div class="pricing-value">
                        $99 / شهر
                    </div>

                </div>


                <div class="pricing-row">

                    <div>
                        عدد الوسطاء
                    </div>

                    <div class="pricing-value">
                        0
                    </div>

                    <div class="pricing-value">
                        10
                    </div>

                    <div class="pricing-value">
                        غير محدود
                    </div>

                </div>


                <div class="pricing-row">

                    <div>
                        مكتب مخصص
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                </div>


                <div class="pricing-row">

                    <div>
                        رابط مشاركة خاص
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                </div>


                <div class="pricing-row">

                    <div>
                        التواصل المباشر بعد المعاينة
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                    <div class="pricing-yes">
                        ✓
                    </div>

                </div>

            </div>


            <div class="pricing-note">

                <h3>
                    ملاحظة
                </h3>

                <p>
                    جميع الخطط الحالية شهرية. لا تتضمن SOWLFA عمليات بيع أو شراء العقارات
                    أو تحصيل المدفوعات أو إدارة العمولات داخل المنصة.
                </p>

            </div>

        </div>

    </section>


    {{-- CTA --}}
    <section class="pricing-cta">

        <div class="pricing-container">

            <div class="pricing-cta-card">

                <div class="pricing-cta-content">

                    <h2>
                        اختر خطتك وابدأ الآن
                    </h2>

                    <p>
                        أنشئ حضور مكتبك على SOWLFA وابدأ بعرض عقاراتك
                        والوصول إلى المهتمين والمكاتب.
                    </p>

                    <div class="pricing-actions">

                        <a
                            href="{{ url('/subscribe') }}"
                            class="pricing-cta-btn pricing-cta-white"
                        >
                            ابدأ الاشتراك
                        </a>

                        <a
                            href="{{ url('/how-it-works') }}"
                            class="pricing-cta-btn pricing-cta-outline"
                        >
                            كيف تعمل SOWLFA؟
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection