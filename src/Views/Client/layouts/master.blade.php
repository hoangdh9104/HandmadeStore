<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('layouts.partials.head')
    <title>@yield('title')</title>
    @include('layouts.partials.head')
</head>

<body>
    <!-- Dựng base -->

    <div id="app">


        <!-- dùng header -->
        @include('layouts.partials.header')
        

        {{-- MainContent --}}
        @yield('content')

        <!-- dùng footer -->
        @include('layouts.partials.footer')

        @include('layouts.partials.script')

    </div>

    @yield('script')

</body>

</html>
