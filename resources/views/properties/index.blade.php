@extends('layouts.app')

@section('title', 'العقارات - SOWLFA')

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

    .properties {
        display: grid;
        grid-template-columns: repeat(
            auto-fill,
            minmax(300px, 1fr)
        );
        gap: 20px;
    }

    .property-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    }

    .property-card h2 {
        margin-top: 0;
        margin-bottom: 18px;
    }

    .property-info {
        margin: 8px 0;
    }

    .label {
        font-weight: 600;
    }

    .status {
        display: inline-block;
        margin-top: 10px;
        padding: 5px 10px;
        background: #e5e7eb;
        border-radius: 20px;
        font-size: 14px;
    }

    .view-button {
        display: inline-block;
        margin-top: 15px;
        padding: 9px 14px;
        background: #111827;
        color: #ffffff;
        text-decoration: none;
        border-radius: 8px;
    }

    .empty {
        padding: 30px;
        text-align: center;
        background: #ffffff;
        border-radius: 12px;
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
    
    
.pagination {
    grid-column: 1 / -1;
    margin-top: 5px;
    display: flex;
    justify-content: center;
}
</style>


<div class="page-header">

    <h1>
        عقارات SOWLFA
    </h1>

    <a
        href="{{ route('properties.create') }}"
        class="add-button"
    >
        إضافة عقار
    </a>

</div>


@if (session('success'))

    <div class="success">
        {{ session('success') }}
    </div>

@endif


@if ($properties->count())

    <div class="properties">

        @foreach ($properties as $property)

            <div class="property-card">

                <h2>
                    {{ $property->title }}
                </h2>


                @if ($property->office)

                    <p class="property-info">

                        <span class="label">
                            المكتب:
                        </span>

                        {{ $property->office->name }}

                    </p>

                @endif


                @if ($property->agent)

                    <p class="property-info">

                        <span class="label">
                            الوسيط:
                        </span>

                        {{ $property->agent->name }}

                    </p>

                @endif


                <p class="property-info">

                    <span class="label">
                        النوع:
                    </span>

                    {{ $property->property_type }}

                </p>


                <p class="property-info">

                    <span class="label">
                        نوع العرض:
                    </span>

                    {{ $property->listing_type }}

                </p>


                <p class="property-info">

                    <span class="label">
                        السعر:
                    </span>

                    {{ $property->price }}
                    {{ $property->currency }}

                </p>


                @if ($property->city || $property->country)

                    <p class="property-info">

                        <span class="label">
                            الموقع:
                        </span>

                        {{ $property->city }}

                        @if($property->city && $property->country)
                            ,
                        @endif

                        {{ $property->country }}

                    </p>

                @endif


                <span class="status">

                    @if ($property->status === 'available')

                        متاح

                    @elseif ($property->status === 'sold')

                        مباع

                    @elseif ($property->status === 'rented')

                        مؤجر

                    @else

                        {{ $property->status }}

                    @endif

                </span>


                <br>

                <a
                    href="{{ route('properties.show', $property) }}"
                    class="view-button"
                >
                    عرض العقار
                </a>

            </div>
            
            @if ($properties->hasPages())
    <div class="pagination">
        {{ $properties->links() }}
    </div>
@endif

        @endforeach

    </div>

@else

    <div class="empty">

        <p>
            لا توجد عقارات حاليًا.
        </p>

    </div>

@endif

@endsection