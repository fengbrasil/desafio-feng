<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @stack('page_styles')
</head>
<body style="display:flex;min-height:100vh;flex-direction:column;">
  @include('includes/flash')
  <header>
    @include('includes/header')
  </header>
  <main style="flex:1">
    @yield('main')

    @yield('modals')
  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    $(document).ready(function() {
      let old = <?php echo json_encode(count(old()) > 0); ?>;

      if(old) {
        let inputs = $('input, select, textarea');

        inputs.on('change', function() {
          inputs.removeClass('invalid');
          $('.validation-feedback').hide();
        });
      }
    });
  </script>
  @stack('page_scripts')
</body>
</html>
