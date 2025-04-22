# MR-UI - Componentes UI para Laravel Livewire

[![Latest Stable Version](https://poser.pugx.org/mr-ui/livewire-ui-components/v/stable)](https://packagist.org/packages/mr-ui/livewire-ui-components)
[![Total Downloads](https://poser.pugx.org/mr-ui/livewire-ui-components/downloads)](https://packagist.org/packages/mr-ui/livewire-ui-components)
[![License](https://poser.pugx.org/mr-ui/livewire-ui-components/license)](https://packagist.org/packages/mr-ui/livewire-ui-components)

Uma biblioteca de componentes UI reutilizáveis para Laravel Livewire 3.

## Instalação

Você pode instalar o pacote via composer:

```bash
composer require mr-ui/livewire-ui-components
```

Em seguida, publique os arquivos de configuração:

```bash
php artisan vendor:publish --provider="MrUi\LivewireUiComponents\LivewireUiComponentsServiceProvider" --tag="config"
```

Opcionalmente, você pode publicar as views para customização:

```bash
php artisan vendor:publish --provider="MrUi\LivewireUiComponents\LivewireUiComponentsServiceProvider" --tag="views"
```

## Requisitos

- PHP 8.1 ou superior
- Laravel 10.0 ou superior
- Livewire 3.0 ou superior

## Componentes Disponíveis

Confira a [lista completa de componentes](docs/components-list.md) para ver todos os componentes disponíveis e exemplos de uso.

Veja também [exemplos de uso dos componentes em conjunto](docs/exemplos-de-uso.md) para aprender a combinar os componentes em interfaces completas.

### Componente Todo

O componente Todo é uma implementação de uma lista de tarefas com as seguintes funcionalidades:

- Adicionar tarefas
- Marcar tarefas como concluídas
- Remover tarefas individuais
- Filtrar tarefas (todas, ativas, concluídas)
- Limpar tarefas concluídas
- Modo escuro

#### Uso básico

```html
<livewire:mrui-todo />
```

#### Uso com parâmetros

```html
<livewire:mrui-todo :tasks="$tasks" :dark-mode="true" />
```

#### Parâmetros

| Nome | Tipo | Padrão | Descrição |
|------|------|--------|-----------|
| tasks | Collection | Collection vazia | Coleção de tarefas inicial |
| darkMode | boolean | false | Define se o modo escuro está ativado |

#### Eventos

| Nome | Dados | Descrição |
|------|------|-----------|
| task-added | - | Disparado quando uma tarefa é adicionada |
| task-updated | - | Disparado quando uma tarefa é atualizada |
| task-removed | - | Disparado quando uma tarefa é removida |
| tasks-cleared | - | Disparado quando as tarefas concluídas são removidas |

### Outros Componentes

Além do componente Todo, a biblioteca também inclui:

- **Button**: Um componente de botão personalizável
- **Card**: Um componente de cartão para exibir conteúdo organizado
- **Alert**: Um componente de alerta para mensagens de feedback

## Customização

Você pode personalizar os componentes através do arquivo de configuração `config/livewire-ui-components.php`.

### Temas

Você pode personalizar as cores do tema no arquivo de configuração:

```php
'theme' => [
    'primary' => '#4F46E5',
    'secondary' => '#6B7280',
    'success' => '#10B981',
    'danger' => '#EF4444',
    'warning' => '#F59E0B',
    'info' => '#3B82F6',
],
```

### Configurações específicas para componentes

Você também pode personalizar configurações específicas para cada componente:

```php
'components' => [
    'todo' => [
        'enable_dark_mode' => true,
        'default_status' => 'pending',
    ],
],
```

## Licença

O pacote MR-UI é um software de código aberto licenciado sob a licença [MIT](LICENSE.md).
