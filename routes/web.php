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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/usuarios', [DashboardController::class, 'usuarios'])
        ->middleware('can:view-dashboard-usuarios')
        ->name('dashboard.usuarios');
    
    Route::get('/dashboard/usuarios/cadastrar', [DashboardController::class, 'showStoreUsuario'])
    ->middleware('can:edit-dashboard-usuarios')
    ->name('dashboard.usuarios.cadastrar');

    Route::post('/dashboard/usuarios', [DashboardController::class, 'storeUsuario'])
    ->middleware('can:edit-dashboard-usuarios')
    ->name('dashboard.usuarios.store');

    Route::get('/dashboard/usuarios/{id}', [DashboardController::class, 'usuarioById'])
    ->middleware('can:view-dashboard-usuarios')
    ->name('dashboard.usuarios.editar');
    
    Route::put('/dashboard/usuarios/{id}', [DashboardController::class, 'updateUsuario'])
    ->middleware('can:view-dashboard-usuarios')
    ->name('dashboard.usuarios.update');


    Route::get('/dashboard/perfil', [DashboardController::class, 'perfil'])->name('perfil');
    Route::post('/dashboard/perfil', [DashboardController::class, 'updatePerfil'])->name('perfil.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
