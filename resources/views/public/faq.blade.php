@extends('public.layouts.app')

@section(
    'title',
    'الأسئلة الشائعة | SOWLFA'
)

@section(
    'meta_description',
    'إجابات عن الأسئلة الشائعة حول SOWLFA والاشتراك والمكاتب والعقارات والوسطاء والتواصل المباشر بعد المعاينة.'
)

@section(
    'og_title',
    'الأسئلة الشائعة | SOWLFA'
)

@section(
    'og_description',
    'تعرف على SOWLFA وخطط الاشتراك وطريقة إدارة المكتب والعقارات والوسطاء والتواصل المباشر.'
)

@section('content')

<div class="faq-page" dir="rtl">

    <style>
        .faq-page {
            --faq-primary: #2563eb;
            --faq-primary-dark: #1d4ed8;
            --faq-navy: #0f172a;
            --faq-text: #334155;
            --faq-muted: #64748b;
            --faq-border: #e2e8f0;
            --faq-bg: #f8fafc;
            background: #fff;
            color: var(--faq-navy);
            overflow: hidden;
        }

        .faq-page *,
        .faq-page *::before,
        .faq-page *::after {
            box-sizing: border-box;
        }

        .faq-container {
            width: min(1080px, calc(100% - 32px));
            margin: 0 auto;
        }

        /* Hero */
        .faq-hero {
            position: relative;
            padding: 90px 0 80px;
            background:
                radial-gradient(circle at 85% 15%, rgba(37, 99, 235, 0.12), transparent 28%),
                radial-gradient(circle at 15% 75%, rgba(245, 158, 11, 0.08), transparent 23%),
                linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        }

        .faq-hero::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            border: 1px solid rgba(37, 99, 235, 0.08);
            top: -160px;
            right: -110px;
        }

        .faq-hero-content {
            position: relative;
            max-width: 780px;
            margin: 0 auto;
            text-align: center;
        }

        .faq-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border: 1px solid #dbeafe;
            border-radius: 999px;
            background: #eff6ff;
            color: var(--faq-primary-dark);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .faq-eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--faq-primary);
        }

        .faq-hero h1 {
            margin: 0;
            font-size: clamp(40px, 5vw, 58px);
            line-height: 1.1;
            font-weight: 900;
            letter-spacing: -1.3px;
        }

        .faq-hero h1 span {
            color: var(--faq-primary);
        }

        .faq-hero p {
            max-width: 720px;
            margin: 22px auto 0;
            color: var(--faq-muted);
            font-size: 18px;
            line-height: 1.95;
        }

        /* FAQ sections */
        .faq-section {
            padding: 80px 0;
        }

        .faq-section-gray {
            background: var(--faq-bg);
        }

        .faq-heading {
            max-width: 720px;
            margin: 0 auto 40px;
            text-align: center;
        }

        .faq-label {
            display: inline-block;
            color: var(--faq-primary);
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .faq-heading h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.2;
            font-weight: 900;
        }

        .faq-heading p {
            margin: 0;
            color: var(--faq-muted);
            line-height: 1.9;
        }

        .faq-list {
            max-width: 880px;
            margin: 0 auto;
            display: grid;
            gap: 12px;
        }

        .faq-item {
            background: #fff;
            border: 1px solid var(--faq-border);
            border-radius: 18px;
            overflow: hidden;
            transition: 0.2s ease;
        }

        .faq-item:hover {
            border-color: #cbd5e1;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.05);
        }

        .faq-item summary {
            list-style: none;
            position: relative;
            cursor: pointer;
            padding: 20px 55px 20px 22px;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.6;
        }

        .faq-item summary::-webkit-details-marker {
            display: none;
        }

        .faq-item summary::before {
            content: "+";
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #eff6ff;
            color: var(--faq-primary);
            font-size: 19px;
            font-weight: 500;
            line-height: 1;
        }

        .faq-item[open] {
            border-color: #bfdbfe;
            box-shadow: 0 14px 35px rgba(37, 99, 235, 0.07);
        }

        .faq-item[open] summary {
            color: var(--faq-primary-dark);
        }

        .faq-item[open] summary::before {
            content: "−";
        }

        .faq-answer {
            padding: 0 22px 22px;
        }

        .faq-answer p {
            margin: 0;
            color: var(--faq-muted);
            font-size: 14px;
            line-height: 1.95;
        }

        .faq-answer p + p {
            margin-top: 10px;
        }

        .faq-answer a {
            color: var(--faq-primary-dark);
            font-weight: 800;
            text-decoration: none;
        }

        .faq-answer a:hover {
            text-decoration: underline;
        }

        /* Pricing cards */
        .faq-plans {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            max-width: 950px;
            margin: 0 auto;
        }

        .faq-plan {
            background: #fff;
            border: 1px solid var(--faq-border);
            border-radius: 22px;
            padding: 26px;
        }

        .faq-plan.featured {
            border: 2px solid var(--faq-primary);
            box-shadow: 0 18px 40px rgba(37, 99, 235, 0.10);
        }

        .faq-plan-name {
            font-size: 20px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .faq-plan-price {
            font-size: 32px;
            font-weight: 900;
            margin-bottom: 7px;
        }

        .faq-plan-price small {
            font-size: 13px;
            color: var(--faq-muted);
            font-weight: 700;
        }

        .faq-plan-desc {
            color: var(--faq-muted);
            font-size: 14px;
            line-height: 1.8;
        }

        /* Direct contact box */
        .faq-info {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 26px;
            background: linear-gradient(135deg, #eff6ff 0%, #ffffff 65%);
            border: 1px solid #dbeafe;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 40px;
            align-items: center;
        }

        .faq-info h2 {
            margin: 0 0 12px;
            font-size: 29px;
            font-weight: 900;
        }

        .faq-info > div:first-child p {
            margin: 0;
            color: var(--faq-muted);
            line-height: 1.9;
        }

        .faq-points {
            display: grid;
            gap: 11px;
        }

        .faq-point {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 14px 16px;
            border: 1px solid var(--faq-border);
            border-radius: 14px;
            background: #fff;
            color: var(--faq-text);
            font-size: 14px;
            font-weight: 700;
        }

        .faq-check {
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
        .faq-cta {
            padding: 85px 0;
        }

        .faq-cta-card {
            position: relative;
            overflow: hidden;
            padding: 55px 35px;
            border-radius: 30px;
            background: var(--faq-navy);
            color: #fff;
            text-align: center;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.16);
        }

        .faq-cta-card::before,
        .faq-cta-card::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .faq-cta-card::before {
            width: 240px;
            height: 240px;
            top: -120px;
            right: -70px;
            background: rgba(37, 99, 235, 0.22);
        }

        .faq-cta-card::after {
            width: 180px;
            height: 180px;
            bottom: -90px;
            left: -40px;
            background: rgba(255,255,255,0.04);
        }

        .faq-cta-content {
            position: relative;
            z-index: 1;
        }

        .faq-cta-card h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 900;
        }

        .faq-cta-card p {
            max-width: 670px;
            margin: 0 auto;
            color: #cbd5e1;
            line-height: 1.9;
        }

        .faq-actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .faq-btn {
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

        .faq-btn-white {
            background: #fff;
            color: var(--faq-navy);
        }

        .faq-btn-outline {
            color: #fff;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.18);
        }

        .faq-btn:hover {
            transform: translateY(-2px);
        }

        /* Mobile */
        @media (max-width: 900px) {
            .faq-plans {
                grid-template-columns: 1fr;
                max-width: 600px;
            }

            .faq-info {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .faq-hero {
                padding: 60px 0 55px;
            }

            .faq-section,
            .faq-cta {
                padding: 60px 0;
            }

            .faq-hero h1 {
                font-size: 40px;
            }

            .faq-hero p {
                font-size: 16px;
            }

            .faq-info,
            .faq-cta-card {
                padding: 26px;
            }

            .faq-btn {
                width: 100%;
            }

            .faq-item summary {
                padding-right: 52px;
            }
        }
    </style>


    {{-- Hero --}}
    <section class="faq-hero">

        <div class="faq-container">

            <div class="faq-hero-content">

                <div class="faq-eyebrow">
                    <span class="faq-eyebrow-dot"></span>
                    أسئلة وأجوبة
                </div>

                <h1>
                    كل ما تريد معرفته
                    <span>عن SOWLFA</span>
                </h1>

                <p>
                    إجابات واضحة عن المنصة والاشتراك والمكاتب والعقارات
                    والوسطاء وطريقة التواصل المباشر بعد المعاينة.
                </p>

            </div>

        </div>

    </section>


    {{-- About SOWLFA --}}
    <section class="faq-section">

        <div class="faq-container">

            <div class="faq-heading">

                <div class="faq-label">
                    عن المنصة
                </div>

                <h2>
                    ما هي SOWLFA؟
                </h2>

                <p>
                    أهم المعلومات التي تحتاجها لفهم فكرة المنصة وطريقة استخدامها.
                </p>

            </div>

            <div class="faq-list">

                <details class="faq-item">
                    <summary>
                        ما هي SOWLFA؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            SOWLFA منصة عقارية للمكاتب والوسطاء تساعد على عرض العقارات،
                            اكتشاف العقارات المناسبة، والاطلاع على بيانات المكاتب والعقارات
                            والتواصل المباشر بعد المعاينة.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        لمن صُممت SOWLFA؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            المنصة مخصصة للمكاتب العقارية والوسطاء التابعين لها،
                            كما تساعد المهتمين بالعقارات على اكتشاف العقارات
                            والوصول إلى المكتب صاحب العقار.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        هل SOWLFA منصة لبيع العقارات؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            لا. SOWLFA توفر مساحة لعرض العقارات واكتشافها
                            والوصول إلى المكاتب والتواصل المباشر معها.
                        </p>

                        <p>
                            عمليات البيع والشراء والمفاوضات والاتفاقات تتم
                            بين الأطراف خارج المنصة.
                        </p>
                    </div>
                </details>

            </div>

        </div>

    </section>


    {{-- Subscription --}}
    <section class="faq-section faq-section-gray">

        <div class="faq-container">

            <div class="faq-heading">

                <div class="faq-label">
                    الاشتراك
                </div>

                <h2>
                    خطط بسيطة وواضحة
                </h2>

                <p>
                    الاشتراك يكون للمكتب، ويحدد حسب الخطة عدد الوسطاء
                    الذين يمكن إضافتهم إلى المكتب.
                </p>

            </div>


            <div class="faq-plans">

                <div class="faq-plan">

                    <div class="faq-plan-name">
                        الأساسية
                    </div>

                    <div class="faq-plan-price">
                        مجانًا
                    </div>

                    <div class="faq-plan-desc">
                        مناسبة للمكتب الذي يريد البدء بدون وسطاء.
                    </div>

                </div>


                <div class="faq-plan featured">

                    <div class="faq-plan-name">
                        المتقدمة
                    </div>

                    <div class="faq-plan-price">
                        $49
                        <small>/ شهر</small>
                    </div>

                    <div class="faq-plan-desc">
                        حتى 10 وسطاء.
                    </div>

                </div>


                <div class="faq-plan">

                    <div class="faq-plan-name">
                        الذهبية
                    </div>

                    <div class="faq-plan-price">
                        $99
                        <small>/ شهر</small>
                    </div>

                    <div class="faq-plan-desc">
                        وسطاء غير محدودين.
                    </div>

                </div>

            </div>


            <div class="faq-list" style="margin-top: 35px;">

                <details class="faq-item">
                    <summary>
                        هل الاشتراك للمكتب أم لكل وسيط؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            الاشتراك يكون للمكتب، ويمكن للمكتب إضافة الوسطاء
                            التابعين له وفق الحد المسموح به في خطته.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        كم عدد الوسطاء المسموح بهم؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            الخطة الأساسية: بدون وسطاء.
                        </p>

                        <p>
                            الخطة المتقدمة: حتى 10 وسطاء.
                        </p>

                        <p>
                            الخطة الذهبية: وسطاء غير محدودين.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        هل جميع الخطط شهرية؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            نعم، جميع خطط الاشتراك الحالية شهرية.
                        </p>
                    </div>
                </details>

            </div>

        </div>

    </section>


    {{-- Properties --}}
    <section class="faq-section">

        <div class="faq-container">

            <div class="faq-heading">

                <div class="faq-label">
                    العقارات
                </div>

                <h2>
                    عرض العقارات والبحث عنها
                </h2>

                <p>
                    كل ما يتعلق بإضافة العقارات واكتشافها والتواصل مع المكتب صاحبها.
                </p>

            </div>


            <div class="faq-list">

                <details class="faq-item">
                    <summary>
                        كيف أضيف عقاراتي؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            بعد تفعيل حساب المكتب، يمكنك الدخول إلى لوحة التحكم
                            وإضافة العقارات التابعة لمكتبك وإدخال بياناتها.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        كيف أبحث عن عقار؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            يمكنك استخدام أدوات البحث داخل المنصة للوصول
                            إلى العقارات وفق البيانات والمعلومات المتاحة.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        ماذا يحدث بعد العثور على العقار المناسب؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            يمكنك الاطلاع على تفاصيل العقار ومعاينته،
                            وبعد المعاينة يتم التواصل مباشرة مع المكتب
                            صاحب العقار لمتابعة التفاصيل.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        هل توجد طلبات تعاون بين المكاتب؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            لا. تم اعتماد التواصل المباشر بدلًا من نظام
                            طلبات التعاون والقبول والرفض.
                        </p>
                    </div>
                </details>

            </div>

        </div>

    </section>


    {{-- Account --}}
    <section class="faq-section faq-section-gray">

        <div class="faq-container">

            <div class="faq-heading">

                <div class="faq-label">
                    الحساب
                </div>

                <h2>
                    الحساب وتفعيل المستخدم
                </h2>

                <p>
                    خطوات بسيطة لإنشاء الحساب والوصول إلى المنصة بشكل آمن.
                </p>

            </div>


            <div class="faq-list">

                <details class="faq-item">
                    <summary>
                        كيف أبدأ الاشتراك؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            يمكنك زيارة
                            <a href="{{ url('/subscribe') }}">
                                صفحة الاشتراك
                            </a>
                            للاطلاع على الخطط وإرسال طلبك.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        كيف يتم إنشاء حساب المكتب؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            بعد مراجعة طلب الاشتراك، يتم إنشاء حساب المكتب
                            وإرسال رسالة إلى البريد الإلكتروني المسجل.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        كيف أفعل حسابي؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            تصلك رسالة إلى بريدك الإلكتروني تحتوي على رابط آمن
                            لتفعيل الحساب وإنشاء كلمة المرور الخاصة بك.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        ماذا أفعل إذا لم تصلني رسالة التفعيل؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            تحقق أولًا من مجلد الرسائل غير المرغوب فيها،
                            ثم استخدم خيارات إعادة إرسال رابط التحقق المتاحة
                            داخل النظام أو تواصل معنا.
                        </p>
                    </div>
                </details>


                <details class="faq-item">
                    <summary>
                        كيف أتواصل مع SOWLFA؟
                    </summary>

                    <div class="faq-answer">
                        <p>
                            يمكنك استخدام
                            <a href="{{ url('/contact') }}">
                                صفحة تواصل معنا
                            </a>
                            لإرسال استفسارك أو طلب المساعدة.
                        </p>
                    </div>
                </details>

            </div>

        </div>

    </section>


    {{-- Direct contact --}}
    <section class="faq-section">

        <div class="faq-container">

            <div class="faq-info">

                <div>

                    <div class="faq-label">
                        التواصل المباشر
                    </div>

                    <h2>
                        كيف تتم العملية؟
                    </h2>

                    <p>
                        SOWLFA تسهّل الوصول إلى العقار والمكتب،
                        بينما يبقى التواصل النهائي بين الأطراف بشكل مباشر.
                    </p>

                </div>


                <div class="faq-points">

                    <div class="faq-point">
                        <span class="faq-check">✓</span>
                        البحث عن العقار
                    </div>

                    <div class="faq-point">
                        <span class="faq-check">✓</span>
                        الاطلاع على التفاصيل
                    </div>

                    <div class="faq-point">
                        <span class="faq-check">✓</span>
                        معاينة العقار
                    </div>

                    <div class="faq-point">
                        <span class="faq-check">✓</span>
                        التواصل مباشرة مع المكتب
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- CTA --}}
    <section class="faq-cta">

        <div class="faq-container">

            <div class="faq-cta-card">

                <div class="faq-cta-content">

                    <h2>
                        ما زال لديك سؤال؟
                    </h2>

                    <p>
                        تواصل معنا وسنساعدك في معرفة المزيد
                        عن SOWLFA وخطط الاشتراك وطريقة استخدام المنصة.
                    </p>

                    <div class="faq-actions">

                        <a
                            href="{{ url('/contact') }}"
                            class="faq-btn faq-btn-white"
                        >
                            تواصل معنا
                        </a>

                        <a
                            href="{{ url('/subscribe') }}"
                            class="faq-btn faq-btn-outline"
                        >
                            ابدأ الآن
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection