<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\PasswordResetLinkController;



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

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

    // Envio do link de redefinição de senha
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    // Formulário de redefinição de senha
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

    // Redefinindo a senha
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

// Rotas para usuários autenticados (auth)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('can:review-permission')->group(function () {
        Route::post('/reviews/{id_empresa}', [ReviewController::class, 'storeReview'])->name('reviews.store');
        Route::get('/reviews/{id_empresa}/start', [ReviewController::class, 'startReviewRoute'])->name('reviews.start');
        Route::get('/reviews/{id_empresa}', [ReviewController::class, 'getReviewsByBusiness']);
        Route::delete('/reviews/{id_empresa}', [ReviewController::class, 'deleteReview']);
    });

    // Rotas protegidas para Gerenciamento de Usuários
    Route::middleware('can:view-dashboard-usuarios')->group(function () {
        Route::get('/dashboard/usuarios', [DashboardController::class, 'usuarios'])->name('usuarios');
        Route::get('/dashboard/usuarios/cadastrar', [DashboardController::class, 'showStoreUsuario'])->name('usuarios.cadastrar');
        Route::get('/dashboard/usuarios/{id}', [DashboardController::class, 'usuarioById'])->name('usuarios.editar');
    });

    Route::middleware('can:edit-dashboard-usuarios')->group(function () {
        Route::post('/dashboard/usuarios', [DashboardController::class, 'storeUsuario'])->name('usuarios.store');
        Route::put('/dashboard/usuarios/{id}', [DashboardController::class, 'updateUser'])->name('usuarios.update');
        Route::delete('/dashboard/usuarios/{id}', [DashboardController::class, 'deleteUsuario'])->name('usuarios.delete');
    });

    // Rotas protegidas para Relatórios
    Route::middleware('can:view-reports')->group(function () {
        Route::get('/dashboard/relatorio', [DashboardController::class, 'showRelatorioUsuario'])->name('usuarios.relatorio');
    });

    // Rotas para Perfil do Usuário
    Route::get('/dashboard/perfil', [DashboardController::class, 'perfil'])->name('perfil');
    Route::put('/dashboard/perfil', [DashboardController::class, 'updatePerfil'])->name('perfil.update');

    // Rota de logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
