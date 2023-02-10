var lastScrollTop; // This Varibale will store the top position

navbar = document.getElementById('header'); // Get The NavBar

window.addEventListener('scroll',function(){
    //on every scroll this funtion will be called
    
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if(scrollTop > lastScrollTop){
        navbar.style.top='-136px';
    } else {
        navbar.style.top='0';
    }
    
    lastScrollTop = scrollTop;
});


var didScroll;
var currentUrl = window.location.href;
$(function () {
    
    $(window).scroll(function (event) {
        didScroll = true;
    });

    setInterval(function () {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    var currentSrollLocation = 0;

    function hasScrolled() {
        var bodyHeight = $('body').height();
        var st = $(this).scrollTop();
        if (st >= 15) {
            $('.header').removeClass('top-trans')
            $('.logo-white, .burger-white').hide();
            $('.logo-black, .burger-black').show();
        } else {
            $('.header').addClass('top-trans')
            $('.logo-white, .burger-white').show();
            $('.logo-black, .burger-black').hide();
        }
        currentSrollLocation = st;
        lastScrollTop = st;
    }

})


$(".navbars > li").hover(function (e) {
    if ($(window).width() > 943) {
      $(this).children(".navbars-sub").stop(true, false).fadeToggle(150);
    //   $(this).children(".has-menu").stop(true, false).toggleClass("open");
      e.preventDefault();
    }
});
$(".navbars > li").click(function () {
    if ($(window).width() <= 943) {
        $(this).children(".navbars-sub").toggle(150);
    }
});

$("#searchToggle").on('click', function() {
    $('.header__search input').toggleClass('active');
    $('.searchToggle').toggle();
    $('.closeToggle').toggle();
});

$("#menuToggle").on('click', function() {
    $('.navbars').addClass('active');
});

$("#closeNavbar").on('click', function() {
    $('.navbars').removeClass('active');
});