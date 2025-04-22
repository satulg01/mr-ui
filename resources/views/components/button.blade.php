<button 
    type="{{ $type }}" 
    class="inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 {{ $disabled ? 'opacity-25 cursor-not-allowed' : '' }} 
    @switch($color)
        @case('primary')
            bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 text-white border-transparent focus:ring-indigo-500
            @break
        @case('secondary')
            bg-gray-500 hover:bg-gray-600 focus:bg-gray-600 active:bg-gray-700 text-white border-transparent focus:ring-gray-500
            @break
        @case('success')
            bg-green-500 hover:bg-green-600 focus:bg-green-600 active:bg-green-700 text-white border-transparent focus:ring-green-500
            @break
        @case('danger')
            bg-red-500 hover:bg-red-600 focus:bg-red-600 active:bg-red-700 text-white border-transparent focus:ring-red-500
            @break
        @case('warning')
            bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-700 text-white border-transparent focus:ring-yellow-500
            @break
        @case('info')
            bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-700 text-white border-transparent focus:ring-blue-500
            @break
        @default
            bg-white hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200 text-gray-700 border-gray-300 focus:ring-blue-500
    @endswitch
    
    @switch($size)
        @case('xs')
            px-2 py-1 text-xs
            @break
        @case('sm')
            px-3 py-1.5 text-sm
            @break
        @case('md')
            px-4 py-2 text-base
            @break
        @case('lg')
            px-5 py-2.5 text-lg
            @break
        @case('xl')
            px-6 py-3 text-xl
            @break
    @endswitch"
    wire:loading.attr="disabled"
    {{ $attributes }}
>
    @if($icon)
        <span class="mr-2">
            <i class="{{ $icon }}"></i>
        </span>
    @endif
    
    {{ $label }}
    
    {{ $slot }}
</button> 