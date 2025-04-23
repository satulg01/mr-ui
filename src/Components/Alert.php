<?php

namespace MrUi\LivewireUiComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type = 'info';
    public string $title = '';
    public string $message = '';
    public bool $dismissible = true;
    public int $timeout = 0;
    public bool $show = true;
    
    public function mount(
        string $type = 'info',
        string $title = '',
        string $message = '',
        bool $dismissible = true,
        int $timeout = 0
    ) {
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
        $this->dismissible = $dismissible;
        $this->timeout = $timeout;
    }
    
    public function dismiss()
    {
        $this->show = false;
    }
    
    public function render(): View|Closure|string
    {
        return view('mrui::components.alert');
    }
} 