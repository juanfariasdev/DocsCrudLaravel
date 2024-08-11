<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $user = Auth::user();
        return view('dashboard.perfil.index', compact('user'));
    }
    public function updatePerfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->input('name');
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('perfil')->with('status', 'Perfil atualizado com sucesso!');
    }
}
