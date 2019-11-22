<div class="max-w-sm sm-20 mt-20 sm:mt-auto mx-auto h-auto sm:h-full rounded overflow-visible shadow-lg flex flex-col bg-white">
    <a href="{{ $book->url }}">
        <img class="w-2/3 sm:w-full mx-auto max-w-40 sm:max-w-full h-auto bg-gray-200 -mt-16 sm:mt-auto rounded shadow-lg sm:shadow-none" src="{{ url('images/loading.svg') }}" data-src="{{ $book->cover(600) }}" alt="{{ $book->title }} Cover">
    </a>
    <div class="px-6 py-4">
        <a href="{{ $book->url }}">
            <div class="font-bold text-xl mb-2 text-center md:text-left sm:truncate">{{ $book->title }}</div>
        </a>
        <div class="px-3 py-2 cursor-default mx-auto mb-3 flex w-32 justify-between">
            @include('components.stars', [
                'count' => round(data_get($book, 'ratings.0.rating', 0)) * 5,
                'color' => 'text-gray-400',
                'highlight' => 'text-blue-400',
                'class' => 'truncate w-4'
            ])
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