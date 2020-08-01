<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layouts.parciais.topo')
  </head>

  <body>

	@include('layouts.parciais.navegacao')

    @include('layouts.parciais.principal')

	@yield('content')

	@include('layouts.parciais.rodape')

	@include('layouts.parciais.rodape-scripts')

  </body>
</html>
