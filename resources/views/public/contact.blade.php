@extends('public.layouts.app')

@section(
    'title',
    'تواصل معنا | SOWLFA'
)

@section(
    'meta_description',
    'تواصل مع فريق SOWLFA للاستفسار عن الاشتراك وخدمات المنصة للمكاتب والوسطاء العقاريين.'
)

@section(
    'og_title',
    'تواصل معنا | SOWLFA'
)

@section(
    'og_description',
    'تواصل مع فريق SOWLFA لمعرفة المزيد عن المنصة والاشتراك.'
)

@section('content')

<section
    style="
        padding: 70px 0 50px;
        background: #f5f6f8;
        text-align: center;
    "
>

    <div class="container">

        <h1>
            تواصل معنا
        </h1>

        <p
            style="
                max-width: 760px;
                margin: 18px auto 0;
                font-size: 19px;
                color: #555;
            "
        >
            إذا كان لديك استفسار حول SOWLFA أو الاشتراك،
            يمكنك التواصل معنا.
        </p>

    </div>

</section>


<section
    style="
        padding: 60px 0;
    "
>

    <div class="container">

        <div
            style="
                max-width: 850px;
                margin: 0 auto;
            "
        >

            <h2>
                كيف يمكننا مساعدتك؟
            </h2>

            <div
                style="
                    display: grid;
                    grid-template-columns: repeat(
                        auto-fit,
                        minmax(220px, 1fr)
                    );
                    gap: 20px;
                    margin-top: 30px;
                "
            >

                <div
                    style="
                        padding: 24px;
                        border: 1px solid #e5e7eb;
                        border-radius: 10px;
                    "
                >

                    <h3>
                        الاشتراك
                    </h3>

                    <p>
                        استفسر عن خطط الاشتراك المناسبة
                        لمكتبك وعدد الوسطاء.
                    </p>

                </div>


                <div
                    style="
                        padding: 24px;
                        border: 1px solid #e5e7eb;
                        border-radius: 10px;
                    "
                >

                    <h3>
                        استخدام المنصة
                    </h3>

                    <p>
                        تواصل معنا إذا كنت بحاجة إلى
                        معلومات حول طريقة استخدام SOWLFA.
                    </p>

                </div>


                <div
                    style="
                        padding: 24px;
                        border: 1px solid #e5e7eb;
                        border-radius: 10px;
                    "
                >

                    <h3>
                        استفسارات عامة
                    </h3>

                    <p>
                        يسعدنا استقبال استفساراتك حول
                        خدمات المنصة.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<section
    style="
        padding: 60px 0;
        background: #f5f6f8;
    "
>

    <div class="container">

        <div
            style="
                max-width: 700px;
                margin: 0 auto;
                text-align: center;
            "
        >

            <h2>
                ابدأ من هنا
            </h2>

            <p>
                لمعرفة خطط الاشتراك المتاحة،
                يمكنك الاطلاع على صفحة الأسعار.
            </p>

            <a
                href="{{ url('/pricing') }}"
                class="button button-primary"
            >
                عرض الأسعار
            </a>

            <a
                href="{{ url('/subscribe') }}"
                class="button button-secondary"
                style="margin-right: 8px;"
            >
                الاشتراك في SOWLFA
            </a>

        </div>

    </div>

</section>

{{-- WhatsApp Contact Form --}}

<section
    style="
        padding: 70px 0;
        background: #ffffff;
    "
>
    <div class="container">


    <div
        style="
            max-width: 700px;
            margin: 0 auto;
            padding: 35px;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        "
    >

        <div style="text-align: center; margin-bottom: 30px;">

            <h2>
                تواصل معنا عبر واتساب
            </h2>

            <p
                style="
                    margin-top: 12px;
                    color: #666;
                "
            >
                أرسل استفسارك وسنتواصل معك عبر واتساب في أقرب وقت.
            </p>

        </div>


        <form onsubmit="sendContactToWhatsApp(event)">

            <div style="margin-bottom: 18px;">

                <label
                    for="whatsapp_contact_name"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    الاسم
                </label>

                <input
                    type="text"
                    id="whatsapp_contact_name"
                    required
                    maxlength="100"
                    placeholder="الاسم الكامل"
                    style="
                        width: 100%;
                        padding: 12px 14px;
                        border: 1px solid #d1d5db;
                        border-radius: 8px;
                        box-sizing: border-box;
                    "
                >

            </div>


            <div style="margin-bottom: 18px;">

                <label
                    for="whatsapp_contact_phone"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    رقم الهاتف
                </label>

                <input
                    type="tel"
                    id="whatsapp_contact_phone"
                    required
                    maxlength="30"
                    placeholder="مثال: +963 9XX XXX XXX"
                    style="
                        width: 100%;
                        padding: 12px 14px;
                        border: 1px solid #d1d5db;
                        border-radius: 8px;
                        box-sizing: border-box;
                    "
                >

            </div>


            <div style="margin-bottom: 18px;">

                <label
                    for="whatsapp_contact_email"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    البريد الإلكتروني
                    <span
                        style="
                            color: #888;
                            font-weight: normal;
                        "
                    >
                        (اختياري)
                    </span>
                </label>

                <input
                    type="email"
                    id="whatsapp_contact_email"
                    maxlength="150"
                    placeholder="example@email.com"
                    style="
                        width: 100%;
                        padding: 12px 14px;
                        border: 1px solid #d1d5db;
                        border-radius: 8px;
                        box-sizing: border-box;
                    "
                >

            </div>


            <div style="margin-bottom: 18px;">

                <label
                    for="whatsapp_contact_subject"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    موضوع التواصل
                </label>

                <select
                    id="whatsapp_contact_subject"
                    required
                    style="
                        width: 100%;
                        padding: 12px 14px;
                        border: 1px solid #d1d5db;
                        border-radius: 8px;
                        box-sizing: border-box;
                        background: #fff;
                    "
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

                    <option value="استفسار عام">
                        استفسار عام
                    </option>

                    <option value="أخرى">
                        أخرى
                    </option>
                </select>

            </div>


            <div style="margin-bottom: 24px;">

                <label
                    for="whatsapp_contact_message"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    رسالتك
                </label>

                <textarea
                    id="whatsapp_contact_message"
                    required
                    rows="5"
                    maxlength="1000"
                    placeholder="اكتب رسالتك أو استفسارك هنا..."
                    style="
                        width: 100%;
                        padding: 12px 14px;
                        border: 1px solid #d1d5db;
                        border-radius: 8px;
                        box-sizing: border-box;
                        resize: vertical;
                    "
                ></textarea>

            </div>


            <button
                type="submit"
                class="button button-primary"
                style="
                    width: 100%;
                    border: none;
                    cursor: pointer;
                    font-size: 17px;
                    padding: 14px 20px;
                "
            >
                إرسال الرسالة عبر واتساب
            </button>

        </form>

    </div>

</div>


</section>

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
            'https://wa.me/96322246359?text=' +
            encodeURIComponent(whatsappMessage);

        window.open(
            whatsappUrl,
            '_blank',
            'noopener,noreferrer'
        );
    }
</script>


@endsection

