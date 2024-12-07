<?php
namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Twilio\Rest\Client;

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

        if ($request->has('notelp')) {
            $notelp = $request->input('notelp');
            if (substr($notelp, 0, 3) !== '+62') {
                if (substr($notelp, 0, 1) === '0') {
                    $notelp = '+62' . substr($notelp, 1);
                } else {
                    $notelp = '+62' . $notelp;
                }
            }
            // Save the formatted number in the request or database
            $request->merge(['notelp' => $notelp]);
        }

        $request->merge(['username' => strtolower($request->username)]);

        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'name' => ['required', 'min:5', 'max:255'],
            'email' => ['nullable', 'email:dns', 'unique:users', 'required_without:notelp'],
            'notelp' => ['nullable', 'min:10', 'max:15', 'unique:users', 'required_without:email'],
            'password' => ['required', 'min:5', 'max:255', 'confirmed']
        ], [
            'username.unique' => 'Nama Pengguna sudah digunakan.',
            'email.unique' => 'Email sudah digunakan.',
            'notelp.unique' => 'Nomor telepon sudah digunakan.',
            'email.required_without' => 'Either email or phone number is required.',
            'notelp.required_without' => 'Either phone number or email is required.'
        ]);

        // Remove unset keys for clean insertion
        $filteredData = array_filter($validatedData, function ($value) {
            return !is_null($value);
        });

        $user = User::create($filteredData);

        Auth::login($user);

        if($user->email) {
            return redirect()->route('user.sendVerificationEmail', ['email' => $user->email]);
        } else {
            return redirect()->route('user.sendVerificationTelp', ['notelp' => $user->notelp]);
        }
    }
}
