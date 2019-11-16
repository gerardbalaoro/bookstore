@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="mx-auto lg:w-4/5 mb-4 px-2">
            <div class="h-full md:p-8 rounded-lg overflow-hidden shadow-lg bg-white flex flex-wrap flex-col lg:flex-row">
                <div class="bg-grey-100 w-full lg:w-1/3 lg:pr-6 magnific" href="{{ $book->cover(600) }}">
                    <img class="w-full rounded shadow-xl h-auto md:w-1/2 md:mx-auto lg:w-full bg-gray-200
                    " src="{{ url('images/loading.svg') }}" 
                    data-src="{{ $book->cover(600) }}" alt="{{ $book->title }} Cover">
                </div>
                <div class="w-full px-8 pt-8 lg:w-2/3 lg:px-5 lg:py-0">
                    @if ($book->series->count())
                        <div class="mb-2 p-1">
                            <a href="{{ $book->series[0]->url }}" class="px-2 py-2 bg-blue-100 items-center text-blue-900 leading-none lg:rounded-r-full flex lg:inline-flex">
                                <span class="font-semibold text-xs mr-2 text-left flex-auto">
                                    {{ $book->series[0]->name }}, Book {{ round($book->series_index, 2) }}
                                </span>
                                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                    <div class="font-bold text-center text-3xl lg:text-left mb-2 border-b">
                        {{ $book->title }}
                    </div>
                    <div class="py-3 flex flex-col">
                        <div class="flex flex-wrap justify-center mb-3">
                            @foreach ($book->authors as $author)
                                @component('components.mini-card', ['subtitle' => 'Author', 'url' => $author->url])
                                    @slot('icon')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/>
                                        </svg>
                                    @endslot
                                    {{ $author->name }}
                                @endcomponent                               
                            @endforeach
                            @component('components.mini-card', ['subtitle' => 'Publication Date', 'class' => 'cursor-default'])
                                    @slot('icon')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8
                                            0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"/>
                                        </svg>
                                    @endslot
                                    {{ $book->pubdate->format('M Y') }}
                            @endcomponent
                            @if ($book->publishers->count())
                                @component('components.mini-card', ['subtitle' => 'Publisher', 'url' => $book->publishers[0]->url])
                                    @slot('icon')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M19 11a7.5 7.5 0 0 1-3.5 5.94L10 20l-5.5-3.06A7.5 7.5 0 0 1 1 11V3c3.38 
                                            0 6.5-1.12 9-3 2.5 1.89 5.62 3 9 3v8zm-9 1.08l2.92 2.04-1.03-3.41 2.84-2.15-3.56-.08L10
                                            5.12 8.83 8.48l-3.56.08L8.1 10.7l-1.03 3.4L10 12.09z"/>
                                        </svg>
                                    @endslot
                                    {{ $book->publishers[0]->name }}
                                @endcomponent
                            @endif
                            @foreach ($book->identifiers->where('type', '=', 'isbn') as $isbn)
                                @component('components.mini-card', ['subtitle' => 'ISBN'])
                                    @slot('icon')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M13.6 13.47A4.99 4.99 0 0 1 5 10a5 5 0 0 1 8-4V5h2v6.5a1.5 1.5 0 0 0 3 0V10a8 8 0 1 0-4.42 7.16l.9 
                                        1.79A10 10 0 1 1 20 10h-.18.17v1.5a3.5 3.5 0 0 1-6.4 1.97zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                    </svg>
                                    @endslot
                                    {{ $isbn->val }}
                                @endcomponent
                                
                            @endforeach
                        </div>
                        @if ($book->tags->count())
                            <div class="flex flex-wrap justify-center mb-5">
                                @foreach ($book->tags as $tag)
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mx-1 my-1">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                        <div class="px-6 py-2 cursor-default rounded-full border border-gray-500 mx-auto mb-3">
                            @foreach (range(1, 5) as $star)
                                <svg class="text-{{ round($book->ratings[0]->rating / 10) * 5 >= $star ? 'blue-500' : 'gray-700' }}
                                            truncate w-5 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
                                </svg>
                            @endforeach
                        </div>
                        <div class="px-6 py-2 flex flex-wrap justify-center">
                            @foreach ($book->identifiers->where('type', '!=', 'isbn') as $id)
                                <a href="{{ $id->url }}" target="_blank" class="rounded-lg m-1 px-4 py-2
                                bg-{{ $id->color }}-500 hover:bg-{{ $id->color }}-600 text-white truncate font-semibold leading-tight shadow">
                                    {{ $id->name }}
                                </a>
                            @endforeach
                            @foreach ($book->downloads as $dl)
                                <a href="{{ route('book.download', [$book, $dl]) }}" target="_blank" class="rounded-lg m-1 px-4 py-2 
                                bg-green-500 hover:bg-green-600 text-white truncate font-semibold leading-tight shadow">
                                    <svg class="fill-current w-4 inline mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"></path>
                                    </svg>
                                    {{ $dl->format }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-full lg:mt-6 px-8 pb-8">                    
                    <div class="overflow-hidden text-gray-700 lg:mx-16 book-details mt-8">
                        {!! $book->comments[0]->text !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection