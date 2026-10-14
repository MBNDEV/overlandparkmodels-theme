(function ($) {
    "use strict";

	var windowOn = $(window);
	windowOn.on("load", function () {
		$("#loading").fadeOut(500);
	});


    $(document).ready(function () {

        /*-------------------------------
            Navbar Fix
          ------------------------------*/
        if ($(window).width() < 991) {
            navbarFix()
        }

        $(".menu-item-has-children a").on("click", function () {
            var element = $(this).parent("li");
            if (element.hasClass("show")) {
                element.removeClass("show");
                element.children("ul").slideUp(500);
            } else {
                element.siblings("li").removeClass('show');
                element.addClass("show");
                element.siblings("li").find("ul").slideUp(500);
                element.children('ul').slideDown(500);
            }
        });

        //Odometer
        if ($(".single-counterup-01").length) {
            $(".single-counterup-01").each(function () {
                $(this).isInViewport(function (status) {
                    if (status === "entered") {
                        for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
                            var el = document.querySelectorAll('.odometer')[i];
                            el.innerHTML = el.getAttribute("data-odometer-final");
                        }
                    }
                });
            });
        }

         /*--------------------
            wow js init
        ---------------------*/
        new WOW().init();


        /*--------------------
           Remove cart item
        ---------------------*/
        $('.remove-cart').on('click', function (e) {
            e.preventDefault();
            $(this).parent().parent().hide(300);
        });

        /*-------------------------
            product + - start here
        -------------------------*/

        $(function () {
            $(".qtybutton").on("click", function () {
                var $button = $(this);
                var oldValue = $button.parent().find("input").val();
                if ($button.text() === "+") {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                $button.parent().find("input").val(newVal);
            });
        });

        /*-------------------------
            magnific popup activation
        -------------------------*/
        $('.video-play-btn,.video-popup,.small-vide-play-btn').magnificPopup({
            type: 'video'
        });
        $('.image-popup').magnificPopup({
            type: 'image',
            removalDelay: 260,
            mainClass: 'mfp-zoom-in',
        });

        /*------------------
            back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });

        /*----------------------
            Cart Sidebar
        -----------------------*/
        $('.open-cart').on('click', function () {
            $('.cart-menu-wrap').addClass('cart-open');
            $('.cart-menu-overlay').addClass('cart-overlay-open');
        });

        $('.cart-menu-overlay,.close-btn-03').on('click', function () {
            $('.cart-menu-wrap').removeClass('cart-open');
            $('.cart-menu-overlay').removeClass('cart-overlay-open');
        });

        /*----------------------
            Sidebar
        -----------------------*/
        $('.open-sidebar').on('click', function () {
            $('.sidebar-menu-wrap').addClass('sidebar-open');
            $('.side-menu-overlay').addClass('overlay-open');
        });

        $('.side-menu-overlay,.close-btn-02').on('click', function () {
            $('.sidebar-menu-wrap').removeClass('sidebar-open');
            $('.side-menu-overlay').removeClass('overlay-open');
        });

        /*----------------------
            Search Popup
        -----------------------*/
        var bodyOvrelay = $('#body-overlay');
        var searchPopup = $('#search-popup');

        $(document).on('click', '#body-overlay', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click', '.border-none', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click', '#search', function (e) {
            e.preventDefault();
            searchPopup.addClass('active');
            bodyOvrelay.addClass('active');
        });

    });

    // Banner Slider One
    var swiper = new Swiper('.banner-slider-one', {
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        navigation: {
            nextEl: '.next-icon',
            prevEl: '.prev-icon',
        },
        pagination: {
            el: '.custom-pagination',
            type: 'progressbar',
            clickable: true
        },
        pagination: {
            el: '.banner-pagination',
            clickable: true,
            type: 'bullets',
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
            },
        },
        autoplay: {
          speeds: 1000,
          delay: 4000,
        },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 1,
            },
            1199: {
                slidesPerView: 1,
            },
            991: {
                slidesPerView: 1,
            },
            767: {
                slidesPerView: 1,
            },
            575: {
                slidesPerView: 1,
            },
        }
    });

    // Banner Slider Two
    var swiper = new Swiper('.banner-slider-two', {
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        pagination: {
            el: '.custom-pagination',
            type: 'progressbar',
            clickable: true
        },
        pagination: {
            el: '.banner-pagination',
            clickable: true,
            type: 'bullets',
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
            },
        },
        // autoplay: {
        //   speeds: 1000,
        //   delay: 3000,
        // },
        //speed: 1000,
		
		//autoplay: {
        //   speeds: 500,
        //   delay: 1000,
        // },
		 
        breakpoints: {
            1300: {
                slidesPerView: 1,
            },
            1199: {
                slidesPerView: 1,
            },
            991: {
                slidesPerView: 1,
            },
            767: {
                slidesPerView: 1,
            },
            575: {
                slidesPerView: 1,
            },
        }
    });

    // Banner Slider three
    var swiper = new Swiper('.banner-slider-three', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        freeMode: true,
        centeredSlides: true,
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        // autoplay: {
        //   speeds: 1000,
        //   delay: 4000,
        // },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 2,
            },
            1199: {
                slidesPerView: 2,
            },
            991: {
                slidesPerView: 2,
            },
            767: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
        }
    });

    // Unique Slider One
    var swiper = new Swiper('.unique-slider-one', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        // autoplay: {
        //   speeds: 1000,
        //   delay: 4000,
        // },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 1,
            },
            1199: {
                slidesPerView: 1,
            },
            991: {
                slidesPerView: 1,
            },
            767: {
                slidesPerView: 1,
            },
        }
    });

    // Unique Slider two
    var swiper = new Swiper('.unique-slider-two', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        observer: true,
        observeParents: true,
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        // autoplay: {
        //   speeds: 1000,
        //   delay: 4000,
        // },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 1,
            },
            1199: {
                slidesPerView: 1,
            },
            991: {
                slidesPerView: 1,
            },
            767: {
                slidesPerView: 1,
            },
        }
    });

    // Service Slider One
    var swiper = new Swiper('.service-slider-one', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        // autoplay: {
        //     speeds: 2000,
        //     delay: 4000,
        // },
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 2,
            },
            1199: {
                slidesPerView: 2,
            },
            991: {
                slidesPerView: 2,
            },
            767: {
                slidesPerView: 1,
            },
            575: {
                slidesPerView: 1,
            },
            425: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
        }
    });
    
    var bodyOvrelay = $('#body-overlay');
    var sidebarMenu = $('#sidebar-menu');

    // sidebar menu 
    $(document).on('click', '.sidebar-menu-close', function (e) {
        e.preventDefault();
        bodyOvrelay.removeClass('active');
        sidebarMenu.removeClass('active');
    });
    $(document).on('click', '#navigation-button', function (e) {
        e.preventDefault();
        sidebarMenu.addClass('active');
        bodyOvrelay.addClass('active');
    });
    /* -----------------------------------------
        fact counter
    ----------------------------------------- */
    $('.counter').counterUp({
        delay: 15,
        time: 2000
    });


    // client-slider-one
    var swiper = new Swiper('.client-slider-one', {
        slidesPerView: 5,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            speeds: 2000,
            delay: 4000,
        },
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 4,
            },
            1199: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 3,
            },
            767: {
                slidesPerView: 3,
            },
            575: {
                slidesPerView: 1,
            },
        }
    });

    /**---------------------------------------
          Progress BAR
        ----------------------------------------*/
        function td_Progress() {
            var progress = $('.progress-rate');
            var len = progress.length;
             for (var i = 0; i < len; i++) {
                var progressId = '#' + progress[i].id;
                var dataValue = $(progressId).attr('data-value');
                $(progressId).css({'width':dataValue+'%'});
             }
         }
         var progressRateClass = $('#progress-running');
          if ((progressRateClass).length) {
             td_Progress();
         }
         $('.counting').each(function() {
             var $this = $(this),
             countTo = $this.attr('data-count');
           
             $({ countNum: $this.text()}).animate({
                 countNum: countTo
             },
 
             {
                 duration: 2000,
                 easing:'linear',
                 step: function() {
                     $this.text(Math.floor(this.countNum));
                 },
                 complete: function() {
                     $this.text(this.countNum);
                 }
             });  
         });

    // residen Slider One
    var swiper = new Swiper('.residence-slider-one', {
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        autoplay: {
          speeds: 1000,
          delay: 4000,
        },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 1,
            },
            1199: {
                slidesPerView: 1,
            },
            991: {
                slidesPerView: 1,
            },
            767: {
                slidesPerView: 1,
            },
        }
    });

    // apartment Slider One
    var swiper = new Swiper('.apartment-slider-one', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        // autoplay: {
        //   speeds: 1000,
        //   delay: 4000,
        // },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 1,
            },
            1199: {
                slidesPerView: 1,
            },
            991: {
                slidesPerView: 1,
            },
            767: {
                slidesPerView: 1,
            },
        }
    });

    // Galley Slider One
    var swiper = new Swiper('.gallery-slider-one', {
      slidesPerView: 2,
      spaceBetween: 30,
      centeredSlides: true,
      loop: true,
      navigation: {
        nextEl: '.prev-icon',
        prevEl: '.next-icon',
      },
      // autoplay: {
      //   speeds: 2000,
      //   delay: 4000,
      // },
      speed: 1000,
      breakpoints: {
        1300: {
          slidesPerView: 2,
        },
        1199: {
          slidesPerView: 2,
        },
        991: {
          slidesPerView: 2,
        },
        767: {
          slidesPerView: 2,
        },
        575: {
          slidesPerView: 1,
        },
      }
    });

    // Blog Slider One
    var swiper = new Swiper('.blog-slider-one', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        // autoplay: {
        //     speeds: 2000,
        //     delay: 4000,
        // },
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 2,
            },
            1199: {
                slidesPerView: 2,
            },
            991: {
                slidesPerView: 2,
            },
            767: {
                slidesPerView: 1,
            },
            575: {
                slidesPerView: 1,
            },
        }
    });

    // Related Slider One
    var swiper = new Swiper('.related-slider-one', {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        // autoplay: {
        //     speeds: 2000,
        //     delay: 4000,
        // },
        navigation: {
            nextEl: '.prev-icon',
            prevEl: '.next-icon',
        },
        speed: 1000,
        breakpoints: {
            1300: {
                slidesPerView: 2,
            },
            1199: {
                slidesPerView: 2,
            },
            991: {
                slidesPerView: 2,
            },
            767: {
                slidesPerView: 1,
            },
            575: {
                slidesPerView: 1,
            },
        }
    });


    //define variable for store last scrolltop
    var lastScrollTop = '';

    $(window).on('scroll', function () {

        //back to top show/hide
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }

        // Sticky-Memu
        if ($(window).width() > 991) {
            StickyMenu();
        }
    });


    $(window).on('resize', function () {
        /*-------------------------------
            Navbar Fix
        ------------------------------*/
        if ($(window).width() < 991) {
            navbarFix()
        }
    });


    $(window).on('load', function () {

        /*-----------------
            preloader
        ------------------*/
        setInterval(function () {
            $("#preloader").fadeOut(300);
        }, 700);

        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

    });

    function navbarFix() {
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a, .navbar-area .navbar-nav li.appside-megamenu>a', function (e) {
            e.preventDefault();
        })
    }

    function StickyMenu() {
        /*--------------------------
        sticky menu activation
        ---------------------------*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.navbar-area');
        if ($(window).scrollTop() > 100) {
            mainMenuTop.addClass('nav-fixed');
        } else {
            mainMenuTop.removeClass('nav-fixed');
        }
        lastScrollTop = st;
    }

})(jQuery);

document.addEventListener("DOMContentLoaded", function() {
  var loaderContainer = document.querySelector(".loader-container");
  var pageContent = document.getElementById("page-content");

  
  window.addEventListener("load", function() {
    
    fadeOut(loaderContainer, 500, function() {
      fadeIn(pageContent, 500);
    });
  });
});


function fadeOut(element, duration, callback) {
  var opacity = 1;
  var interval = 50;
  var gap = interval / duration;

  var fading = setInterval(function() {
    opacity = opacity - gap;

    if (opacity <= 0) {
      clearInterval(fading);
      element.style.display = "none";
      if (typeof callback === "function") callback();
    }

    element.style.opacity = opacity;
  }, interval);
}


function fadeIn(element, duration) {
  element.style.display = "block";
  var opacity = 0;
  var interval = 50;
  var gap = interval / duration;

  var fading = setInterval(function() {
    opacity = opacity + gap;

    if (opacity >= 1) {
      clearInterval(fading);
    }

    element.style.opacity = opacity;
  }, interval);
}
