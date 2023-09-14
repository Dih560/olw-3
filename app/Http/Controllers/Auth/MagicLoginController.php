<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagicLoginController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
