<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Document</title> --}}
    <title>@yield('title')</title>
    @vite(['resources/css/auth.scss'])
</head>

<body>
    <main>
        @foreach ($errors->all() as $err)
            {{ $err }}
        @endforeach
        @yield('content')
    </main>
</body>

</html>
