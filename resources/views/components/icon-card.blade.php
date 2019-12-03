<a {!! !empty($url) ? "href=\"{$url}\"" : '' !!} {{ empty($external) ? '' : 'target="_blank"' }} class="p-2 pr-3 border rounded flex items-center mx-1 my-1 
{{ !empty($url) ? 'hover:shadow-md hover:font-semibold' : '' }} {{ !empty($class) ? $class : '' }}">
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
        <p class="text-gray-500 text-xs font-normal">{{ $subtitle }}</p>
        @endisset
    </div>
</a>