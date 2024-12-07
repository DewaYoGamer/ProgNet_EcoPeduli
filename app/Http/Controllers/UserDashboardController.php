<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\VerificationEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Twilio\Rest\Client;
use App\Models\VerificationToken;

class UserDashboardController extends Controller
{
    public function index()
    {
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

    private function redirectToRole($role)
    {
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

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.dashboardPengguna_profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->notelp !== null) {
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

        // Check if the email was successfully validated and has changed
        if (isset($validatedData['email']) && $user->email !== $validatedData['email']) {
            $validatedData['email_verified_at'] = null;
        }

        // Check if the phone number has changed (and is valid)
        if (isset($validatedData['notelp']) && $user->notelp !== $validatedData['notelp']) {
            $validatedData['phone_verified_at'] = null;
        }

        $changesMade = false;

        // Check if the fields have been modified
        foreach ($validatedData as $key => $value) {
            if ($user->$key !== $value) {
                $changesMade = true;
                break;  // No need to check further if one change is found
            }
        }

        if ($changesMade) {
            $user->update($validatedData);
            return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!')->withErrors($errors);
        }
        return back()->withErrors($errors);
    }

    public function sendVerificationEmail(Request $request)
    {
        $user = Auth::user();

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
        ]);

        // Send the verification email with the token
        try {
            Mail::to($user->email)->send(new VerificationEmail($token));
        } catch (\Exception $e) {
            Log::error('Failed to send verification email: ' . $e->getMessage());
        }

        return redirect()->route('verification.show', ['id_token' => $id_token, 'email' => $user->email])->with('success', 'Kode Verifikasi telah dikirim ulang.');
    }

    public function sendVerificationTelp(Request $request)
    {
        $user = Auth::user();

        // Revoke old tokens associated with the user
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
        ]);

        // Send the verification email with the token
        try {
            $sid = getenv("TWILIO_ACCOUNT_SID");
            $authToken = getenv("TWILIO_AUTH_TOKEN");
            $twilio = new Client($sid, $authToken);
            $verification = $twilio->verify->v2->services(getenv("TWILIO_SERVICE_SID"))
                                   ->verifications
                                   ->create("$user->notelp" , "sms");
        } catch (\Exception $e) {
            Log::error('Failed to send verification email: ' . $e->getMessage());
        }

        return redirect()->route('verification.show', ['id_token' => $id_token, 'notelp' => $user->notelp])->with('success', 'Kode Verifikasi telah dikirim ulang.');
    }

    public function uploadCroppedImage(Request $request)
    {
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

        \Log::info(Storage::url($user->avatar));

        // Return a response with the HTTPS URL
        session()->flash('success2', 'Foto Profil berhasil diperbarui!');
        return response()->json([
            'success' => true,
            'redirect_url' => route('user.profile')
        ]);
    }
}
