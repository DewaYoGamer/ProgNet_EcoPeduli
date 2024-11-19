<?php
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\VerificationToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'cf-turnstile-response' => ['required', Rule::turnstile()],
            ]);
        } catch (ValidationException $e) {
            return back()->with('error', 'CAPTCHA tidak valid! Silahkan coba lagi.');
        }

        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'name' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255', 'confirmed'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user
        $user = User::create($validatedData);

        Auth::login($user);

        // Generate a 5-digit verification token
        $token = mt_rand(10000, 99999);

        // Generate a unique id_token
        $id_token = Str::uuid()->toString();

        // Store the token in the verification_tokens table
        VerificationToken::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'id_token' => $id_token,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Send the verification email with the token
        Mail::to($user->email)->send(new VerificationEmail($token));

        // Redirect to the verification page
        return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $user->email]);
    }
}
