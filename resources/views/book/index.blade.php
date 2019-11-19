@extends('layouts.app')

@section('content')
    <div class="section">            
        <div class="section-title">
            <h1>{{ $title }}</h1>
        </div>
        @forelse ($books as $book)
            <div class="w-full mb-4 px-2 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6">
                @include('components.book')
            </div>
        @empty
            <div class="w-full p-6 flex justify-center content-center bg-gray-100 text-gray-400 font-semibold rounded border">
                Nothing Here
            </div>
        @endforelse
    </div>
@endsection
