<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function updateData(Request $request)
    {
        // Mengambil data pengguna
        $data_pengguna = DB::table('users')
            ->where('username', $request->nama_pengguna)
            ->first();
        
        $poin_pengguna = $data_pengguna->poin;
        $poin_before = $poin_pengguna;
        $poin_after = $poin_before + $request->total_poin;

        // Tambahkan Poin
        DB::table('users')
            ->where('username', $request->nama_pengguna)
            ->update(['poin' =>  $poin_after]);

        // Update Acc
        DB::table('tb_penukaran_sampah')
            ->where('id', $request->id)
            ->update(['status' => 'accepted']);
        
        // Update Waktu
        DB::table('tb_penukaran_sampah')
            ->where('id', $request->id)
            ->update(['updated_at' => Carbon::now('Asia/Singapore')]);

        return redirect('/admin/penukaran_sampah')->with('success', 'Penukaran sampah berhasil dilakukan. Poin Diteruskan ke Pengguna.');
    }

    public function searchData(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'exists:tb_penukaran_sampah,id'],
        ]);
    
        $data = DB::table('tb_penukaran_sampah')->where('id', $request->id)->first();
    
        if ($data) {
            // Menyimpan data ke session
            return redirect('/admin/penukaran_sampah') -> with([
                'data' => $data
            ]);
        } else {
            return redirect('/admin/penukaran_sampah')->with('error', 'ID penukaran tidak ditemukan!');
        }
    }

    public function searchData_Poin(Request $request)
    {
        $validated = $request->validate([
            'kode_unik' => ['required', 'exists:tb_penukaran_poin,kode_unik'],
        ]);
    
        $data = DB::table('tb_penukaran_poin')->where('kode_unik', $request->kode_unik)->first();
    
        if ($data) {
            // Menyimpan data ke session
            return redirect('/admin/penukaran_poin') -> with([
                'data' => $data
            ]);
        } else {
            return redirect('/admin/penukaran_poin')->with('error', 'ID penukaran tidak ditemukan!');
        }
    }

    public function updateData_Poin(Request $request){
        // Mengambil data pengguna
        $data_pengguna = DB::table('users')
            ->where('username', $request->username)
            ->first();
        
        $poin_pengguna = $data_pengguna->poin;
        $poin_before = $poin_pengguna;
        $poin_after = $poin_before - $request->poin;

        // Kurangkan Poin
        DB::table('users')
            ->where('username', $request->username)
            ->update(['poin' =>  $poin_after]);
        
        // Update Acc
        DB::table('tb_penukaran_poin')
            ->where('kode_unik', $request->kode_unik)
            ->update(['status' => 'accepted']);
        
        // Update Waktu
        DB::table('tb_penukaran_poin')
            ->where('kode_unik', $request->kode_unik)
            ->update(['updated_at' => Carbon::now('Asia/Singapore')]);

        return redirect('/admin/penukaran_poin')->with('success', 'Penukaran poin berhasil dilakukan. Silahkan berikan barang kepada penukar!.');
    }
}
