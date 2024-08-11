<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Exibe a página principal do dashboard.
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Exibe a página de usuários do dashboard.
     */
    public function usuarios()
    {
        return view('dashboard.usuarios.index');
    }

    /**
     * Exibe a página de perfil do dashboard.
     */
    public function perfil()
    {
        return view('dashboard.perfil.index');
    }
}
