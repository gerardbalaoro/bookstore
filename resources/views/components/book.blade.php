<div class="max-w-sm mx-auto h-full rounded overflow-hidden shadow-lg flex flex-col bg-white">
    <img class="w-full h-full bg-gray-200" src="{{ url('images/loading.svg') }}" data-src="{{ $book->cover(600) }}" alt="{{ $book->title }} Cover">
    <div class="px-6 py-4">
        <a href="{{ $book->url }}">
            <div class="font-bold text-xl mb-2 truncate">{{ $book->title }}</div>
        </a>
        <p class="text-gray-700 text-sm">
            {{ str_limit(strip_tags($book->comments->first()->text), 100) }}
        </p>
    </div>
    <div class="mt-auto px-5 py-4">
        <div class="text-base">
            <p class="text-gray-900 font-medium leading-none">{{ $book->authors->pluck('name')->implode(', ') }}</p>
            <p class="text-gray-600 text-sm">{{ date_format(date_create($book->pubdate), 'M Y') }}</p>
        </div>
    </div>
</div>