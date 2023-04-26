@extends('app')

@section('meta')

@isset($setting_data)
    <meta property="og:title" content="{{$setting_data['seo_title']}}">
    <meta property="og:description" content="{{$setting_data['seo_description']}}">
    <meta property="og:image" content="{{env('APP_URL').$setting_data['seo_image']}}">
    <meta name="twitter:title" content="{{$setting_data['seo_title']}}">
    <meta name="twitter:description"  content="{{$setting_data['seo_description']}}">
    <title>{{$setting_data['seo_title']}}</title>
    @endisset
@endsection

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
@section('header')
    @include('layouts.header')
@endsection

@section('content')
    @include('layouts.slider')


    @include('layouts.content')



    @endsection

@section('footer')
    @include('layouts.footer')
{{-- @include('layouts.contact') --}}
@endsection

@section('script')
    <script>
        $(function() {
            $('.card-top').matchHeight(options);
            $('.card-bottom').matchHeight(options);
            $('.introduce-mh').matchHeight(options);
            $('.card-bottom-mh').matchHeight(options);
            $('.tbody').matchHeight(options);

        });
    </script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.support-content').hide();
            $('a.btn-support').click(function(e) {
                e.stopPropagation();
                $('.support-content').slideToggle();
            });
            $('.support-content').click(function(e) {
                e.stopPropagation();
            });
            $(document).click(function() {
                $('.support-content').slideUp();
            });
        });
    </script>

    <script>
            function initnav() {
            $('#menu-nav ul').hide();
            $('#menu-nav ul').children('.current').parent().show();
            //$('#menu ul:first').show();
            $('#menu-nav li p').click(
                function() {
                    var tab_id = $(this).attr('data-tab');

                    $('ul .li-show-style .nav-content-header').removeClass('down');
                    $('.nav-content-header').removeClass('down');

                    $(this).addClass('down');
                    $("#"+tab_id).addClass('down');

                    var checkElement = $(this).next();
                    if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                        $('#menu-nav ul:visible').slideUp('normal');
                        $('.nav-content-header').removeClass('down');
                    return false;
                    }
                    if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                    $('#menu-nav ul:visible').slideUp('normal');
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

@endsection




