<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function store(Request $request){
        // Memvalidasi Tota Poin
        DB::table('tb_jadwal_pengambilan')
            ->insert([
                'tanggal' => $request->tanggal,
                'jenis_sampah' => $request->jenis_sampah,
                'created_at' => Carbon::now('Asia/Singapore'),
                'updated_at' => Carbon::now('Asia/Singapore')
            ]);
        
        return redirect('/operator/jadwal_pengambilan')->with('success', 'Jadwal pengambilan berhasil ditambahkan!');
        
    }
}
