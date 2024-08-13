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
        $users = $this->userService->getAllUsers();

        $menuItems = $this->menuService->getMenuForUser($user);

        return view('dashboard.index', compact('menuItems', 'users'));
    }
    public function showRelatorioUsuario()
    {
        $users = $this->userService->getAllUsers();
        return view('dashboard.relatorio.index', compact('users'));
    }


    /**
     * Exibe a página de usuários do dashboard.
     */
    public function usuarios()
    {
        $users = $this->userService->getAllUsers();

        return view('dashboard.usuarios.index', compact('users'));
    }
    public function usuarioById($id)
    {
        $user = $this->userService->getUserById($id);

        return view('dashboard.usuarios.editar', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->route('usuarios.editar', ['id' => $id])->with('status', 'Usuário atualizado com sucesso!');
    }
    public function deleteUsuario($id)
    {
        $this->userService->deleteUser($id);

        return redirect()->route('usuarios')->with('status', 'Usuário deletado com sucesso!');
    }

    public function showStoreUsuario()
    {
        return view('dashboard.usuarios.cadastrar');
    }

    public function storeUsuario(Request $request)
    {
        $this->userService->registerUser($request);

        return redirect()->route('usuarios')->with('status', 'Usuário cadastrado com sucesso!');
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
        $this->userService->updateUser($request, Auth::user()->id);
        return redirect()->route('perfil')->with('status', 'Perfil atualizado com sucesso!');
    }

}
