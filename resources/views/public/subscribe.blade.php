@extends('public.layouts.app')

@section('title', 'الاشتراك في SOWLFA | ابدأ استخدام المنصة')

@section(
'meta_description',
'ابدأ الاشتراك في SOWLFA للمكاتب والوسطاء العقاريين واختر خطة الاشتراك المناسبة لمكتبك.'
)

@section('og_title', 'الاشتراك في SOWLFA')

@section(
'og_description',
'اختر خطة الاشتراك المناسبة لمكتبك وابدأ استخدام منصة SOWLFA.'
)

@section('content')
{{-- =========================================================
Header
========================================================= --}}

<section
    style="
        position: relative;
        padding: 90px 0 85px;
        overflow: hidden;
        background:
            radial-gradient(
                circle at 15% 20%,
                rgba(59, 130, 246, 0.18),
                transparent 35%
            ),
            radial-gradient(
                circle at 85% 20%,
                rgba(139, 92, 246, 0.16),
                transparent 35%
            ),
            linear-gradient(
                135deg,
                #f8fafc 0%,
                #eef2ff 45%,
                #f5f3ff 100%
            );
        text-align: center;
        border-bottom: 1px solid #e5e7eb;
    "
>
    <div class="container">

        <div
            style="
                max-width: 850px;
                margin: 0 auto;
            "
        >

            <div
                style="
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    padding: 8px 16px;
                    margin-bottom: 20px;
                    border-radius: 999px;
                    background: rgba(255, 255, 255, 0.85);
                    border: 1px solid #dbeafe;
                    color: #1d4ed8;
                    font-size: 14px;
                    font-weight: 700;
                    box-shadow: 0 4px 15px rgba(30, 64, 175, 0.06);
                "
            >
                <span style="font-size: 16px;">✦</span>
                خطط اشتراك مرنة للمكاتب العقارية
            </div>

            <h1
                style="
                    margin: 0;
                    font-size: clamp(34px, 5vw, 54px);
                    line-height: 1.2;
                    font-weight: 800;
                    color: #0f172a;
                "
            >
                ابدأ الاشتراك في
                <span style="color: #2563eb;">
                    SOWLFA
                </span>
            </h1>

            <p
                style="
                    max-width: 760px;
                    margin: 22px auto 0;
                    font-size: 20px;
                    color: #475569;
                    line-height: 1.9;
                "
            >
                اختر الخطة المناسبة لمكتبك وابدأ باستخدام
                أدوات البحث عن العقارات والتعاون بين المكاتب.
            </p>

            <div
                style="
                    display: flex;
                    justify-content: center;
                    flex-wrap: wrap;
                    gap: 12px;
                    margin-top: 28px;
                "
            >
                <span
                    style="
                        padding: 9px 16px;
                        border-radius: 10px;
                        background: rgba(255, 255, 255, 0.8);
                        border: 1px solid #e2e8f0;
                        color: #334155;
                        font-size: 14px;
                    "
                >
                    🔎 البحث عن العقارات
                </span>

                <span
                    style="
                        padding: 9px 16px;
                        border-radius: 10px;
                        background: rgba(255, 255, 255, 0.8);
                        border: 1px solid #e2e8f0;
                        color: #334155;
                        font-size: 14px;
                    "
                >
                    🤝 التعاون بين المكاتب
                </span>

                <span
                    style="
                        padding: 9px 16px;
                        border-radius: 10px;
                        background: rgba(255, 255, 255, 0.8);
                        border: 1px solid #e2e8f0;
                        color: #334155;
                        font-size: 14px;
                    "
                >
                    🏢 إدارة المكتب
                </span>
            </div>

        </div>

    </div>
</section>

{{-- =========================================================
How it works
========================================================= --}}

<section style="padding: 60px 0;">
    <div class="container">


    <div style="max-width: 850px; margin: 0 auto;">

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
                    اختر الخطة المناسبة لمكتبك وعدد الوسطاء
                    الذين تريد إضافتهم إلى المنصة.
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

{{-- =========================================================
Subscription Plans
========================================================= --}}

<section
    style="
        padding: 70px 0;
        background:
            linear-gradient(
                135deg,
                #f8fafc 0%,
                #eef2ff 50%,
                #f8fafc 100%
            );
    "
