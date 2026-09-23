@extends('offices.layout')

@section('title', 'المكاتب العقارية')

@section('description', 'تصفح المكاتب العقارية المسجلة على منصة Sowlfa وتعرّف على العقارات المتاحة لديها.')

@section('content')

<section class="office-hero">
    <div class="office-hero-inner">

        <div class="office-eyebrow">
            🏢 مكاتب عقارية موثوقة
        </div>

        <h1>
            اكتشف المكاتب العقارية
            <br>
            وتعرّف على عروضها
        </h1>

        <p>
            تصفح المكاتب العقارية الموجودة على Sowlfa،
            واستكشف العقارات التي تقدمها وتواصل معها مباشرة.
        </p>

    </div>
</section>

<main class="office-container">

    <div class="office-section-head">
        <div>
            <h2>المكاتب المتاحة</h2>

            <p>
                {{ $offices->count() }}
                {{ $offices->count() === 1 ? 'مكتب عقاري' : 'مكاتب عقارية' }}
                مسجلة على المنصة
            </p>
        </div>
    </div>

    @if($offices->isEmpty())

        <div class="office-empty">

            <div class="office-empty-icon">
                🏢
            </div>

            <h3>لا توجد مكاتب متاحة حاليًا</h3>

            <p>
                لم يتم العثور على مكاتب عقارية نشطة في الوقت الحالي.
            </p>

        </div>

    @else

        <div class="office-grid">

            @foreach($offices as $office)

                <article class="office-card">

                    <div class="office-card-top">

                        <div class="office-icon">
                            🏢
                        </div>

                    </div>

                    <div class="office-card-body">

                        <h3>
                            {{ $office->name }}
                        </h3>

                        <div class="office-meta">

                            @if($office->city || $office->country)
                                <div class="office-meta-row">
                                    <span>📍</span>

                                    <span>
                                        {{ $office->city }}

                                        @if($office->city && $office->country)
                                            ،
                                        @endif

                                        {{ $office->country }}
                                    </span>
                                </div>
                            @endif

                            @if($office->address)
                                <div class="office-meta-row">
                                    <span>🏠</span>
                                    <span>{{ $office->address }}</span>
                                </div>
                            @endif

                            @if($office->phone)
                                <div class="office-meta-row">
                                    <span>📞</span>
                                    <span dir="ltr">{{ $office->phone }}</span>
                                </div>
                            @endif

                        </div>

                        <div class="office-property-count">

                            <strong>
                                {{ $office->properties_count }}
                                {{ $office->properties_count === 1 ? 'عقار متاح' : 'عقارات متاحة' }}
                            </strong>

                            <a
                                href="{{ route('offices.show', $office) }}"
                                class="office-view-btn"
                            >
                                عرض المكتب
                                <span>←</span>
                            </a>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    @endif

</main>

@endsection