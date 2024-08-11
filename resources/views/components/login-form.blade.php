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
            <i id="eyeOpen" class="fas fa-eye" style="display: none;"></i>
            <!-- Ícone de olho fechado -->
            <i id="eyeClosed" class="fas fa-eye-slash"></i>
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
            eyeOpen.style.display = 'inline';
            eyeClosed.style.display = 'none';
        } else {
            eyeOpen.style.display = 'none';
            eyeClosed.style.display = 'inline';
        }
    });
</script>
