<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class PenukaranSampahController extends Controller
{
    public function store(Request $request)
    {
        // Mengisi Tabel Penukaran Sampah
        $user = Auth::user();
        $validated = $request->validate([
            'nama_pengguna' => ['required', 'string', 'exists:users,username'],
            'tipe_sampah' => ['required', 'string'],
            'berat' => ['required', 'numeric', 'min:1'],
            'catatan' => ['nullable', 'string'],
            'total_poin' => ['required', 'numeric', 'min:1'],
        ]);
        $validated['nama_operator'] = $user->username;
        $validated['created_at'] = Carbon::now();
        $validated['updated_at'] = Carbon::now();
        DB::table('tb_penukaran_sampah')->insert($validated);

        // Update poin pengguna di tabel users
        $poin_pengguna = User::where('username', $validated['nama_pengguna'])->first();
        $poin_before = $poin_pengguna->poin;
        $poin_after = $poin_before + $request->total_poin;

        DB::table('users')
            ->where('username', $request->nama_pengguna)
            ->update(['poin' =>  $poin_after]);
        
        return redirect('/operator/penukaran_sampah')->with('success', 'Penukaran poin berhasil disimpan.');
    }
}
