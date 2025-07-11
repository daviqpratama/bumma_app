<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->route('dashboard'); // Dashboard admin
        }

        return redirect()->route('dashboard'); // Dashboard user
    }
}
