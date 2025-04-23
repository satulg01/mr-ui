<?php

namespace MrUi\LivewireUiComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
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

        $prefix = config('livewire-ui-components.prefix');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', $prefix);

        // Register Blade components
        Blade::component($prefix.'-button', Button::class);
        Blade::component($prefix.'-card', Card::class);
        Blade::component($prefix.'-alert', Alert::class);
    }
} 