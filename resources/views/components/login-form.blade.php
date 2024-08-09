<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold">Entrar</h1>
</div>

<form method="POST" action="/login" class="mx-auto max-w-xs mt-8">
    @csrf

    <div class="mb-4">
        <input
            name="email"
            value="{{ old('email') }}"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
            type="email" placeholder="E-mail" />
        @if ($errors->has('email'))
            <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="relative mb-4 w-full">
        <input
            id="password"
            name="password"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
            type="password" placeholder="Senha" />
        @if ($errors->has('password'))
            <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
        @endif
        <span id="togglePassword" class="absolute inset-y-0 right-3 flex items-center cursor-pointer w-5">
            <!-- Ícone de olho aberto -->
            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.297 5 12 5c4.703 0 8.268 2.943 9.542 7a9.036 9.036 0 01-1.518 2.839M4.098 18.582A8.937 8.937 0 010 12c1.271-4.057 4.837-7 9.542-7 2.72 0 5.208 1.1 6.867 2.9" />
            </svg>
            <!-- Ícone de olho fechado -->
            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M9.3 9.3A3 3 0 0112 15a3 3 0 01-2.7-1.7M1.958 12C3.732 7.943 7.297 5 12 5c1.978 0 3.862.628 5.4 1.7M15 12a3 3 0 00-3-3m-9.042 1.839A9.036 9.036 0 002.458 12z" />
            </svg>
        </span>
    </div>

    <button
        type="submit"
        class="mt-5 tracking-wide font-semibold bg-green-400 text-white-500 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
        <span class="ml-2">Entrar</span>
    </button>

    <div class="mt-6 text-center">
        <a href="/register" class="text-sm text-gray-600 hover:underline">
            Não tem uma conta? Cadastre-se aqui
        </a>
    </div>
</form>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const eyeOpen = document.querySelector('#eyeOpen');
    const eyeClosed = document.querySelector('#eyeClosed');

    togglePassword.addEventListener('click', function () {
        // Alterna o tipo de input de "password" para "text" e vice-versa
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Alterna entre os ícones de olho aberto e fechado
        if (type === 'text') {
            eyeOpen.style.display = 'block';
            eyeClosed.style.display = 'none';
        } else {
            eyeOpen.style.display = 'none';
            eyeClosed.style.display = 'block';
        }
    });
</script>
