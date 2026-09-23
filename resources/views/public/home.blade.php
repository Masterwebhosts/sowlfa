@extends('public.layouts.app')

@section('title', 'SOWLFA | منصة التعاون العقاري للمكاتب والوسطاء')

@section(
    'meta_description',
    'SOWLFA منصة B2B للمكاتب والوسطاء العقاريين للبحث عن العقارات والتعاون بين المكاتب من خلال قاعدة بيانات عقارية موحدة.'
)

@section('content')

<section
    style="
        padding: 80px 0;
        text-align: center;
    "
>

    <div class="public-container">

        <h1>
            SOWLFA
        </h1>

        <p>
            منصة B2B للتعاون بين المكاتب والوسطاء العقاريين
        </p>

        <p>
            قاعدة بيانات عقارية موحدة، بحث عن العقارات،
            وطلبات تعاون بين المكاتب.
        </p>

        <div
            style="
                margin-top: 24px;
                display: flex;
                justify-content: center;
                gap: 10px;
                flex-wrap: wrap;
            "
        >

            <a
                href="{{ url('/pricing') }}"
                class="public-button public-button-primary"
            >
                عرض الأسعار
            </a>

            <a
                href="{{ route('login') }}"
                class="public-button public-button-secondary"
            >
                تسجيل الدخول
            </a>

        </div>

    </div>

</section>

@endsection

