@extends('public.layouts.app')

@section('title', 'SOWLFA | منصة التعاون العقاري للمكاتب والوسطاء')

@section(
    'meta_description',
    'SOWLFA منصة عقارية للمكاتب والوسطاء تساعد على إدارة العقارات، تنظيم الوسطاء، وتسهيل التعاون بين المكاتب من خلال نظام واحد.'
)

@section('content')
<div dir="rtl">

    <style>
        .home-page {
            background:
                radial-gradient(circle at 90% 10%, rgba(37, 99, 235, 0.08), transparent 30%),
                radial-gradient(circle at 10% 35%, rgba(234, 179, 8, 0.08), transparent 28%),
                #f8fafc;
            color: #0f172a;
        }

        .home-container {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .hero-section {
            padding: 90px 0 70px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 45px;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #dbeafe;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-title {
            margin: 0;
            font-size: clamp(38px, 5vw, 64px);
            line-height: 1.05;
            font-weight: 900;
            letter-spacing: -1.5px;
        }

        .hero-title span {
            color: #2563eb;
        }

        .hero-text {
            margin: 22px 0 0;
            font-size: 19px;
            line-height: 1.9;
            color: #475569;
            max-width: 680px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .hero-primary,
        .hero-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 22px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .hero-primary {
            background: #2563eb;
            color: #fff;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.20);
        }

        .hero-primary:hover {
            transform: translateY(-2px);
            background: #1d4ed8;
        }

        .hero-secondary {
            background: #fff;
            color: #0f172a;
            border: 1px solid #e2e8f0;
        }

        .hero-secondary:hover {
            transform: translateY(-2px);
            border-color: #cbd5e1;
        }

        .hero-card {
            background: #0f172a;
            border-radius: 28px;
            padding: 28px;
            color: #fff;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.18);
            position: relative;
            overflow: hidden;
        }

        .hero-card::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.28);
            top: -100px;
            left: -80px;
        }

        .hero-card-content {
            position: relative;
            z-index: 1;
        }

        .hero-card-logo {
            font-size: 30px;
            font-weight: 900;
            letter-spacing: 2px;
            margin-bottom: 25px;
        }

        .hero-card-title {
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .hero-card-text {
            color: #cbd5e1;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .hero-mini-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .hero-mini-item {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 16px;
        }

        .hero-mini-item strong {
            display: block;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .hero-mini-item span {
            color: #cbd5e1;
            font-size: 13px;
        }

        .section {
            padding: 75px 0;
        }

        .section-heading {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 42px;
        }

        .section-heading h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 900;
        }

        .section-heading p {
            margin: 0;
            color: #64748b;
            line-height: 1.8;
            font-size: 17px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .feature-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
            transition: 0.2s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: #eff6ff;
            color: #2563eb;
            margin-bottom: 18px;
        }

        .feature-card h3 {
            margin: 0 0 10px;
            font-size: 19px;
        }

        .feature-card p {
            margin: 0;
            color: #64748b;
            line-height: 1.75;
            font-size: 15px;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .step-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 28px;
            position: relative;
        }

        .step-number {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #2563eb;
            color: #fff;
            font-weight: 900;
            margin-bottom: 18px;
        }

        .step-card h3 {
            margin: 0 0 10px;
            font-size: 19px;
        }

        .step-card p {
            margin: 0;
            color: #64748b;
            line-height: 1.8;
        }

        .pricing-section {
            background: #fff;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .plan-card {
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 28px;
            background: #fff;
            position: relative;
        }

        .plan-card.featured {
            border: 2px solid #2563eb;
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.12);
            transform: translateY(-5px);
        }

        .plan-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            background: #2563eb;
            color: #fff;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .plan-name {
            font-size: 22px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .plan-price {
            font-size: 36px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .plan-price small {
            font-size: 14px;
            color: #64748b;
            font-weight: 600;
        }

        .plan-limit {
            color: #64748b;
            min-height: 28px;
            margin-bottom: 22px;
        }

        .plan-link {
            display: inline-flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            min-height: 46px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 800;
            border: 1px solid #dbeafe;
            color: #1d4ed8;
            background: #eff6ff;
        }

        .cta-section {
            padding: 80px 0 90px;
        }

        .cta-card {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #fff;
            border-radius: 28px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.16);
        }

        .cta-card h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 44px);
            font-weight: 900;
        }

        .cta-card p {
            color: #cbd5e1;
            max-width: 680px;
            margin: 0 auto;
            line-height: 1.8;
            font-size: 17px;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 25px;
            min-height: 50px;
            padding: 0 24px;
            border-radius: 12px;
            background: #fff;
            color: #0f172a;
            text-decoration: none;
            font-weight: 900;
        }

        @media (max-width: 980px) {
            .hero-grid,
            .features-grid,
            .pricing-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-grid {
                align-items: stretch;
            }

            .steps-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 680px) {
            .hero-section {
                padding: 55px 0 45px;
            }

            .section,
            .cta-section {
                padding: 55px 0;
            }

            .hero-grid,
            .features-grid,
            .pricing-grid {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 40px;
            }

            .hero-text {
                font-size: 17px;
            }

            .hero-card,
            .cta-card {
                padding: 25px;
            }

            .plan-card.featured {
                transform: none;
            }
        }
    </style>

    <main class="home-page">

        {{-- Hero --}}
        <section class="hero-section">
            <div class="home-container">
                <div class="hero-grid">

                    <div>
                        <div class="hero-badge">
                            منصة عقارية للمكاتب والوسطاء
                        </div>

                        <h1 class="hero-title">
                           إدارة أسهل
                            <span>تعاون أفضل</span>
                        </h1>

                        <p class="hero-text">
                            SOWLFA تساعد المكاتب والوسطاء العقاريين على تنظيم أعمالهم،
                            إدارة العقارات، ومتابعة الفريق من خلال منصة واحدة واضحة وسهلة الاستخدام.
                        </p>

                        <div class="hero-actions">
                            <a href="{{ url('/subscribe') }}" class="hero-primary">
                                ابدأ الآن
                            </a>

                            <a href="{{ route('login') }}" class="hero-secondary">
                                تسجيل الدخول
                            </a>
                        </div>
                    </div>

                    <div class="hero-card">
                        <div class="hero-card-content">

                            <div class="hero-card-logo">
                                SOWLFA
                            </div>

                            <div class="hero-card-title">
                                كل ما يحتاجه مكتبك في مكان واحد
                            </div>

                            <div class="hero-card-text">
                                منصة مصممة للمكاتب العقارية والوسطاء لتنظيم البيانات
                                وتسهيل العمل اليومي بدون تعقيد.
                            </div>

                            <div class="hero-mini-grid">

                                <div class="hero-mini-item">
                                    <strong>العقارات</strong>
                                    <span>إدارة وتنظيم العقارات</span>
                                </div>

                                <div class="hero-mini-item">
                                    <strong>الوسطاء</strong>
                                    <span>تنظيم فريق المكتب</span>
                                </div>

                                <div class="hero-mini-item">
                                    <strong>المكتب</strong>
                                    <span>إدارة بيانات المكتب</span>
                                </div>

                                <div class="hero-mini-item">
                                    <strong>التعاون</strong>
                                    <span>منصة موحدة للمكاتب</span>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Features --}}
        <section class="section">
            <div class="home-container">

                <div class="section-heading">
                    <h2>لماذا SOWLFA؟</h2>

                    <p>
                        أدوات واضحة تساعد مكتبك على إدارة العمل العقاري بطريقة منظمة
                        وتقلل الحاجة إلى التعامل مع عدة أنظمة منفصلة.
                    </p>
                </div>

                <div class="features-grid">

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M3 21V9L12 3L21 9V21H3Z" stroke="currentColor" stroke-width="1.8"/>
                                <path d="M8 21V13H16V21" stroke="currentColor" stroke-width="1.8"/>
                            </svg>
                        </div>

                        <h3>إدارة العقارات</h3>

                        <p>
                            نظم عقارات مكتبك واعرض البيانات المهمة بطريقة سهلة وواضحة.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M16 21V19C16 16.79 14.21 15 12 15H7C4.79 15 3 16.79 3 19V21"
                                      stroke="currentColor" stroke-width="1.8"/>
                                <circle cx="9.5" cy="7" r="4"
                                        stroke="currentColor" stroke-width="1.8"/>
                                <path d="M17 8L19 10L22 7"
                                      stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </div>

                        <h3>إدارة الوسطاء</h3>

                        <p>
                            أدر الوسطاء التابعين لمكتبك وفق الصلاحيات والحدود الخاصة باشتراكك.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M4 4H20V20H4V4Z"
                                      stroke="currentColor" stroke-width="1.8"/>
                                <path d="M8 9H16M8 13H16M8 17H13"
                                      stroke="currentColor" stroke-width="1.8"
                                      stroke-linecap="round"/>
                            </svg>
                        </div>

                        <h3>بيانات منظمة</h3>

                        <p>
                            اجعل معلومات مكتبك وعقاراتك ووسطائك في مكان واحد بدلًا من تشتيتها.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 3L20 7V12C20 17 16.5 20 12 21C7.5 20 4 17 4 12V7L12 3Z"
                                      stroke="currentColor" stroke-width="1.8"/>
                                <path d="M9 12L11 14L15 10"
                                      stroke="currentColor" stroke-width="1.8"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <h3>حساب آمن</h3>

                        <p>
                            تفعيل الحساب عبر البريد الإلكتروني وتسجيل دخول مخصص لكل مستخدم.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        {{-- How it works --}}
        <section class="section" style="background: #f1f5f9;">
            <div class="home-container">

                <div class="section-heading">
                    <h2>ابدأ بسهولة</h2>

                    <p>
                        خطوات بسيطة للبدء باستخدام SOWLFA وإدارة مكتبك.
                    </p>
                </div>

                <div class="steps-grid">

                    <div class="step-card">
                        <div class="step-number">1</div>

                        <h3>اختر الخطة</h3>

                        <p>
                            تعرف على الخطط واختر الخطة المناسبة لاحتياجات مكتبك.
                        </p>
                    </div>

                    <div class="step-card">
                        <div class="step-number">2</div>

                        <h3>فعّل حسابك</h3>

                        <p>
                            بعد إنشاء حسابك يصلك بريد إلكتروني آمن لإكمال التفعيل وإنشاء كلمة المرور.
                        </p>
                    </div>

                    <div class="step-card">
                        <div class="step-number">3</div>

                        <h3>ابدأ العمل</h3>

                        <p>
                            سجّل الدخول وابدأ بإدارة العقارات والوسطاء من لوحة التحكم.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        {{-- Pricing --}}
        <section class="section pricing-section">
            <div class="home-container">

                <div class="section-heading">
                    <h2>خطط واضحة وبسيطة</h2>

                    <p>
                        اختر الخطة المناسبة لمكتبك وابدأ باستخدام المنصة.
                    </p>
                </div>

                <div class="pricing-grid">

                    <div class="plan-card">
                        <div class="plan-name">الأساسية</div>

                        <div class="plan-price">
                            مجانًا
                        </div>

                        <div class="plan-limit">
                            بدون وسطاء
                        </div>

                        <a href="{{ url('/subscribe') }}" class="plan-link">
                            ابدأ بالخطة الأساسية
                        </a>
                    </div>

                    <div class="plan-card featured">

                        <div class="plan-badge">
                            الأكثر مرونة
                        </div>

                        <div class="plan-name">المتقدمة</div>

                        <div class="plan-price">
                            $49
                            <small>/ شهر</small>
                        </div>

                        <div class="plan-limit">
                            حتى 10 وسطاء
                        </div>

                        <a href="{{ url('/subscribe') }}" class="plan-link">
                            اختر المتقدمة
                        </a>
                    </div>

                    <div class="plan-card">
                        <div class="plan-name">الذهبية</div>

                        <div class="plan-price">
                            $99
                            <small>/ شهر</small>
                        </div>

                        <div class="plan-limit">
                            وسطاء غير محدودين
                        </div>

                        <a href="{{ url('/subscribe') }}" class="plan-link">
                            اختر الذهبية
                        </a>
                    </div>

                </div>

            </div>
        </section>

        {{-- Final CTA --}}
        <section class="cta-section">
            <div class="home-container">

                <div class="cta-card">

                    <h2>
                        جاهز للبدء؟
                    </h2>

                    <p>
                        أنشئ طلب اشتراكك وابدأ باستخدام SOWLFA لإدارة مكتبك العقاري
                        وتنظيم أعمالك من مكان واحد.
                    </p>

                    <a href="{{ url('/subscribe') }}" class="cta-button">
                        ابدأ مع SOWLFA
                    </a>

                </div>

            </div>
        </section>

    </main>

</div>

@endsection