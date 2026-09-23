@extends('admin.layouts.app')

@section('title', 'المكاتب')

@section('content')

<div class="admin-page">

    <div
        class="admin-page-header"
        style="display: flex; align-items: center; justify-content: space-between; gap: 20px;"
    >

        <div>
            <h1 class="admin-page-title">
                المكاتب
            </h1>

            <p class="admin-page-description">
                إدارة مكاتب SOWLFA
            </p>
        </div>

        <a
            href="{{ route('admin.offices.create') }}"
            class="admin-button admin-button-primary"
        >
            إنشاء مكتب
        </a>

    </div>


    @if(session('success'))

        <div class="admin-alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="admin-table-wrapper">

        @if($offices->count())

            <div style="overflow-x: auto;">

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>
                                المكتب
                            </th>

                            <th>
                                المدينة
                            </th>

                            <th>
                                المستخدمون
                            </th>

                            <th>
                                الوسطاء
                            </th>

                            <th>
                                العقارات
                            </th>

                            <th>
                                الاشتراكات
                            </th>

                            <th>
                                الحالة
                            </th>

                            <th>
                                الإجراءات
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($offices as $office)

                            <tr>

                                <td>

                                    <div style="font-weight: 600; color: #111827;">
                                        {{ $office->name }}
                                    </div>

                                    @if($office->email)

                                        <div style="margin-top: 4px; color: #6b7280; font-size: 13px;">
                                            {{ $office->email }}
                                        </div>

                                    @endif

                                </td>


                                <td>
                                    {{ $office->city ?: '—' }}
                                </td>


                                <td>
                                    {{ $office->users_count }}
                                </td>


                                <td>
                                    {{ $office->agents_count }}
                                </td>


                                <td>
                                    {{ $office->properties_count }}
                                </td>


                                <td>
                                    {{ $office->subscriptions_count }}
                                </td>


                                <td>

                                    @if($office->status === 'active')

                                        <span class="admin-badge admin-badge-success">
                                            نشط
                                        </span>

                                    @else

                                        <span class="admin-badge admin-badge-neutral">
                                            {{ $office->status ?: 'غير محدد' }}
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <div
                                        style="
                                            display: flex;
                                            align-items: center;
                                            gap: 8px;
                                            white-space: nowrap;
                                        "
                                    >

                                        <a
                                            href="{{ route('admin.offices.edit', $office) }}"
                                            class="admin-button admin-button-secondary"
                                            style="min-height: 36px; padding: 7px 12px; font-size: 13px;"
                                        >
                                            تعديل
                                        </a>


                                        <form
                                            method="POST"
                                            action="{{ route('admin.offices.destroy', $office) }}"
                                            onsubmit="return confirm('هل أنت متأكد من حذف هذا المكتب؟');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="admin-button"
                                                style="
                                                    min-height: 36px;
                                                    padding: 7px 12px;
                                                    font-size: 13px;
                                                    background: #8b0000;
                                                    color: #fff;
                                                "
                                            >
                                                حذف
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div style="padding: 40px 24px; text-align: center;">

                <p style="margin: 0; color: #6b7280; font-size: 14px;">
                    لا توجد مكاتب حاليًا.
                </p>

                <a
                    href="{{ route('admin.offices.create') }}"
                    class="admin-button admin-button-primary"
                    style="margin-top: 16px;"
                >
                    إنشاء أول مكتب
                </a>

            </div>

        @endif

    </div>

</div>

@endsection