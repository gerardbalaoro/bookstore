<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ implode(' - ', array_filter([!empty($title) ? $title : null,config('app.name', 'BookStore')])) }}</title>

		<meta name="robots" content="noindex">
        <meta name="description" content="A Collection of Electronic Books">

        <link rel="icon" href="{{ url('favicon.png') }}" type="image/png"/>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @stack('head')
    </head>
    <body class="bg-gray-100 {{ $bodyClass ?? '' }}">
        {{ $slot }}
        
        @stack('foot')
    </body>
</html>
