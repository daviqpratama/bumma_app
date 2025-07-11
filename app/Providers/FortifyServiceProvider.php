<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Custom login logic dengan cek role
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if (
                $user &&
                Hash::check($request->password, $user->password) &&
                $user->role === $request->role
            ) {
                return $user;
            }

            throw ValidationException::withMessages([
                'role' => ['Peran yang dipilih tidak cocok dengan akun ini.'],
            ]);
        });

        // Redirect setelah login sesuai role
        Fortify::loginResponse(function () {
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        });

        // Redirect setelah logout
        Fortify::logoutResponse(function () {
            return redirect()->route('login');
        });
    }
}
