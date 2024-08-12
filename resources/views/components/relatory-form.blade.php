@props(['users' => collect([])]) <!-- Converte o array em uma coleção -->

<div class="w-full">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Estatísticas Gerais</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Quantidade total de usuários</h3>
                <p class="text-3xl font-bold text-green-600">{{ $users->count() }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Quantidade de empresas</h3>
                <p class="text-3xl font-bold text-red-600">{{ $users->where('type', 'Empresa')->count() }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Quantidade de funcionários</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $users->where('type', 'Funcionario')->count() }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Quantidade de convidados</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ $users->where('type', 'Convidado')->count() }}</p>
            </div>
        </div>
    </div>
</div>
