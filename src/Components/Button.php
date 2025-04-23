<?php

namespace MrUi\LivewireUiComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class Button extends Component
{
    public string $type = 'button';
    public string $color = 'primary';
    public string $size = 'md';
    public bool $disabled = false;
    public string $label = '';
    public string $icon = '';
    
    public function mount(
        string $type = 'button',
        string $color = 'primary',
        string $size = 'md',
        bool $disabled = false,
        string $label = '',
        string $icon = ''
    ) {
        $this->type = $type;
        $this->color = $color;
        $this->size = $size;
        $this->disabled = $disabled;
        $this->label = $label;
        $this->icon = $icon;
    }
    
    public function render(): View|Closure|string
    {
        return view('mrui::components.button');
    }
} 