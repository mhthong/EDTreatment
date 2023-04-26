<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Scripts -->
    {{--  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    {{--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    <!-- Fonts -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/js/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.css" rel="stylesheet">
    @yield('head')
    <style>
    body{
        font-family: serif !important;
        font: 16px !important;
    }
    </style>

</head>

<body>

    @yield('header')

    <div id="app">
        @yield('content')
    </div>
    @yield('footer')
    <script src="/js/app.js" defer></script>
    <script src="/js/style.js" defer></script>
    <script style="text/script">
        var width = $(window).width();
        if (width <= 768) {
            $('.nav_admin').addClass('side-nav-closed');
            $('.nav_admin').removeClass('side-nav-open');
        } else {
            $('.nav_admin').addClass('side-nav-open');
            $('.nav_admin').removeClass('side-nav-closed');
        }
        $('.toggler').click(function() {
            $('.nav_admin').toggleClass('side-nav-open');
            $('.nav_admin').toggleClass('side-nav-closed');

        })
        $('.nav_admin').click(function() {
            $('.nav_admin').toggleClass('active');
        })


    </script>



    <script style="text/script">
        function initnav() {
        $('#menu-ad ul').hide();
        $('#menu-ad ul').children('.current').parent().show();
        //$('#menu ul:first').show();

        $('#menu-ad li p').click(
            function() {
                var tab_id = $(this).attr('data-tab');

                $('ul .li-show-style-ad').removeClass('active');
                $('.li-show-style-ad').removeClass('active');

                $(this).addClass('active');
                $("#"+tab_id).addClass('active');

                var checkElement = $(this).next();
                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                    $('#menu-ad ul:visible').slideUp('normal');
                    $('.li-show-style-ad').removeClass('active');
                return false;
                }
                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                $('#menu-ad ul:visible').slideUp('normal');
                checkElement.slideDown('normal');
                return false;
                }
            }
        );
        }

        /*end nav product mobile*/

        $(document).ready(function() {
            initnav();
        });
    </script>

    @yield('script')


</body>

</html>













 {{--    <script style="text/script">
        $(document).ready(function() {
            var menu-nav = localStorage.getItem('menuClasslocal')

            var element = document.getElementById(menuClass);

  /*           if (element) {
                element.classList.add('active');
            } else {
                element = document.getElementById("home");
                element.classList.add('active');
            }

            $(".toggle").click(function() {
                $(this).toggleClass("active");
                $('.navigation').toggleClass("active");
            });
 */
            $(document).on('click', element.list, function() {
                let menu = $(this).attr("id")

                $(this).addClass('active').siblings().removeClass('active');

                localStorage.setItem('menuClass', menu);
            })
        })
    </script> --}}
