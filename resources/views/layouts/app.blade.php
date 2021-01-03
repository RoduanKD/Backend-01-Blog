<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend Blog - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    @yield('style')
  </head>
  <body>
    @include('partials.hero')
    @include('partials.messages')
    <section class="section">
      @yield('content')
    </section>

    @include('partials.footer')
    @yield('script')
  </body>
</html>