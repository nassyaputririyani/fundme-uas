<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('admin.components.meta')
  
  @include('admin.components.styles')
  @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('admin.components.navbar')
    @include('admin.components.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    @include('admin.components.footer')
    
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  @include('admin.components.scripts')
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