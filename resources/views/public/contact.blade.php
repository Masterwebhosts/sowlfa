@extends('public.layouts.app')

@section(
    'title',
    'تواصل معنا | SOWLFA'
)

@section(
    'meta_description',
    'تواصل مع فريق SOWLFA للاستفسار عن الاشتراك والمنصة والمكاتب والعقارات وخدماتها للمكاتب والوسطاء العقاريين.'
)

@section(
    'og_title',
    'تواصل معنا | SOWLFA'
)

@section(
    'og_description',
    'تواصل مباشرة مع فريق SOWLFA للاستفسار عن الاشتراك واستخدام المنصة.'
)

@section('content')

<div class="contact-page" dir="rtl">

    <style>
        .contact-page {
            --contact-primary: #2563eb;
            --contact-primary-dark: #1d4ed8;
            --contact-navy: #0f172a;
            --contact-text: #334155;
            --contact-muted: #64748b;
            --contact-border: #e2e8f0;
            --contact-bg: #f8fafc;
            background: #fff;
            color: var(--contact-navy);
            overflow: hidden;
        }

        .contact-page *,
        .contact-page *::before,
        .contact-page *::after {
            box-sizing: border-box;
        }

        .contact-container {
            width: min(1100px, calc(100% - 32px));
            margin: 0 auto;
        }

        /* Hero */
        .contact-hero {
            position: relative;
            padding: 90px 0 80px;
            background:
                radial-gradient(circle at 85% 15%, rgba(37, 99, 235, 0.12), transparent 28%),
                radial-gradient(circle at 15% 75%, rgba(245, 158, 11, 0.08), transparent 23%),
                linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        }

        .contact-hero::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            border: 1px solid rgba(37, 99, 235, 0.08);
            top: -160px;
            right: -110px;
        }

        .contact-hero-content {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border: 1px solid #dbeafe;
            border-radius: 999px;
            background: #eff6ff;
            color: var(--contact-primary-dark);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .contact-eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--contact-primary);
        }

        .contact-hero h1 {
            margin: 0;
            font-size: clamp(40px, 5vw, 58px);
            line-height: 1.1;
            font-weight: 900;
            letter-spacing: -1.3px;
        }

        .contact-hero h1 span {
            color: var(--contact-primary);
        }

        .contact-hero p {
            max-width: 720px;
            margin: 22px auto 0;
            color: var(--contact-muted);
            font-size: 18px;
            line-height: 1.95;
        }

        /* Sections */
        .contact-section {
            padding: 80px 0;
        }

        .contact-section-gray {
            background: var(--contact-bg);
        }

        .contact-heading {
            max-width: 720px;
            margin: 0 auto 42px;
            text-align: center;
        }

        .contact-label {
            display: inline-block;
            color: var(--contact-primary);
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .contact-heading h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: -0.7px;
        }

        .contact-heading p {
            margin: 0;
            color: var(--contact-muted);
            line-height: 1.9;
            font-size: 16px;
        }

        /* Help cards */
        .contact-help-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .contact-help-card {
            padding: 28px;
            border: 1px solid var(--contact-border);
            border-radius: 20px;
            background: #fff;
            transition: 0.2s ease;
        }

        .contact-help-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
        }

        .contact-help-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background: #eff6ff;
            color: var(--contact-primary);
            margin-bottom: 18px;
        }

        .contact-help-card h3 {
            margin: 0 0 10px;
            font-size: 19px;
        }

        .contact-help-card p {
            margin: 0;
            color: var(--contact-muted);
            font-size: 14px;
            line-height: 1.85;
        }

        /* Form */
        .contact-form-layout {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 28px;
            align-items: stretch;
        }

        .contact-form-intro {
            padding: 34px;
            border-radius: 24px;
            background: var(--contact-navy);
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .contact-form-intro::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            top: -100px;
            left: -80px;
            background: rgba(37, 99, 235, 0.24);
        }

        .contact-form-intro-content {
            position: relative;
            z-index: 1;
        }

        .contact-form-intro h2 {
            margin: 0 0 14px;
            font-size: 28px;
            line-height: 1.45;
            font-weight: 900;
        }

        .contact-form-intro > p {
            margin: 0 0 28px;
            color: #cbd5e1;
            line-height: 1.9;
        }

        .contact-form-points {
            display: grid;
            gap: 11px;
        }

        .contact-form-point {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 14px;
            border-radius: 13px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.08);
            color: #e2e8f0;
            font-size: 14px;
        }

        .contact-check {
            width: 25px;
            height: 25px;
            flex: 0 0 25px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: rgba(255,255,255,0.12);
            color: #fff;
            font-weight: 900;
        }

        .contact-form-card {
            padding: 34px;
            border: 1px solid var(--contact-border);
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.06);
        }

        .contact-form-card h3 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 900;
        }

        .contact-form-card > p {
            margin: 0 0 25px;
            color: var(--contact-muted);
            line-height: 1.8;
            font-size: 14px;
        }

        .contact-field {
            margin-bottom: 18px;
        }

        .contact-field label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 800;
            color: var(--contact-text);
        }

        .contact-field label span {
            color: #94a3b8;
            font-weight: 600;
        }

        .contact-field input,
        .contact-field select,
        .contact-field textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            background: #fff;
            color: var(--contact-navy);
            font-size: 15px;
            padding: 13px 14px;
            outline: none;
            transition: 0.2s ease;
            font-family: inherit;
        }

        .contact-field input,
        .contact-field select {
            min-height: 48px;
        }

        .contact-field textarea {
            min-height: 130px;
            resize: vertical;
            line-height: 1.7;
        }

        .contact-field input:focus,
        .contact-field select:focus,
        .contact-field textarea:focus {
            border-color: var(--contact-primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.08);
        }

        .contact-submit {
            width: 100%;
            min-height: 52px;
            border: 0;
            border-radius: 12px;
            background: var(--contact-primary);
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: 900;
            transition: 0.2s ease;
            font-family: inherit;
        }

        .contact-submit:hover {
            background: var(--contact-primary-dark);
            transform: translateY(-2px);
        }

        .contact-note {
            margin-top: 12px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.7;
        }

        /* Process */
        .contact-process {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .contact-process-card {
            padding: 25px;
            border: 1px solid var(--contact-border);
            border-radius: 20px;
            background: #fff;
            text-align: center;
        }

        .contact-process-number {
            width: 44px;
            height: 44px;
            margin: 0 auto 17px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: #eff6ff;
            color: var(--contact-primary);
            font-weight: 900;
        }

        .contact-process-card h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .contact-process-card p {
            margin: 0;
            color: var(--contact-muted);
            line-height: 1.8;
            font-size: 14px;
        }

        /* CTA */
        .contact-cta {
            padding: 85px 0;
        }

        .contact-cta-card {
            position: relative;
            overflow: hidden;
            padding: 55px 35px;
            border-radius: 30px;
            background: var(--contact-navy);
            color: #fff;
            text-align: center;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.16);
        }

        .contact-cta-card::before,
        .contact-cta-card::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .contact-cta-card::before {
            width: 240px;
            height: 240px;
            top: -120px;
            right: -70px;
            background: rgba(37, 99, 235, 0.22);
        }

        .contact-cta-card::after {
            width: 180px;
            height: 180px;
            bottom: -90px;
            left: -40px;
            background: rgba(255,255,255,0.04);
        }

        .contact-cta-content {
            position: relative;
            z-index: 1;
        }

        .contact-cta-card h2 {
            margin: 0 0 12px;
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 900;
        }

        .contact-cta-card p {
            max-width: 680px;
            margin: 0 auto;
            color: #cbd5e1;
            line-height: 1.9;
        }

        .contact-actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .contact-btn {
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

        .contact-btn-white {
            background: #fff;
            color: var(--contact-navy);
        }

        .contact-btn-outline {
            color: #fff;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.18);
        }

        .contact-btn:hover {
            transform: translateY(-2px);
        }

        /* Mobile */
        @media (max-width: 950px) {
            .contact-form-layout {
                grid-template-columns: 1fr;
            }

            .contact-form-intro {
                max-width: 700px;
            }
        }

        @media (max-width: 760px) {
            .contact-help-grid,
            .contact-process {
                grid-template-columns: 1fr;
            }

            .contact-hero {
                padding: 60px 0 55px;
            }

            .contact-section,
            .contact-cta {
                padding: 60px 0;
            }

            .contact-hero h1 {
                font-size: 40px;
            }

            .contact-hero p {
                font-size: 16px;
            }

            .contact-form-card,
            .contact-form-intro,
            .contact-cta-card {
                padding: 26px;
            }

            .contact-btn {
                width: 100%;
            }
        }
    </style>


    {{-- Hero --}}
    <section class="contact-hero">

        <div class="contact-container">

            <div class="contact-hero-content">

                <div class="contact-eyebrow">
                    <span class="contact-eyebrow-dot"></span>
                    نحن هنا لمساعدتك
                </div>

                <h1>
                    تواصل معنا
                    <span>الواتس أب</span>
                </h1>

                <p>
                    لديك سؤال عن SOWLFA أو الاشتراك أو طريقة استخدام المنصة؟
                    أرسل لنا رسالتك وسنتواصل معك مباشرة عبر واتساب.
                </p>

            </div>

        </div>

    </section>


    {{-- How can we help --}}
    <section class="contact-section">

        <div class="contact-container">

            <div class="contact-heading">

                <div class="contact-label">
                    كيف نساعدك؟
                </div>

                <h2>
                    أخبرنا بما تحتاج
                </h2>

                <p>
                    سواء كنت تريد معرفة المزيد عن الاشتراك أو تحتاج إلى مساعدة
                    في استخدام المنصة، يمكنك التواصل معنا مباشرة.
                </p>

            </div>


            <div class="contact-help-grid">

                <div class="contact-help-card">

                    <div class="contact-help-icon">
                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                            <path d="M4 5H20V17H7L4 20V5Z"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linejoin="round"/>
                            <path d="M8 9H16M8 13H13"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>
                        </svg>
                    </div>

                    <h3>
                        الاستفسار عن الاشتراك
                    </h3>

                    <p>
                        تعرف على الخطط المناسبة لمكتبك وعدد الوسطاء
                        والمزايا المتاحة مع كل خطة.
                    </p>

                </div>


                <div class="contact-help-card">

                    <div class="contact-help-icon">
                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9"
                                    stroke="currentColor"
                                    stroke-width="1.8"/>
                            <path d="M12 11V16"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>
                            <circle cx="12" cy="7.5" r="1"
                                    fill="currentColor"/>
                        </svg>
                    </div>

                    <h3>
                        مساعدة في استخدام المنصة
                    </h3>

                    <p>
                        تواصل معنا إذا احتجت إلى توضيح حول الحساب
                        أو العقارات أو الوسطاء أو طريقة الاستخدام.
                    </p>

                </div>


                <div class="contact-help-card">

                    <div class="contact-help-icon">
                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none">
                            <path d="M21 11.5C21 16.19 17 20 12 20C10.58 20 9.24 19.69 8.05 19.13L3 21L4.87 16.8C4.32 15.61 4 14.28 4 12.9C4 8.21 8 4.4 13 4.4C17.42 4.4 21 7.55 21 11.5Z"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <h3>
                        استفسارات عامة
                    </h3>

                    <p>
                        لأي سؤال آخر متعلق بـ SOWLFA،
                        يسعدنا استقبال رسالتك ومساعدتك.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- WhatsApp form --}}
    <section class="contact-section contact-section-gray">

        <div class="contact-container">

            <div class="contact-heading">

                <div class="contact-label">
                    تواصل مباشر
                </div>

                <h2>
                    أرسل رسالتك عبر واتساب
                </h2>

                <p>
                    املأ النموذج التالي، وسيتم فتح واتساب مع رسالة جاهزة
                    تتضمن بياناتك واستفسارك.
                </p>

            </div>


            <div class="contact-form-layout">

                {{-- Intro --}}
                <div class="contact-form-intro">

                    <div class="contact-form-intro-content">

                        <h2>
                            نحن قريبون منك
                        </h2>

                        <p>
                            أرسل استفسارك بشكل واضح وسنتمكن من فهم طلبك
                            ومساعدتك بشكل أفضل.
                        </p>

                        <div class="contact-form-points">

                            <div class="contact-form-point">
                                <span class="contact-check">✓</span>
                                استفسار عن الاشتراك والخطط
                            </div>

                            <div class="contact-form-point">
                                <span class="contact-check">✓</span>
                                مساعدة في استخدام المنصة
                            </div>

                            <div class="contact-form-point">
                                <span class="contact-check">✓</span>
                                استفسارات حول العقارات والمكاتب
                            </div>

                            <div class="contact-form-point">
                                <span class="contact-check">✓</span>
                                استفسارات عامة
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="contact-form-card">

                    <h3>
                        بيانات التواصل
                    </h3>

                    <p>
                        يرجى إدخال بياناتك الأساسية حتى نتمكن من معرفة من نتواصل معه.
                    </p>


                    <form onsubmit="sendContactToWhatsApp(event)">

                        <div class="contact-field">

                            <label for="whatsapp_contact_name">
                                الاسم
                            </label>

                            <input
                                type="text"
                                id="whatsapp_contact_name"
                                required
                                maxlength="100"
                                placeholder="الاسم الكامل"
                            >

                        </div>


                        <div class="contact-field">

    <label for="whatsapp_contact_phone">
        رقم الهاتف
    </label>

    <input
        type="tel"
        id="whatsapp_contact_phone"
        required
        maxlength="20"
        placeholder="+963 XXX XXX XXX"
    >

