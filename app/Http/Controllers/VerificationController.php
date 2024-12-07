<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Twilio\Rest\Client;

class VerificationController extends Controller
{
    public function show(Request $request){
        VerificationToken::where('created_at', '<', Carbon::now()->subMinutes(10))->delete();

        if (!$request->has('id_token')) {
            return redirect()->route('login');
        }

        $verificationToken = VerificationToken::where('id_token', $request->id_token)->first();
        if (!$verificationToken ||
            $verificationToken->email !== $request->email ||
            $verificationToken->notelp !== $request->notelp ||
            $verificationToken->type !== (int)$request->type) {
            return redirect()->route('login')->with('error', 'Invalid token.');
        }

        return view('auth.verification');
    }

    public function verify(Request $request){
        VerificationToken::where('created_at', '<', Carbon::now()->subMinutes(10))->delete();

        $request->validate([
            'digit1' => 'required|numeric',
            'digit2' => 'required|numeric',
            'digit3' => 'required|numeric',
            'digit4' => 'required|numeric',
            'digit5' => 'required|numeric',
        ]);

        $token = implode('', [
            $request->digit1,
            $request->digit2,
            $request->digit3,
            $request->digit4,
            $request->digit5,
        ]);

        $verificationToken = VerificationToken::where('id_token', $request->id_token)->first();
        if (!$request->has('id_token') || !$verificationToken) {
            return redirect()->route('login')->with('error', 'Invalid token.');
        }

        if ($verificationToken->token === "1") {
            $sid = getenv("TWILIO_ACCOUNT_SID");
            $authToken = getenv("TWILIO_AUTH_TOKEN");
            $twilio = new Client($sid, $authToken);
            try{
                $verification_check = $twilio->verify->v2->services(getenv("TWILIO_SERVICE_SID"))
                                    ->verificationChecks
                                    ->create([
                                                    "to" => $verificationToken->notelp,
                                                    "code" => $token
                                                ]
                                        );
                if ($verification_check->valid) {
                    if($verificationToken->type === 0) {
                        User::create([
                            'name' => $verificationToken->name,
                            'password' => $verificationToken->password,
                            'username' => $verificationToken->username,
                            'notelp' => $verificationToken->notelp,
                            'phone_verified_at' => now(),
                        ]);
                        $user = User::where('username', $verificationToken->username)->first();
                        // Delete the verification token
                        $verificationToken->delete();

                        // Redirect to the dashboard
                        Auth::login($user);
                        return redirect()->route('dashboard.pengguna');
                    }
                    // Delete the verification token
                    $verificationToken->delete();

                    $user = User::where('id', $verificationToken->user_id)->first();

                    if($verificationToken->type === 3) {
                        $user->notelp = $verificationToken->notelp;
                        $user->phone_verified_at = now();
                        $user->save();
                        // Redirect to the dashboard
                        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
                    }

                    // Redirect to the dashboard
                    return redirect()->route('dashboard.pengguna');
            }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Token verifikasi kedaluwarsa.');
            }
        }
        if ($verificationToken->token === $token) {
            if($verificationToken->type === 0) {
                User::create([
                    'email' => $verificationToken->email,
                    'password' => $verificationToken->password,
                    'name' => $verificationToken->name,
                    'username' => $verificationToken->username,
                    'email' => $verificationToken->email,
                    'email_verified_at' => now(),
                ]);
                $user = User::where('username', $verificationToken->username)->first();
                // Delete the verification token
                $verificationToken->delete();

                // Redirect to the dashboard
                Auth::login($user);
                return redirect()->route('dashboard.pengguna');
            }
            // Delete the verification token
            $verificationToken->delete();

            $user = User::where('id', $verificationToken->user_id)->first();

            if($verificationToken->type === 3) {
                $user->email = $verificationToken->email;
                $user->email_verified_at = now();
                $user->save();
                // Redirect to the dashboard
                return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
            }
            // Redirect to the dashboard
            return redirect()->route('dashboard.pengguna');
        }

        return redirect()->back()->with('error', 'Token verifikasi tidak valid.');
    }
}
