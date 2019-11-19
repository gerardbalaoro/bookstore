@extends('layouts.blank', [])

@section('content')
    <div class="flex flex-wrap justify-center content-center items-center font-medium h-screen px-8 pb-32">
        <div class="text-center text-gray-700 text-lg sm:text-xl md:text-2xl lg:text-3xl w-full">
            Sorry, the page you are looking for could not be found.
        </div>
        <button onclick="window.history.back()" class="focus:outline-none rounded-lg m-1 px-4 py-2 bg-white text-gray-700 hover:bg-gray-200 truncate font-semibold leading-tight shadow-md">
            <svg class="fill-current w-4 inline mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <polygon points="3.828 9 9.899 2.929 8.485 1.515 0 10 .707 10.707 8.485 18.485 9.899 17.071 3.828 11 20 11 20 9 3.828 9"></polygon>
            </svg>
            Go Back
        </button>
        <a href="{{ route('home') }}" class="rounded-lg m-1 px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 truncate font-semibold leading-tight shadow-md">
            <svg class="fill-current w-4 inline mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="m512 422h-60v-422h-128v40h-48v-40h-128v80h-88v342h-60v40h40v50h40v-50h352v50h
                40v-50h40zm-236-263h48v183h-48zm48-79v39h-48v-39zm-176 40v39h-48v-39zm-48 302v-223h48v
                223zm88 0v-382h48v382zm88 0v-40h48v40zm88 0v-382h48v382zm0 0" />
            </svg>
            {{ config('app.name', 'BookStore') }}
        </a>
    </div>
@endsection