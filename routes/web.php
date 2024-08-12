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
    Route::redirect('/', '/login');

    // Rotas de autenticação
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Rotas para usuários autenticados (auth)
Route::middleware('auth')->group(function () {

    // Rotas do Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

        // Rotas para Gerenciamento de Usuários
        Route::middleware('can:view-dashboard-usuarios')->group(function () {
            Route::get('/dashboard/usuarios', [DashboardController::class, 'usuarios'])->name('usuarios');
            Route::get('/dashboard/usuarios/cadastrar', [DashboardController::class, 'showStoreUsuario'])->name('usuarios.cadastrar');
            Route::get('/dashboard/usuarios/{id}', [DashboardController::class, 'usuarioById'])->name('usuarios.editar');
        });

        Route::middleware('can:edit-dashboard-usuarios')->group(function () {
            Route::post('/dashboard/usuarios', [DashboardController::class, 'storeUsuario'])->name('usuarios.store');
            Route::put('/dashboard/usuarios/{id}', [DashboardController::class, 'updateUsuario'])->name('usuarios.update');
            Route::delete('/dashboard/usuarios/{id}', [DashboardController::class, 'deleteUsuario'])->name('usuarios.delete');
        });

        // Rotas para Perfil do Usuário
        Route::get('/dashboard/perfil', [DashboardController::class, 'perfil'])->name('perfil');
        Route::post('/dashboard/perfil', [DashboardController::class, 'updatePerfil'])->name('perfil.update');

    // Rota de logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});