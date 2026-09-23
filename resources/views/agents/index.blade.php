@extends('layouts.app')

@section('title', 'الوسطاء - SOWLFA')

@section('content')

<style>

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0;
    }

    .add-button {
        display: inline-block;
        padding: 10px 16px;
        background: #111827;
        color: #ffffff;
        text-decoration: none;
        border-radius: 8px;
    }

    .success {
        margin-bottom: 20px;
        padding: 12px 15px;
        background: #dcfce7;
        color: #166534;
        border-radius: 8px;
    }

    .agents {
        display: grid;
        grid-template-columns: repeat(
            auto-fill,
            minmax(280px, 1fr)
        );
        gap: 20px;
    }

    .agent-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    }

    .agent-card h2 {
        margin-top: 0;
        margin-bottom: 18px;
    }

    .info {
        margin: 9px 0;
        line-height: 1.6;
    }

    .label {
        font-weight: 600;
    }

    .status {
        display: inline-block;
        margin-top: 5px;
        padding: 5px 10px;
        background: #e5e7eb;
        border-radius: 20px;
        font-size: 14px;
    }

    .empty {
        padding: 30px;
        text-align: center;
        background: #ffffff;
        border-radius: 12px;
        color: #777;
    }

    @media (max-width: 700px) {

        .page-header {
            flex-direction: column;
            align-items: stretch;
        }

        .add-button {
            text-align: center;
        }

    }

</style>

<div class="page-header">

    <h1>
        وسطاء SOWLFA
    </h1>

    <a
        href="{{ route('agents.create') }}"
        class="add-button"
    >
        إضافة وسيط
    </a>

</div>

@if (session('success'))

    <div class="success">
        {{ session('success') }}
    </div>

@endif

@if ($agents->count())

    <div class="agents">

        @foreach ($agents as $agent)

            <div class="agent-card">

                <h2>
                    {{ $agent->name }}
                </h2>

                <div class="info">

                    <span class="label">
                        المكتب:
                    </span>

                    {{ $agent->office?->name }}

                </div>

                @if ($agent->email)

                    <div class="info">

                        <span class="label">
                            البريد:
                        </span>

                        {{ $agent->email }}

                    </div>

                @endif

                @if ($agent->phone)

                    <div class="info">

                        <span class="label">
                            الهاتف:
                        </span>

                        {{ $agent->phone }}

                    </div>

                @endif

                <div class="info">

                    <span class="label">
                        الحالة:
                    </span>

                    <span class="status">

                        @if ($agent->status === 'active')

                            نشط

                        @elseif ($agent->status === 'suspended')

                            موقوف

                        @else

                            {{ $agent->status }}

                        @endif

                    </span>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="empty">

        لا يوجد وسطاء حاليًا.

    </div>

@endif

@endsection