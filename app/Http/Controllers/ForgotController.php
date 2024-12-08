<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationToken;
use App\Mail\VerificationEmail;
use App\Services\EmailVerificationService;
use App\Services\TwilioVerificationService;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ForgotController extends Controller
{
    protected $emailVerificationService;
    protected $twilioVerificationService;
    public function __construct(EmailVerificationService $emailVerificationService, TwilioVerificationService $twilioVerificationService)
    {
        $this->emailVerificationService = $emailVerificationService;
        $this->twilioVerificationService = $twilioVerificationService;
    }

    public function forgot_password(Request $request)
    {
        // Check database if email exists
        if ($request->email) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->email_verified_at === null) {
                    return redirect()->back()->with('error', 'Email belum diverifikasi.');
                }
                // Check if there is already a verification token for the user
            if (VerificationToken::where('user_id', $user->id)->exists()) {
                VerificationToken::where('user_id', $user->id)->delete();
            }

            // Generate a new verification token
            $token = mt_rand(10000, 99999);

            $id_token = Str::uuid()->toString();

            // Store the token in the verification_tokens table
            VerificationToken::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now(),
                'type' => 1
            ]);

            // Send the verification email with the token
            $this->emailVerificationService->sendVerificationEmail($user, $token);
            return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $user->email, 'type' => 1]);
            }
        }
        if ($request->notelp) {
            $user = User::where('phone_number', $request->notelp)->first();
            if ($user) {
                if ($user->phone_verified_at === null) {
                    return redirect()->back()->with('error', 'Nomor Telepon belum diverifikasi.');
                }
            }

            if (VerificationToken::where('user_id', $user->id)->exists()) {
                VerificationToken::where('user_id', $user->id)->delete();
            }

            // Generate a new verification token
            $token = 1;

            $id_token = Str::uuid()->toString();

            // Store the token in the verification_tokens table
            VerificationToken::create([
                'user_id' => $user->id,
                'notelp' => $user->notelp,
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            // Send the verification email with the token
            $this->twilioVerificationService->sendVerificationSMS($user->notelp);
            return redirect()->route('verification.show', ['id_token' => $id_token, 'notelp' => $user->notelp, 'type' => 1]);
        }
        if ($request->email) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }
        if ($request->notelp){
            return redirect()->back()->with('error', 'Nomor Telepon tidak ditemukan.');
        }


    }
}
