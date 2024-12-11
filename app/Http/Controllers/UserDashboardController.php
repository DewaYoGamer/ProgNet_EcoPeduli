<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Services\EmailVerificationService;
use App\Services\TwilioVerificationService;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\VerificationToken;
use App\Models\User;

class UserDashboardController extends Controller
{
    protected $emailVerificationService;
    protected $twilioVerificationService;
    public function __construct(EmailVerificationService $emailVerificationService, TwilioVerificationService $twilioVerificationService)
    {
        $this->emailVerificationService = $emailVerificationService;
        $this->twilioVerificationService = $twilioVerificationService;
    }

    public function index(){
        $user = Auth::user();

        // Ambil data kode unik untuk user yang sedang login
        $kodeUniks = DB::table('tb_penukaran_poin')
            ->where('username', $user->username)
            ->get();

        // Ambil data riwayat penukaran untuk user yang sedang login
        $riwayatPenukaran = DB::table('tb_penukaran_poin')
            ->where('username', $user->username)
            ->where('status', 'accepted')
            ->get();

        return view('dashboard.dashboardPengguna_index', compact('user', 'kodeUniks', 'riwayatPenukaran'));
    }

    public function index_operator(){
        $user = Auth::user();

        // Untuk Seluruh Data
        $informasi_penukaran = DB::table('tb_penukaran_sampah')
            ->get();

        // Untuk Statusnya ACC
        $riwayatPenukaran = DB::table('tb_penukaran_sampah')
            ->where('nama_pengguna', $user->username)
            ->where('status', 'accepted')
            ->get();

        return view('dashboard_operator.dashboardOperator_index', compact('user', 'informasi_penukaran', 'riwayatPenukaran'));
    }

    public function index_admin(){
        $user = Auth::user();

        $data_tb_penukaran_sampah = DB::table('tb_penukaran_sampah')->get();
        $data_tb_penukaran_poin = DB::table('tb_penukaran_poin')->get();
        $data_tb_penukaran_poin_acc = DB::table('tb_penukaran_poin')->where('status', 'accepted')->get();

        return view('dashboard_admin.dashboardAdmin_index', compact('user', 'data_tb_penukaran_sampah', 'data_tb_penukaran_poin', 'data_tb_penukaran_poin_acc'));
    }

    private function redirectToRole($role){
        // Arahkan ke halaman berdasarkan peran
        switch ($role) {
            case 'admin':
                return redirect('/admin');
            case 'operator':
                return redirect('/operator');
            case 'user':
                return redirect('/pengguna');
            default:
                return redirect('/'); // Default ke halaman utama jika role tidak dikenal
        }
    }

