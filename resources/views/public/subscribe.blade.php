@extends('public.layouts.app')

@section(
'title',
'الاشتراك في SOWLFA | ابدأ استخدام المنصة'
)

@section(
'meta_description',
'ابدأ الاشتراك في SOWLFA للمكاتب والوسطاء العقاريين واستفد من قاعدة البيانات العقارية والبحث وطلبات التعاون بين المكاتب.'
)

@section(
'og_title',
'الاشتراك في SOWLFA'
)

@section(
'og_description',
'ابدأ استخدام SOWLFA واختر خطة الاشتراك المناسبة لمكتبك.'
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
        ابدأ الاشتراك في SOWLFA
    </h1>

    <p
        style="
            max-width: 760px;
            margin: 18px auto 0;
            font-size: 19px;
            color: #555;
        "
    >
        اختر الخطة المناسبة لمكتبك وابدأ باستخدام
        أدوات البحث عن العقارات والتعاون بين المكاتب.
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
            كيف تبدأ؟
        </h2>

        <div
            style="
                display: grid;
                gap: 18px;
                margin-top: 30px;
            "
        >

            <div
                style="
                    padding: 22px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                "
            >
                <h3>
                    1. اختر خطة الاشتراك
                </h3>

                <p>
                    اختر الخطة المناسبة لعدد الوسطاء
                    الذين يعملون ضمن مكتبك.
                </p>
            </div>


            <div
                style="
                    padding: 22px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                "
            >
                <h3>
                    2. تواصل معنا
                </h3>

                <p>
                    تواصل مع فريق SOWLFA للحصول على
                    تفاصيل بدء الاشتراك وإنشاء حساب المكتب.
                </p>
            </div>


            <div
                style="
                    padding: 22px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                "
            >
                <h3>
                    3. ابدأ استخدام المنصة
                </h3>

                <p>
                    بعد تفعيل الاشتراك، يستطيع المكتب
                    الدخول إلى لوحة المشترك وإدارة
                    الوسطاء والعقارات وطلبات التعاون.
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


    <h2 style="text-align: center;">
        خطط الاشتراك
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
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                text-align: center;
            "
        >
            <h3>
                أساسية
            </h3>

            <p
                style="
                    font-size: 30px;
                    font-weight: bold;
                "
            >
                $10
            </p>

            <p>
                حتى 3 وسطاء
            </p>
        </div>


        <div
            style="
                padding: 24px;
                background: #ffffff;
                border: 2px solid #222;
                border-radius: 10px;
                text-align: center;
            "
        >
            <h3>
                متقدمة
            </h3>

            <p
                style="
                    font-size: 30px;
                    font-weight: bold;
                "
            >
                $30
            </p>

            <p>
                حتى 20 وسيطًا
            </p>
        </div>


        <div
            style="
                padding: 24px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                text-align: center;
            "
        >
            <h3>
                غير محدودة
            </h3>

            <p
                style="
                    font-size: 30px;
                    font-weight: bold;
                "
            >
                $100
            </p>

            <p>
                عدد غير محدود من الوسطاء
            </p>
        </div>

    </div>

</div>

</section>

{{-- WhatsApp Subscription Form --}}

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
                طلب الاشتراك عبر واتساب
            </h2>

            <p
                style="
                    margin-top: 12px;
                    color: #666;
                "
            >
                أدخل بياناتك وسنفتح لك واتساب برسالة جاهزة
                لإرسال طلب الاشتراك إلى فريق SOWLFA.
            </p>

        </div>


        <form
            onsubmit="sendSubscriptionToWhatsApp(event)"
        >

            <div style="margin-bottom: 18px;">

                <label
                    for="whatsapp_office_name"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    اسم المكتب
                </label>

                <input
                    type="text"
                    id="whatsapp_office_name"
                    required
                    maxlength="150"
                    placeholder="مثال: مكتب SOWLFA العقاري"
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
                    for="whatsapp_contact_name"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    اسم المسؤول
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
                    for="whatsapp_phone"
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
                    id="whatsapp_phone"
                    required
                    maxlength="30"
                    placeholder="مثال: +963 XX XXX XXX"
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
                    for="whatsapp_plan"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    خطة الاشتراك
                </label>

                <select
                    id="whatsapp_plan"
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
                        اختر الخطة
                    </option>

                    <option value="الأساسية - $10 - حتى 3 وسطاء">
                        الأساسية — $10 — حتى 3 وسطاء
                    </option>

                    <option value="المتقدمة - $30 - حتى 20 وسيطًا">
                        المتقدمة — $30 — حتى 20 وسيطًا
                    </option>

                    <option value="غير المحدودة - $100 - عدد غير محدود من الوسطاء">
                        غير المحدودة — $100 — عدد غير محدود من الوسطاء
                    </option>
                </select>

            </div>


            <div style="margin-bottom: 24px;">

                <label
                    for="whatsapp_message"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                    ملاحظات إضافية
                    <span
                        style="
                            color: #888;
                            font-weight: normal;
                        "
                    >
                        (اختياري)
                    </span>
                </label>

                <textarea
                    id="whatsapp_message"
                    rows="4"
                    maxlength="500"
                    placeholder="اكتب أي معلومات أو استفسارات إضافية..."
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
                إرسال طلب الاشتراك عبر واتساب
            </button>

        </form>

    </div>

</div>


</section>

<section
    style="
        padding: 60px 0;
        text-align: center;
    "
>
    <div class="container">


    <h2>
        لديك أسئلة قبل الاشتراك؟
    </h2>

    <p>
        يمكنك التواصل معنا لمعرفة تفاصيل الاشتراك
        والخطوات المطلوبة لبدء استخدام SOWLFA.
    </p>

    <a
        href="{{ url('/contact') }}"
        class="button button-primary"
    >
        تواصل معنا
    </a>

    <a
        href="{{ url('/pricing') }}"
        class="button button-secondary"
        style="margin-right: 8px;"
    >
        العودة إلى الأسعار
    </a>

</div>


</section>

<script>
    function sendSubscriptionToWhatsApp(event) {
        event.preventDefault();

        const officeName = document
            .getElementById('whatsapp_office_name')
            .value
            .trim();

        const contactName = document
            .getElementById('whatsapp_contact_name')
            .value
            .trim();

        const phone = document
            .getElementById('whatsapp_phone')
            .value
            .trim();

        const plan = document
            .getElementById('whatsapp_plan')
            .value;

        const message = document
            .getElementById('whatsapp_message')
            .value
            .trim();

        const whatsappMessage =
`السلام عليكم،

أرغب بالاشتراك في منصة SOWLFA.

اسم المكتب: ${officeName}
اسم المسؤول: ${contactName}
رقم الهاتف: ${phone}
الخطة المطلوبة: ${plan}
${message ? `وصف الحدمات: ${message}` : ''}

يرجى تزويدي بتفاصيل الاشتراك وخطوات التفعيل.

شكرًا لكم.`;

        const whatsappUrl =
            'https://wa.me/963932224359?text=' +
            encodeURIComponent(whatsappMessage);

        window.open(
            whatsappUrl,
            '_blank',
            'noopener,noreferrer'
        );
    }
</script>

@endsection
