<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// ============= Landing Page (Middeleware) =============
Route::get('/', function () {
    return view('index');
});

Route::get('/schedule', function () {
    return view('schedule');
});

Route::get('/exchange', function () {
    return view('exchange');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/educate', function () {
    return view('educate');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/pemilahan', function () {
    return view('educate_pemilahan');
});

Route::get('/dampak', function () {
    return view('educate_dampak');
});

Route::get('/pengelolaan', function () {
    return view('educate_pengelolaan');
});

// ============= Auth =============
Route::get('/login', function () {
    return view('auth.login');
}) -> name('login') -> middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
}) -> middleware('guest');

Route::get('/forgot', function () {
    return view('auth.forgot');
});

Route::get('/verification', function () {
    return view('auth.verification');
});

Route::get('/new_password', function () {
    return view('auth.new_password');
});

Route::get('/succes_change', function () {
    return view('auth.succes_change');
});

// ============= Dashboard =============
Route::middleware(['auth'])->group(function () {
    Route::get('/pengguna', function () {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin'); // Redirect to admin dashboard
            } else if (Auth::user()->role === 'operator') {
                return redirect('/operator'); // Redirect to operator dashboard
            }
        }
        return view('dashboard.dashboardPengguna_index');
    });
    
    Route::get('/pengguna/penukaran_poin', function () {
        return view('dashboard.dashboardPengguna_penukaran');
    });
    
    Route::get('/pengguna/jadwal', function () {
        return view('dashboard.dashboardPengguna_jadwal');
    });
    
    Route::get('/pengguna/profil', function () {
        return view('dashboard.dashboardPengguna_profil');
    }); 
});

// ============= Admin =============
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard_admin.dashboardAdmin_index');
    });

    Route::get('/admin/users', function () {
        return view('admin.dashboardAdmin_users');
    });

    Route::get('/admin/reports', function () {
        return view('admin.dashboardAdmin_reports');
    });

    Route::get('/admin/settings', function () {
        return view('admin.dashboardAdmin_settings');
    });
});

// ============= Operator =============
Route::middleware(['auth'])->group(function () {
    Route::get('/operator', function () {
        return view('dashboard_operator.dashboardOperator_index');
    });
    Route::get('/operator/penukaran_sampah', function () {
        return view('dashboard_operator.dashboardOperator_penukaranSampah');
    });
    Route::get('/operator/jadwal_pengambilan', function () {
        return view('dashboard_operator.dashboardOperator_tambahJadwal');
    });
    Route::get('/operator/profil', function () {
        return view('dashboard_operator.dashboardOperator_profilOperator');
    });
});

// ============= Database CRUD =============
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
