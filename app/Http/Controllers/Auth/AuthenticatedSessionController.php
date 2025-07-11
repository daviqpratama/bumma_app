<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // Validasi role input dari form vs role dari DB
        if ($user->role !== $request->input('role')) {
            Auth::logout();
            return back()->withErrors([
                'role' => 'Peran yang dipilih tidak cocok dengan akun ini.',
            ])->withInput();
        }

        // Redirect sesuai role
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'user':
                return redirect()->route('user.dashboard');
            default:
                Auth::logout();
                return back()->withErrors([
                    'role' => 'Role tidak dikenali. Silakan hubungi admin.',
                ]);
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
