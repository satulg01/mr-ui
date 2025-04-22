<?php

namespace MrUi\LivewireUiComponents;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use MrUi\LivewireUiComponents\Components\Button;
use MrUi\LivewireUiComponents\Components\Card;
use MrUi\LivewireUiComponents\Components\Alert;
use MrUi\LivewireUiComponents\Components\Todo;

class LivewireUiComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/livewire-ui-components.php' => config_path('livewire-ui-components.php'),
        ], 'config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/livewire-ui-components'),
        ], 'views');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mrui');

        // Register Livewire components
        Livewire::component('mrui-button', Button::class);
        Livewire::component('mrui-card', Card::class);
        Livewire::component('mrui-alert', Alert::class);
        Livewire::component('mrui-todo', Todo::class);
    }
} 