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

        // Validate user data
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'type' => 'nullable|string|in:Admin,Empresa,Funcionario,Convidado',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:20',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
        ]);

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->filled('type')) {
            $user->type = $request->input('type');
        }
        
        $user->save();

        // Update or create address
        $user->address()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'rua' => $request->input('rua'),
                'numero' => $request->input('numero'),
                'bairro' => $request->input('bairro'),
                'cep' => $request->input('cep'),
                'cidade' => $request->input('cidade'),
                'estado' => $request->input('estado'),
            ]
        );
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'type' => 'required|string|in:Admin,Empresa,Funcionario,Convidado',
        ]);
    
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type'),
        ]);
    }
    public function delete($id)
    {
        User::destroy($id);
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
