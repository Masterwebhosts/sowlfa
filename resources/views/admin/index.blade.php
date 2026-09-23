@extends('admin.layouts.app')

@section('title', 'لوحة الإدارة - SOWLFA')

@section('content')

<style>

    .page-header {
        background: white;
        padding: 24px;
        border-radius: 12px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .page-header h1 {
        margin: 0 0 8px;
    }

    .page-header p {
        margin: 0;
        color: #666;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .card-title {
        color: #666;
        margin-bottom: 12px;
    }

    .card-value {
        font-size: 32px;
        font-weight: bold;
    }

    @media (max-width: 700px) {

        .cards {
            grid-template-columns: 1fr;
        }

    }

</style>


<div class="page-header">

    <h1>
        لوحة إدارة SOWLFA
    </h1>

    <p>
        إدارة المكاتب والخطط والاشتراكات.
    </p>

</div>


<div class="cards">

    <div class="card">

        <div class="card-title">
            المكاتب
        </div>

        <div class="card-value">
            {{ $officesCount }}
        </div>

    </div>


    <div class="card">

        <div class="card-title">
            خطط الاشتراك
        </div>

        <div class="card-value">
            {{ $plansCount }}
        </div>

    </div>


    <div class="card">

        <div class="card-title">
            الاشتراكات النشطة
        </div>

        <div class="card-value">
            {{ $activeSubscriptionsCount }}
        </div>

    </div>

</div>

@endsection