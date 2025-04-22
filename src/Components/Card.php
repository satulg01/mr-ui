<?php

namespace MrUi\LivewireUiComponents\Components;

use Livewire\Component;

class Card extends Component
{
    public string $title = '';
    public string $footer = '';
    public bool $withHeader = true;
    public bool $withFooter = false;
    public string $headerClass = '';
    public string $bodyClass = '';
    public string $footerClass = '';
    
    public function mount(
        string $title = '',
        string $footer = '',
        bool $withHeader = true,
        bool $withFooter = false,
        string $headerClass = '',
        string $bodyClass = '',
        string $footerClass = ''
    ) {
        $this->title = $title;
        $this->footer = $footer;
        $this->withHeader = $withHeader;
        $this->withFooter = $withFooter;
        $this->headerClass = $headerClass;
        $this->bodyClass = $bodyClass;
        $this->footerClass = $footerClass;
    }
    
    public function render()
    {
        return view('mrui::components.card');
    }
} 