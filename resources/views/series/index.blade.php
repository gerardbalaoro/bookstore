@extends('layouts.app', ['title' => $title ?? 'Series'])

@section('content')
    <div class="flex flex-wrap mb-8">
        @foreach ($series as $s)
            <div class="w-full mb-4 px-2 sm:w-1/2 md:w-1/3 lg:w-1/4">
                <a href="{{ $s->url }}" class="p-3 rounded bg-white shadow flex items-center mx-1 my-1">
                    <div class="zondicon zondicon-lg flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14 14h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2zM0 2C0 .9.9 0 2 0h16a2 
                            2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 2h12v2H4V4zm0 3h12v2H4V7zm0 3h12v2H4v-2z"/>
                        </svg>
                    </div>
                    <div class="text-lg">
                        <p class="text-gray-900 leading-none">
                            {{ $s->name }}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div> 
@endsection