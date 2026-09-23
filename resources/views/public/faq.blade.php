@extends('public.layouts.app')

@section(
    'title',
    'الأسئلة الشائعة | SOWLFA'
)

@section(
    'meta_description',
    'إجابات عن الأسئلة الشائعة حول SOWLFA والاشتراك والعقارات وطلبات التعاون بين المكاتب والوسطاء العقاريين.'
)

@section(
    'og_title',
    'الأسئلة الشائعة | SOWLFA'
)

@section(
    'og_description',
    'تعرف على طريقة عمل SOWLFA والاشتراك وخدمات التعاون العقاري.'
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
            الأسئلة الشائعة
        </h1>

        <p
            style="
                max-width: 760px;
                margin: 18px auto 0;
                font-size: 19px;
                color: #555;
            "
        >
            إجابات عن الأسئلة الأكثر شيوعًا حول SOWLFA
            وخدماتها للمكاتب والوسطاء العقاريين.
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
                عن SOWLFA
            </h2>

            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    ما هي SOWLFA؟
                </summary>

                <p>
                    SOWLFA منصة B2B للمكاتب والوسطاء
                    العقاريين توفر قاعدة بيانات عقارية
                    موحدة، والبحث عن العقارات، وطلبات
                    التعاون بين المكاتب.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    من يمكنه استخدام SOWLFA؟
                </summary>

                <p>
                    الخدمة مخصصة للمكاتب والوسطاء
                    العقاريين المشتركين في المنصة.
                </p>

            </details>


            <h2 style="margin-top: 50px;">
                الاشتراك
            </h2>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    كم تبلغ أسعار الاشتراك؟
                </summary>

                <p>
                    تتوفر ثلاث خطط: الأساسية بسعر 10 دولارات،
                    والمتقدمة بسعر 30 دولارًا، وغير المحدودة
                    بسعر 100 دولار.
                </p>

                <p>
                    يمكنك الاطلاع على التفاصيل من
                    <a href="{{ url('/pricing') }}">
                        صفحة الأسعار
                    </a>.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    هل الاشتراك للمكتب أم لكل وسيط؟
                </summary>

                <p>
                    الاشتراك يكون للمكتب، ويختلف الحد
                    المسموح لعدد الوسطاء بحسب خطة المكتب.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    كم عدد الوسطاء المسموح بهم؟
                </summary>

                <p>
                    الخطة الأساسية تسمح حتى 3 وسطاء،
                    والمتقدمة حتى 20 وسيطًا، بينما الخطة
                    غير المحدودة لا تضع حدًا لعدد الوسطاء.
                </p>

            </details>


            <h2 style="margin-top: 50px;">
                العقارات والتعاون
            </h2>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    كيف أبحث عن عقار؟
                </summary>

                <p>
                    يستطيع المشترك استخدام البحث داخل
                    المنصة للوصول إلى العقارات المدرجة
                    وفق المعلومات المتاحة.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    كيف أرسل طلب تعاون؟
                </summary>

                <p>
                    عند العثور على عقار مناسب، يستطيع
                    المكتب إرسال طلب تعاون إلى المكتب
                    صاحب العقار.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    ماذا يحدث بعد قبول طلب التعاون؟
                </summary>

                <p>
                    عند قبول الطلب، تظهر معلومات التواصل
                    الخاصة بالمكتب أو الوسيط وفقًا لآلية
                    عمل المنصة، وبعد ذلك يتم التواصل
                    بين الأطراف خارج SOWLFA.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    هل تتم عملية بيع العقار داخل SOWLFA؟
                </summary>

                <p>
                    لا. SOWLFA ليست منصة لتنفيذ بيع أو
                    شراء العقارات. دورها هو توفير قاعدة
                    البيانات والبحث وطلبات التعاون.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    هل تتم المدفوعات أو إدارة العمولات
                    داخل SOWLFA؟
                </summary>

                <p>
                    لا. لا تتم مدفوعات بيع أو شراء العقارات
                    ولا إدارة أو تقسيم العمولات بين الأطراف
                    داخل المنصة.
                </p>

            </details>


            <h2 style="margin-top: 50px;">
                الحساب والاستخدام
            </h2>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    كيف يمكنني بدء الاشتراك؟
                </summary>

                <p>
                    يمكنك الاطلاع على
                    <a href="{{ url('/subscribe') }}">
                        صفحة الاشتراك
                    </a>
                    لمعرفة خطوات البدء والتواصل معنا.
                </p>

            </details>


            <details
                style="
                    padding: 20px;
                    border: 1px solid #e5e7eb;
                    border-radius: 10px;
                    margin-top: 16px;
                "
            >

                <summary
                    style="
                        cursor: pointer;
                        font-weight: bold;
                    "
                >
                    كيف أتواصل مع SOWLFA؟
                </summary>

                <p>
                    يمكنك استخدام
                    <a href="{{ url('/contact') }}">
                        صفحة تواصل معنا
                    </a>
                    لإرسال استفسارك.
                </p>

            </details>

        </div>

    </div>

</section>


<section
    style="
        padding: 60px 0;
        background: #f5f6f8;
        text-align: center;
    "
>

    <div class="container">

        <h2>
            لم تجد إجابة سؤالك؟
        </h2>

        <p>
            تواصل معنا وسنساعدك في معرفة التفاصيل
            المتعلقة بـ SOWLFA والاشتراك.
        </p>

        <a
            href="{{ url('/contact') }}"
            class="button button-primary"
        >
            تواصل معنا
        </a>

    </div>

</section>

@endsection

