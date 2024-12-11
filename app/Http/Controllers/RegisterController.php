<?php
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\VerificationToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Services\EmailVerificationService;
use App\Services\TwilioVerificationService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class RegisterController extends Controller
{
    protected $emailVerificationService;
    protected $twilioVerificationService;
    public function __construct(EmailVerificationService $emailVerificationService, TwilioVerificationService $twilioVerificationService)
    {
        $this->emailVerificationService = $emailVerificationService;
        $this->twilioVerificationService = $twilioVerificationService;
    }

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
            'name' => ['required', 'min:1', 'max:255'],
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
            $this->emailVerificationService->sendVerificationEmail($user->email, $token);

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
            $this->twilioVerificationService->sendVerificationSMS($user->notelp);

            return redirect()->route('verification.show', ['id_token' => $id_token, 'notelp' => $filteredData['notelp'], 'type' => 0]);
        }
    }
}
