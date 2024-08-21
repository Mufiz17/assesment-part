<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Constructor untuk mengatur middleware.
     */
    public function __construct()
    {
        // Hapus atau komen middleware auth jika ingin menonaktifkan auth pada controller ini
        // $this->middleware('auth');
    }

    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // Jika email sudah terverifikasi, alihkan ke halaman beranda dengan query string 'verified=1'
            return redirect()->intended(route('homepage', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            // Tandai email sebagai terverifikasi dan panggil event Verified
            event(new Verified($request->user()));
        }

        // Setelah verifikasi, alihkan ke halaman beranda dengan query string 'verified=1'
        return redirect()->intended(route('homepage', absolute: false).'?verified=1');
    }
}
