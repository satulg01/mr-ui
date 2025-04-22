<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm sm:rounded-lg']) }}>
    @if($withHeader && $title)
        <div class="px-4 py-5 sm:px-6 bg-gray-50 border-b border-gray-200 {{ $headerClass }}">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $title }}
            </h3>
            @isset($subtitle)
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{ $subtitle }}
                </p>
            @endisset
            
            @isset($header)
                <div class="mt-2">
                    {{ $header }}
                </div>
            @endisset
        </div>
    @endif
    
    <div class="p-6 {{ $bodyClass }}">
        {{ $slot }}
    </div>
    
    @if($withFooter)
        <div class="px-4 py-4 sm:px-6 bg-gray-50 border-t border-gray-200 {{ $footerClass }}">
            @if($footer)
                {{ $footer }}
            @else
                {{ $slot_footer ?? '' }}
            @endif
        </div>
    @endif
</div> 