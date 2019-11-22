@extends('layouts.app')

@section('content')
    @include('components.carousel', ['items' => $top, 'title' => 'Top Rated'])
    @if ($new)
        <div class="section">            
            <div class="section-title">
                <h1>New Additions</h1>
            </div>
            @foreach ($new as $book)
                <div class="w-full mb-4 px-2 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6">
                    @include('components.book')
                </div>
            @endforeach
        </div>
    @endif
    @if ($new)
        <div class="section">            
            <div class="section-title">
                <h1>Latest Publicatio </h1>
            </div>
            @foreach ($latest as $book)
                <div class="w-full mb-4 px-2 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6">
                    @include('components.book')
                </div>
            @endforeach
        </div>
    @endif
@endsection