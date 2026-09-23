@extends('admin.layouts.app')

@section('title', 'تعديل المكتب')

@section('content')

<div class="admin-page">

    <div class="admin-page-header">

        <h1 class="admin-page-title">
            تعديل المكتب
        </h1>

        <p class="admin-page-description">
            تعديل بيانات المكتب: {{ $office->name }}
        </p>

    </div>


    <div class="admin-card">

        <form
            method="POST"
            action="{{ route('admin.offices.update', $office) }}"
            class="admin-form"
        >

            @csrf

            @method('PUT')


            <div class="form-group">

                <label
                    for="name"
                    class="form-label"
                >
                    اسم المكتب
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', $office->name) }}"
                    required
                    class="form-input"
                >

                @error('name')
                    <p class="form-error">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="form-grid">

                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        البريد الإلكتروني
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $office->email) }}"
                        class="form-input"
                    >

                    @error('email')
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <div class="form-group">

                    <label
                        for="phone"
                        class="form-label"
                    >
                        الهاتف
                    </label>

                    <input
                        id="phone"
                        name="phone"
                        type="text"
                        value="{{ old('phone', $office->phone) }}"
                        class="form-input"
                    >

                    @error('phone')
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            <div class="form-group">

                <label
                    for="address"
                    class="form-label"
                >
                    العنوان
                </label>

                <input
                    id="address"
                    name="address"
                    type="text"
                    value="{{ old('address', $office->address) }}"
                    class="form-input"
                >

                @error('address')
                    <p class="form-error">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="form-grid">

                <div class="form-group">

                    <label
                        for="city"
                        class="form-label"
                    >
                        المدينة
                    </label>

                    <input
                        id="city"
                        name="city"
                        type="text"
                        value="{{ old('city', $office->city) }}"
                        class="form-input"
                    >

                    @error('city')
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <div class="form-group">

                    <label
                        for="country"
                        class="form-label"
                    >
                        الدولة
                    </label>

                    <input
                        id="country"
                        name="country"
                        type="text"
                        value="{{ old('country', $office->country) }}"
                        class="form-input"
                    >

                    @error('country')
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            <div class="form-group">

                <label
                    for="status"
                    class="form-label"
                >
                    الحالة
                </label>

                <select
                    id="status"
                    name="status"
                    class="form-select"
                    required
                >

                    <option
                        value="active"
                        @selected(old('status', $office->status) === 'active')
                    >
                        نشط
                    </option>

                    <option
                        value="inactive"
                        @selected(old('status', $office->status) === 'inactive')
                    >
                        غير نشط
                    </option>

                </select>

                @error('status')
                    <p class="form-error">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="admin-actions">

                <a
                    href="{{ route('admin.offices.index') }}"
                    class="admin-button admin-button-secondary"
                >
                    إلغاء
                </a>

                <button
                    type="submit"
                    class="admin-button admin-button-primary"
                >
                    حفظ التعديلات
                </button>

            </div>

        </form>

    </div>

</div>

@endsection