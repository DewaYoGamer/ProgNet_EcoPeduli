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

        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'name' => ['required', 'min:5', 'max:255'],
            'email' => ['nullable', 'email:dns', 'unique:users', 'required_without:notelp'],
            'notelp' => ['nullable', 'min:10', 'max:15', 'unique:users', 'required_without:email'],
            'password' => ['required', 'min:5', 'max:255', 'confirmed'],
        ], [
            'email.unique' => 'The email address is already registered.',
            'notelp.unique' => 'The phone number is already registered.',
            'email.required_without' => 'Either email or phone number is required.',
            'notelp.required_without' => 'Either phone number or email is required.',
        ]);

        // Remove unset keys for clean insertion
        $filteredData = array_filter($validatedData, function ($value) {
            return !is_null($value);
        });

        $user = User::create($filteredData);

        Auth::login($user);

        $token = mt_rand(10000, 99999);

        if ($user->notelp) {
            try{
                $sid = getenv("TWILIO_ACCOUNT_SID");
                $authToken = getenv("TWILIO_AUTH_TOKEN");
                $twilio = new Client($sid, $authToken);
                $verification = $twilio->verify->v2->services(getenv("TWILIO_SERVICE_SID"))
                                       ->verifications
                                       ->create($filteredData['notelp'] , "sms");
                $token = 1;
            }
            catch (\Exception $e) {
                \Log::error($e->getMessage());
            }
        }

        // Generate a unique id_token
        $id_token = Str::uuid()->toString();

        // Store the token in the verification_tokens table
        VerificationToken::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'notelp' => $user->notelp,
            'id_token' => $id_token,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Send the verification email with the token
        if ($user->email) {
            Mail::to($user->email)->send(new VerificationEmail($token));
        }

        // Redirect to the verification page
        return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $user->email, 'notelp' => $user->notelp]);
    }
}
