$( document ).ready(function() {

    "use strict";
    
    $('.slider-news').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        responsive: [
            {
              breakpoint: 767,
              settings: {
                arrows: false,
                slidesToShow: 1
              }
            }
        ]
    });

    $('.slider-homepage').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true        
    });
});