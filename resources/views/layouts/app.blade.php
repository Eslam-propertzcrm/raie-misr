<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('inc.head')

<body>
    <div id="app">
       @include('inc.LangPaths')
       @include('inc.nav')

        <main class="py-4">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @include('inc.script')

</body>
</html>
