@extends('layouts.app')

@section('title', 'البحث عن عقار - SOWLFA')

@section('content')

<style>

    .page-header {
        margin-bottom: 20px;
    }

    .page-header h1 {
        margin: 0;
    }

    .search-card {
        background: #ffffff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        margin-bottom: 25px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    label {
        font-weight: 600;
    }

    input,
    select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        background: #ffffff;
        box-sizing: border-box;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #111827;
    }

    .search-actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .search-button,
    .all-button {
        display: inline-block;
        padding: 10px 16px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
    }

    .search-button {
        border: 0;
        background: #111827;
        color: #ffffff;
    }

    .all-button {
        background: #e5e7eb;
        color: #111827;
    }

    .results-title {
        margin-bottom: 15px;
    }

    .properties {
        display: grid;
        grid-template-columns: repeat(
            auto-fill,
            minmax(300px, 1fr)
        );
        gap: 20px;
    }

    .property-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    }

    .property-card h2 {
        margin-top: 0;
        margin-bottom: 18px;
    }

    .info {
        margin: 8px 0;
        line-height: 1.6;
    }

    .label {
        font-weight: 600;
    }

    .status {
        display: inline-block;
        margin-top: 10px;
        padding: 5px 10px;
        background: #e5e7eb;
        border-radius: 20px;
        font-size: 14px;
    }

    .view-button {
        display: inline-block;
        margin-top: 15px;
        padding: 9px 14px;
        background: #111827;
        color: #ffffff;
        text-decoration: none;
        border-radius: 8px;
    }

    .empty {
        padding: 30px;
        text-align: center;
        background: #ffffff;
        border-radius: 12px;
        color: #777;
    }
    
    .pagination {
    grid-column: 1 / -1;
    margin-top: 5px;
    display: flex;
    justify-content: center;
}

    @media (max-width: 700px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

    }

</style>

<div class="page-header">

    <h1>
        البحث عن عقار
    </h1>

</div>

<div class="search-card">

    <form
        method="GET"
        action="{{ route('properties.search') }}"
    >

        <div class="form-grid">

            <div class="field">

                <label for="property_type">
                    نوع العقار
                </label>

                <select
                    id="property_type"
                    name="property_type"
                >

                    <option value="">
                        جميع الأنواع
                    </option>

                    <option
                        value="شقة"
                        @selected(request('property_type') === 'شقة')
                    >
                        شقة
                    </option>

                    <option
                        value="فيلا"
                        @selected(request('property_type') === 'فيلا')
                    >
                        فيلا
                    </option>

                    <option
                        value="أرض"
                        @selected(request('property_type') === 'أرض')
                    >
                        أرض
                    </option>

                    <option
                        value="مكتب"
                        @selected(request('property_type') === 'مكتب')
                    >
                        مكتب
                    </option>

                    <option
                        value="محل تجاري"
                        @selected(request('property_type') === 'محل تجاري')
                    >
                        محل تجاري
                    </option>

                    <option
                        value="مستودع"
                        @selected(request('property_type') === 'مستودع')
                    >
                        مستودع
                    </option>

                </select>

            </div>

            <div class="field">

                <label for="listing_type">
                    نوع العملية
                </label>

                <select
                    id="listing_type"
                    name="listing_type"
                >

                    <option value="">
                        جميع العمليات
                    </option>

                    <option
                        value="للبيع"
                        @selected(request('listing_type') === 'للبيع')
                    >
                        للبيع
                    </option>

                    <option
                        value="للإيجار"
                        @selected(request('listing_type') === 'للإيجار')
                    >
                        للإيجار
                    </option>

                    <option
                        value="رهن"
                        @selected(request('listing_type') === 'رهن')
                    >
                        رهن
                    </option>

                    <option
                        value="استثمار"
                        @selected(request('listing_type') === 'استثمار')
                    >
                        استثمار
                    </option>

                </select>

            </div>

            <div class="field">

                <label for="country">
                    الدولة
                </label>

                <input
                    type="text"
                    id="country"
                    name="country"
                    value="{{ request('country') }}"
                    placeholder="اكتب اسم الدولة"
                >

            </div>

            <div class="field">

                <label for="city">
                    المدينة
                </label>

                <input
                    type="text"
                    id="city"
                    name="city"
                    value="{{ request('city') }}"
                    placeholder="اكتب اسم المدينة"
                >

            </div>

            <div class="field">

                <label for="price_min">
                    السعر من
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    id="price_min"
                    name="price_min"
                    value="{{ request('price_min') }}"
                    placeholder="السعر الأدنى"
                >

            </div>

            <div class="field">

                <label for="price_max">
                    السعر إلى
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    id="price_max"
                    name="price_max"
                    value="{{ request('price_max') }}"
                    placeholder="السعر الأعلى"
                >

            </div>

        </div>

        <div class="search-actions">

            <button
                type="submit"
                class="search-button"
            >
                بحث
            </button>

            <a
                href="{{ route('properties.index') }}"
                class="all-button"
            >
                عرض جميع العقارات
            </a>

        </div>

    </form>

</div>

<h2 class="results-title">
    نتائج البحث
</h2>

@if ($properties->count())

    <div class="properties">

        @foreach ($properties as $property)

            <div class="property-card">

                <h2>
                    {{ $property->title ?? 'عقار' }}
                </h2>

                <div class="info">
                    <span class="label">
                        نوع العملية:
                    </span>

                    {{ $property->listing_type }}
                </div>

                <div class="info">
                    <span class="label">
                        السعر:
                    </span>

                    {{ $property->price }}
                    {{ $property->currency }}
                </div>

                @if ($property->city || $property->country)

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

                <br>

                <a
                    href="{{ route('properties.show', $property) }}"
                    class="view-button"
                >
                    عرض العقار
                </a>

            </div>

        @endforeach

        @if ($properties->hasPages())

            <div class="pagination">
                {{ $properties->links() }}
            </div>

        @endif

    </div>

@elseif (
    request()->filled('property_type')
    || request()->filled('listing_type')
    || request()->filled('country')
    || request()->filled('city')
    || request()->filled('price_min')
    || request()->filled('price_max')
)

    <div class="empty">
        لا توجد عقارات مطابقة لخيارات البحث.
    </div>

@else

    <div class="empty">
        أدخل معايير البحث ثم اضغط على زر «بحث».
    </div>

@endif

@endsection