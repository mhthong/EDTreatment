@extends('app')

@section('meta')
@endsection

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <section class="section">

        <div id="content" class="">

                    <section class="section--blog">

                        <div class="section__header text-center" style="background: url({{ asset($menunode->css_class) }}) center top no-repeat fixed;">
                            <h1 class="mb-0 text-white " style="padding-bottom: 100px ; padding-top: 100px;"> {{ $menu->name }}</h1>
                        </div>

                    </section>

        </div>
        <div class="content-main container">
            <div class="cards wow slideInRight" data-wow-offset="200" data-wow-iteration="10">
                @isset($post_data[$slug])
                    @foreach ($post_data[$slug] as $key => $data_value)
                        @foreach ($data_value as $value)
                            <div class="card">
                                <img src="{{ asset($value->image) }}" alt="{{ $value->title }}" class="card-image m-0" />
                                <div class="card-content" data-mh="card-content">
                                    <div class="card-top">
                                        <h3 class="card-title m-0 " data-mh="data-mh-02">
                                            <a href="{{ route('post', ['slug' => $value->slug]) }}" class="line_clamp_2">
                                                {{ $value->title }}
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="card-bottom data-mh-01 text-bot-card " data-mh="data-mh-01">
                                        <p class="p line_clamp_5">
                                            {{ $value->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endisset

            </div>

        </div>

    </section>

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
