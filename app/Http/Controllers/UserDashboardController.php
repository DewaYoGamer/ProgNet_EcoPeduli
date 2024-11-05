<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect('/admin'); // Redirect to admin dashboard
            }
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
}
