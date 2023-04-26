@extends('app')

@section('meta')
@section('meta')
    @isset($page)
        @foreach ($page as $value)
        <meta property="og:title" content="{{$value->name}}">
        <meta property="og:description" content="{{$value->description}}">
        <meta property="og:image" content="{{env('APP_URL').$value->image}}">
        <meta name="twitter:title" content="{{$value->name}}">
        <meta name="twitter:description"  content="{{$value->description}}">
        <title>{{$value->name}}</title>

    @endforeach
    @endisset
@endsection
@endsection

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
@section('header')
    @include('layouts.header')
@endsection

@section('content')
    @isset($page)
        @foreach ($page as $page)
            <div class="container">
                <article class="post--detail">
                    <div class="post__header text-center p-5">
                        <h1>{{ $page ->name }}</h1>
                    </div>
                    <div class="post__content">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    @if ($page ->alias == 'pricelist')
                                    {!! $page ->content !!}
                                    @include('layouts.pricelist')
                                    @else
                                    {!! $page ->content !!}
                                    @endif
                                </div>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    @endisset
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
                    $("#" + tab_id).addClass('down');

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
