<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold">Cadastrar</h1>
</div>

<form method="POST" action="/register" class="mx-auto max-w-xs mt-8">
    @csrf

    <div class="mb-4">
        <input
            name="name"
            value="{{ old('name') }}"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
            type="text" placeholder="Nome Completo" />
        @if ($errors->has('name'))
            <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
        @endif
    </div>

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

    <div class="mb-4">
        <input
            name="password"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
            type="password" placeholder="Senha" />
        @if ($errors->has('password'))
            <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="mb-4">
        <input
            name="password_confirmation"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
            type="password" placeholder="Confirmar Senha" />
        @if ($errors->has('password_confirmation'))
            <span class="text-red-500 text-sm">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>

    <button
        type="submit"
        class="mt-5 tracking-wide font-semibold bg-green-400 text-white-500 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
        <span class="ml-2">Cadastrar</span>
    </button>

    <div class="mt-6 text-center">
        <a href="/login" class="text-sm text-gray-600 hover:underline">
            Já tem uma conta? Entre aqui
        </a>
    </div>
</form>
