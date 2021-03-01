<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>@yield('title')</title>
    @yield('link')
  </head>
  <body>
    @include('UI.Partials.header')
    <main>
      @yield('main_content')
    </main>
    @yield('footer')
        {{-- @include('UI.Partials.footer') --}}
  </body>
  {{-- HANDLEBARS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js" integrity="sha512-zT3zHcFYbQwjHdKjCu6OMmETx8fJA9S7E6W7kBeFxultf75OPTYUJigEKX58qgyQMi1m1EgenfjMXlRZG8BXaw==" crossorigin="anonymous"></script>
  {{-- JS src --}}
  @yield('src')
  {{-- <script src="{{asset('/js/app.js')}}"></script> --}}

</html>
