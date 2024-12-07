<?php
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\VerificationToken;
use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    public function store(Request $request){
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

        if(User::where('username', $filteredData['username'])->exists()){
            VerificationToken::where('username', $filteredData['username'])->delete();
        }

        if(isset($filteredData['email'])){
            if(VerificationToken::where('email', $filteredData['email'])->exists()){
                VerificationToken::where('email', $filteredData['email'])->delete();
            }

            $token = mt_rand(10000, 99999);

            $id_token = Str::uuid()->toString();

            // Store the token in the verification_tokens table
            $user = VerificationToken::create([
                'email' => $filteredData['email'],
                'password' => Hash::make($filteredData['password']),
                'name' => $filteredData['name'],
                'username' => $filteredData['username'],
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            // Send the verification email with the token
            try {
                Mail::to($user->email)->send(new VerificationEmail($token));
            } catch (\Exception $e) {
                Log::error('Failed to send verification email: ' . $e->getMessage());
            }

            return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $user->email, 'type' => 0]);
        }
        if (isset($filteredData['notelp'])) {
            if(VerificationToken::where('notelp', $filteredData['notelp'])->exists()){
                VerificationToken::where('notelp', $filteredData['notelp'])->delete();
            }

            $token = 1;

            $id_token = Str::uuid()->toString();

            // Store the token in the verification_tokens table
            $user = VerificationToken::create([
                'notelp' => $filteredData['notelp'],
                'password' => Hash::make($filteredData['password']),
                'name' => $filteredData['name'],
                'username' => $filteredData['username'],
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            // Send the verification SMS with the token
            $sid = getenv("TWILIO_ACCOUNT_SID");
            $authToken = getenv("TWILIO_AUTH_TOKEN");
            $twilio = new Client($sid, $authToken);
            try {
                $verification = $twilio->verify->v2->services(getenv("TWILIO_SERVICE_SID"))
                    ->verifications
                    ->create($filteredData['notelp'], "sms");
            } catch (\Exception $e) {
                Log::error('Failed to send verification SMS: ' . $e->getMessage());
            }

            return redirect()->route('verification.show', ['id_token' => $id_token, 'notelp' => $filteredData['notelp'], 'type' => 0]);
        }
    }
}
