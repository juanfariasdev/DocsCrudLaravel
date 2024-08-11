<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('authUser'); // Certifique-se de que a view 'authUser' existe
    }

    // Método para exibir o formulário de registro
    public function showRegistrationForm()
    {
        return view('authUser'); // Certifique-se de que a view 'authUser' existe
    }

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

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redirecionar para a página inicial
            return redirect('/dashboard');
        } else {
            // Falha na autenticação, redirecionar de volta com mensagem de erro
            return redirect('/login')
                        ->withErrors(['email' => 'As credenciais fornecidas estão incorretas.'])
                        ->withInput();
        }
    }

    public function register(Request $request)
    {
        // Regras de validação
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];
    
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
    
        // Criação do usuário no banco de dados
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing da senha
        ]);
    
        return redirect('/dashboard'); // Redirecionamento após cadastro bem-sucedido
    }    
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidar a sessão do usuário e regenerar o token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirecionar o usuário para a página de login após o logout
        return redirect('/login');
    }
}
