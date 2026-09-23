<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::with('office')
            ->latest()
            ->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function create()
    {
        $offices = Office::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'admin.users.create',
            compact('offices')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'office_id' => [
                'required',
                'exists:offices,id',
            ],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'office_id' => $data['office_id'],
            'role' => 'subscriber',
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'تم إنشاء حساب المشترك بنجاح.');
    }

    public function edit(User $user)
{
    $offices = Office::where('status', 'active')
        ->orderBy('name')
        ->get();

    return view(
        'admin.users.edit',
        compact('user', 'offices')
    );
}

public function update(Request $request, User $user)
{
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'email',
            'max:255',
            'unique:users,email,' . $user->id,
        ],
        'password' => [
            'nullable',
            'string',
            'min:8',
            'confirmed',
        ],
        'office_id' => [
            'required',
            'exists:offices,id',
        ],
    ]);

    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->office_id = $data['office_id'];

    if (! empty($data['password'])) {
        $user->password = Hash::make($data['password']);
    }

    $user->save();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'تم تحديث بيانات المستخدم بنجاح.');
}

    public function updateStatus(
    Request $request,
    User $user
) {
    $data = $request->validate([
        'status' => [
            'required',
            'in:active,suspended',
        ],
    ]);

    if ($user->role === 'admin' && $data['status'] === 'suspended') {
        return back()->withErrors([
            'status' => 'لا يمكن إيقاف حساب المدير.',
        ]);
    }

    $user->update([
        'status' => $data['status'],
    ]);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'تم تحديث حالة المستخدم بنجاح.');
}

public function destroy(User $user)
{
    if ($user->role === 'admin') {
        return redirect()
            ->route('admin.users.index')
            ->withErrors([
                'delete' => 'لا يمكن حذف حساب المدير.',
            ]);
    }

    $user->delete();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'تم حذف المستخدم بنجاح.');
}

}