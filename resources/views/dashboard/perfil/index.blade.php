<x-layouts.dashboard>
    <div class="max-w-3xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-6">Meu Perfil</h1>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('perfil.update') }}">
            @csrf

            <!-- Nome -->
            <div class="mb-4">
                <label for="name" class="block text-base font-medium text-gray-700">Nome</label>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    value="{{ old('name', $user->name) }}" 
                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-base focus:outline-none focus:border-gray-400 focus:bg-white @error('name') border-red-500 @enderror" 
                    required
                />
                @error('name')
                    <span class="text-red-500 text-base">{{ $message }}</span>
                @enderror
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label for="password" class="block text-base font-medium text-gray-700">Nova Senha</label>
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    placeholder="Deixe em branco para manter a senha atual" 
                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-base focus:outline-none focus:border-gray-400 focus:bg-white @error('password') border-red-500 @enderror"
                />
                @error('password')
                    <span class="text-red-500 text-base">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirmação de Senha -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-base font-medium text-gray-700">Confirmar Nova Senha</label>
                <input 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-base focus:outline-none focus:border-gray-400 focus:bg-white"
                />
            </div>

            <!-- Botão de Salvar -->
            <div>
                <x-partials.button text="Salvar Alterações" />
            </div>
        </form>
    </div>
</x-layouts.dashboard>