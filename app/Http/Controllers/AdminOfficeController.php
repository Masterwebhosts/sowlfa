<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class AdminOfficeController extends Controller
{
    public function index()
    {
        $offices = Office::withCount([
            'users',
            'agents',
            'properties',
            'subscriptions',
        ])->latest()->get();

        return view('admin.offices.index', compact('offices'));
    }

    public function create()
    {
        return view('admin.offices.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
        ]);

        $data['status'] = 'active';

        Office::create($data);

        return redirect()
            ->route('admin.offices.index')
            ->with('success', 'تم إنشاء المكتب بنجاح.');
    }

    public function edit(Office $office)
    {
        return view('admin.offices.edit', compact('office'));
    }

    public function update(Request $request, Office $office)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
            'status' => ['required', 'string', 'max:50'],
        ]);

        $office->update($data);

        return redirect()
            ->route('admin.offices.index')
            ->with('success', 'تم تعديل المكتب بنجاح.');
    }

    public function destroy(Office $office)
    {
        $office->delete();

        return redirect()
            ->route('admin.offices.index')
            ->with('success', 'تم حذف المكتب بنجاح.');
    }
}