<a {!! !empty($url) ? "href=\"{$url}\"" : '' !!} class="p-2 pr-3 border rounded flex items-center mx-1 my-1 {{ !empty($class) ? $class : '' }}">
    @isset($icon)
        <div class="zondicon flex-none">
            {!! $icon !!}
        </div>
    @endisset
    <div class="text-sm">
        <p class="text-gray-900 leading-none">
            {!! $slot !!}
        </p>
        @isset($subtitle)
        <p class="text-gray-500 text-xs">{{ $subtitle }}</p>
        @endisset
    </div>
</a>