# Exemplos de Uso dos Componentes MR-UI

Esta página demonstra como utilizar os componentes MR-UI em conjunto para criar interfaces úteis e elegantes.

## Gerenciador de Tarefas Completo

Um exemplo de como combinar os componentes para criar um gerenciador de tarefas completo.

```html
<div class="max-w-4xl mx-auto py-8">
    <!-- Alerta informativo -->
    <livewire:mrui-alert 
        type="info" 
        title="Gerenciador de Tarefas" 
        message="Use este gerenciador para organizar suas tarefas diárias. As tarefas serão salvas localmente."
        :dismissible="true"
    />
    
    <div class="mt-6">
        <!-- Card contendo o componente Todo -->
        <livewire:mrui-card 
            title="Minhas Tarefas" 
            :with-footer="true"
        >
            <livewire:mrui-todo />
            
            <x-slot name="footer">
                <div class="flex justify-between">
                    <livewire:mrui-button 
                        label="Exportar" 
                        color="secondary" 
                        size="sm"
                        icon="fa fa-download"
                    />
                    
                    <livewire:mrui-button 
                        label="Nova Lista" 
                        color="primary" 
                        size="sm"
                    />
                </div>
            </x-slot>
        </livewire:mrui-card>
    </div>
</div>
```

## Formulário de Contato

Um exemplo de formulário de contato que utiliza múltiplos componentes.

```html
<div class="max-w-3xl mx-auto py-8">
    <livewire:mrui-card title="Entre em Contato">
        <!-- Mensagem de alerta apenas se houver erros -->
        @if ($errors->any())
            <livewire:mrui-alert 
                type="danger"
                title="Verifique os campos abaixo"
                :dismissible="true"
            >
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </livewire:mrui-alert>
        @endif
        
        <!-- Mensagem de sucesso se o formulário foi enviado -->
        @if (session('success'))
            <livewire:mrui-alert 
                type="success"
                title="Sucesso!"
                message="{{ session('success') }}"
                :dismissible="true"
            />
        @endif
        
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nome
                </label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}"
                >
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    E-mail
                </label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                >
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    Mensagem
                </label>
                <textarea 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="message"
                    name="message"
                    rows="5"
                >{{ old('message') }}</textarea>
            </div>
            
            <div class="flex justify-end">
                <livewire:mrui-button 
                    type="submit"
                    label="Enviar Mensagem"
                    color="primary"
                />
            </div>
        </form>
    </livewire:mrui-card>
</div>
```

## Painel de Estatísticas

Um exemplo de como usar os componentes para criar um painel de estatísticas.

```html
<div class="max-w-6xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Painel de Estatísticas</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card de Estatística 1 -->
        <livewire:mrui-card>
            <div class="text-center">
                <h3 class="text-lg font-medium text-gray-500">Usuários Ativos</h3>
                <p class="mt-2 text-3xl font-bold text-indigo-600">1,248</p>
                <div class="mt-4 text-sm text-green-500">
                    <span>↑ 12% de aumento</span>
                </div>
            </div>
        </livewire:mrui-card>
        
        <!-- Card de Estatística 2 -->
        <livewire:mrui-card>
            <div class="text-center">
                <h3 class="text-lg font-medium text-gray-500">Receita Mensal</h3>
                <p class="mt-2 text-3xl font-bold text-indigo-600">R$ 24.500</p>
                <div class="mt-4 text-sm text-green-500">
                    <span>↑ 8% de aumento</span>
                </div>
            </div>
        </livewire:mrui-card>
        
        <!-- Card de Estatística 3 -->
        <livewire:mrui-card>
            <div class="text-center">
                <h3 class="text-lg font-medium text-gray-500">Tarefas Concluídas</h3>
                <p class="mt-2 text-3xl font-bold text-indigo-600">85%</p>
                <div class="mt-4 text-sm text-yellow-500">
                    <span>→ Mesmo que ontem</span>
                </div>
            </div>
        </livewire:mrui-card>
    </div>
    
    <!-- Card principal com a lista de tarefas -->
    <livewire:mrui-card 
        title="Tarefas Pendentes" 
        :with-footer="true"
    >
        <livewire:mrui-todo />
        
        <x-slot name="footer">
            <div class="flex justify-end">
                <livewire:mrui-button 
                    label="Ver Todas as Tarefas" 
                    color="secondary"
                />
            </div>
        </x-slot>
    </livewire:mrui-card>
    
    <!-- Alerta de atualização necessária -->
    <div class="mt-8">
        <livewire:mrui-alert 
            type="warning" 
            title="Atualização Disponível!" 
            message="Existe uma nova versão do sistema disponível. Atualize para obter as últimas funcionalidades."
            :dismissible="true"
        />
    </div>
</div>
```

## Combinando com Bootstrap

Embora a biblioteca MR-UI seja projetada para funcionar com Tailwind CSS, os componentes também podem ser usados com Bootstrap ou outros frameworks CSS.

```html
<!-- Exemplo com classes Bootstrap -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <livewire:mrui-card title="Formulário de Login">
                @if (session('error'))
                    <livewire:mrui-alert 
                        type="danger"
                        message="{{ session('error') }}"
                        :dismissible="true"
                    />
                @endif
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Lembrar-me</label>
                    </div>
                    <livewire:mrui-button 
                        type="submit"
                        label="Entrar"
                        color="primary"
                        class="btn btn-primary w-100"
                    />
                </form>
            </livewire:mrui-card>
        </div>
    </div>
</div>
```

## Dicas para Uso

1. **Agrupamento Lógico**: Agrupe os componentes de forma lógica para criar interfaces coesas e com boa usabilidade.

2. **Consistência Visual**: Mantenha a consistência visual usando as mesmas cores e tamanhos em toda a sua aplicação.

3. **Estados de Carregamento**: Use o atributo `wire:loading` do Livewire em conjunto com os componentes MR-UI para indicar estados de carregamento.

4. **Formulários Reativos**: Combine os componentes MR-UI com formulários Livewire para criar experiências de formulário reativas e dinâmicas.

5. **Customização**: Não hesite em customizar os componentes publicando as views e adaptando-as às necessidades específicas do seu projeto. 