<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenukaranSampahController;
use App\Http\Controllers\PenukaranPoinController;

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
    Route::get('/pengguna', [UserDashboardController::class, 'index']);

    Route::get('/pengguna/penukaran_poin', function () {
        return view('dashboard.dashboardPengguna_penukaran');
    });

    Route::get('/pengguna/jadwal', function () {
        return view('dashboard.dashboardPengguna_jadwal');
    });

    Route::get('/pengguna/profil', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::post('/pengguna/profil/update', [UserDashboardController::class, 'update'])->name('user.update');
    Route::post('/pengguna/profil/update-image', [UserDashboardController::class, 'uploadCroppedImage'])->name('upload.cropped.image');
});

// ============= Admin =============
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard_admin.dashboardAdmin_index');
    });

    Route::get('/admin/penukaran_poin', function () {
        return view('dashboard_admin.dashboardAdmin_penukaranPoin');
    });

    Route::get('/admin/penukaran_sampah', function () {
        return view('dashboard_admin.dashboardAdmin_penukaranSampah');
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
Route::post('/tukar_sampah', [PenukaranSampahController::class, 'store']);
Route::post('/tukar_poin', [PenukaranPoinController::class, 'store']);
