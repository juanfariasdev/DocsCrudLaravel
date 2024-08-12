<x-layouts.dashboard>
    <!-- Seção de Gerenciamento de Usuários -->
    <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
        <h2 class="text-xl font-bold mb-4">Gerenciamento de Usuários</h2>
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
                                <a @click="deleteUser({{ $user->id }})" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
