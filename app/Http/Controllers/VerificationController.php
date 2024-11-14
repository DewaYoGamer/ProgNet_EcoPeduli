<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class VerificationController extends Controller
{
    public function show(Request $request)
    {
        if (!$request->has('id_token')) {
            return redirect()->route('login');
        }
        $verificationToken = VerificationToken::where('id_token', $request->id_token)->first();
        if (!$verificationToken || $verificationToken->email !== $request->email) {
            return redirect()->route('login')->with('error', 'Invalid token.');
        }
        $email = $verificationToken->email;
        return view('auth.verification', ['id_token' => $request->id_token, 'email' => $email]);
    }

    public function verify(Request $request)
    {
        if (!$request->has('id_token')) {
            return redirect()->route('login')->with('error', 'No token provided.');
        }

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

        $verificationToken = VerificationToken::where('id_token', $request->id_token)
            ->where('token', $token)
            ->first();

        if ($verificationToken) {
            // Check if the token is older than 10 minutes
            $createdAt = Carbon::parse($verificationToken->created_at);
            if ($createdAt->diffInMinutes(Carbon::now()) > 10) {
                return redirect()->back()->with('error', 'Verification token has expired.');
            }

            $user = User::where('email', $verificationToken->email)->first();
            $user->email_verified_at = now();
            $user->save();

            // Delete the verification token
            $verificationToken->delete();

            // Log the user in
            Auth::login($user);

            // Redirect to the dashboard
            return redirect()->route('dashboard.pengguna')->with('status', 'Email verified successfully.');
        }

        return redirect()->back()->with('error', 'Invalid verification token.');
    }
}
