<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ForgotController extends Controller
{
    public function forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // Check database if email exists
        $user = User::where('email', $request->email)->first();
        \Log::info($user);
        if ($user) {

            // // Check if there is already a verification token for the user
            // if (VerificationToken::where('user_id', $user->id)->exists()) {
            //     VerificationToken::where('user_id', $user->id)->delete();
            // }

            // // Generate a new verification token
            // $token = mt_rand(10000, 99999);

            // $id_token = Str::uuid()->toString();

            // // Store the token in the verification_tokens table
            // VerificationToken::create([
            //     'user_id' => $user->id,
            //     'email' => $user->email,
            //     'id_token' => $id_token,
            //     'token' => $token,
            //     'created_at' => Carbon::now(),
            // ]);

            // // Send the verification email with the token
            // try {
            //     Mail::to($user->email)->send(new VerificationEmail($token));
            // } catch (\Exception $e) {
            //     Log::error('Failed to send verification email: ' . $e->getMessage());
            // }

            // return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $user->email])->with('success', 'Kode Verifikasi telah dikirim ulang.');
        } else {
            return redirect()->route('login')->with('error', 'Email tidak ditemukan!');
        }
    }
}
