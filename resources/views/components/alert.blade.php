<div
    x-data="{ show: @entangle('show').defer }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    x-init="
        @if($timeout > 0)
            setTimeout(() => { show = false }, {{ $timeout * 1000 }})
        @endif
    "
    {{ $attributes->merge(['class' => 'rounded-md p-4 mb-4 shadow-sm']) }}
    :class="{
        'bg-blue-50 text-blue-700': '{{ $type }}' === 'info',
        'bg-green-50 text-green-700': '{{ $type }}' === 'success',
        'bg-yellow-50 text-yellow-700': '{{ $type }}' === 'warning',
        'bg-red-50 text-red-700': '{{ $type }}' === 'danger',
        'bg-gray-50 text-gray-700': '{{ $type }}' === 'default'
    }"
>
    <div class="flex">
        <div class="flex-shrink-0">
            {{-- Ícones para diferentes tipos de alerta --}}
            <svg x-show="'{{ $type }}' === 'info'" class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            <svg x-show="'{{ $type }}' === 'success'" class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <svg x-show="'{{ $type }}' === 'warning'" class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <svg x-show="'{{ $type }}' === 'danger'" class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            <svg x-show="'{{ $type }}' === 'default'" class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3 flex-1">
            @if($title)
                <h3 class="text-sm font-medium" :class="{
                    'text-blue-800': '{{ $type }}' === 'info',
                    'text-green-800': '{{ $type }}' === 'success',
                    'text-yellow-800': '{{ $type }}' === 'warning',
                    'text-red-800': '{{ $type }}' === 'danger',
                    'text-gray-800': '{{ $type }}' === 'default'
                }">
                    {{ $title }}
                </h3>
            @endif
            
            <div class="text-sm mt-2" :class="{
                'text-blue-700': '{{ $type }}' === 'info',
                'text-green-700': '{{ $type }}' === 'success',
                'text-yellow-700': '{{ $type }}' === 'warning',
                'text-red-700': '{{ $type }}' === 'danger',
                'text-gray-700': '{{ $type }}' === 'default'
            }">
                @if($message)
                    {{ $message }}
                @else
                    {{ $slot }}
                @endif
            </div>
        </div>
        
        @if($dismissible)
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button 
                        type="button" 
                        @click="show = false"
                        wire:click="dismiss"
                        class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2"
                        :class="{
                            'bg-blue-50 text-blue-500 hover:bg-blue-100 focus:ring-blue-600 focus:ring-offset-blue-50': '{{ $type }}' === 'info',
                            'bg-green-50 text-green-500 hover:bg-green-100 focus:ring-green-600 focus:ring-offset-green-50': '{{ $type }}' === 'success',
                            'bg-yellow-50 text-yellow-500 hover:bg-yellow-100 focus:ring-yellow-600 focus:ring-offset-yellow-50': '{{ $type }}' === 'warning',
                            'bg-red-50 text-red-500 hover:bg-red-100 focus:ring-red-600 focus:ring-offset-red-50': '{{ $type }}' === 'danger',
                            'bg-gray-50 text-gray-500 hover:bg-gray-100 focus:ring-gray-600 focus:ring-offset-gray-50': '{{ $type }}' === 'default'
                        }"
                    >
                        <span class="sr-only">Fechar</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div> 