>
    <div class="container">

        <div
            style="
                max-width: 760px;
                margin: 0 auto;
                text-align: center;
            "
        >
            <h2 style="margin-bottom: 12px;">
                خطط الاشتراك
            </h2>

            <p
                style="
                    margin: 0;
                    color: #64748b;
                    line-height: 1.8;
                "
            >
                اختر الخطة المناسبة لمكتبك حسب عدد الوسطاء
                الذين تريد إضافتهم إلى المنصة.
            </p>
        </div>

        <div
            style="
                display: grid;
                grid-template-columns: repeat(
                    auto-fit,
                    minmax(240px, 1fr)
                );
                gap: 24px;
                margin-top: 38px;
            "
        >

            {{-- الأساسية --}}

            <div
                style="
                    position: relative;
                    padding: 32px 26px;
                    background: linear-gradient(
                        180deg,
                        #ffffff 0%,
                        #f0fdf4 100%
                    );
                    border: 1px solid #bbf7d0;
                    border-radius: 18px;
                    text-align: center;
                    box-shadow: 0 10px 30px rgba(22, 101, 52, 0.08);
                    transition: transform 0.2s ease;
                "
            >

                <div
                    style="
                        display: inline-block;
                        padding: 7px 14px;
                        margin-bottom: 14px;
                        border-radius: 999px;
                        background: #dcfce7;
                        color: #166534;
                        font-size: 13px;
                        font-weight: 700;
                    "
                >
                    اقتصادية
                </div>

                <h3
                    style="
                        margin: 8px 0 0;
                        color: #166534;
                    "
                >
                    الأساسية
                </h3>

                <p
                    style="
                        font-size: 34px;
                        font-weight: 800;
                        margin: 18px 0 8px;
                        color: #14532d;
                    "
                >
                    مجانية
                </p>

                <p
                    style="
                        margin: 0 0 22px;
                        color: #64748b;
                    "
                >
                    بدون وسطاء
                </p>

                <div
                    style="
                        height: 1px;
                        background: #bbf7d0;
                        margin: 20px 0;
                    "
                ></div>

                <p style="margin: 10px 0; color: #334155;">
                    بدون وسطاء
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    الوصول إلى قاعدة البيانات العقارية
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    البحث عن العقارات
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    إرسال واستقبال طلبات التعاون
                </p>

            </div>


            {{-- المتقدمة --}}

            <div
                style="
                    position: relative;
                    padding: 32px 26px;
                    background: linear-gradient(
                        180deg,
                        #ffffff 0%,
                        #eff6ff 100%
                    );
                    border: 2px solid #2563eb;
                    border-radius: 18px;
                    text-align: center;
                    box-shadow: 0 16px 38px rgba(37, 99, 235, 0.16);
                    transform: translateY(-6px);
                "
            >

                <div
                    style="
                        position: absolute;
                        top: -14px;
                        left: 50%;
                        transform: translateX(-50%);
                        padding: 7px 18px;
                        border-radius: 999px;
                        background: #2563eb;
                        color: #ffffff;
                        font-size: 13px;
                        font-weight: 700;
                        white-space: nowrap;
                    "
                >
                    الأكثر استخدامًا
                </div>

                <h3
                    style="
                        margin: 10px 0 0;
                        color: #1d4ed8;
                    "
                >
                    المتقدمة
                </h3>

                <p
                    style="
                        font-size: 34px;
                        font-weight: 800;
                        margin: 18px 0 8px;
                        color: #1e3a8a;
                    "
                >
                    $49.00
                </p>

                <p
                    style="
                        margin: 0 0 22px;
                        color: #64748b;
                    "
                >
                    / شهر
                </p>

                <div
                    style="
                        height: 1px;
                        background: #bfdbfe;
                        margin: 20px 0;
                    "
                ></div>

                <p style="margin: 10px 0; color: #1e40af; font-weight: 700;">
                    حتى 10 وسطاء
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    الوصول إلى قاعدة البيانات العقارية
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    البحث عن العقارات
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    إرسال واستقبال طلبات التعاون
                </p>

            </div>


            {{-- الذهبية --}}

            <div
                style="
                    position: relative;
                    padding: 32px 26px;
                    background: linear-gradient(
                        180deg,
                        #ffffff 0%,
                        #fffbeb 100%
                    );
                    border: 1px solid #fde68a;
                    border-radius: 18px;
                    text-align: center;
                    box-shadow: 0 10px 30px rgba(161, 98, 7, 0.08);
                "
            >

                <div
                    style="
                        display: inline-block;
                        padding: 7px 14px;
                        margin-bottom: 14px;
                        border-radius: 999px;
                        background: #fef3c7;
                        color: #92400e;
                        font-size: 13px;
                        font-weight: 700;
                    "
                >
                    للأعمال الكبيرة
                </div>

                <h3
                    style="
                        margin: 8px 0 0;
                        color: #92400e;
                    "
                >
                    الذهبية
                </h3>

                <p
                    style="
                        font-size: 34px;
                        font-weight: 800;
                        margin: 18px 0 8px;
                        color: #78350f;
                    "
                >
                    $99.00
                </p>

                <p
                    style="
                        margin: 0 0 22px;
                        color: #64748b;
                    "
                >
                    / شهر
                </p>

                <div
                    style="
                        height: 1px;
                        background: #fde68a;
                        margin: 20px 0;
                    "
                ></div>

                <p
                    style="
                        margin: 10px 0;
                        color: #92400e;
                        font-weight: 700;
                    "
                >
                    وسطاء غير محدودين
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    الوصول إلى قاعدة البيانات العقارية
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    البحث عن العقارات
                </p>

                <p style="margin: 10px 0; color: #475569;">
                    إرسال واستقبال طلبات التعاون
                </p>

            </div>

        </div>

    </div>
