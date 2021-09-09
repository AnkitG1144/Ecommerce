<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('elements._head')
<body class="snippet-body body-pd" id="body-pd">
        @include('elements._header')
        @include('elements._sidebar')
        <div class="height-10"></div>
        <div class="content">
            <div class="bg-light">
                <h1>@yield('page-title')</h1>
            </div>
            @yield('content')
        </div>
    @include('elements._scripts')
</body>
</html>
