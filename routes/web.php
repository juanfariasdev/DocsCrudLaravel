<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('guest')->group(function () {
    // Rota raiz redirecionando para a página de login
    Route::get('/', function () {
        return redirect('/login');
    });

    // Rotas de autenticação
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Rotas protegidas (autenticadas)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/usuarios', [DashboardController::class, 'usuarios'])->name('dashboard.usuarios');

    Route::get('/dashboard/perfil', [DashboardController::class, 'perfil'])->name('perfil');
    Route::post('/dashboard/perfil', [DashboardController::class, 'updatePerfil'])->name('perfil.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Adicione outras rotas protegidas aqui
});