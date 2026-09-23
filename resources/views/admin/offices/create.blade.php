@extends('admin.layouts.app')

@section('title', 'إنشاء مكتب')

@section('content')

<div class="admin-page">

    <div class="admin-page-header">
        <h1 class="admin-page-title">
            إنشاء مكتب
        </h1>

        <p class="admin-page-description">
            إنشاء مكتب جديد في نظام SOWLFA.
        </p>
    </div>

    <div class="admin-card">

        <form
            method="POST"
            action="{{ route('admin.offices.store') }}"
            class="admin-form"
        >

            @csrf

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
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="form-input"
                    placeholder="أدخل اسم المكتب"
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
                        value="{{ old('email') }}"
                        class="form-input"
                        placeholder="office@example.com"
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
                        value="{{ old('phone') }}"
                        class="form-input"
                        placeholder="رقم الهاتف"
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
                    value="{{ old('address') }}"
                    class="form-input"
                    placeholder="عنوان المكتب"
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
                        value="{{ old('city') }}"
                        class="form-input"
                        placeholder="المدينة"
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
                        value="{{ old('country') }}"
                        class="form-input"
                        placeholder="الدولة"
                    >

                    @error('country')
                        <p class="form-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

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
                    إنشاء المكتب
                </button>

            </div>

        </form>

    </div>

</div>

@endsection