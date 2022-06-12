<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('components.bootstrap')
    @include('components.fonts')
    @include('components.carousel')
    @include('components.style')
    @stack('styles')
    <title>{{ $title }} - Fund Me</title>
</head>
<body>
    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    @include('components.scripts')
    @stack('scripts')

    <script>
        toastr.options.timeOut = 1000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
</body>
</html>
