@extends('public.layouts.app')

@section(
'title',
'كيف تعمل SOWLFA؟ | منصة عقارية للمكاتب والوسطاء'
)

@section(
'meta_description',
'تعرف على طريقة عمل SOWLFA للمكاتب والوسطاء العقاريين، من الاشتراك وإضافة العقارات إلى البحث والمعاينة والتواصل المباشر.'
)

@section(
'og_title',
'كيف تعمل SOWLFA؟'
)

@section(
'og_description',
'تعرف على طريقة استخدام SOWLFA لعرض العقارات والبحث عنها ومعاينتها والتواصل مباشرة مع المكتب صاحب العقار.'
)

@section('content')

<div class="how-page" dir="rtl">

<style>
    .how-page {
        --how-primary: #2563eb;
        --how-primary-dark: #1d4ed8;
        --how-navy: #0f172a;
        --how-text: #334155;
        --how-muted: #64748b;
        --how-border: #e2e8f0;
        --how-bg: #f8fafc;
        --how-card: #ffffff;
        background: #fff;
        color: var(--how-navy);
        overflow: hidden;
    }

    .how-page *,
    .how-page *::before,
    .how-page *::after {
        box-sizing: border-box;
    }

    .how-container {
        width: min(1160px, calc(100% - 32px));
        margin: 0 auto;
    }

    /* Hero */
    .how-hero {
        position: relative;
        padding: 90px 0 85px;
        background:
            radial-gradient(circle at 85% 15%, rgba(37, 99, 235, 0.12), transparent 28%),
            radial-gradient(circle at 15% 60%, rgba(245, 158, 11, 0.08), transparent 22%),
            linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    }

    .how-hero::before {
        content: "";
        position: absolute;
        width: 360px;
        height: 360px;
        border-radius: 50%;
        border: 1px solid rgba(37, 99, 235, 0.08);
        top: -150px;
        right: -100px;
    }

    .how-hero-grid {
        position: relative;
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 60px;
        align-items: center;
    }

    .how-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border: 1px solid #dbeafe;
        border-radius: 999px;
        background: #eff6ff;
        color: var(--how-primary-dark);
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .how-eyebrow-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--how-primary);
    }

    .how-hero h1 {
        margin: 0;
        font-size: clamp(38px, 5vw, 62px);
        line-height: 1.08;
        letter-spacing: -1.5px;
        font-weight: 900;
    }

    .how-hero h1 span {
        color: var(--how-primary);
    }

    .how-hero-text {
        max-width: 680px;
        margin: 22px 0 0;
        color: var(--how-muted);
        font-size: 18px;
        line-height: 1.95;
    }

    .how-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 30px;
    }

    .how-btn {
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

    .how-btn-primary {
        background: var(--how-primary);
        color: #fff;
        box-shadow: 0 12px 28px rgba(37, 99, 235, 0.22);
    }

    .how-btn-primary:hover {
        background: var(--how-primary-dark);
        transform: translateY(-2px);
    }

    .how-btn-secondary {
        background: #fff;
        color: var(--how-navy);
        border: 1px solid var(--how-border);
    }

    .how-btn-secondary:hover {
        border-color: #cbd5e1;
        transform: translateY(-2px);
    }

    .how-hero-visual {
        position: relative;
    }

    .how-hero-card {
        position: relative;
        background: var(--how-navy);
        color: #fff;
        border-radius: 28px;
        padding: 30px;
        box-shadow: 0 28px 70px rgba(15, 23, 42, 0.18);
        overflow: hidden;
    }

    .how-hero-card::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        top: -90px;
        left: -80px;
        background: rgba(37, 99, 235, 0.25);
    }

    .how-hero-card-content {
        position: relative;
        z-index: 1;
    }

    .how-brand {
        font-size: 28px;
        font-weight: 900;
        letter-spacing: 2px;
        margin-bottom: 30px;
    }

    .how-hero-card h2 {
        margin: 0;
        font-size: 24px;
        line-height: 1.5;
    }

    .how-hero-card p {
        margin: 12px 0 24px;
        color: #cbd5e1;
        line-height: 1.85;
    }

    .how-flow {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .how-flow-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 14px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 14px;
    }

    .how-flow-number {
        width: 30px;
        height: 30px;
        flex: 0 0 30px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        background: var(--how-primary);
        font-size: 13px;
        font-weight: 900;
    }

    .how-flow-item span:last-child {
        color: #e2e8f0;
        font-size: 14px;
    }

    /* Generic sections */
    .how-section {
        padding: 85px 0;
    }

    .how-section-gray {
        background: var(--how-bg);
    }

    .how-section-head {
        max-width: 720px;
        text-align: center;
        margin: 0 auto 48px;
    }

    .how-section-label {
        display: inline-block;
        color: var(--how-primary);
        font-size: 13px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    .how-section-head h2 {
        margin: 0 0 12px;
        font-size: clamp(30px, 4vw, 43px);
        line-height: 1.2;
        font-weight: 900;
        letter-spacing: -0.8px;
    }

    .how-section-head p {
        margin: 0;
        color: var(--how-muted);
        line-height: 1.9;
        font-size: 16px;
    }

    /* Steps */
    .how-steps {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .how-step {
        position: relative;
        background: #fff;
        border: 1px solid var(--how-border);
        border-radius: 20px;
        padding: 25px;
        min-height: 220px;
        transition: 0.2s ease;
    }

    .how-step:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
    }

    .how-step-number {
        width: 44px;
        height: 44px;
        display: grid;
        place-items: center;
        border-radius: 14px;
        background: #eff6ff;
        color: var(--how-primary);
        font-weight: 900;
        margin-bottom: 20px;
    }

    .how-step h3 {
        margin: 0 0 9px;
        font-size: 18px;
    }

    .how-step p {
        margin: 0;
        color: var(--how-muted);
        font-size: 14px;
        line-height: 1.85;
    }

    /* Benefits */
    .how-benefits {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .how-benefit {
        display: flex;
        gap: 18px;
        padding: 25px;
        background: #fff;
        border: 1px solid var(--how-border);
        border-radius: 20px;
        transition: 0.2s ease;
    }

    .how-benefit:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.07);
    }

    .how-benefit-icon {
        width: 52px;
        height: 52px;
        flex: 0 0 52px;
        display: grid;
        place-items: center;
        border-radius: 16px;
        background: #eff6ff;
        color: var(--how-primary);
    }

    .how-benefit h3 {
        margin: 0 0 8px;
        font-size: 18px;
    }

    .how-benefit p {
        margin: 0;
        color: var(--how-muted);
        font-size: 14px;
        line-height: 1.8;
    }

    /* Direct contact */
    .how-contact-box {
        display: grid;
        grid-template-columns: 0.95fr 1.05fr;
        gap: 45px;
        align-items: center;
        padding: 42px;
        border-radius: 28px;
        background:
            linear-gradient(135deg, #eff6ff 0%, #ffffff 60%);
        border: 1px solid #dbeafe;
    }

    .how-contact-box h2 {
        margin: 0 0 12px;
        font-size: 31px;
        font-weight: 900;
    }

    .how-contact-box p {
        margin: 0;
        color: var(--how-muted);
        line-height: 1.9;
    }

    .how-contact-points {
        display: grid;
        gap: 12px;
    }

    .how-contact-point {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 17px;
        background: #fff;
        border: 1px solid var(--how-border);
        border-radius: 14px;
        font-weight: 700;
        font-size: 14px;
    }

    .how-check {
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

    /* What does not happen */
    .how-not {
        max-width: 850px;
        margin: 0 auto;
        padding: 34px;
        border: 1px solid var(--how-border);
        border-radius: 22px;
        background: #fff;
    }

    .how-not h2 {
        margin: 0 0 16px;
        font-size: 25px;
        font-weight: 900;
    }

    .how-not p {
        margin: 0 0 12px;
        color: var(--how-muted);
        line-height: 1.9;
    }

    .how-not p:last-child {
        margin-bottom: 0;
    }

    /* CTA */
    .how-cta {
        padding: 85px 0;
    }

    .how-cta-card {
        position: relative;
        overflow: hidden;
        padding: 55px 35px;
        border-radius: 30px;
        background: var(--how-navy);
        color: #fff;
        text-align: center;
        box-shadow: 0 25px 60px rgba(15, 23, 42, 0.16);
    }

    .how-cta-card::before,
    .how-cta-card::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }

    .how-cta-card::before {
        width: 240px;
        height: 240px;
        background: rgba(37, 99, 235, 0.22);
        top: -120px;
        right: -70px;
    }

    .how-cta-card::after {
        width: 180px;
        height: 180px;
        background: rgba(255, 255, 255, 0.04);
        bottom: -90px;
        left: -40px;
    }

    .how-cta-content {
        position: relative;
        z-index: 1;
    }

    .how-cta-card h2 {
        margin: 0 0 12px;
        font-size: clamp(30px, 4vw, 43px);
        font-weight: 900;
    }

    .how-cta-card p {
        max-width: 680px;
        margin: 0 auto;
        color: #cbd5e1;
        line-height: 1.9;
    }

    .how-cta-actions {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 26px;
    }

    .how-cta-white {
        background: #fff;
        color: var(--how-navy);
    }

    .how-cta-outline {
        border: 1px solid rgba(255,255,255,0.18);
        color: #fff;
        background: rgba(255,255,255,0.06);
    }

    /* Mobile */
    @media (max-width: 1050px) {
        .how-hero-grid {
            grid-template-columns: 1fr;
        }

        .how-hero-visual {
            max-width: 680px;
        }

        .how-steps {
            grid-template-columns: repeat(2, 1fr);
        }

        .how-contact-box {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .how-hero {
            padding: 60px 0 55px;
        }

        .how-section,
        .how-cta {
            padding: 60px 0;
        }

        .how-steps,
        .how-benefits {
            grid-template-columns: 1fr;
        }

        .how-hero h1 {
            font-size: 40px;
        }

        .how-hero-text {
            font-size: 16px;
        }

        .how-hero-card,
        .how-contact-box,
        .how-cta-card {
            padding: 26px;
        }

        .how-not {
            padding: 25px;
        }

        .how-btn {
            width: 100%;
        }
    }
</style>

{{-- Hero --}}
<section class="how-hero">
    <div class="how-container">
        <div class="how-hero-grid">

            <div>
                <div class="how-eyebrow">
                    <span class="how-eyebrow-dot"></span>
                    منصة عقارية للمكاتب والوسطاء
                </div>

                <h1>
                    اكتشف العقارات
                    <span>وتواصل مباشرة</span>
                </h1>

                <p class="how-hero-text">
                    SOWLFA تجمع المكاتب والوسطاء والعقارات في مكان واحد،
                    لتسهّل عليك عرض عقاراتك، البحث عن العقار المناسب،
                    ثم التواصل مباشرة مع المكتب صاحب العقار بعد المعاينة.
                </p>

                <div class="how-hero-actions">
                    <a href="{{ url('/subscribe') }}" class="how-btn how-btn-primary">
                        ابدأ الآن
                    </a>

                    <a href="{{ url('/pricing') }}" class="how-btn how-btn-secondary">
                        تعرف على الخطط
                    </a>
                </div>
            </div>

            <div class="how-hero-visual">

                <div class="how-hero-card">
                    <div class="how-hero-card-content">

                        <div class="how-brand">
                            SOWLFA
                        </div>

                        <h2>
                            طريقة عمل واضحة
                        </h2>

                        <p>
                            من الاشتراك إلى عرض العقار،
                            ثم البحث والمعاينة والتواصل المباشر.
                        </p>

                        <div class="how-flow">

                            <div class="how-flow-item">
                                <span class="how-flow-number">1</span>
                                <span>أنشئ حساب مكتبك</span>
                            </div>

                            <div class="how-flow-item">
                                <span class="how-flow-number">2</span>
                                <span>أضف الوسطاء والعقارات</span>
                            </div>

                            <div class="how-flow-item">
                                <span class="how-flow-number">3</span>
                                <span>ابحث وشاهد العقارات</span>
                            </div>

                            <div class="how-flow-item">
                                <span class="how-flow-number">4</span>
                                <span>عاين العقار وتواصل مباشرة</span>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


{{-- Steps --}}
<section class="how-section">
    <div class="how-container">

        <div class="how-section-head">
            <div class="how-section-label">
                كيف تبدأ؟
            </div>

            <h2>
                أربع خطوات للبدء
            </h2>

            <p>
                تجربة واضحة ومباشرة من إنشاء الحساب
                حتى الوصول إلى المكتب صاحب العقار.
            </p>
        </div>

        <div class="how-steps">

            <div class="how-step">
                <div class="how-step-number">01</div>

                <h3>الاشتراك</h3>

                <p>
                    اختر الخطة المناسبة لمكتبك وابدأ طلب الاشتراك.
                </p>
            </div>

            <div class="how-step">
                <div class="how-step-number">02</div>

                <h3>تفعيل الحساب</h3>

                <p>
                    يصلك بريد إلكتروني آمن لإكمال التفعيل
                    وإنشاء كلمة المرور الخاصة بك.
                </p>
            </div>

            <div class="how-step">
                <div class="how-step-number">03</div>

                <h3>أضف عقاراتك</h3>

                <p>
                    أضف عقارات مكتبك وبياناتها لتظهر
                    للمكاتب والوسطاء الباحثين.
                </p>
            </div>

            <div class="how-step">
                <div class="how-step-number">04</div>

                <h3>بحث ومعاينة وتواصل</h3>

                <p>
                    ابحث عن العقار المناسب، عاينه،
                    ثم تواصل مباشرة مع المكتب صاحب العقار.
                </p>
            </div>

        </div>

    </div>
</section>


{{-- Subscription Benefits --}}
<section class="how-section how-section-gray">
    <div class="how-container">

        <div class="how-section-head">
            <div class="how-section-label">
                مع اشتراكك
            </div>

            <h2>
                ماذا تحصل مع اشتراكك؟
            </h2>

            <p>
                حضور خاص لمكتبك على SOWLFA،
                وأدوات تساعدك على عرض عقاراتك والوصول إلى المهتمين.
            </p>
        </div>

        <div class="how-benefits">

            <div class="how-benefit">
                <div class="how-benefit-icon">
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
                        بشكل مرتب واحترافي.
                    </p>
                </div>
            </div>


            <div class="how-benefit">
                <div class="how-benefit-icon">
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
                    <h3>تهيئة للظهور في محركات البحث</h3>

                    <p>
                        صفحة مكتبك وعقاراته مهيأة لتكون قابلة
                        للاكتشاف عبر محركات البحث.
                    </p>
                </div>
            </div>


            <div class="how-benefit">
                <div class="how-benefit-icon">
                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                        <path d="M21 11.5C21 16.19 17 20 12 20C10.58 20 9.24 19.69 8.05 19.13L3 21L4.87 16.8C4.32 15.61 4 14.28 4 12.9C4 8.21 8 4.4 13 4.4C17.42 4.4 21 7.55 21 11.5Z"
                              stroke="currentColor"
                              stroke-width="1.8"
                              stroke-linejoin="round"/>
                    </svg>
                </div>

                <div>
                    <h3>تواصل مباشر مع المكاتب</h3>

                    <p>
                        بعد معاينة العقار، يمكنك التواصل مباشرة
                        مع المكتب صاحب العقار لمتابعة التفاصيل.
                    </p>
                </div>
            </div>


            <div class="how-benefit">
                <div class="how-benefit-icon">
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
                    <h3>رابط مشاركة خاص بمكتبك</h3>

                    <p>
                        رابط خاص بصفحة مكتبك يمكنك مشاركته مع العملاء
                        ونشره عبر قنوات التواصل المختلفة.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- Direct Contact --}}
