<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Regras de validação
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];

        // Validação dos dados
        $validator = Validator::make($request->all(), $rules);

        // Se a validação falhar
        if ($validator->fails()) {
            return redirect('/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se a validação passar
        return redirect('/home'); // Exemplo de redirecionamento após login bem-sucedido
    }
    public function register(Request $request)
    {
        // Regras de validação
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ];
        // $rules = [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6|confirmed',
        // ];
    
        // Mensagens de validação personalizadas
        $messages = [
            'name.required' => 'O campo nome completo é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ];
    
        // Validação dos dados
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Se a validação falhar
        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        // Se a validação passar, você pode salvar o usuário no banco de dados aqui
        // User::create([...]);
    
        return redirect('/home'); // Exemplo de redirecionamento após cadastro bem-sucedido
    }    
}
