


@extends('app')

@section('meta')
    @isset($post)
        @foreach ($post as $value)
        <meta property="og:title" content="{{$value->title}}">
        <meta property="og:description" content="{{$value->description}}">
        <meta property="og:image" content="{{env('APP_URL').$value->image}}">
        <meta name="twitter:title" content="{{$value->title}}">
        <meta name="twitter:description"  content="{{$value->description}}">
        <title>{{$value->title}}</title>

    @endforeach
    @endisset
@endsection

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
@section('header')
    @include('layouts.header')
@endsection

@section('content')
@isset($post)
@foreach ($post as $post)
    <div class="container">
        <article class="post--detail">
            <div class="post__header text-center p-5">
                <h1>{{ $post ->title }}</h1>
            </div>
            <div class="post__content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-12">
                            {!! $post ->content !!}
                        </div>
                        <div class="col-xl-3 col-12">
                            <div class="mb-7">
                                <div class="mb-3">
                                    <h3>Danh mục bài viết</h3>
                                </div>
                                <div class="d-gridx gap-2">
                                    @foreach ($posts as $posts)

                                    <div class="row mb-2">
                                        <div class="col-xl-4 pr-0 hidden-mobile"><a class="line_clamp_2"  style="font-size: 15px;"
                                                href="{{ route('post', ['slug' => $posts->slug]) }}"
                                                title="{{$posts ->name }}"><img
                                                    src="{{ asset($posts ->image) }}"
                                                    alt="{{$posts ->name}}"></a></div>
                                        <div class="col-xl-8 col-12 pr-0" >
                                            <h3 class="h4"><a class="line_clamp_2"
                                                style="font-size: 15px;"
                                                    href="{{ route('post', ['slug'=>$posts->slug]) }}">{{$posts->name}}</a></h3>

                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div> <strong>Thẻ: &nbsp;</strong>

                             <span><a

                                href="https://www.phelieu.com.vn/tag/cong-ty-thu-mua-phe-lieu-chi-gia-cao"
                                class="text-secondary">{{$post->tag}}</a></span>

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
