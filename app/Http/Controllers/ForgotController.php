<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationToken;
use App\Models\PasswordResetToken;
use App\Mail\VerificationEmail;
use App\Services\EmailVerificationService;
use App\Services\TwilioVerificationService;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ForgotController extends Controller{
    protected $emailVerificationService;
    protected $twilioVerificationService;
    public function __construct(EmailVerificationService $emailVerificationService, TwilioVerificationService $twilioVerificationService){
        $this->emailVerificationService = $emailVerificationService;
        $this->twilioVerificationService = $twilioVerificationService;
    }

    public function forgotRedirect(Request $request){
        if($request->type === "password"){
            return redirect()->route('forgot', ['type' => 'password']);
        }
        if($request->type === "username"){
            return redirect()->route('forgot', ['type' => 'username']);
        }
    }

    public function forgot(Request $request){
        if ($request->type !== "password" && $request->type !== "username") {
            abort(400, 'Invalid type');
        }
        return view('auth.forgot');
    }

    public function forgotForm(Request $request){
        try {
            $request->validate([
                'cf-turnstile-response' => ['required', Rule::turnstile()],
            ]);
        } catch (ValidationException $e) {
            return back()->with('error', 'CAPTCHA tidak valid! Silahkan coba lagi.');
        }

        $type = ($request->type === "password") ? 1 : -1;
        $type = ($request->type === "username") ? 2 : $type;

        if ($type === -1){
            abort(400, 'Tipe tidak valid.');
        }

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
                    'type' => $type
                ]);

                // Send the verification email with the token
                $this->emailVerificationService->sendVerificationEmail($user, $token);
                return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $user->email, 'type' => $type]);
            }
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        if ($request->notelp) {
            $notelp = $request->input('notelp');
            if (substr($notelp, 0, 3) !== '+62') {
                if (substr($notelp, 0, 1) === '0') {
                    $notelp = '+62' . substr($notelp, 1);
                } else {
                    $notelp = '+62' . $notelp;
                }
            }

            $user = User::where('notelp', $notelp)->first();
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
                'type' => $type
            ]);

            // Send the verification email with the token
            $this->twilioVerificationService->sendVerificationSMS($user->notelp);
            return redirect()->route('verification.show', ['id_token' => $id_token, 'notelp' => $user->notelp, 'type' => $type]);
        }
    }

    public function forgotPassword(Request $request){
        PasswordResetToken::where('created_at', '<', Carbon::now()->subMinutes(10))->delete();
        $passwordResetToken = PasswordResetToken::where('id_token', $request->id_token)->first();
        if ($passwordResetToken) {
            return view('auth.new_password');
        }
        abort(400, 'Token tidak valid');
    }

    public function forgotPasswordForm(Request $request){
        PasswordResetToken::where('created_at', '<', Carbon::now()->subMinutes(10))->delete();
        $request->validate([
            'password' => 'required|min:5|max:255',
        ], [
            'password.min' => 'Kata sandi minimal 5 karakter.',
            'password.max' => 'Kata sandi maksimal 255 karakter.',
        ]);
        $passwordResetToken = PasswordResetToken::where('id_token', $request->id_token)->first();
        if ($passwordResetToken) {
            $user = User::where('id', $passwordResetToken->user_id)->first();
            $user->password = bcrypt($request->password);
            $user->save();
            $passwordResetToken->delete();
            return redirect()->route('login')->with('success', 'Password berhasil diubah.');
        }
        return redirect()->route('login')->with('error', 'Token tidak valid.');
    }
}
