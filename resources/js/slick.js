$(document).ready(function(){

      $('.partner-item').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 5,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows:true,
        draggable:false,

        responsive: [

          {
            breakpoint: 994,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 3
            }
          },

          {
            breakpoint: 769,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 1
            }
          }
        ]
      });


      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });
      $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        centerPadding: '0px',
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true
      });

   $('.slide-auto').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows:false,
        draggable:false,
        prevArrow:
        '<button type="button" class="slick-prev pull-left"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>',
        nextArrow:
        '<button type="button" class="slick-next pull-right"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>',

        responsive: [

          {
            breakpoint: 1200,
            settings: {
              arrows: false,
              centerMode: true,
              slidesToShow: 2
            }
          },
          {
            breakpoint: 1024,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 1
            }
          }
        ]
      });


      ///slider


      $('.slide-auto-slider').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows:false,
        draggable:true,

      });

      $('.slide__auto__infor').slick({
        centerMode: true,
        centerPadding: '100px',
        slidesToShow: 1,
        focusOnSelect: true,
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        arrows:true,
        draggable:true,

        prevArrow:
        `<button type="button" class="slick-prev pull-left"><svg width="25" height="35" viewBox="0 0 25 35" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.7076 32.3941L17.5586 31.8661L9.27656 18.4911L17.4746 5.25014L16.6236 4.72314L8.10156 18.4911L16.7076 32.3941Z" fill="#010101"/>
        </svg>
        </button>`,
        nextArrow:
        `<button type="button" class="slick-next pull-right"><svg width="25" height="35" viewBox="0 0 25 35" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.95156 32.3941L8.10156 31.8661L16.3826 18.4911L8.18556 5.25014L9.03556 4.72314L17.5586 18.4911L8.95156 32.3941Z" fill="#010101"/>
        </svg>
        </button>`,


        responsive: [

            {
              breakpoint: 1200,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 1,
                centerPadding: '0px',
              }
            },
            {
              breakpoint: 1024,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
              }
            },
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 1,
                centerPadding: '0px',
              }
            }
          ]


      });

      $('.slide__parnet').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 4,
        focusOnSelect: true,
        autoplay: false,
        autoplaySpeed: 3000,
        draggable:true,

        responsive: [

            {
              breakpoint: 1200,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 2
              }
            },
            {
              breakpoint: 1024,
              settings: {
                arrows: false,
                centerMode: true,

                slidesToShow: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,

                slidesToShow: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 1
              }
            }
          ]

      });
  });

///
