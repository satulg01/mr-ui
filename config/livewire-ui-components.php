<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Prefix dos componentes
    |--------------------------------------------------------------------------
    |
    | Este é o prefixo que será utilizado para todos os componentes da biblioteca.
    | O padrão é 'mrui' mas pode ser personalizado conforme necessário.
    |
    */
    'prefix' => 'mrui',

    /*
    |--------------------------------------------------------------------------
    | Configurações de Estilo
    |--------------------------------------------------------------------------
    |
    | Tema e variações de cores para os componentes
    |
    */
    'theme' => [
        'primary' => '#4F46E5',
        'secondary' => '#6B7280',
        'success' => '#10B981',
        'danger' => '#EF4444',
        'warning' => '#F59E0B',
        'info' => '#3B82F6',
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurações de Componentes
    |--------------------------------------------------------------------------
    |
    | Configurações específicas para cada componente
    |
    */
    'components' => [
        'todo' => [
            'enable_dark_mode' => true,
            'default_status' => 'pending',
        ],
    ],
]; 