<section class="how-section">
    <div class="how-container">

        <div class="how-contact-box">

            <div>
                <div class="how-section-label">
                    تواصل مباشر
                </div>

                <h2>
                    لا توجد طلبات تعاون معقدة
                </h2>

                <p>
                    SOWLFA تساعدك على الوصول إلى العقار والمكتب المناسب،
                    وبعد المعاينة يكون التواصل مباشرة بين الأطراف.
                </p>
            </div>

            <div class="how-contact-points">

                <div class="how-contact-point">
                    <span class="how-check">✓</span>
                    ابحث عن العقار المناسب
                </div>

                <div class="how-contact-point">
                    <span class="how-check">✓</span>
                    اطلع على تفاصيل العقار
                </div>

                <div class="how-contact-point">
                    <span class="how-check">✓</span>
                    قم بالمعاينة
                </div>

                <div class="how-contact-point">
                    <span class="how-check">✓</span>
                    تواصل مباشرة مع المكتب
                </div>

            </div>

        </div>

    </div>
</section>


{{-- What does not happen --}}
<section class="how-section how-section-gray">
    <div class="how-container">

        <div class="how-not">

            <div class="how-section-label">
                للتوضيح
            </div>

            <h2>
                ما الذي لا يتم داخل SOWLFA؟
            </h2>

            <p>
                SOWLFA منصة لعرض العقارات واكتشافها
                والوصول إلى المكاتب والوسطاء والتواصل المباشر بينهم.
            </p>

            <p>
                لا تتم عمليات بيع أو شراء العقارات،
                ولا يتم تحصيل قيمة العقار أو إدارة العمولات داخل المنصة.
            </p>

            <p>
                بعد المعاينة، تستمر المفاوضات والاتفاقات
                والتعاملات بين الأطراف بشكل مباشر خارج SOWLFA.
            </p>

        </div>

    </div>
</section>


{{-- CTA --}}
<section class="how-cta">
    <div class="how-container">

        <div class="how-cta-card">

            <div class="how-cta-content">

                <h2>
                    ابدأ بعرض مكتبك وعقاراتك
                </h2>

                <p>
                    أنشئ حساب مكتبك، أضف عقاراتك،
                    وابدأ بالوصول إلى المكاتب والمهتمين عبر SOWLFA.
                </p>

                <div class="how-cta-actions">

                    <a
                        href="{{ url('/subscribe') }}"
                        class="how-btn how-cta-white"
                    >
                        ابدأ الآن
                    </a>

                    <a
                        href="{{ url('/pricing') }}"
                        class="how-btn how-cta-outline"
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
