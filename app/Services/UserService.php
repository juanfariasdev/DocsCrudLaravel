<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function updateUser(Request $request, $id)
    {
        $user = $this->getUserById($id);

        // Validate user data
        $this->validateUserData($request, $user->id);

        // Update user data
        $this->updateUserData($user, $request);

        // Update or create address
        $this->updateOrCreateAddress($user, $request);

        return $user;
    }

    public function registerUser(Request $request)
    {
        $this->validateUserData($request);

        $user = $this->createUser($request);

        $this->updateOrCreateAddress($user, $request);

        return $user;
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    private function validateUserData(Request $request, $userId = null)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable|min:6|confirmed',
            'type' => 'nullable|string|in:Admin,Empresa,Funcionario,Convidado',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:20',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
        ]);
    }

    private function updateUserData(User $user, Request $request)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->filled('type')) {
            $user->type = $request->input('type');
        }

        $user->save();
    }

    private function updateOrCreateAddress(User $user, Request $request)
    {
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

    private function createUser(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type'),
        ]);
    }
}
