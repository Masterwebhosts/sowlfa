<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * عرض تفاصيل العقار.
     *
     * يمكن للمستخدم مشاهدة أي عقار منشور على المنصة،
     * حتى لو كان تابعًا لمكتب آخر.
     */
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

    /**
     * عرض عقارات مكتب المستخدم.
     *
     * /properties
     *
     * المستخدم العادي يرى عقارات مكتبه فقط.
     * الـ admin يرى جميع العقارات.
     */
    public function index()
    {
        $user = Auth::user();

        $query = Property::with([
            'office',
            'agent',
        ]);

        if ($user->role !== 'admin') {
            $query->where(
                'office_id',
                $user->office_id
            );
        }

        $properties = $query
            ->latest()
            ->paginate(12);

        return view(
            'properties.index',
            compact('properties')
        );
    }

    /**
     * البحث في عقارات المنصة بالكامل.
     *
     * /properties/search
     *
     * هنا لا نضع office_id لأن البحث يجب أن يشمل
     * عقارات جميع المكاتب.
     */
    public function search(Request $request)
    {
        $query = Property::with([
            'office',
            'agent',
        ]);

        /*
         * البحث في العقارات المتاحة فقط.
         */
        $query->where(
            'status',
            'available'
        );

        /*
         * نوع العقار.
         */
        if ($request->filled('property_type')) {
            $query->where(
                'property_type',
                $request->input('property_type')
            );
        }

        /*
         * نوع العرض:
         * إيجار / بيع
         */
        if ($request->filled('listing_type')) {
            $query->where(
                'listing_type',
                $request->input('listing_type')
            );
        }

        /*
         * الدولة.
         */
        if ($request->filled('country')) {
            $query->where(
                'country',
                'like',
                '%' . trim($request->input('country')) . '%'
            );
        }

        /*
         * المدينة.
         */
        if ($request->filled('city')) {
            $query->where(
                'city',
                'like',
                '%' . trim($request->input('city')) . '%'
            );
        }

        /*
         * الحد الأدنى للسعر.
         */
        if (
            $request->filled('price_min')
            && is_numeric($request->input('price_min'))
        ) {
            $query->where(
                'price',
                '>=',
                $request->input('price_min')
            );
        }

        /*
         * الحد الأعلى للسعر.
         */
        if (
            $request->filled('price_max')
            && is_numeric($request->input('price_max'))
        ) {
            $query->where(
                'price',
                '<=',
                $request->input('price_max')
            );
        }

        /*
         * عرض النتائج من جميع المكاتب.
         */
        $properties = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view(
            'properties.search',
            compact('properties')
        );
    }

    /**
     * صفحة إضافة عقار.
     */
    public function create()
    {
        $officeId = Auth::user()->office_id;

        $agents = Agent::where(
            'office_id',
            $officeId
        )
            ->where(
                'status',
                'active'
            )
            ->orderBy('name')
            ->get();

        return view(
            'properties.create',
            compact('agents')
        );
    }

    /**
     * إنشاء عقار جديد.
     */
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

        /*
         * التأكد أن الوسيط تابع لنفس مكتب المستخدم
         * وأن حالته active.
         */
        if (!empty($data['agent_id'])) {
            $agentExists = Agent::where(
                'id',
                $data['agent_id']
            )
                ->where(
                    'office_id',
                    $officeId
                )
                ->where(
                    'status',
                    'active'
                )
                ->exists();

            if (!$agentExists) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'agent_id' => 'الوسيط غير تابع لمكتبك.',
                    ]);
            }
        }

        /*
         * ربط العقار بمكتب المستخدم الحالي.
         */
        $data['office_id'] = $officeId;

        Property::create($data);

        return redirect()
            ->route('properties.index')
            ->with(
                'success',
                'تم إنشاء العقار بنجاح.'
            );
    }

    /**
     * حذف العقار.
     *
     * مسموح فقط:
     * - للـ admin
     * - أو لمستخدم من نفس مكتب العقار.
     */
    public function destroy(Property $property)
    {
        $user = Auth::user();

        if (
            $user->role !== 'admin'
            && $property->office_id !== $user->office_id
        ) {
            abort(403);
        }

        $property->delete();

        return redirect()
            ->route('properties.index')
            ->with(
                'success',
                'تم حذف العقار بنجاح.'
            );
    }
}