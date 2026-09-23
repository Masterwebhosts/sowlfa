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
                إدارة مكاتب SOWLFA وروابط المشاركة الخاصة بها
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


    @if(session('office_url'))

        <div
            style="
                margin-bottom: 20px;
                padding: 18px;
                border: 1px solid #dbeafe;
                background: #eff6ff;
                border-radius: 12px;
            "
        >

            <div
                style="
                    font-weight: 700;
                    color: #1e3a8a;
                    margin-bottom: 10px;
                "
            >
                تم إنشاء رابط مشاركة المكتب
            </div>

            <div
                style="
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    flex-wrap: wrap;
                "
            >

                <input
                    id="office-share-url"
                    type="text"
                    value="{{ session('office_url') }}"
                    readonly
                    style="
                        flex: 1;
                        min-width: 280px;
                        height: 40px;
                        padding: 8px 12px;
                        border: 1px solid #bfdbfe;
                        border-radius: 8px;
                        background: #fff;
                        direction: ltr;
                        text-align: left;
                    "
                >

                <button
                    type="button"
                    onclick="copyOfficeUrl()"
                    class="admin-button admin-button-secondary"
                    style="min-height: 40px;"
                >
                    نسخ الرابط
                </button>

                <a
                    href="{{ session('office_url') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="admin-button admin-button-primary"
                    style="min-height: 40px;"
                >
                    فتح الصفحة
                </a>

            </div>

            <div
                id="office-copy-message"
                style="
                    display: none;
                    margin-top: 8px;
                    color: #166534;
                    font-size: 13px;
                "
            >
                تم نسخ الرابط بنجاح.
            </div>

        </div>

    @endif


    <div class="admin-table-wrapper">

        @if($offices->count())

            <div style="overflow-x: auto;">

                <table class="admin-table">

                    <thead>

                        <tr>
                            <th>المكتب</th>
                            <th>المدينة</th>
                            <th>المستخدمون</th>
                            <th>الوسطاء</th>
                            <th>العقارات</th>
                            <th>الاشتراكات</th>
                            <th>الحالة</th>
                            <th>رابط المشاركة</th>
                            <th>الإجراءات</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach($offices as $office)

                            @php
                                $shareUrl = route('offices.show', $office->slug);
                                $shareText = 'اكتشف عروض ' . $office->name . ' على SOWLFA';
                            @endphp

                            <tr>

                                <td>

                                    <div
                                        style="
                                            font-weight: 600;
                                            color: #111827;
                                        "
                                    >
                                        {{ $office->name }}
                                    </div>

                                    @if($office->email)

                                        <div
                                            style="
                                                margin-top: 4px;
                                                color: #6b7280;
                                                font-size: 13px;
                                            "
                                        >
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
                                            flex-wrap: wrap;
                                        "
                                    >

                                        <a
                                            href="{{ $shareUrl }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="admin-button admin-button-secondary"
                                            style="
                                                min-height: 36px;
                                                padding: 7px 12px;
                                                font-size: 13px;
                                            "
                                        >
                                            فتح الرابط
                                        </a>


                                        <button
                                            type="button"
                                            onclick="copyOfficeLink('{{ $shareUrl }}', this)"
                                            class="admin-button admin-button-secondary"
                                            style="
                                                min-height: 36px;
                                                padding: 7px 12px;
                                                font-size: 13px;
                                            "
                                        >
                                            نسخ
                                        </button>


                                        <button
                                            type="button"
                                            onclick="shareOffice('{{ $shareUrl }}', '{{ addslashes($shareText) }}')"
                                            class="admin-button admin-button-primary"
                                            style="
                                                min-height: 36px;
                                                padding: 7px 12px;
                                                font-size: 13px;
                                            "
                                        >
                                            مشاركة
                                        </button>

                                    </div>


                                    <div
                                        style="
                                            margin-top: 6px;
                                            color: #6b7280;
                                            font-size: 12px;
                                            direction: ltr;
                                            text-align: left;
                                            word-break: break-all;
                                        "
                                    >
                                        /offices/{{ $office->slug }}
                                    </div>

                                </td>


                                <td>

                                    <div
                                        style="
                                            display: flex;
                                            align-items: center;
                                            gap: 8px;
                                            flex-wrap: wrap;
                                        "
                                    >

                                        <a
                                            href="{{ route('admin.offices.edit', $office) }}"
                                            class="admin-button admin-button-secondary"
                                            style="
                                                min-height: 36px;
                                                padding: 7px 12px;
                                                font-size: 13px;
                                            "
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

            <div
                style="
                    padding: 40px 24px;
                    text-align: center;
                "
            >

                <p
                    style="
                        margin: 0;
                        color: #6b7280;
                        font-size: 14px;
                    "
                >
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


<script>

    function copyOfficeUrl() {

        const input = document.getElementById('office-share-url');
        const message = document.getElementById('office-copy-message');

        if (!input) {
            return;
        }

        navigator.clipboard.writeText(input.value).then(() => {

            if (!message) {
                return;
            }

            message.style.display = 'block';

            setTimeout(() => {
                message.style.display = 'none';
            }, 2500);

        });

    }


    function copyOfficeLink(url, button) {

        navigator.clipboard.writeText(url).then(() => {

            const originalText = button.innerText;

            button.innerText = 'تم النسخ';

            setTimeout(() => {
                button.innerText = originalText;
            }, 2000);

        });

    }


    async function shareOffice(url, text) {

        if (navigator.share) {

            try {

                await navigator.share({
                    title: 'SOWLFA',
                    text: text,
                    url: url
                });

            } catch (error) {

                // المستخدم أغلق نافذة المشاركة

            }

            return;
        }


        await navigator.clipboard.writeText(url);

        alert('تم نسخ رابط المكتب. يمكنك مشاركته الآن.');

    }

</script>

@endsection

