<div
    x-data="{}"
    x-bind:class="{ 'dark': {{ $darkMode ? 'true' : 'false' }} }"
    class="mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden"
>
    <div class="px-4 py-5 sm:p-6">
        <div class="flex items-center justify-between border-b dark:border-gray-700 pb-4 mb-4">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Lista de Tarefas
            </h2>
            <button
                wire:click="toggleDarkMode"
                type="button"
                class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                <svg x-show="!{{ $darkMode ? 'true' : 'false' }}" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
                <svg x-show="{{ $darkMode ? 'true' : 'false' }}" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </button>
        </div>
        
        <form wire:submit.prevent="addTask">
            <div class="flex items-center space-x-2 mb-6">
                <input
                    wire:model.defer="newTask"
                    type="text"
                    placeholder="Adicionar nova tarefa..."
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md"
                    required
                >
                <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Adicionar
                </button>
            </div>
        </form>
        
        <div class="mb-4">
            <div class="flex items-center space-x-4 text-sm border-b dark:border-gray-700 pb-3 mb-4">
                <button
                    wire:click="setFilter('all')"
                    class="font-medium {{ !$filter ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}"
                >
                    Todas ({{ $tasks->count() }})
                </button>
                <button
                    wire:click="setFilter('active')"
                    class="font-medium {{ $filter === 'active' ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}"
                >
                    Ativas ({{ $remainingCount }})
                </button>
                <button
                    wire:click="setFilter('completed')"
                    class="font-medium {{ $filter === 'completed' ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}"
                >
                    Concluídas ({{ $completedCount }})
                </button>
            </div>
        </div>
        
        {{-- Lista de tarefas --}}
        <div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($filteredTasks as $task)
                    <li class="py-3 flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                wire:click="toggleComplete('{{ $task['id'] }}')"
                                type="checkbox"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-gray-600 rounded"
                                {{ $task['completed'] ? 'checked' : '' }}
                            >
                            <span class="ml-3 text-sm {{ $task['completed'] ? 'line-through text-gray-500 dark:text-gray-400' : 'text-gray-900 dark:text-white' }}">
                                {{ $task['text'] }}
                            </span>
                        </div>
                        <button
                            wire:click="removeTask('{{ $task['id'] }}')"
                            class="text-gray-400 hover:text-red-500 dark:hover:text-red-400"
                        >
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </li>
                @empty
                    <li class="py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                        Nenhuma tarefa encontrada.
                    </li>
                @endforelse
            </ul>
        </div>
        
        @if($completedCount > 0)
            <div class="mt-4 flex justify-end">
                <button
                    wire:click="clearCompleted"
                    class="text-sm text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                >
                    Limpar concluídas
                </button>
            </div>
        @endif
    </div>
</div> 