<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function show(Property $property)
    {
        $property->load([
            'office',
            'agent',
            'media',
        ]);

        return view(
            'properties.show',
            compact('property')
        );
    }

    public function index()
    {
        $properties = Property::with([
            'office',
            'agent',
        ])
            ->latest()
            ->paginate(12);

        return view(
            'properties.index',
            compact('properties')
        );
    }

    public function search(Request $request)
    {
        $hasSearchCriteria =
            $request->filled('property_type')
            || $request->filled('listing_type')
            || $request->filled('country')
            || $request->filled('city')
            || $request->filled('price_min')
            || $request->filled('price_max');

        $properties = collect();

        if ($hasSearchCriteria) {

            $query = Property::with([
                'office',
                'agent',
            ]);

            if ($request->filled('property_type')) {
                $query->where(
                    'property_type',
                    $request->input('property_type')
                );
            }

            if ($request->filled('listing_type')) {
                $query->where(
                    'listing_type',
                    $request->input('listing_type')
                );
            }

            if ($request->filled('country')) {
                $query->where(
                    'country',
                    $request->input('country')
                );
            }

            if ($request->filled('city')) {
                $query->where(
                    'city',
                    $request->input('city')
                );
            }

            if ($request->filled('price_min')) {
                $query->where(
                    'price',
                    '>=',
                    $request->input('price_min')
                );
            }

            if ($request->filled('price_max')) {
                $query->where(
                    'price',
                    '<=',
                    $request->input('price_max')
                );
            }

            $properties = $query
                ->latest()
                ->paginate(12)
                ->withQueryString();
        }

        return view(
            'properties.search',
            compact('properties')
        );
    }

    public function create()
    {
        $officeId = Auth::user()->office_id;

        $agents = Agent::where('office_id', $officeId)
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'properties.create',
            compact('agents')
        );
    }

    public function store(Request $request)
    {
        $officeId = Auth::user()->office_id;

        $data = $request->validate([
            'agent_id' => [
                'nullable',
                'exists:agents,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'property_type' => [
                'required',
                'string',
                'max:100',
            ],

            'listing_type' => [
                'required',
                'string',
                'max:100',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'currency' => [
                'required',
                'string',
                'size:3',
            ],

            'country' => [
                'nullable',
                'string',
                'max:100',
            ],

            'city' => [
                'nullable',
                'string',
                'max:100',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'latitude' => [
                'nullable',
                'numeric',
                'between:-90,90',
            ],

            'longitude' => [
                'nullable',
                'numeric',
                'between:-180,180',
            ],

            'bedrooms' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'bathrooms' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'area' => [
                'nullable',
                'numeric',
                'min:0',
            ],
        ]);

        if (!empty($data['agent_id'])) {

            $agentExists = Agent::where('id', $data['agent_id'])
                ->where('office_id', $officeId)
                ->where('status', 'active')
                ->exists();

            if (!$agentExists) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'agent_id' => 'الوسيط غير تابع لمكتبك.',
                    ]);
            }
        }

        $data['office_id'] = $officeId;

        Property::create($data);

        return redirect()
            ->route('properties.index')
            ->with(
                'success',
                'تم إنشاء العقار بنجاح.'
            );
    }
}