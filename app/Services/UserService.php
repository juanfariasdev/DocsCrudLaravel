<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function updateUserProfile(Request $request, User $user)
    {
        
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->input('name');
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
    }
    public function updateUsuario(Request $request, $id)
    {
        $user = $this->getUserById($id);
    
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Verifica se o email é único, ignorando o email atual do usuário
            'password' => 'nullable|min:6|confirmed',
            'type' => 'nullable|string|in:Admin,Empresa,Funcionario,Convidado',
        ]);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('type')) {
        $user->type = $request->input('type');
    }
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->save();
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    }
    public function getAllUsers()
    {
        // Recupera todos os usuários
        return User::all();
    }
    public function getUserById($Id)
    {
        // Recupera todos os usuários
        return User::findOrFail($Id);
    }
}
