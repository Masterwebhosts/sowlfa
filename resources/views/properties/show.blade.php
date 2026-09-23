@extends('layouts.app')

@section('title', $property->title . ' - SOWLFA')

@section('content')

<style>

    .page-header {
        margin-bottom: 20px;
    }

    .page-header h1 {
        margin: 0;
    }

    .property-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    }

    .success {
        margin-bottom: 20px;
        padding: 12px 15px;
        background: #dcfce7;
        color: #166534;
        border-radius: 8px;
    }

    .info {
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .label {
        font-weight: 600;
    }

    .description {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #eeeeee;
        line-height: 1.8;
    }

    .description p {
        white-space: pre-line;
    }
```css
.status {
    display: inline-block;
    margin-top: 10px;
    padding: 6px 12px;
    background: #e5e7eb;
    border-radius: 20px;
    font-size: 14px;
}

.actions {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 20px;
}

.back,
.contact,
.whatsapp {
    display: inline-block;
    padding: 10px 16px;
    border-radius: 8px;
    font-family: inherit;
    font-size: 14px;
    text-decoration: none;
    cursor: pointer;
}

.back {
    background: #e5e7eb;
    color: #111827;
}

.contact {
    background: #111827;
    color: #ffffff;
}

.whatsapp {
    background: #25d366;
    color: #ffffff;
}
```


</style>

<div class="page-header">

    <h1>
        تفاصيل العقار
    </h1>

</div>

<div class="property-card">

    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

    <h2>
        {{ $property->title }}
    </h2>

    @if ($property->office)

        <div class="info">

            <span class="label">
                المكتب:
            </span>

            {{ $property->office->name }}

        </div>

    @endif

    @if ($property->agent)

        <div class="info">

            <span class="label">
                الوسيط:
            </span>

            {{ $property->agent->name }}

        </div>

    @endif

    @if ($property->property_type)

        <div class="info">

            <span class="label">
                نوع العقار:
            </span>

            {{ $property->property_type }}

        </div>

    @endif

    @if ($property->listing_type)

        <div class="info">

            <span class="label">
                نوع العملية:
            </span>

            {{ $property->listing_type }}

        </div>

    @endif

    @if ($property->price !== null)

        <div class="info">

            <span class="label">
                السعر:
            </span>

            {{ $property->price }}
            {{ $property->currency }}

        </div>

    @endif

    @if ($property->country || $property->city)

        <div class="info">

            <span class="label">
                الموقع:
            </span>

            {{ $property->city }}

            @if ($property->city && $property->country)
                ,
            @endif

            {{ $property->country }}

        </div>

    @endif

    @if ($property->address)

        <div class="info">

            <span class="label">
                العنوان:
            </span>

            {{ $property->address }}

        </div>

    @endif

    @if ($property->bedrooms !== null)

        <div class="info">

            <span class="label">
                غرف النوم:
            </span>

            {{ $property->bedrooms }}

        </div>

    @endif

    @if ($property->bathrooms !== null)

        <div class="info">

            <span class="label">
                الحمامات:
            </span>

            {{ $property->bathrooms }}

        </div>

    @endif

    @if ($property->area !== null)

        <div class="info">

            <span class="label">
                المساحة:
            </span>

            {{ $property->area }}

        </div>

    @endif

    @if ($property->description)

        <div class="description">

            <div class="label">
                الوصف:
            </div>

            <p>
                {{ $property->description }}
            </p>

        </div>

    @endif

    <div>

        <span class="status">

            @if ($property->status === 'available')

                متاح

            @elseif ($property->status === 'sold')

                مباع

            @elseif ($property->status === 'rented')

                مؤجر

            @else

                {{ $property->status }}

            @endif

        </span>

    </div>

<div class="actions">

    @if ($property->office && $property->office->phone)

        <a
            href="tel:{{ $property->office->phone }}"
            class="contact"
        >
            📞 الاتصال بالمكتب
        </a>

        <a
            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $property->office->phone) }}"
            class="whatsapp"
            target="_blank"
            rel="noopener"
        >
            💬 واتساب
        </a>

    @endif

    <a
        href="{{ route('properties.index') }}"
        class="back"
    >
        العودة إلى العقارات
    </a>

</div>
```


</div>

</div>

@endsection

