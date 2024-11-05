<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenukaranPoinController extends Controller
{
    public function store(Request $request)
    {
        // Memvalidasi Tota Poin
        $user = Auth::user();
        $validated = $request->validate([
            'totalPoints' => ['required', 'numeric', 'gt:0'],
        ]);

        if ($validated['totalPoints'] > $user->poin) {
            return redirect('/pengguna/penukaran_poin')->withErrors(['totalPoints' => 'Poin yang anda miliki kurang!']);
        }

        // Membuat kode unik
        $kodeUnik = $this->generateUniqueCode();

        // Membuat keterangan penukaran
        $keteranganPenukaran = "";
        if($request->cntBeras > 0){
            $keteranganPenukaran .= "Penukaran " . $request->cntBeras . " kg beras. ";
        }
        if($request->cntGula > 0){
            $keteranganPenukaran .= "Penukaran " . $request->cntGula . " kg gula. ";
        }
        if($request->cntMie > 0){
            $keteranganPenukaran .= "Penukaran " . $request->cntMie . " bungkus mie. ";
        }

        // Mengisi data yang bisa dimasukkan ke tabel
        $table_data['kode_unik'] = $kodeUnik;
        $table_data['username'] = $user->username;
        $table_data['poin'] = $validated['totalPoints'];
        $table_data['keterangan_penukaran'] = $keteranganPenukaran;
        $table_data['created_at'] = Carbon::now('Asia/Singapore');
        $table_data['updated_at'] = Carbon::now('Asia/Singapore');

        // Menyimpan data ke tabel
        DB::table('tb_penukaran_poin')->insert($table_data);

        // Mengurangi poin pengguna
        $poin_after = $user->poin - $validated['totalPoints'];
        DB::table('users')
            ->where('username', $user->username)
            ->update(['poin' =>  $poin_after]);

        return redirect('/pengguna/penukaran_poin')->with('success', 'Penukaran poin berhasil disimpan.');
    }

    private function generateUniqueCode()
    {
        do {
            // Membuat kode unik 5 karakter acak (kombinasi huruf dan angka)
            $kodeUnik = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5));
        } while (DB::table('tb_penukaran_poin')->where('kode_unik', $kodeUnik)->exists());

        return $kodeUnik;
    }
}
