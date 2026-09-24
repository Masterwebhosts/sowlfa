@extends('layouts.app')

@section('content')

<style>
    .search-page {
        padding: 30px;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0 0 8px;
        font-size: 28px;
    }

    .page-header p {
        margin: 0;
        color: #666;
    }

    .search-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
    }

    .search-form {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 7px;
        font-weight: 600;
    }

    .form-group input,
    .form-group select {
        padding: 11px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        background: #fff;
    }

    .search-actions {
        display: flex;
        align-items: end;
        gap: 10px;
    }

    .search-button,
    .all-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 20px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .search-button {
        background: #111827;
        color: #fff;
    }

    .all-button {
        background: #e5e7eb;
        color: #111827;
    }

    .results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .results-header h2 {
        margin: 0;
        font-size: 21px;
    }

    .results-count {
        color: #666;
        font-size: 14px;
    }

    .properties-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .property-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        display: flex;
        flex-direction: column;
    }

    .property-title {
        margin: 0 0 10px;
        font-size: 19px;
    }

    .property-office {
        margin-bottom: 15px;
        color: #666;
        font-size: 14px;
    }

    .property-info {
        display: grid;
        gap: 8px;
        margin-bottom: 18px;
        font-size: 14px;
    }

    .property-info-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .property-info-row span:first-child {
        color: #777;
    }

    .property-price {
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .property-status {
        display: inline-block;
        width: fit-content;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        margin-bottom: 18px;
    }

    .status-available {
        background: #dcfce7;
        color: #166534;
    }

    .status-sold {
        background: #fee2e2;
        color: #991b1b;
    }

    .status-rented {
        background: #fef3c7;
        color: #92400e;
    }

    .property-actions {
        display: flex;
        gap: 10px;
        margin-top: auto;
    }

    .view-button,
    .delete-button {
        flex: 1;
        text-align: center;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 14px;
    }

    .view-button {
        background: #111827;
        color: #fff;
        text-decoration: none;
    }

    .delete-button {
        background: #dc2626;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .empty-results {
        background: #fff;
        padding: 40px;
        text-align: center;
        border-radius: 12px;
        color: #666;
    }

    .pagination-wrapper {
        margin-top: 30px;
    }

    @media (max-width: 1000px) {
        .search-form {
            grid-template-columns: repeat(2, 1fr);
        }

        .properties-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 650px) {
        .search-page {
            padding: 15px;
        }

        .search-form,
        .properties-grid {
            grid-template-columns: 1fr;
        }

        .results-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
    }
</style>

<div class="search-page">

    <div class="page-header">
        <h1>البحث عن عقار</h1>
        <p>
            ابحث في عقارات منصة SOWLFA من جميع المكاتب
        </p>
    </div>

    {{-- Search Filters --}}
    <div class="search-card">

        <form
            action="{{ route('properties.search') }}"
            method="GET"
            class="search-form"
        >

            {{-- Property Type --}}
            <div class="form-group">
                <label for="property_type">
                    نوع العقار
                </label>

                <select
                    name="property_type"
                    id="property_type"
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
                        value="منزل"
                        @selected(request('property_type') === 'منزل')
                    >
                        منزل
                    </option>

                    <option
                        value="مكتب"
                        @selected(request('property_type') === 'مكتب')
                    >
                        مكتب
                    </option>

                    <option
                        value="محل"
                        @selected(request('property_type') === 'محل')
                    >
                        محل
                    </option>

                    <option
                        value="أرض"
                        @selected(request('property_type') === 'أرض')
                    >
                        أرض
                    </option>
                </select>
            </div>

            {{-- Listing Type --}}
            <div class="form-group">
                <label for="listing_type">
                    نوع العرض
                </label>

                <select
                    name="listing_type"
                    id="listing_type"
                >
                    <option value="">
                        بيع أو إيجار
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
                </select>
            </div>

            {{-- Country --}}
            <div class="form-group">
                <label for="country">
                    الدولة
                </label>

                <input
                    type="text"
                    name="country"
                    id="country"
                    value="{{ request('country') }}"
                    placeholder="مثال: سوريا"
                >
            </div>

            {{-- City --}}
            <div class="form-group">
                <label for="city">
                    المدينة
                </label>

                <input
                    type="text"
                    name="city"
                    id="city"
                    value="{{ request('city') }}"
                    placeholder="مثال: حلب"
                >
            </div>

            {{-- Minimum Price --}}
            <div class="form-group">
                <label for="price_min">
                    السعر من
                </label>

                <input
                    type="number"
                    name="price_min"
                    id="price_min"
                    value="{{ request('price_min') }}"
                    min="0"
                    step="0.01"
                    placeholder="الحد الأدنى"
                >
            </div>

            {{-- Maximum Price --}}
            <div class="form-group">
                <label for="price_max">
                    السعر إلى
                </label>

                <input
                    type="number"
                    name="price_max"
                    id="price_max"
                    value="{{ request('price_max') }}"
                    min="0"
                    step="0.01"
                    placeholder="الحد الأعلى"
                >
            </div>

            {{-- Actions --}}
            <div class="search-actions">

                <button
                    type="submit"
                    class="search-button"
                >
                    بحث
                </button>

                <a
                    href="{{ route('properties.search') }}"
                    class="all-button"
                >
                    عرض جميع العقارات
                </a>

            </div>

        </form>

    </div>

    {{-- Results --}}
    <div class="results-header">

        <h2>
            نتائج البحث
        </h2>

        <div class="results-count">
            عدد النتائج:
            {{ $properties->total() }}
        </div>

    </div>

    @if($properties->count())

        <div class="properties-grid">

            @foreach($properties as $property)

                <div class="property-card">

                    <h3 class="property-title">
                        {{ $property->title }}
                    </h3>

                    {{-- Office --}}
                    <div class="property-office">
                        المكتب:
                        <strong>
                            {{ $property->office?->name ?? 'غير محدد' }}
                        </strong>
                    </div>

                    {{-- Price --}}
                    <div class="property-price">
                        {{ number_format((float) $property->price, 2) }}
                        {{ $property->currency }}
                    </div>

                    {{-- Status --}}
                    @if($property->status === 'available')

                        <span class="property-status status-available">
                            متاح
                        </span>

                    @elseif($property->status === 'sold')

                        <span class="property-status status-sold">
                            مباع
                        </span>

                    @elseif($property->status === 'rented')

                        <span class="property-status status-rented">
                            مؤجر
                        </span>

                    @else

                        <span class="property-status">
                            {{ $property->status }}
                        </span>

                    @endif

                    {{-- Property Information --}}
                    <div class="property-info">

                        <div class="property-info-row">
                            <span>نوع العقار:</span>
                            <strong>
                                {{ $property->property_type }}
                            </strong>
                        </div>

                        <div class="property-info-row">
                            <span>نوع العرض:</span>
                            <strong>
                                {{ $property->listing_type }}
                            </strong>
                        </div>

                        @if($property->country || $property->city)

                            <div class="property-info-row">
                                <span>الموقع:</span>

                                <strong>
                                    {{ $property->country }}

                                    @if($property->country && $property->city)
                                        -
                                    @endif

                                    {{ $property->city }}
                                </strong>
                            </div>

                        @endif

                        @if($property->agent)

                            <div class="property-info-row">
                                <span>الوسيط:</span>

                                <strong>
                                    {{ $property->agent->name }}
                                </strong>
                            </div>

                        @endif

                        @if($property->bedrooms !== null)

                            <div class="property-info-row">
                                <span>غرف النوم:</span>

                                <strong>
                                    {{ $property->bedrooms }}
                                </strong>
                            </div>

                        @endif

                        @if($property->bathrooms !== null)

                            <div class="property-info-row">
                                <span>الحمامات:</span>

                                <strong>
                                    {{ $property->bathrooms }}
                                </strong>
                            </div>

                        @endif

                        @if($property->area !== null)

                            <div class="property-info-row">
                                <span>المساحة:</span>

                                <strong>
                                    {{ $property->area }}
                                </strong>
                            </div>

                        @endif

                    </div>

                    {{-- Actions --}}
                    <div class="property-actions">

                        {{-- View --}}
                        <a
                            href="{{ route('properties.show', $property) }}"
                            class="view-button"
                        >
                            عرض العقار
                        </a>

                        {{-- Delete --}}
                        @if(
                            auth()->user()->role === 'admin'
                            || $property->office_id === auth()->user()->office_id
                        )

                            <form
                                action="{{ route('properties.destroy', $property) }}"
                                method="POST"
                                style="flex: 1;"
                                onsubmit="return confirm('هل أنت متأكد من حذف هذا العقار؟');"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                    style="width: 100%;"
                                >
                                    حذف العقار
                                </button>
                            </form>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Pagination --}}
        <div class="pagination-wrapper">
            {{ $properties->links() }}
        </div>

    @else

        <div class="empty-results">
            لا توجد عقارات مطابقة لمعايير البحث.
        </div>

    @endif

</div>

@endsection