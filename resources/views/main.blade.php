<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href={{asset('css/app.css')}}>
        <title>Weekly Menu - @yield('title')</title>
    </head>
    <body>
        @include('_partials.header')
        <div class="container-fluid">
            <div class="container">

                @yield('content')

            </div>
        </div>

        @include('_partials.footer')

    @section('scripts')
    <script src={{asset('js/app.js')}}></script>
    @show
    </body>
</html>
