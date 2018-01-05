<html lang="en">
  <head>
    <title>Sentinel Authentication</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}} " rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/jumbotron-narrow.css')}} " rel="stylesheet">
    <link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <div class="container">
      @include('layouts.top-menu')
      @yield('content')
  </body>
</html>