<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Headers -->
@include('inc.head')

<body>
    <div class="cp-wrapper">
       @include('inc.LangPaths')
       @include('inc.nav')

        <!-- <main class="py-4"> -->
        <section class="cp-welcome-section cp-welcome-section_v2 pd-tb100 services no-top-padding">
            @include('inc.messages')
            @yield('content')
        </section>  
        <!-- </main> -->
        @include('inc.footer')
    </div>

    <!-- Scripts -->
    @include('inc.script')

</body>
</html>
