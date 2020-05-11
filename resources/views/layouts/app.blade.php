<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        @yield('head')
    </head>
    <body>
        @if(Request::is(['admin', 'admin/*']))

            <div class="wrapper">
                @include('partials.sidebar')
                <div class="main-panel">
                    @include('partials.header')
                    @yield('content')
                    @include('partials.footer')
                </div>
            </div>
            @stack('script')
        
        @else
        
        @include('partials.header')
            <main>
                @yield('content')
            </main>
            @include('partials.footer')
            @stack('script')

        @endif

        <!-- <script>
            $(function() {
                $(".scroll").on('click', function(e) {
                    e.preventDefault();
                    var target = $(this).attr('href');

                    $('html, body').animate({
                        scrollTop: ($(target).offset().top)
                    },
                    2000
                    );
                });
            });
        </script> -->
    </body>
</html>
