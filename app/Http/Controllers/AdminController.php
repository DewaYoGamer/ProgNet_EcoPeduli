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
        // Update poin pengguna di tabel users
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
}
