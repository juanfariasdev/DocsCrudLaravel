<x-layouts.dashboard>
    <!-- Seção de Gerenciamento de Usuários -->
    <div class="bg-white rounded-lg shadow-lg p-6 mt-6" x-data="deleteUserModal()">
        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Gerenciamento de Usuários</h2>
            <a href="{{ route('usuarios.cadastrar') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Cadastrar Novo Usuário
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="w-1/3 px-4 py-2 text-left text-gray-600 font-semibold">Nome</th>
                        <th class="w-1/3 px-4 py-2 text-left text-gray-600 font-semibold">Email</th>
                        <th class="w-1/6 px-4 py-2 text-center text-gray-600 font-semibold">Tipo</th>
                        <th class="w-1/6 px-4 py-2 text-center text-gray-600 font-semibold">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-center">{{ $user->type }}</td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center space-x-4">
                                <a href="{{ route('usuarios.editar', ['id' => $user->id]) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a @click="openModal({{ $user }})" class="text-red-500 hover:text-red-700 cursor-pointer">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal de Confirmação para Deletar Usuário -->
        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-bold mb-4">Confirmar Exclusão</h3>
                <p class="mb-4">Tem certeza de que deseja excluir o usuário <strong x-text="name"></strong>?</p>
                <div class="flex justify-end">
                    <button @click="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Cancelar
                    </button>
                    <form :action="`/dashboard/usuarios/${userId}`" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Deletar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script AlpineJS para gerenciar o modal -->
    <script>
        function deleteUserModal() {
            return {
                open: false,
                userId: null,
                name: '',
                openModal(user) {
                    this.userId = user.id;
                    this.name = user.name;
                    this.open = true;
                },
                closeModal() {
                    this.open = false;
                }
            }
        }
    </script>
</x-layouts.dashboard>
