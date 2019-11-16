@component('layouts.master', ['title' => $title ?? ''])
    @push('head')
        <script src="{{ mix('js/jquery.js') }}"></script>
        <script src="{{ mix('js/plugins.js') }}"></script>
        <script src="{{ mix('js/jcarousel.js') }}"></script>
    @endpush

    @include('components.nav')
    <div class="container mx-auto mt-8 px-8">
        @yield('content')
    </div>

    @push('foot')
        <script src="{{ mix('js/app.js') }}"></script>
    @endpush
@endcomponent