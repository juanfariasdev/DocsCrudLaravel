<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

class DashboardController extends Controller
{
    protected $userService;
    protected $menuService;

    // Injeção de dependências no construtor
    public function __construct(UserService $userService, MenuService $menuService)
    {
        $this->userService = $userService;
        $this->menuService = $menuService;
    }

    /**
     * Exibe a página principal do dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $menuItems = $this->menuService->getMenuForUser($user);

        return view('dashboard.index', compact('menuItems'));
    }

    /**
     * Exibe a página de usuários do dashboard.
     */
    public function usuarios()
    {
        return view('dashboard.usuarios.index');
    }

    /**
     * Exibe a página de perfil do usuário.
     */
    public function perfil()
    {
        $user = Auth::user();
        return view('dashboard.perfil.index', compact('user'));
    }

    /**
     * Atualiza o perfil do usuário autenticado.
     */
    public function updatePerfil(Request $request)
    {
        $this->userService->updateUserProfile($request, Auth::user());
        return redirect()->route('perfil')->with('status', 'Perfil atualizado com sucesso!');
    }
}
