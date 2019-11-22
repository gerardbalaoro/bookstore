@if ($paginator->hasPages())
    <div class="w-full mt-6 px-3 mx-auto flex flex-row flex-wrap justify-center text-white items-center align-center">
        @if ($paginator->onFirstPage())
            <a class="px-3 py-1 m-1 rounded-full shadow bg-blue-300 cursor-not-allowed">
                &lsaquo;
            </a>
        @else
            <a class="px-3 py-1 bg-blue-500 hover:bg-blue-600 m-1 rounded-full shadow" href="{{ $paginator->previousPageUrl() }}">
                &lsaquo;
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <a class="px-4 py-2 m-1 rounded shadow bg-blue-400"><span>{{ $element }}</span></a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="px-4 py-2 bg-blue-900 m-1 rounded shadow cursor-default"><span>{{ $page }}</span></a>
                    @else
                        <a class="px-4 py-2 bg-blue-500 m-1 rounded shadow hover:bg-blue-600" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="px-3 py-1 bg-blue-500 hover:bg-blue-600 m-1 rounded-full shadow" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
        @else
            <a class="px-3 py-1 m-1 rounded-full shadow bg-blue-300 cursor-not-allowed">
                &rsaquo;
            </a>
        @endif
    </div>
@endif