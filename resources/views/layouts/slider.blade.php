

<section class="slider_slick" style="position: relative;">
    <div class="slider-img" style="padding: 0;">
        <div class="content__slider">
            <h2>“Empower Natural Beauty”</h2>
{{--             <span>Training with us has never been easier! What are you waiting for? Come and find out all our Eye Design courses, designed especially for you!</span>
            <div class="button__slider">
                <button><span>GO TO COURSES</span></button>
            </div> --}}
        </div>
        <div class="slide-auto-slider">

            <img class="img-sli" src="{{ asset('assets/images/slider_image.png')}}" alt="">
            <img class="img-sli" src="{{ asset('assets/images/slider_image.png')}}" alt="">
            <img class="img-sli" src="{{ asset('assets/images/slider_image.png')}}" alt="">

{{--             @isset($SimpleSlider)
            @foreach ( $SimpleSlider as  $SimpleSlider => $SimpleSliderItem)
                @foreach ( $SimpleSliderItem as  $key => $value)
               <img class="img-sli" src="{{ asset($value->image)}}" alt="{{ $value->tittle }}">
                 @endforeach
            @endforeach
        @endisset --}}
        </div>
    </div>
</section>

