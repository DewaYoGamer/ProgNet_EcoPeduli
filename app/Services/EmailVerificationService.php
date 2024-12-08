<?php

namespace App\Services;

use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailVerificationService
{
    public function sendVerificationEmail($email, $token)
    {
        try {
            Mail::to($email)->send(new VerificationEmail($token));
        } catch (\Exception $e) {
            Log::error('Failed to send verification email: ' . $e->getMessage());
            throw $e; // Rethrow the exception or handle it as needed
        }
    }
}
