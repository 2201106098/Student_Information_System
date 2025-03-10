<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $request->user()->user_type === 'student'
                ? redirect()->intended(route('student.dashboard'))
                : redirect()->intended(route('dashboard'));
        }
        
        return view('auth.verify-email');
    }
}