@foreach (range(1, 5) as $star)
    <svg class="{{ $color ?? 'text-gray-500' }} {{ round($count) >= $star ? ($highlight ?? 'text-blue-500') : '' }} fill-current inline-block {{ $class }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
    </svg>
@endforeach