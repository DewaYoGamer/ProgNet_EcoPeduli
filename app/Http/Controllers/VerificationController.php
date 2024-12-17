<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Twilio\Rest\Client;

class VerificationController extends Controller
{
    public function show(Request $request){
        VerificationToken::where('created_at', '<', Carbon::now()->subMinutes(10))->delete();

        if (!$request->has('id_token')) {
            abort(400, 'Invalid token');
        }

        $verificationToken = VerificationToken::where('id_token', $request->id_token)->first();
        if (!$verificationToken ||
            $verificationToken->email !== $request->email ||
            $verificationToken->notelp !== $request->notelp ||
            $verificationToken->type !== (int)$request->type) {
            abort(400, 'Invalid token');
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
            return redirect()->route('login')->with('error', 'Token tidak valid');
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
                                                ]);
                if ($verification_check->valid) {
                    $valid = 1;
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Token verifikasi kedaluwarsa.');
            }
        }
        if ($verificationToken->token === $token) {
            $valid = 2;
        }

        if (isset($valid) === false) {
            return redirect()->back()->with('error', 'Token Salah');
        }

        if($verificationToken->type === 0) {

            if($valid === 1){
                $user = User::create([
                    'name' => $verificationToken->name,
                    'password' => $verificationToken->password,
                    'username' => $verificationToken->username,
                    'notelp' => $verificationToken->notelp,
                    'phone_verified_at' => now(),
                ]);
            }
            if($valid === 2){
                $user = User::create([
                    'password' => $verificationToken->password,
                    'name' => $verificationToken->name,
                    'username' => $verificationToken->username,
                    'email' => $verificationToken->email,
                    'email_verified_at' => now(),
                ]);
            }
            $verificationToken->delete();
            Auth::login($user);
            return redirect()->route('dashboard.pengguna');
        }

        if($verificationToken->type === 1){
            $Passworduuid = Str::uuid()->toString();
            PasswordResetToken::create([
                'user_id' => $verificationToken->user_id,
                'id_token' => $Passworduuid,
                'created_at' => Carbon::now(),
            ]);
            $verificationToken->delete();
            return redirect()->route('forgotPassword', ['id_token' => $Passworduuid]);
        }

        if($verificationToken->type === 2){
            $user = User::where('id', $verificationToken->user_id)->first();

            $verificationToken->delete();

            return redirect()->route('login')->with('success', 'NAMA PENGGUNA ANDA ADALAH:')->with('username', $user->username);
        }

        if($verificationToken->type === 3) {
            $user = User::where('id', $verificationToken->user_id)->first();

            if($valid === 1){
                $user->notelp = $verificationToken->notelp;
                $user->phone_verified_at = now();
            }

            if($valid === 2){
                $user->email = $verificationToken->email;
                $user->email_verified_at = now();
            }

            $user->save();
            $verificationToken->delete();
            return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
        }
    }
}
