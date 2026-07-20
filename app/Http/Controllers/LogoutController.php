<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        Auth::logout($user);
        $request->session->invalidate();
        $request->session->regenerateToken();
        return redirect('/chirps')->with('success', 'Logout');
    }
}