    public function profile(){
        $user = Auth::user();
        return view('dashboard.dashboardPengguna_profil', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();

        $errors = new \Illuminate\Support\MessageBag();
        $validatedData = [];

        // Validate 'name'
        try {
            $request->validate([
                'name' => ['required', 'min:5', 'max:255']
            ], [
                'name.required' => 'Nama tidak boleh kosong.',
                'name.min' => 'Nama minimal 5 karakter.',
                'name.max' => 'Nama maksimal 255 karakter.'
            ]);
            $validatedData['name'] = $request->input('name');  // Add to validated data if no error
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors->add('name', $e->validator->errors()->first('name'));  // Store error
            unset($request['name']);  // Unset invalid field
        }

        // Validate 'username'
        try {
            $request->validate([
                'username' => ['required', 'min:5', 'max:255', 'unique:users,username,' . $user->id]
            ], [
                'username.required' => 'Username tidak boleh kosong.',
                'username.min' => 'Username minimal 5 karakter.',
                'username.max' => 'Username maksimal 255 karakter.',
                'username.unique' => 'Username sudah digunakan.'
            ]);
            $validatedData['username'] = $request->input('username');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors->add('username', $e->validator->errors()->first('username'));
            unset($request['username']);
        }

        // Validate 'notelp'
        try {
            if ($request->notelp !== null) {
                if (substr($request->notelp, 0, 3) !== '+62') {
                    if (substr($request->notelp, 0, 1) === '0') {
                        $request->notelp = '+62' . substr($request->notelp, 1);
                    } else {
                        $request->notelp = '+62' . $request->notelp;
                    }
                }
                // Save the formatted number in the request or database
                $request->merge(['notelp' => $request->notelp]);
            }
            $request->validate([
                'notelp' => ['nullable', 'min:10', 'max:15', 'unique:users,notelp,' . $user->id]
            ], [
                'notelp.min' => 'Nomor telepon minimal 10 karakter.',
                'notelp.max' => 'Nomor telepon maksimal 15 karakter.',
                'notelp.unique' => 'Nomor telepon sudah digunakan.'
            ]);
            $validatedData['notelp'] = $request->input('notelp');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors->add('notelp', $e->validator->errors()->first('notelp'));
            unset($request['notelp']);
        }

        // Validate 'email'
        try {
            $request->validate([
                'email' => ['nullable', 'email:dns', 'unique:users,email,' . $user->id]
            ], [
                'email.unique' => 'Email sudah digunakan.',
                'email.email' => 'Email tidak valid.'
            ]);
            $validatedData['email'] = $request->input('email');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors->add('email', $e->validator->errors()->first('email'));
            unset($request['email']);
        }

        // Validate 'address'
        try {
            $request->validate([
                'address' => ['nullable', 'string', 'min: 5', 'max:255']
            ], [
                'address.min' => 'Alamat minimal 5 karakter.',
                'address.max' => 'Alamat maksimal 255 karakter.'
            ]);
            $validatedData['address'] = $request->input('address');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors->add('address', $e->validator->errors()->first('address'));
            unset($request['address']);
        }

        // Validate 'date_birth'
        try {
            $request->validate([
                'date_birth' => ['nullable', 'date']
            ]);
            $validatedData['date_birth'] = $request->input('date_birth');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors->add('date_birth', 'Tanggal lahir tidak valid.');
            unset($request['date_birth']);
        }

        // ADD LOGIC HERE
        // return redirect()->route('user.profile')->withErrors([
        //     'email' => 'Setidaknya mempunyai satu kontak yang terverifikasi.',
        //     'notelp' => 'Setidaknya mempunyai satu kontak yang terverifikasi.'
        // ]);

        $changesMade = false;

        // Check if the fields have been modified
        foreach ($validatedData as $key => $value) {
            if ($user->$key !== $value) {
                $changesMade = true;
                break;  // No need to check further if one change is found
            }
        }

        // Check if the email was successfully validated and has changed
        if (isset($validatedData['email']) && $user->email !== $validatedData['email']) {
            $email = $validatedData['email'];
            unset($validatedData['email']);
        }

        // Check if the phone number has changed (and is valid)
        if (isset($validatedData['notelp']) && $user->notelp !== $validatedData['notelp']) {
            $notelp = $validatedData['notelp'];
            unset($validatedData['notelp']);
        }

        if ($changesMade) {
            $user->update($validatedData);
            if (isset($email)) {
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
                    'email' => $email,
                    'id_token' => $id_token,
                    'token' => $token,
                    'created_at' => Carbon::now(),
                    'type' => 3
                ]);

                // Send the verification email with the token
                $this->emailVerificationService->sendVerificationEmail($email, $token);
                return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $email, 'type' => 3]);

            }
            if (isset($notelp)) {
                if (VerificationToken::where('user_id', $user->id)->exists()) {
                    VerificationToken::where('user_id', $user->id)->delete();
                }

                // Generate a new verification token
                $token = 1;

                $id_token = Str::uuid()->toString();

                // Store the token in the verification_tokens table
                VerificationToken::create([
                    'user_id' => $user->id,
                    'notelp' => $notelp,
                    'id_token' => $id_token,
                    'token' => $token,
                    'created_at' => Carbon::now(),
                    'type' => 3
                ]);

                // Send the verification email with the token
                $this->twilioVerificationService->sendVerificationSMS($notelp);
                return redirect()->route('verification.show', ['id_token' => $id_token, 'notelp' => $notelp, 'type' => 3]);
            }
            return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!')->withErrors($errors);
        }
        return back()->withErrors($errors);
    }

    public function sendVerificationEmail(Request $request){
        if (!$request->has('id_token')) {
            abort(400, 'Invalid token.');
        }

        $verificationToken = VerificationToken::where('id_token', $request->id_token)->first();
        if (!$verificationToken ||
            $verificationToken->email !== $request->email ||
            $verificationToken->notelp !== $request->notelp ||
            $verificationToken->type !== (int)$request->type){
            abort(400, 'Invalid token.');
        }

        // Check if there is already a verification token for the user
        if (VerificationToken::where('id_token', $request->id_token)->exists()) {
            VerificationToken::where('id_token', $request->id_token)->delete();
        }
        // Generate a new verification token
        $token = mt_rand(10000, 99999);

        $id_token = Str::uuid()->toString();

        if ((int)$verificationToken->type === 0) {
            VerificationToken::create([
                'username' => $verificationToken->username,
                'name' => $verificationToken->name,
                'email' => $verificationToken->email,
                'password' => $verificationToken->password,
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now(),
                'type' => $verificationToken->type
            ]);
        }else{
            // Store the token in the verification_tokens table
            $user = User::where('id', $verificationToken->user_id)->first();
            VerificationToken::create([
                'user_id' => $user->id,
                'email' => $verificationToken->email,
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now(),
                'type' => $verificationToken->type
            ]);
        }

        // Send the verification email with the token
        $this->emailVerificationService->sendVerificationEmail($verificationToken->email, $token);
        return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $request->email, 'type' => $request->type])->with('success', 'Kode Verifikasi telah dikirim ulang.');
    }

    public function sendVerificationTelp(Request $request){
        if (!$request->has('id_token')) {
            abort(400, 'Invalid token.');
        }

        $verificationToken = VerificationToken::where('id_token', $request->id_token)->first();
        if (!$verificationToken ||
            $verificationToken->email !== $request->email ||
            $verificationToken->notelp !== $request->notelp ||
            $verificationToken->type !== (int)$request->type) {
            abort(400, 'Invalid token.');
        }

        // Revoke old tokens associated with the user
        if (VerificationToken::where('id_token', $request->id_token)->exists()) {
            VerificationToken::where('id_token', $request->id_token)->delete();
        }

        // Generate a new verification token
        $token = 1;

        $id_token = Str::uuid()->toString();

        if ((int)$request->type === 0) {
            VerificationToken::create([
                'username' => $verificationToken->username,
                'name' => $verificationToken->name,
                'notelp' => $verificationToken->notelp,
                'password' => $verificationToken->password,
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now(),
                'type' => $verificationToken->type
            ]);
        }
        else {
            $user = User::where('id', $verificationToken->user_id)->first();
            VerificationToken::create([
                'user_id' => $user->id,
                'notelp' => $verificationToken->notelp,
                'id_token' => $id_token,
                'token' => $token,
                'created_at' => Carbon::now(),
                'type' => $verificationToken->type
            ]);
        }

        // Send the verification email with the token
        $this->twilioVerificationService->sendVerificationSMS($verificationToken->notelp);
        return redirect()->route('verification.show', ['id_token' => $id_token, 'notelp' => $request->notelp, 'type' => $request->type])->with('success', 'Kode Verifikasi telah dikirim ulang.');
    }

    public function uploadCroppedImage(Request $request){
        $request->validate([
            'cropped_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $image = $request->file('cropped_image');

        // Delete the old image if it exists
        if (!empty($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Save the new image to the public directory
        $image = Storage::disk('public')->putFileAs('/', $image, Str::uuid() . '.' . $image->extension());

        // Update the user's avatar path in the database
        $user->avatar = $image;
        $user->save();

        // Return a response with the HTTPS URL
        session()->flash('success2', 'Foto Profil berhasil diperbarui!');
        return response()->json([
            'success' => true,
            'redirect_url' => route('user.profile')
        ]);
    }
}
