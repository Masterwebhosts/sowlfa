<?php

namespace App\Http\Controllers;

use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::query()
            ->where('status', 'active')
            ->withCount([
                'properties' => function ($query) {
                    $query->where('status', 'available');
                },
            ])
            ->latest()
            ->get();

        return view('offices.index', compact('offices'));
    }

    public function show(Office $office)
    {
        abort_unless($office->status === 'active', 404);

        $office->load([
            'properties' => function ($query) {
                $query->where('status', 'available')
                    ->latest()
                    ->take(4);
            },
        ]);

        /*
        |--------------------------------------------------------------------------
        | Structured Data - Office
        |--------------------------------------------------------------------------
        */

        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'RealEstateAgent',
            'name' => $office->name,
            'url' => route('offices.show', $office->slug),
        ];

        if ($office->phone) {
            $structuredData['telephone'] = $office->phone;
        }

        if ($office->email) {
            $structuredData['email'] = $office->email;
        }

        if ($office->address || $office->city || $office->country) {
            $address = [
                '@type' => 'PostalAddress',
            ];

            if ($office->address) {
                $address['streetAddress'] = $office->address;
            }

            if ($office->city) {
                $address['addressLocality'] = $office->city;
            }

            if ($office->country) {
                $address['addressCountry'] = $office->country;
            }

            $structuredData['address'] = $address;
        }

        /*
        |--------------------------------------------------------------------------
        | Structured Data - Properties
        |--------------------------------------------------------------------------
        */

        $structuredData['makesOffer'] = $office->properties
            ->map(function ($property) {
                $offer = [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Residence',
                        'name' => $property->title,
                    ],
                ];

                if ($property->description) {
                    $offer['itemOffered']['description'] = $property->description;
                }

                if ($property->price !== null) {
                    $offer['price'] = (string) $property->price;

                    if ($property->currency) {
                        $offer['priceCurrency'] = $property->currency;
                    }
                }

                return $offer;
            })
            ->values()
            ->all();

        return view('offices.show', [
            'office' => $office,
            'structuredData' => $structuredData,
        ]);
    }
}