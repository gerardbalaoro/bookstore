@component('layouts.master', ['title' => $title ?? '', 'bodyClass' => $bodyClass ?? ''])
    <div class="container mx-auto {{ $containerClass ?? '' }}">
        @yield('content')
    </div>
@endcomponent