<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

class DashboardController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function usuarios()
    {
        return view('dashboard.usuarios.index');
    }

    public function perfil()
    {
        $user = Auth::user();
        return view('dashboard.perfil.index', compact('user'));
    }

    public function updatePerfil(Request $request)
    {
        $this->userService->updateUserProfile($request, Auth::user());
        return redirect()->route('perfil')->with('status', 'Perfil atualizado com sucesso!');
    }
}
