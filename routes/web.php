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
Route::get('/pengguna', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin'); // Redirect to admin dashboard
        }
    }
    return view('dashboard.dashboardPengguna_index');
})->middleware('auth');

Route::get('/pengguna/penukaran_poin', function () {
    return view('dashboard.dashboardPengguna_penukaran');
}) -> middleware('auth');

Route::get('/pengguna/jadwal', function () {
    return view('dashboard.dashboardPengguna_jadwal');
}) -> middleware('auth');

Route::get('/pengguna/profil', function () {
    return view('dashboard.dashboardPengguna_profil');
}) -> middleware('auth');

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

// ============= Database CRUD =============
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
