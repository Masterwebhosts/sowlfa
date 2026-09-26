<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AccountActivationController extends Controller
{
    public function show(
        Request $request,
        string $token
    ) {
        return view('auth.activate-account', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function activate(Request $request)
    {
        $data = $request->validate([
            'token' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8',
            ],
        ]);

        $status = Password::reset(
            [
                'email' => $data['email'],
                'password' => $data['password'],
                'password_confirmation' => $data['password_confirmation'],
                'token' => $data['token'],
            ],
            function ($user, $password) {
                $user->password = $password;
                $user->email_verified_at = now();

                $user->setRememberToken(
                    Str::random(60)
                );

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()
                ->route('login')
                ->with(
                    'success',
                    'تم تفعيل حسابك وإنشاء كلمة المرور بنجاح. يمكنك تسجيل الدخول الآن.'
                );
        }

        return back()
            ->withErrors([
                'email' => __($status),
            ])
            ->withInput(
                $request->only('email')
            );
    }
}