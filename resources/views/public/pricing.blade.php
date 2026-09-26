@extends('public.layouts.app')

@section(
    'title',
    'أسعار SOWLFA | خطط الاشتراك للمكاتب العقارية'
)

@section(
    'meta_description',
    'تعرف على خطط اشتراك SOWLFA للمكاتب العقارية: الخطة الأساسية والمتقدمة والذهبية، مع حدود الوسطاء لكل خطة.'
)

@section(
    'og_title',
    'أسعار SOWLFA'
)

@section(
    'og_description',
    'اختر خطة الاشتراك المناسبة لمكتبك واستخدم SOWLFA للبحث عن العقارات والتعاون بين المكاتب.'
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
            أسعار SOWLFA
        </h1>

        <p
            style="
                max-width: 750px;
                margin: 18px auto 0;
                font-size: 19px;
                color: #555;
            "
        >
            اختر خطة الاشتراك المناسبة لمكتبك واستفد من
            خدمات SOWLFA للتعاون العقاري بين المكاتب والوسطاء.
        </p>

    </div>
</section>


<section
    style="
        padding: 60px 0;
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
                    minmax(250px, 1fr)
                );
                gap: 24px;
                margin-top: 35px;
            "
        >

            @forelse ($plans as $plan)

                <article
                    style="
                        padding: 30px;
                        border: 1px solid #e5e7eb;
                        border-radius: 12px;
                        background: #ffffff;
                        text-align: center;
                    "
                >

                    <h3>
                        {{ $plan->name }}
                    </h3>

                    <p
                        style="
                            font-size: 36px;
                            font-weight: bold;
                            margin: 20px 0 5px;
                        "
                    >
                        @if ((float) $plan->price <= 0)
                            مجانية
                        @else
                            ${{ number_format((float) $plan->price, 2) }}

                        @endif
                    </p>

                    @if ((float) $plan->price > 0)
                        <p>
                            / شهر
                        </p>
                    @endif

                    <hr
                        style="
                            border: 0;
                            border-top: 1px solid #e5e7eb;
                            margin: 24px 0;
                        "
                    >

                    <p>
                        @if (is_null($plan->max_agents))
                            وسطاء غير محدودين
                        @elseif ((int) $plan->max_agents === 0)
                            بدون وسطاء
                        @elseif ((int) $plan->max_agents === 1)
                            وسيط واحد
                        @elseif ((int) $plan->max_agents === 2)
                            وسيطان
                        @else
                            حتى {{ $plan->max_agents }} وسطاء
                        @endif
                    </p>

                    <p>
                        الوصول إلى قاعدة البيانات العقارية
                    </p>

                    <p>
                        البحث عن العقارات
                    </p>

                    <p>
                        إرسال واستقبال طلبات التعاون
                    </p>

                    <a
                        href="{{ url('/subscribe') }}"
                        class="button button-primary"
                        style="
                            width: 100%;
                            margin-top: 20px;
                        "
                    >
                        ابدأ الاشتراك
                    </a>

                </article>

            @empty

                <p style="text-align: center;">
                    لا توجد خطط اشتراك متاحة حاليًا.
                </p>

            @endforelse

        </div>

    </div>
</section>


<section
    style="
        padding: 50px 0;
        background: #f5f6f8;
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
                ماذا يشمل الاشتراك؟
            </h2>

            <p>
                يتيح اشتراك SOWLFA للمكتب استخدام المنصة
                للوصول إلى قاعدة البيانات العقارية والبحث
                عن العقارات وإرسال واستقبال طلبات التعاون.
            </p>

            <p>
                يحدد كل اشتراك الحد الأقصى لعدد الوسطاء
                الذين يمكن للمكتب إضافتهم وفقًا للخطة المختارة.
            </p>

            <p>
                لا تشمل SOWLFA تنفيذ عمليات بيع أو شراء
                العقارات أو معالجة المدفوعات أو إدارة العمولات.
            </p>

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
            هل تريد معرفة طريقة عمل المنصة؟
        </h2>

        <p>
            تعرف على خطوات استخدام SOWLFA من التسجيل
            وحتى التعاون بين المكاتب.
        </p>

        <a
            href="{{ url('/how-it-works') }}"
            class="button button-primary"
        >
            كيف تعمل SOWLFA؟
        </a>

    </div>
</section>

@endsection