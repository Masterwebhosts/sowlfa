@extends('admin.layouts.app')

@section('title', 'المستخدمون - SOWLFA')

@section('content')

<style>

    .page-header {
        background: white;
        padding: 24px;
        border-radius: 12px;
        margin-bottom: 20px;

        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .page-header h1 {
        margin: 0;
    }

    .create-button {
        display: inline-block;
        background: #198754;
        color: white;
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
    }

    .card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        overflow-x: auto;
    }

    .success {
        background: #e8f7e8;
        color: #187a18;
        padding: 14px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .errors {
        background: #fff0f0;
        color: #a00;
        padding: 14px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .errors ul {
        margin: 0;
        padding-right: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }

    th,
    td {
        padding: 14px;
        text-align: right;
        border-bottom: 1px solid #eee;
    }

    th {
        background: #f8f8f8;
    }

    .badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 13px;
    }

    .badge-admin {
        background: #222;
        color: white;
    }

    .badge-subscriber {
        background: #e9f5ff;
        color: #1261a0;
    }

    .badge-active {
        background: #e8f7e8;
        color: #187a18;
    }

    .badge-suspended {
        background: #fff0f0;
        color: #a00;
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .action-form {
        margin: 0;
    }

    .action-button {
        border: none;
        background: #222;
        color: white;
        padding: 7px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
    }

    .edit-button {
        display: inline-block;
        background: #eee;
        color: #222;
        text-decoration: none;
        padding: 7px 12px;
        border-radius: 6px;
        font-size: 13px;
    }

    .empty {
        text-align: center;
        color: #777;
        padding: 30px;
    }

</style>


<div class="page-header">

    <h1>
        المستخدمون
    </h1>

    <a
        href="{{ route('admin.users.create') }}"
        class="create-button"
    >
        + إنشاء مستخدم
    </a>

</div>


@if(session('success'))

    <div class="success">
        {{ session('success') }}
    </div>

@endif


@if($errors->any())

    <div class="errors">

        <ul>

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<div class="card">

    @if($users->count())

        <table>

            <thead>

                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>المكتب</th>
                    <th>الدور</th>
                    <th>الحالة</th>
                    <th>تاريخ الإنشاء</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            {{ $user->office?->name ?? 'بدون مكتب' }}
                        </td>

                        <td>

                            @if($user->role === 'admin')

                                <span class="badge badge-admin">
                                    مدير
                                </span>

                            @else

                                <span class="badge badge-subscriber">
                                    مشترك
                                </span>

                            @endif

                        </td>

                        <td>

                            @if($user->status === 'active')

                                <span class="badge badge-active">
                                    نشط
                                </span>

                            @else

                                <span class="badge badge-suspended">
                                    موقوف
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $user->created_at->format('Y-m-d') }}
                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('admin.users.edit', $user) }}"
                                    class="edit-button"
                                >
                                    تعديل
                                </a>

                                <form
    method="POST"
    action="{{ route('admin.users.destroy', $user) }}"
    class="action-form"
    onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');"
>

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="action-button"
        style="background: #8b0000;"
    >
        حذف
    </button>

</form>

                                @if($user->role !== 'admin')

                                    <form
                                        method="POST"
                                        action="{{ route('admin.users.update-status', $user) }}"
                                        class="action-form"
                                    >

                                        @csrf
                                        @method('PUT')

                                        @if($user->status === 'active')

                                            <input
                                                type="hidden"
                                                name="status"
                                                value="suspended"
                                            >

                                            <button
                                                type="submit"
                                                class="action-button"
                                            >
                                                إيقاف
                                            </button>

                                        @else

                                            <input
                                                type="hidden"
                                                name="status"
                                                value="active"
                                            >

                                            <button
                                                type="submit"
                                                class="action-button"
                                            >
                                                تفعيل
                                            </button>

                                        @endif

                                    </form>

                                @endif

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="empty">
            لا يوجد مستخدمون.
        </div>

    @endif

</div>

@endsection