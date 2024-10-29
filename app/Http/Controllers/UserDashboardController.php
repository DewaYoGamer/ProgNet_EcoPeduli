<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect('/admin'); // Redirect to admin dashboard
            } else if ($user->role === 'operator') {
                return redirect('/operator'); // Redirect to operator dashboard
            }
        }

        return view('dashboard.dashboardPengguna_index', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.dashboardPengguna_profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
