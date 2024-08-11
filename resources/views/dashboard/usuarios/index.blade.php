<x-layouts.dashboard>
<div class="flex flex-partials.wrap -mx-partials.3">
    <!-- Seção de Bem-vindo e Ações Rápidas -->
    <div class="w-full lg:w-1/3 px-partials.3 mb-6 lg:mb-0">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Bem-vindo!</h2>
            <p class="mb-4 text-gray-600">Aqui estão suas ações rápidas:</p>
            <x-partials.button text="Nova Tarefa" class="bg-blue-500 hover:bg-blue-700" />
            <x-partials.button text="Relatório Diário" class="bg-green-500 hover:bg-green-700 mt-2" />
        </div>
    </div>

    <!-- Seção de Estatísticas -->
    <div class="w-full lg:w-2/3 px-partials.3">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Estatísticas Gerais</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Tarefas Concluídas</h3>
                    <p class="text-3xl font-bold text-green-600">42</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Tarefas Pendentes</h3>
                    <p class="text-3xl font-bold text-red-600">8</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Relatórios Submetidos</h3>
                    <p class="text-3xl font-bold text-blue-600">15</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">Usuários Ativos</h3>
                    <p class="text-3xl font-bold text-yellow-600">128</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Formulário para Nova Tarefa -->
<div class="bg-white rounded-lg shadow-lg p-6 mt-6">
    <h2 class="text-xl font-bold mb-4">Criar Nova Tarefa</h2>
    <form action="#" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-partials.input-field type="text" name="task_title" label="Título da Tarefa" placeholder="Digite o título da tarefa" required />
            <x-partials.input-field type="date" name="due_date" label="Data de Vencimento" placeholder="Selecione a data de vencimento" required />
        </div>
        <x-partials.button text="Criar Tarefa" class="bg-blue-500 hover:bg-blue-700 mt-4" />
    </form>
</div>
</x-layouts.dashboard>
