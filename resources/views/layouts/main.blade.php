<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.bootstrap')
    @include('components.fonts')
    @include('components.carousel')
    @include('components.style')
    <title>{{ $title }} - Fund Me</title>
</head>
<body>

    @include('components.navbar')

    @yield('content')

    @include('components.footer')

@include('components.scripts')
@stack('scripts')
</body>
</html>
