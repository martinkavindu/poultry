<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
    
      
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        
        if ($status === Password::RESET_LINK_SENT) {
          
            Session::flash('success', 'Check your email for a password reset link.');
        }
    
        
        return $status == Password::RESET_LINK_SENT
                    ? back()
                    : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }
}
