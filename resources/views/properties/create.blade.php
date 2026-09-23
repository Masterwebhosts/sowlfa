@extends('layouts.app')

@section('title', 'إضافة عقار - SOWLFA')

@section('content')

<style>

    .page-header {
        margin-bottom: 20px;
    }

    .page-header h1 {
        margin: 0;
    }

    .card {
        background: #ffffff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .errors {
        margin-bottom: 20px;
        padding: 15px 18px;
        background: #fee2e2;
        color: #991b1b;
        border-radius: 8px;
    }

    .errors p {
        margin: 5px 0;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    label {
        font-weight: 600;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        background: #ffffff;
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #111827;
    }

    .form-actions {
        margin-top: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .submit-button,
    .back-button {
        display: inline-block;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-family: inherit;
        font-size: 14px;
        cursor: pointer;
    }

    .submit-button {
        border: none;
        background: #111827;
        color: #ffffff;
    }

    .back-button {
        background: #e5e7eb;
        color: #111827;
    }

    @media (max-width: 700px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

    }

</style>


<div class="page-header">

    <h1>
        إضافة عقار جديد
    </h1>

</div>


@if ($errors->any())

    <div class="errors">

        @foreach ($errors->all() as $error)

            <p>
                {{ $error }}
            </p>

        @endforeach

    </div>

@endif


<div class="card">

    <form
        method="POST"
        action="{{ route('properties.store') }}"
    >

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label for="agent_id">
                    الوسيط
                </label>

                <select
                    id="agent_id"
                    name="agent_id"
                >

                    <option value="">
                        بدون وسيط
                    </option>

                    @foreach ($agents as $agent)

                        <option
                            value="{{ $agent->id }}"
                            @selected(old('agent_id') == $agent->id)
                        >
                            {{ $agent->name }}
                            - {{ $agent->office?->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="form-group full">

                <label for="title">
                    عنوان العقار
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                >

            </div>


            <div class="form-group full">

                <label for="description">
                    الوصف
                </label>

                <textarea
                    id="description"
                    name="description"
                >{{ old('description') }}</textarea>

            </div>


            <div class="form-group">

                <label for="property_type">
                    نوع العقار
                </label>

                <select
                    id="property_type"
                    name="property_type"
                    required
                >

                    <option value="">
                        اختر النوع
                    </option>

                    <option
                        value="شقة"
                        @selected(old('property_type') == 'شقة')
                    >
                        شقة
                    </option>

                    <option
                        value="فيلا"
                        @selected(old('property_type') == 'فيلا')
                    >
                        فيلا
                    </option>

                    <option
                        value="أرض"
                        @selected(old('property_type') == 'أرض')
                    >
                        أرض
                    </option>

                    <option
                        value="مكتب"
                        @selected(old('property_type') == 'مكتب')
                    >
                        مكتب
                    </option>

                    <option
                        value="محل تجاري"
                        @selected(old('property_type') == 'محل تجاري')
                    >
                        محل تجاري
                    </option>

                    <option
                        value="مستودع"
                        @selected(old('property_type') == 'مستودع')
                    >
                        مستودع
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label for="listing_type">
                    نوع العملية
                </label>

                <select
                    id="listing_type"
                    name="listing_type"
                    required
                >

                    <option value="">
                        بيع أو إيجار
                    </option>

                    <option
                        value="للبيع"
                        @selected(old('listing_type') == 'للبيع')
                    >
                        للبيع
                    </option>

                    <option
                        value="للإيجار"
                        @selected(old('listing_type') == 'للإيجار')
                    >
                        للإيجار
                    </option>

                    <option
                        value="رهن"
                        @selected(old('listing_type') == 'رهن')
                    >
                        رهن
                    </option>

                    <option
                        value="استثمار"
                        @selected(old('listing_type') == 'استثمار')
                    >
                        استثمار
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label for="price">
                    السعر
                </label>

                <input
                    type="number"
                    step="0.01"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    required
                >

            </div>


            <div class="form-group">

                <label for="currency">
                    العملة
                </label>

                <input
                    type="text"
                    id="currency"
                    name="currency"
                    value="{{ old('currency', 'USD') }}"
                    maxlength="3"
                    required
                >

            </div>


            <div class="form-group">

                <label for="country">
                    الدولة
                </label>

                <input
                    type="text"
                    id="country"
                    name="country"
                    value="{{ old('country') }}"
                >

            </div>


            
           <div class="form-group">

    <label for="city">
        المدينة
    </label>

    <input
        type="text"
        id="city"
        name="city"
        value="{{ old('city') }}"
        placeholder="اكتب اسم المدينة"
    >

</div>


            <div class="form-group full">

                <label for="address">
                    العنوان
                </label>

                <input
                    type="text"
                    id="address"
                    name="address"
                    value="{{ old('address') }}"
                >

            </div>


            <div class="form-group">

                <label for="bedrooms">
                    غرف النوم
                </label>

                <input
                    type="number"
                    min="0"
                    id="bedrooms"
                    name="bedrooms"
                    value="{{ old('bedrooms') }}"
                >

            </div>


            <div class="form-group">

                <label for="bathrooms">
                    الحمامات
                </label>

                <input
                    type="number"
                    min="0"
                    id="bathrooms"
                    name="bathrooms"
                    value="{{ old('bathrooms') }}"
                >

            </div>


            <div class="form-group">

                <label for="area">
                    المساحة
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    id="area"
                    name="area"
                    value="{{ old('area') }}"
                >

            </div>

        </div>


        <div class="form-actions">

            <button
                type="submit"
                class="submit-button"
            >
                إنشاء العقار
            </button>

            <a
                href="{{ route('properties.index') }}"
                class="back-button"
            >
                العودة إلى العقارات
            </a>

        </div>

    </form>

</div>

@endsection