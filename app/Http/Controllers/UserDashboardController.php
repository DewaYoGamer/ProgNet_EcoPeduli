<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Check if the user is an admin
        if (Auth::user()->role === 'admin') {
            return redirect('/dashboard_admin.dashboardAdmin_index'); // Redirect to admin dashboard
        } else if (Auth::user()->role === 'operator') {
            return redirect('/dashboard_operator.dashboardOperator_index'); // Redirect to operator dashboard
        }

        // Otherwise, load the user dashboard
        return view('dashboard.dashboardPengguna_index');
    }
}