</section>
{{-- =========================================================
WhatsApp Subscription Request
========================================================= --}}

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

        <div
            style="
                text-align: center;
                margin-bottom: 30px;
            "
        >

            <h2>
                طلب الاشتراك عبر واتساب
            </h2>

            <p
                style="
                    margin-top: 12px;
                    color: #666;
                    line-height: 1.8;
                "
            >
                أدخل بياناتك وسنفتح لك واتساب برسالة جاهزة
                لإرسال طلب الاشتراك إلى فريق SOWLFA.
            </p>

        </div>


        <form onsubmit="sendSubscriptionToWhatsApp(event)">

            {{-- Office Name --}}
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


            {{-- Contact Name --}}
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

             {{-- Email --}}
<div style="margin-bottom: 18px;">

    <label
        for="whatsapp_email"
        style="
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
        "
    >
        البريد الإلكتروني
    </label>

    <input
        type="email"
        id="whatsapp_email"
        required
        maxlength="150"
        placeholder="مثال: info@example.com"
        style="
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            box-sizing: border-box;
        "
    >

</div>
            {{-- Phone --}}
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


            {{-- Subscription Plan --}}
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

                    @foreach($plans as $plan)

                        <option
                            value="{{ $plan->id }}"
                            data-name="{{ $plan->name }}"
                            data-price="{{ $plan->price }}"
                            data-max-agents="{{ is_null($plan->max_agents) ? 'unlimited' : $plan->max_agents }}"
                        >
                            {{ $plan->name }}

                            —

                            @if((float) $plan->price <= 0)
                                مجانية
                            @else
                                ${{ number_format((float) $plan->price, 2) }} / شهر
                            @endif

                            —

                            @if(is_null($plan->max_agents))
                                وسطاء غير محدودين
                            @elseif((int) $plan->max_agents === 0)
                                بدون وسطاء
                            @elseif((int) $plan->max_agents === 1)
                                وسيط واحد
                            @elseif((int) $plan->max_agents === 2)
                                وسيطان
                            @else
                                حتى {{ $plan->max_agents }} وسطاء
                            @endif

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Additional Message --}}
            <div style="margin-bottom: 24px;">

                <label
                    for="whatsapp_message"
                    style="
                        display: block;
                        margin-bottom: 7px;
                        font-weight: 600;
                    "
                >
                   وصف الخدمات 

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
                    placeholder="اكتب  معلومات إضافية حول الاعمال"
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


            {{-- Submit --}}
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

{{-- =========================================================
Contact
========================================================= --}}

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

{{-- =========================================================
WhatsApp JavaScript
========================================================= --}}

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

        const planSelect = document.getElementById('whatsapp_plan');

        const selectedOption =
            planSelect.options[planSelect.selectedIndex];

        if (!selectedOption || !selectedOption.value) {
            alert('يرجى اختيار خطة الاشتراك.');
            return;
        }

        const planId = selectedOption.value;

        const planName =
            selectedOption.dataset.name || '';

        const planPrice =
            parseFloat(selectedOption.dataset.price || '0');

        const maxAgents =
            selectedOption.dataset.maxAgents || '';

        const additionalMessage = document
            .getElementById('whatsapp_message')
            .value
            .trim();


        /*
         * السعر
         */
        let priceText = 'مجانية';

        if (planPrice > 0) {
            priceText =
                '$' + planPrice.toFixed(2) + ' / شهر';
        }


        /*
         * عدد الوسطاء
         */
        let agentsText = 'بدون وسطاء';

        if (maxAgents === 'unlimited') {

            agentsText = 'وسطاء غير محدودين';

        } else {

            const agentsCount =
                parseInt(maxAgents, 10);

            if (!isNaN(agentsCount)) {

                if (agentsCount === 0) {

                    agentsText = 'بدون وسطاء';

                } else if (agentsCount === 1) {

                    agentsText = 'وسيط واحد';

                } else if (agentsCount === 2) {

                    agentsText = 'وسيطان';

                } else {

                    agentsText =
                        'حتى ' + agentsCount + ' وسطاء';

                }
            }
        }


        /*
         * رسالة واتساب
         */
        let whatsappMessage =
`السلام عليكم،

أرغب بالاشتراك في منصة SOWLFA.

اسم المكتب: ${officeName}
اسم المسؤول: ${contactName}
رقم الهاتف: ${phone}

الخطة المطلوبة: ${planName}
سعر الخطة: ${priceText}
عدد الوسطاء: ${agentsText}
معرف الخطة: ${planId}`;

        if (additionalMessage) {

            whatsappMessage +=
                `\n\nملاحظات إضافية: ${additionalMessage}`;
        }

        whatsappMessage +=
            `\n\nيرجى تزويدي بتفاصيل الاشتراك وخطوات التفعيل.

شكرًا لكم.`;


        /*
         * رقم واتساب
         *
         * غيّر الرقم هنا إذا كان رقم استقبال الاشتراكات
         * مختلفًا.
         */
        const whatsappNumber =
            '963932224359';


        const whatsappUrl =
            'https://wa.me/' +
            whatsappNumber +
            '?text=' +
            encodeURIComponent(whatsappMessage);


        window.open(
            whatsappUrl,
            '_blank',
            'noopener,noreferrer'
        );
    }
</script>

@endsection
