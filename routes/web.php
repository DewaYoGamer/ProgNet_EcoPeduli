<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenukaranSampahController;
use App\Http\Controllers\PenukaranPoinController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducateController;
use App\Http\Controllers\VerificationController;
use App\Http\Middleware\RedirectIfAuthenticated;

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

Route::prefix('educate')->group(function () {
    Route::get('/', [EducateController::class, 'index']);
    Route::get('/pemilahan', [EducateController::class, 'pemilahan']);
    Route::get('/dampak', [EducateController::class, 'dampak']);
    Route::get('/pengelolaan', [EducateController::class, 'pengelolaan']);
});

Route::get('/test', function () {
    return view('test');
});

// ============= Auth =============
Route::middleware(RedirectIfAuthenticated::class)->group(function(){
    Route::get('/login', function () {
        return view('auth.login') ;
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::get('/forgot', function () {
    return view('auth.forgot');
});

Route::get('/new_password', function () {
    return view('auth.new_password');
});

Route::get('/succes_change', function () {
    return view('auth.succes_change');
});

// ============= Dashboard =============
Route::middleware(['auth'])->group(function () {
    Route::get('/pengguna', [UserDashboardController::class, 'index'])->name('dashboard.pengguna');

    Route::get('/pengguna/penukaran_poin', function () {
        return view('dashboard.dashboardPengguna_penukaran');
    });

    Route::get('/pengguna/jadwal', function () {
        return view('dashboard.dashboardPengguna_jadwal');
    });

    Route::get('/pengguna/profil', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::post('/pengguna/profil/update', [UserDashboardController::class, 'update'])->name('user.update');
    Route::post('/pengguna/profil/update-image', [UserDashboardController::class, 'uploadCroppedImage'])->name('upload.cropped.image');

    // Route to handle email verification request
    Route::get('/pengguna/profil/verify-email', [UserDashboardController::class, 'sendVerificationEmail'])->name('user.sendVerificationEmail');
});

// ============= Admin =============
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserDashboardController::class, 'index_admin']);

    Route::get('/admin/penukaran_poin', function () {
        return view('dashboard_admin.dashboardAdmin_penukaranPoin');
    });

    Route::get('/admin/penukaran_sampah', function () {
        return view('dashboard_admin.dashboardAdmin_penukaranSampah');
    });
});

// ============= Operator =============
Route::middleware(['auth'])->group(function () {
    Route::get('/operator', [UserDashboardController::class, 'index_operator']);

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
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/tukar_sampah', [PenukaranSampahController::class, 'store']);
Route::post('/tukar_poin', [PenukaranPoinController::class, 'store']);
Route::post('/terima_penukaran_sampah', [AdminController::class, 'updateData']);
Route::post('/cari_data_sampah', [AdminController::class, 'searchData']);
Route::post('/cari_data_poin', [AdminController::class, 'searchData_Poin']);
Route::post('/terima_penukaran_poin', [AdminController::class, 'updateData_Poin']);

Route::get('/verification', [VerificationController::class, 'show'])->name('verification.show');
Route::post('/verification', [VerificationController::class, 'verify'])->name('verification.verify');
