<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/css/mini-page.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/footer.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    {{ $styles ?? '' }}
</head>
