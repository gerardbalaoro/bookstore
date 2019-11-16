@extends('layouts.app')

@section('content')
    @if ($books)
        <div class="section">            
            <div class="section-title">
                <h1>{{ $title }}</h1>
            </div>
            @foreach ($books as $book)
                <div class="w-full mb-4 px-2 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6">
                    @include('components.book')
                </div>
            @endforeach
        </div>
    @endif
@endsection
