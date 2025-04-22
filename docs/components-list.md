# Componentes MR-UI

Esta página lista todos os componentes disponíveis na biblioteca MR-UI para Laravel Livewire.

> **Veja também:** [Exemplos de uso dos componentes em conjunto](exemplos-de-uso.md)

## Componentes de Interface

### Button
![Button Component](https://via.placeholder.com/800x100?text=Button+Component)

Um componente de botão altamente personalizável que suporta diferentes cores, tamanhos e estados.

**Características:**
- Múltiplas variações de cores (primary, secondary, success, danger, warning, info)
- Diferentes tamanhos (xs, sm, md, lg, xl)
- Suporte a ícones
- Estado de desabilitado
- Suporte a atributos adicionais

**Uso básico:**
```html
<livewire:mrui-button label="Clique Aqui" />
```

**Uso avançado:**
```html
<livewire:mrui-button 
    label="Salvar" 
    color="success" 
    size="lg" 
    icon="fa fa-save" 
    :disabled="$isSubmitting" 
/>
```

[Documentação completa do componente Button →](#)

---

### Card
![Card Component](https://via.placeholder.com/800x200?text=Card+Component)

Um componente de cartão versátil para exibir conteúdo em um contêiner estruturado.

**Características:**
- Cabeçalho opcional com título
- Rodapé opcional
- Personalização de classes CSS para todas as seções
- Design clean e responsivo

**Uso básico:**
```html
<livewire:mrui-card>
    <p>Conteúdo do cartão aqui</p>
</livewire:mrui-card>
```

**Uso avançado:**
```html
<livewire:mrui-card 
    title="Estatísticas do Mês" 
    :with-footer="true"
    header-class="bg-gray-100"
    body-class="p-8"
>
    <p>Conteúdo principal do cartão</p>
    
    <x-slot name="footer">
        Rodapé do cartão
    </x-slot>
</livewire:mrui-card>
```

[Documentação completa do componente Card →](#)

---

### Alert
![Alert Component](https://via.placeholder.com/800x150?text=Alert+Component)

Um componente de alerta para exibir mensagens de feedback, avisos ou informações importantes.

**Características:**
- Múltiplos tipos (info, success, warning, danger, default)
- Animações de entrada/saída com Alpine.js
- Opção para fechar o alerta
- Timeout automático configurável
- Ícones correspondentes ao tipo de alerta

**Uso básico:**
```html
<livewire:mrui-alert 
    type="success" 
    message="Operação realizada com sucesso!" 
/>
```

**Uso avançado:**
```html
<livewire:mrui-alert 
    type="warning" 
    title="Atenção!" 
    :dismissible="true"
    :timeout="5"
>
    <p>Esta ação não pode ser desfeita. Tenha certeza antes de continuar.</p>
</livewire:mrui-alert>
```

[Documentação completa do componente Alert →](#)

---

### Todo
![Todo Component](https://via.placeholder.com/800x400?text=Todo+Component)

Um componente de lista de tarefas completo com funcionalidades de adição, remoção e filtragem.

**Características:**
- Adicionar novas tarefas
- Marcar tarefas como concluídas
- Remover tarefas individuais
- Filtrar tarefas (todas, ativas, concluídas)
- Limpar todas as tarefas concluídas
- Alternância entre modo claro e escuro
- Totalmente responsivo

**Uso básico:**
```html
<livewire:mrui-todo />
```

**Uso avançado:**
```html
<livewire:mrui-todo 
    :tasks="$tarefasIniciais" 
    :dark-mode="true" 
/>
```

[Documentação completa do componente Todo →](todo-component.md)

## Próximos Componentes

Estamos trabalhando para adicionar mais componentes à biblioteca MR-UI. Aqui estão alguns componentes planejados para futuras versões:

- **Modal** - Uma caixa de diálogo modal personalizável
- **Tabs** - Um componente de abas para organizar conteúdo
- **Dropdown** - Menu suspenso interativo
- **Pagination** - Componente de paginação para navegação em listas
- **Table** - Tabela de dados interativa com ordenação e filtros

## Contribuindo

Quer contribuir com novos componentes ou melhorias? Veja nossa [documentação para contribuidores](../CONTRIBUTING.md). 