
@extends('layouts.app')

@section('title', 'لوحة التحكم - SOWLFA')

@section('content')

<style>

    .page-header {
        background: white;
        padding: 24px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .page-header h1 {
        margin: 0;
    }

    .card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .card h2 {
        margin-top: 0;
        margin-bottom: 16px;
    }

    .card p {
        margin: 10px 0;
    }

    .agents-count {
        font-size: 32px;
        font-weight: bold;
    }

    .links {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .links a {
        background: #222;
        color: white;
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
    }

    .empty {
        color: #777;
    }

    @media (max-width: 700px) {

        .page-header {
            padding: 18px;
        }

        .card {
            padding: 18px;
        }

        .links {
            flex-direction: column;
        }

        .links a {
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }

        .agents-count {
            font-size: 28px;
        }
    }

</style>


<div class="page-header">

    <h1>
        لوحة التحكم
    </h1>

</div>


<div class="card">

    <h2>
        المكتب
    </h2>

    @if($office)

        <strong>
            {{ $office->name }}
        </strong>

    @else

        <p class="empty">
            لا يوجد مكتب مرتبط بالحساب.
        </p>

    @endif

</div>


<div class="card">

    <h2>
        الاشتراك
    </h2>

    @if($subscription)

        <p>
            <strong>الخطة:</strong>
            {{ $subscription->plan->name }}
        </p>

        <p>
            <strong>السعر:</strong>
            ${{ number_format($subscription->plan->price, 2) }}
        </p>

        <p>
            <strong>الحالة:</strong>
            نشط
        </p>

        <p>
            <strong>تاريخ البداية:</strong>
            {{ $subscription->starts_at->format('Y-m-d') }}
        </p>

        <p>
            <strong>تاريخ الانتهاء:</strong>
            {{ $subscription->ends_at->format('Y-m-d') }}
        </p>

    @else

        <p class="empty">
            لا يوجد اشتراك نشط.
        </p>

    @endif

</div>


<div class="card">

    <h2>
        عدد الوسطاء
    </h2>

    <div class="agents-count">
        {{ $agentsCount }}
    </div>

</div>


<div class="card">

    <div class="links">

        <a href="{{ route('properties.index') }}">
            العقارات
        </a>

        <a href="{{ route('agents.index') }}">
            الوسطاء
        </a>

    </div>

</div>

@endsection

