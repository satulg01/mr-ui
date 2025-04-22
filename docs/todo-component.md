# Componente Todo

O componente Todo é uma lista de tarefas interativa e personalizável criada com Laravel Livewire.

![Todo Component](https://via.placeholder.com/800x400?text=Todo+Component)

## Recursos

- Adicionar novas tarefas
- Marcar tarefas como concluídas
- Remover tarefas individuais
- Filtrar tarefas por status (todas, ativas, concluídas)
- Limpar todas as tarefas concluídas
- Alternar entre modo claro e escuro
- Estilizado com Tailwind CSS
- Totalmente responsivo

## Instalação

Certifique-se de ter instalado o pacote MR-UI seguindo as instruções na [documentação principal](../README.md).

## Uso básico

```html
<livewire:mrui-todo />
```

Este código renderizará um componente Todo vazio com todas as funcionalidades.

## Uso avançado

### Com tarefas pré-definidas

```php
// No seu controlador
use Illuminate\Support\Collection;

public function index()
{
    $tasks = collect([
        [
            'id' => '1',
            'text' => 'Aprender Laravel',
            'completed' => true,
            'created_at' => now()->subDays(2)
        ],
        [
            'id' => '2',
            'text' => 'Criar um projeto com Livewire',
            'completed' => false,
            'created_at' => now()->subDay()
        ],
    ]);
    
    return view('home', compact('tasks'));
}
```

```html
<!-- Na sua view -->
<livewire:mrui-todo :tasks="$tasks" />
```

### Com modo escuro ativado

```html
<livewire:mrui-todo :dark-mode="true" />
```

## Propriedades

| Nome | Tipo | Padrão | Descrição |
|------|------|--------|-----------|
| tasks | Collection | Collection vazia | Coleção de tarefas inicial |
| darkMode | boolean | false | Define se o modo escuro está ativado |
| filter | string\|null | null | Filtro atual (null = todas, 'active' = ativas, 'completed' = concluídas) |
| newTask | string | '' | Campo para nova tarefa a ser adicionada |

## Eventos

| Nome | Descrição |
|------|-----------|
| task-added | Disparado quando uma tarefa é adicionada |
| task-updated | Disparado quando uma tarefa é atualizada (concluída/não concluída) |
| task-removed | Disparado quando uma tarefa é removida |
| tasks-cleared | Disparado quando as tarefas concluídas são removidas |

## Métodos

| Nome | Parâmetros | Descrição |
|------|------------|-----------|
| addTask | - | Adiciona uma nova tarefa baseada no valor de `newTask` |
| toggleComplete | string $taskId | Alterna o status de conclusão de uma tarefa |
| removeTask | string $taskId | Remove uma tarefa específica |
| clearCompleted | - | Remove todas as tarefas concluídas |
| setFilter | string $filter | Define o filtro atual ('all', 'active', 'completed') |
| toggleDarkMode | - | Alterna entre modo claro e escuro |

## Métodos Computados

| Nome | Descrição |
|------|-----------|
| filteredTasks | Retorna as tarefas filtradas com base no filtro atual |
| completedCount | Retorna o número de tarefas concluídas |
| remainingCount | Retorna o número de tarefas não concluídas |

## Customização via CSS

O componente Todo utiliza classes do Tailwind CSS. Você pode personalizar a aparência publicando as views e modificando as classes ou sobrescrevendo-as no seu arquivo CSS:

```css
/* Em seu arquivo CSS personalizado */
.mr-ui-todo-container {
    max-width: 800px;
    margin: 0 auto;
}

.mr-ui-todo-header {
    background-color: #f3f4f6;
}

.mr-ui-todo-dark .mr-ui-todo-header {
    background-color: #374151;
}
```

## Customização via Configuração

Você pode personalizar o comportamento padrão do componente Todo através do arquivo de configuração:

```php
// config/livewire-ui-components.php
return [
    // ... outras configurações
    
    'components' => [
        'todo' => [
            'enable_dark_mode' => true, // Ativar modo escuro por padrão
            'default_status' => 'pending', // Status padrão ao adicionar nova tarefa
        ],
    ],
];
```

## Exemplo Completo

Veja um exemplo completo de uso em um aplicativo Laravel:

```php
// TodoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TodoController extends Controller
{
    public function index()
    {
        $tasks = $this->getSampleTasks();
        return view('todos.index', compact('tasks'));
    }
    
    private function getSampleTasks()
    {
        return collect([
            [
                'id' => uniqid(),
                'text' => 'Completar tutorial de Laravel',
                'completed' => true,
                'created_at' => now()->subDays(3)
            ],
            [
                'id' => uniqid(),
                'text' => 'Criar componentes Livewire',
                'completed' => false,
                'created_at' => now()->subDays(2)
            ],
            [
                'id' => uniqid(),
                'text' => 'Estilizar com Tailwind CSS',
                'completed' => false,
                'created_at' => now()->subDay()
            ],
        ]);
    }
}
```

```html
<!-- resources/views/todos/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Tarefas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:mrui-todo :tasks="$tasks" />
        </div>
    </div>
</x-app-layout>
```

## Integração com outros componentes

O componente Todo pode ser facilmente integrado com outros componentes da biblioteca MR-UI:

```html
<div class="space-y-6">
    <livewire:mrui-alert 
        type="info"
        title="Gerenciador de Tarefas"
        message="Use este componente para gerenciar suas tarefas diárias."
        :dismissible="true" 
    />
    
    <livewire:mrui-card title="Minhas Tarefas" :with-footer="true">
        <livewire:mrui-todo />
        
        <x-slot name="footer">
            <livewire:mrui-button 
                label="Exportar Tarefas"
                color="secondary"
                icon="fa fa-download"
            />
        </x-slot>
    </livewire:mrui-card>
</div>
```

## Dicas e Boas Práticas

- Use o evento `task-added` para executar ações após adicionar uma nova tarefa.
- Para melhor desempenho, não use listas muito grandes de tarefas (mais de 100).
- Considere usar um banco de dados para persistir as tarefas em aplicações reais.
- Implemente regras de validação personalizadas antes de adicionar tarefas se necessário.

## Licença

Este componente faz parte do pacote MR-UI, licenciado sob a [licença MIT](../LICENSE.md). 