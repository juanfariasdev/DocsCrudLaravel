@section('title', 'Cadastrar usuário')
<x-layouts.dashboard>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Cadastrar Usuário</h1>
            <button id="generate-data" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Gerar Dados
            </button>
        </div>
        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif
        <x-user-register-form action="{{ route('usuarios.store') }}">
            <x-partials.button text="Cadastrar Usuário" />
        </x-user-register-form>
    </div>

    <!-- Script para Gerar Dados -->
    <script>
        document.getElementById('generate-data').addEventListener('click', function() {
            const randomName = `Usuário ${Math.floor(Math.random() * 1000)}`;
            const randomEmail = `user${Math.floor(Math.random() * 1000)}@example.com`;
            const randomPassword = 'senha123';
            const randomCEP = '01001000'; // CEP do exemplo para São Paulo
            const randomRua = 'Praça da Sé';
            const randomNumero = '100';
            const randomBairro = 'Sé';
            const randomCidade = 'São Paulo';
            const randomEstado = 'SP';
            const randomType = 'Empresa'; // Pode ser ajustado para outros valores

            document.querySelector('[name="name"]').value = randomName;
            document.querySelector('[name="email"]').value = randomEmail;
            document.querySelector('[name="password"]').value = randomPassword;
            document.querySelector('[name="password_confirmation"]').value = randomPassword;
            document.querySelector('[name="cep"]').value = randomCEP;
            document.querySelector('[name="rua"]').value = randomRua;
            document.querySelector('[name="numero"]').value = randomNumero;
            document.querySelector('[name="bairro"]').value = randomBairro;
            document.querySelector('[name="cidade"]').value = randomCidade;
            document.querySelector('[name="estado"]').value = randomEstado;
            document.querySelector('[name="type"]').value = randomType;
        });
    </script>
</x-layouts.dashboard>
