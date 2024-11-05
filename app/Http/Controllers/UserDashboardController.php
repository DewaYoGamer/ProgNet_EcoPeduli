<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'user') {
            return $this->redirectToRole($user->role);
        }

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
        if ($user->role !== 'operator') {
            return $this->redirectToRole($user->role);
        }

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
        if ($user->role !== 'admin') {
            return $this->redirectToRole($user->role);
        }

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
        $user -> update($request->all());
        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function uploadCroppedImage(Request $request)
    {
        $request->validate([
            'cropped_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $image = $request->file('cropped_image');
        $imageName = $user->id . '_' . time() . '.png'; // Append timestamp for uniqueness

        // Delete the old image if it exists
        if (!empty($user->avatar)) {
            $oldImagePath = public_path('images/users/' . $user->avatar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Save the new image to the public directory
        $image->move(public_path('images/users'), $imageName);

        // Update the user's avatar path in the database
        $user->avatar = $imageName;
        $user->save();

        // Return a response with the HTTPS URL
        session()->flash('success2', 'Foto Profil berhasil diperbarui!');
        return response()->json([
            'success' => true,
            'redirect_url' => route('user.profile')
        ]);
    }
}