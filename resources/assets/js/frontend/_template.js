import Swiper from 'swiper';
import WOW from 'wow.js';
import 'lightgallery/dist/js/lightgallery-all.min.js';
import './_fitvids.js';

(function ($) {
    window.AppBrand = window.AppBrand || {};

    AppBrand.appCommon = (function() {
        function elExists(el) {
            return $(el).length;
        }

        function startTime() {
          var today = new Date();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
          var day = today.getDay();
          var days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
          m = checkTime(m);
          s = checkTime(s);
          if ($('#timing').length) $('#timing').html(days[day] + ' ' + h + ":" + m + ":" + s);
          var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
        }

        function general() {
            new WOW().init();

            if (elExists('#contact-box')) {
                var toggleBox = $('#contact-box').find('.contact-box__button');
                toggleBox.on('click', function(e) {
                    e.preventDefault();

                    $(this).parent().toggleClass("open");
                });
            }
        }

        function offcanvas() {
            var $toggler = $('#offcanvas-toggler');
            var $init = $('.offcanvas-init');
            var $close = $('.close-offcanvas, .site-overlay');

            /* Offcanvas */
            $toggler.on('click', function(e) {
                e.preventDefault();

                $init.addClass('offcanvas-active');
            });

            $close.on('click', function(e) {
                e.preventDefault();

                $init.removeClass('offcanvas-active');
            });

            $(document).on('click', '.offcanvas-inner .menu-toggler', function(e) {
                e.preventDefault();

                $(this).closest('.menu-parent').toggleClass('menu-parent-open').find('>.menu-child').slideToggle(400);
            });

            $('.offcanvas-menu .caret').on('click', function(e) {
                e.preventDefault();

                $(this).parent('.has-submenu').toggleClass('active');
            });
        }

        function sticky() {
            var navbar = document.getElementById("sticky");
            var sticky = navbar.offsetTop;

            if (window.pageYOffset > sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }

        function scrollTop(el) {
            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $(el).fadeIn();
                } else {
                    $(el).fadeOut();
                }
            });

            $(el).click(function(e) {
                e.preventDefault();

                $("html, body").animate({scrollTop: 0}, 1000);
            });
        }

        function slider(el) {
            $(el).each(function() {
                var e = $(this),
                    w_height = window.innerHeight ? window.innerHeight : $window.height(),
                    a = e.attr("data-negative-height");
                var slide = e.find(".swiper-container");

                var mySwiper = new Swiper (slide, {
                    // Optional parameters
                    // direction: 'vertical',
                    loop: true,
                    autoHeight: true,

                    // Navigation arrows
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                })
            });
        }

        function generalSlider(el) {
            $(el).each(function() {
                var e = $(this);

                var mySwiper = new Swiper (e, {
                    // Optional parameters
                    direction: 'horizontal',
                    loop: true,
                    autoHeight: true,

                    // Navigation arrows
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },

                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    }
                })
            });
        }

        function swiperGallery(el) {
            $(el).each(function() {
                var e = $(this);
                var $galleryThumbs = $(this).find('.gallery-thumbs');
                var $galleryMain = $(this).find('.gallery-top');

                var thumbsCount = $galleryThumbs.data('count') || 0;
                var galleryThumbs = new Swiper($galleryThumbs, {
                    spaceBetween: 10,
                    slidesPerView: 5,
                    loop: true,
                    freeMode: true,
                    loop: thumbsCount > 4 ? true : false,
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        1024: {
                            slidesPerView: 5,
                            spaceBetween: 10,
                            loop: thumbsCount > 4 ? true : false,
                        },
                        768: {
                            slidesPerView: 4,
                            spaceBetween: 10,
                            loop: thumbsCount > 3 ? true : false,
                        },
                        640: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                            loop: thumbsCount > 2 ? true : false,
                        },
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 10,
                            loop: thumbsCount > 1 ? true : false,
                        }
                    }
                });

                var mainWidth = $galleryMain.outerWidth();
                var mainHeight = 2 * mainWidth / 3;

                $galleryMain.css('height',  mainHeight + 'px');

                var galleryMain = new Swiper($galleryMain, {
                    spaceBetween: 10,
                    loop:true,
                    loopedSlides: 5, //looped slides should be the same
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    thumbs: {
                        swiper: galleryThumbs,
                    },
                });

                $(window).resize(function(){
                    var mainWidth2 = $galleryMain.outerWidth();
                    var mainHeight2 = 2 * mainWidth2 / 3;

                    $galleryMain.css('height',  mainHeight2 + 'px');
                    galleryMain.update();
                })

                $(window).trigger('resize')

                $('.swiper-slide', $galleryMain).each(function() {
                    var slideWidth = $(this).width();
                    var slideOffset = $(this).offset().left;
                    var $slideBefore = $(this).find('.slide-before');
                    var $slideCtrl = $(this).find('.slide-control');

                    var ctrlConfig = {
                        eventx : 0,
                        eventy : 0,
                        coords : 0,
                        moving : false
                    };

                    $slideBefore.css('background-image', 'url(' + $slideBefore.find('img').attr('data-src') + ')');

                    $(this).on('mousemove touchmove', function(e) {
                        if ( ctrlConfig.moving ) {
                            if ( ctrlConfig.eventy == ( e.pageY || e.originalEvent.touches[0].pageY ) ) {
                                e.preventDefault();
                            }

                            ctrlConfig.eventx = e.pageX || e.originalEvent.touches[0].pageX;
                            ctrlConfig.eventy = e.pageY || e.originalEvent.touches[0].pageY;
                            ctrlConfig.coords = (ctrlConfig.eventx - slideOffset) / slideWidth * 100;
                            $slideCtrl[0].style.left = ctrlConfig.coords + '%';
                            $slideBefore[0].style.maxWidth = ctrlConfig.coords + '%';
                        }
                    }).on('mousemove touchstart', function(e) {
                        ctrlConfig.moving = true;
                        slideWidth = $(this).width();
                        slideOffset = $(this).offset().left;
                    }).on('mouemove touchend', function() {
                        ctrlConfig.moving = false;
                    }).on('dragstart', function(e) {
                        e.preventDefault();
                    });
                });
            });
        }

        function swiperVideoGallery(el) {
            $(el).each(function() {
                var e = $(this);
                var $galleryThumbs = $(this).find('.video-gallery-thumbs');
                var $galleryMain = $(this).find('.video-gallery-top');

                // Fit width videos.
                $(".video-gallery-top__container", $galleryMain).fitVids();

                var thumbsCount = $galleryThumbs.data('count') || 0;
                var galleryThumbs = new Swiper($galleryThumbs, {
                    spaceBetween: 10,
                    slidesPerView: 5,
                    loop: thumbsCount > 4 ? true : false,
                    freeMode: true,
                    loopedSlides: 5, //looped slides should be the same
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        1024: {
                            slidesPerView: 5,
                            spaceBetween: 10,
                            loop: thumbsCount > 4 ? true : false,
                        },
                        768: {
                            slidesPerView: 4,
                            spaceBetween: 10,
                            loop: thumbsCount > 3 ? true : false,
                        },
                        640: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                            loop: thumbsCount > 2 ? true : false,
                        },
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 10,
                            loop: thumbsCount > 1 ? true : false,
                        }
                    }
                });

                $('.swiper-slide', $galleryThumbs).each(function() {
                    $(this).find('a').click(function() {
                        $(this).closest( ".swiper-slide").addClass("selected").siblings().removeClass("selected");
                        galleryThumbs.slideTo(galleryThumbs.clickedIndex);
                    });
                });

                $('.swiper-slide-active', $galleryThumbs).first().addClass("selected");
            });
        }

        function gallery(el) {
            $(el).lightGallery({
                getCaptionFromTitleOrAlt: false
            });
        }

        function initScroll() {
            if (elExists('#back-top')) scrollTop('#back-top');
        }

        function initSlider() {
            if (elExists('.swiper-block')) slider('.swiper-block');
        }

        function initGeneralSlider() {
            if (elExists('.swiper-general')) generalSlider('.swiper-general');
        }

        function initGallery() {
            if (elExists('#lightgallery')) gallery('#lightgallery');
        }

        function initSwiperGallery() {
            if (elExists('.swiper-gallery')) swiperGallery('.swiper-gallery');
        }

        function initSwiperVideoGallery() {
            if (elExists('.swiper-video-gallery')) swiperVideoGallery('.swiper-video-gallery');
        }



        return {
            init: function() {
                general();
                offcanvas();
                initScroll();
                initSlider();
                initGeneralSlider();
                initGallery();
                initSwiperGallery();
                initSwiperVideoGallery();
            },
            onload: function() {
                startTime();
            },
            onscroll: function() {
                sticky();
            }
        }
    })();

    $(document).ready( function() {
        AppBrand.appCommon.init();
    });

    window.onload=function() {
        AppBrand.appCommon.onload();
    }

    window.onscroll=function() {
        AppBrand.appCommon.onscroll();
    }
})( window.$ );