</div>

                        <div class="contact-field">

                            <label for="whatsapp_contact_email">
                                البريد الإلكتروني
                                <span>(اختياري)</span>
                            </label>

                            <input
                                type="email"
                                id="whatsapp_contact_email"
                                maxlength="150"
                                placeholder="example@email.com"
                            >

                        </div>


                        <div class="contact-field">

                            <label for="whatsapp_contact_subject">
                                موضوع التواصل
                            </label>

                            <select
                                id="whatsapp_contact_subject"
                                required
                            >

                                <option value="">
                                    اختر الموضوع
                                </option>

                                <option value="الاشتراك في SOWLFA">
                                    الاشتراك في SOWLFA
                                </option>

                                <option value="استفسار عن الخطط والأسعار">
                                    استفسار عن الخطط والأسعار
                                </option>

                                <option value="مشكلة تقنية">
                                    مشكلة تقنية
                                </option>

                                <option value="استفسار عن العقارات">
                                    استفسار عن العقارات
                                </option>

                                <option value="استفسار عام">
                                    استفسار عام
                                </option>

                                <option value="أخرى">
                                    أخرى
                                </option>

                            </select>

                        </div>


                        <div class="contact-field">

                            <label for="whatsapp_contact_message">
                                رسالتك
                            </label>

                            <textarea
                                id="whatsapp_contact_message"
                                required
                                rows="5"
                                maxlength="1000"
                                placeholder="اكتب رسالتك أو استفسارك هنا..."
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="contact-submit"
                        >
                            إرسال الرسالة عبر واتساب
                        </button>

                        <div class="contact-note">
                            سيتم فتح واتساب في نافذة جديدة لإرسال رسالتك.
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>


    {{-- Contact process --}}
    <section class="contact-section">

        <div class="contact-container">

            <div class="contact-heading">

                <div class="contact-label">
                    الأمر بسيط
                </div>

                <h2>
                    كيف تتم عملية التواصل؟
                </h2>

                <p>
                    ثلاث خطوات فقط لإرسال استفسارك إلينا.
                </p>

            </div>


            <div class="contact-process">

                <div class="contact-process-card">

                    <div class="contact-process-number">
                        01
                    </div>

                    <h3>
                        املأ النموذج
                    </h3>

                    <p>
                        أدخل اسمك ورقم هاتفك وحدد موضوع رسالتك.
                    </p>

                </div>


                <div class="contact-process-card">

                    <div class="contact-process-number">
                        02
                    </div>

                    <h3>
                        اضغط إرسال
                    </h3>

                    <p>
                        سيتم تجهيز رسالة واتساب تلقائيًا بكل بيانات الاستفسار.
                    </p>

                </div>


                <div class="contact-process-card">

                    <div class="contact-process-number">
                        03
                    </div>

                    <h3>
                        يبدأ التواصل
                    </h3>

                    <p>
                        تُرسل الرسالة مباشرة إلى فريق SOWLFA عبر واتساب.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- CTA --}}
    <section class="contact-cta">

        <div class="contact-container">

            <div class="contact-cta-card">

                <div class="contact-cta-content">

                    <h2>
                        جاهز للانضمام إلى SOWLFA؟
                    </h2>

                    <p>
                        تعرف على خطط الاشتراك واختر الخطة المناسبة لمكتبك،
                        ثم ابدأ خطوات إنشاء حسابك.
                    </p>

                    <div class="contact-actions">

                        <a
                            href="{{ url('/pricing') }}"
                            class="contact-btn contact-btn-white"
                        >
                            عرض الخطط
                        </a>

                        <a
                            href="{{ url('/subscribe') }}"
                            class="contact-btn contact-btn-outline"
                        >
                            ابدأ الآن
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<script>
    function sendContactToWhatsApp(event) {
        event.preventDefault();

        const name = document
            .getElementById('whatsapp_contact_name')
            .value
            .trim();

        const phone = document
            .getElementById('whatsapp_contact_phone')
            .value
            .trim();

        const email = document
            .getElementById('whatsapp_contact_email')
            .value
            .trim();

        const subject = document
            .getElementById('whatsapp_contact_subject')
            .value;

        const message = document
            .getElementById('whatsapp_contact_message')
            .value
            .trim();

        const whatsappMessage =
`السلام عليكم،

لدي رسالة إلى فريق SOWLFA.

الاسم: ${name}
رقم الهاتف: ${phone}
البريد الإلكتروني: ${email || 'غير مذكور'}
موضوع التواصل: ${subject}

الرسالة:
${message}

شكرًا لكم.`;

        const whatsappUrl =
            'https://wa.me/963984983589?text=' +
            encodeURIComponent(whatsappMessage);

        window.open(
            whatsappUrl,
            '_blank',
            'noopener,noreferrer'
        );
    }
</script>

@endsection