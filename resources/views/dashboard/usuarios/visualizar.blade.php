@section('title', 'Reviews do Usuário')
<x-layouts.dashboard>
    <!-- Seção de Visualização de Reviews do Usuário -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        @if (session('status'))
            <div class="bg-primary text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold">Usuário: {{ $user->name }}</h2>

            </div>
            <a href="{{ route('usuarios') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Voltar para Usuários
            </a>
        </div>
        <div class="mb-2">
            <h2 class="text-base font-medium">Email: {{ $user->email }}</h2>
            <h2 class="text-base font-medium">Tipo: {{ $user->type }}</h2>
            <h2 class="text-base font-medium">CEP: {{ $user->address->cep ?? 'N/A' }}</h2>
            <h2 class="text-base font-medium">Rua: {{ $user->address->rua ?? 'N/A' }}</h2>
            <h2 class="text-base font-medium">Número: {{ $user->address->numero ?? 'N/A' }}</h2>
            <h2 class="text-base font-medium">Bairro: {{ $user->address->bairro ?? 'N/A' }}</h2>
            <h2 class="text-base font-medium">Cidade: {{ $user->address->cidade ?? 'N/A' }}</h2>
            <h2 class="text-base font-medium">Estado: {{ $user->address->estado ?? 'N/A' }}</h2>
        </div>
        <h2 class="text-xl font-bold">Reviews Recebidos</h2>

        @if($reviews->isEmpty())
            <p class="text-gray-600">Este usuário ainda não recebeu nenhum reviews.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="w-1/6 px-4 py-2 text-left text-gray-600 font-semibold">Usuário</th>
                            <th class="w-1/2 px-4 py-2 text-left text-gray-600 font-semibold">Comentário</th>
                            <th class="w-1/6 px-4 py-2 text-center text-gray-600 font-semibold">Nota</th>
                            <th class="w-1/6 px-4 py-2 text-center text-gray-600 font-semibold">Data e Hora</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($reviews as $review)
                            <tr class="border-b {{ $review->rating ?? 'bg-red-400' }}">
                                <td class="px-4 py-2">{{ $review->user->name }}</td>
                                <td class="px-4 py-2">{{ $review->feedback }}</td>
                                <td class="px-4 py-2 text-center">{{ $review->rating }}</td>
                                <td class="px-4 py-2 text-center">{{ $review->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <h2 class="text-xl font-bold mt-4">Reviews Feitos</h2>

        @if($user->reviews->isEmpty())
            <p class="text-gray-600">Este usuário ainda não fez nenhum reviews.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="w-1/6 px-4 py-2 text-left text-gray-600 font-semibold">Usuário</th>
                            <th class="w-1/2 px-4 py-2 text-left text-gray-600 font-semibold">Comentário</th>
                            <th class="w-1/6 px-4 py-2 text-center text-gray-600 font-semibold">Nota</th>
                            <th class="w-1/6 px-4 py-2 text-center text-gray-600 font-semibold">Data e Hora</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($user->reviews as $review)
                            <tr class="border-b {{ $review->rating ?? 'bg-red-400' }}">
                                <td class="px-4 py-2">{{ $review->user->name }}</td>
                                <td class="px-4 py-2">{{ $review->feedback }}</td>
                                <td class="px-4 py-2 text-center">{{ $review->rating }}</td>
                                <td class="px-4 py-2 text-center">{{ $review->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layouts.dashboard>