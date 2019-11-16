@extends('layouts.app', ['title' => $title ?? 'Authors'])

@section('content')
    <div class="section">
        @foreach ($authors as $author)
            <div class="w-full mb-4 px-2 sm:w-1/2 md:w-1/3 lg:w-1/4">
                <a href="{{ $author->url }}" class="p-3 rounded bg-white shadow flex items-center mx-1 my-1">
                    <div class="zondicon zondicon-lg flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/>
                        </svg>
                    </div>
                    <div class="text-lg">
                        <p class="text-gray-900 leading-none">
                            {{ $author->name }}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div> 
@endsection