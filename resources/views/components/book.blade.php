<div class="max-w-sm mx-auto h-full rounded overflow-hidden shadow-lg flex flex-col bg-white">
    <a href="{{ $book->url }}">
        <img class="w-full h-auto bg-gray-200" src="{{ url('images/loading.svg') }}" data-src="{{ $book->cover(600) }}" alt="{{ $book->title }} Cover">
    </a>
    <div class="px-6 py-4">
        <a href="{{ $book->url }}">
            <div class="font-bold text-xl mb-2 truncate">{{ $book->title }}</div>
        </a>
        <div class="px-3 py-2 cursor-default mx-auto mb-3 flex w-32 justify-between">
            @foreach (range(1, 5) as $star)
                <svg class="text-{{ round(data_get($book, 'ratings.0.rating', 0) / 10) * 5 >= $star ? 'blue-400' : 'gray-400' }} truncate w-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
                </svg>
            @endforeach
        </div>
    </div>
    <div class="mt-auto px-5 py-4">
        <div class="text-base text-center md:text-left">
            <p class="text-gray-900 font-medium leading-none">
                @foreach ($book->authors->take(3) as $author)
                    <a class="hover:text-blue-500" href="{{ $author->url }}">{{ $author->name }}</a>{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </p>
            <p class="text-gray-600 text-sm">{{ date_format(date_create($book->pubdate), 'M Y') }}</p>
        </div>
    </div>
</div>