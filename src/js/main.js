(function($) {
    'use strict';
    /*-----------------------------
		Window When Loading
---------------------------------*/
    $(window).on('load', function() {
        var wind = $(window);
        /* ----------------------------------------------------------------
			[ Preloader ]
	-----------------------------------------------------------------*/

        $('.loading').fadeOut(500);
    });
    /*----------------------------------------*/
    /*  JB's Main Slider
/*----------------------------------------*/
    $('.main-slider').slick({
        infinite: true,
        arrows: true,
        autoplay: true,
        fade: true,
        dots: true,
        autoplaySpeed: 7000,
        speed: 1000,
        adaptiveHeight: true,
        easing: 'ease-in-out',
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
    });
    $(document).ready(function() {
        $('.scroller').css('height', $(window).height() + '100vh');
    });

    /*----------------------------------------*/
    /*  JB's Offcanvas
/*----------------------------------------*/
    /*Variables*/
    var $offcanvasNav = $('.offcanvas-menu'),
        $offcanvasNavWrap = $('.offcanvas-menu-wrapper'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu'),
        $menuToggle = $('.menu-btn'),
        $menuClose = $('.btn-close, btn-close-2');

    $menuToggle.on('click', function(e) {
        e.preventDefault();
        $offcanvasNavWrap.toggleClass('open');
    });

    $menuClose.on('click', function(e) {
        e.preventDefault();
        $offcanvasNavWrap.removeClass('open');
    });

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offcanvasNavSubMenu
        .parent()
        .prepend('<span class="menu-expand"><i class="fa fa-plus"></i></span>');

    /*Close Off Canvas Sub Menu*/
    $offcanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if (
            $this
            .parent()
            .attr('class')
            .match(
                /\b(menu-item-has-children|has-children|has-sub-menu)\b/
            ) &&
            ($this.attr('href') === '#' || $this.hasClass('menu-expand'))
        ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.siblings('ul').slideUp('slow');
            } else {
                $this
                    .closest('li')
                    .siblings('li')
                    .find('ul:visible')
                    .slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if (
            $this.is('a') ||
            $this.is('span') ||
            $this.attr('clas').match(/\b(menu-expand)\b/)
        ) {
            $this.parent().toggleClass('menu-open');
        } else if (
            $this.is('li') &&
            $this.attr('class').match(/\b('menu-item-has-children')\b/)
        ) {
            $this.toggleClass('menu-open');
        }
    });

    /*----------------------------------------*/
    /*  Category Menu
/*----------------------------------------*/
    $('.rx-parent').on('click', function() {
        $('.rx-child').slideToggle();
        $(this).toggleClass('rx-change');
    });
    //    category heading
    $('.category-heading, .category-menu_icon').on('click', function() {
        $('.category-menu-list').slideToggle(900);
    });
    /*-- Category Menu Toggles --*/
    function categorySubMenuToggle() {
        var screenSize = $(window).width();
        if (screenSize <= 991) {
            $(
                '#cate-toggle .right-menu > a, #cate-toggle-2 .right-menu > a'
            ).prepend('<i class="expand menu-expand"></i>');
            $('.category-menu .right-menu ul').slideUp();
            // $('.category-menu .menu-item-has-children i').on('click', function(e){
            //     e.preventDefault();
            //     $(this).toggleClass('expand');
            //     $(this).siblings('ul').css('transition', 'none').slideToggle();
            // })
        } else {
            $('.category-menu .right-menu > a i').remove();
            $('.category-menu .right-menu ul').slideDown();
        }
    }
    categorySubMenuToggle();
    $(window).resize(categorySubMenuToggle);
    /*-- Category Sub Menu --*/
    function categoryMenuHide() {
        var screenSize = $(window).width();
        if (screenSize <= 991) {
            $('.category-menu-list').hide();
        } else {
            $('.category-menu-list').show();
        }
    }
    categoryMenuHide();
    // $(window).resize(categoryMenuHide);
    $('.category-menu-hidden').find('.category-menu-list').hide();
    $('.category-menu-list').on(
        'click',
        'li a, li a .menu-expand',
        function(e) {
            var $a = $(this).hasClass('menu-expand') ?
                $(this).parent() :
                $(this);
            $(this).toggleClass('active');
            if ($a.parent().hasClass('right-menu')) {
                if (
                    $a.attr('href') === '#' ||
                    $(this).hasClass('menu-expand')
                ) {
                    if ($a.siblings('ul:visible').length > 0)
                        $a.siblings('ul').slideUp();
                    else {
                        $(this)
                            .parents('li')
                            .siblings('li')
                            .find('ul:visible')
                            .slideUp();
                        $a.siblings('ul').slideDown();
                    }
                }
            }
            if ($(this).hasClass('menu-expand') || $a.attr('href') === '#') {
                e.preventDefault();
                return false;
            }
        }
    );

    /*----------------------------------------*/
    /*  Nice Select
/*----------------------------------------*/
    $(document).ready(function() {
        $('.nice-select').niceSelect();
    });

    /*---------------------------------------------*/
    /*  JB's Product Tab Slider
/*----------------------------------------------*/
    $('.jb-product-tab_slider').slick({
        infinite: true,
        arrows: false,
        dots: true,
        rows: 2,
        speed: 2000,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*---------------------------------------------*/
    /*  JB's Product Tab Slider
/*----------------------------------------------*/
    $('.jb-special-product_slider').slick({
        infinite: false,
        arrows: false,
        dots: true,
        speed: 2000,
        slidesToShow: 2,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*----------------------------------------*/
    /* JB's Countdown
/*----------------------------------------*/
    $('.jb-countdown').countdown('2022/12/01', function(event) {
        $(this).html(
            event.strftime(
                '<div class="count"><span class="count-amount">%D</span><span class="count-period">Days</span></div><div class="count"><span class="count-amount">%H</span><span class="count-period">Hrs</span></div><div class="count"><span class="count-amount">%M</span><span class="count-period">Mins</span></div><div class="count"><span class="count-amount">%S</span><span class="count-period">Secs</span></div>'
            )
        );
    });

    /*---------------------------------------------*/
    /*  JB's Product Tab Slider Two
/*----------------------------------------------*/
    $('.jb-product-tab_slider-2').slick({
        infinite: true,
        arrows: false,
        dots: true,
        speed: 2000,
        slidesToShow: 4,
        adaptiveheight: true,
        slidesToScroll: 4,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    infinite: false,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*---------------------------------------------*/
    /*  JB's List Product Slider
/*----------------------------------------------*/
    $('.jb-list-product_slider').slick({
        infinite: true,
        arrows: false,
        dots: true,
        speed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        rows: 4,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*---------------------------------------------*/
    /*  JB's Brand Slider
/*----------------------------------------------*/
    $('.jb-brand_slider').slick({
        infinite: true,
        arrows: false,
        dots: false,
        speed: 2000,
        slidesToShow: 6,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 6,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
    });

    /*----------------------------------------*/
    /*  JB's Scroll To Top
/*----------------------------------------*/
    $.scrollUp({
        scrollText: 'Top',
        easingType: 'linear',
        scrollSpeed: 900,
    });

    /*----------------------------------------*/
    /*  Cart Plus Minus Button
/*----------------------------------------*/
    $('.cart-plus-minus').append(
        '<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>'
    );
    $('.qtybutton').on('click', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    /*----------------------------------------*/
    /* Toggle Function Active
/*----------------------------------------*/
    // showlogin toggle
    $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
    });
    // showlogin toggle
    $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
    });
    // showlogin toggle
    $('#cbox').on('click', function() {
        $('#cbox-info').slideToggle(900);
    });

    // showlogin toggle
    $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
    });

    /*----------------------------------------*/
    /* FAQ Accordion
/*----------------------------------------*/
    $('.card-header a').on('click', function() {
        $('.card').removeClass('actives');
        $(this).parents('.card').addClass('actives');
    });

    /*----------------------------------------*/
    /*  Sidebar Categories Menu Activation
/*----------------------------------------*/
    $('.sidebar-categories_menu li.has-sub > a').on('click', function() {
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        } else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });

    /*---------------------------------------------*/
    /*  JB's Blog Slider
/*----------------------------------------------*/
    $('.jb-blog_slider').slick({
        infinite: true,
        arrows: false,
        dots: true,
        speed: 2000,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*---------------------------------------------*/
    /*  JB's Product Tab Slider Two
/*----------------------------------------------*/
    $('.jb-special-product_slider-2').slick({
        infinite: true,
        arrows: false,
        dots: true,
        speed: 2000,
        slidesToShow: 1,
        slidesToScroll: 2,
        adaptiveHeight: true,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*---------------------------------------------*/
    /*  JB's Category Product Slider
/*----------------------------------------------*/
    $('.jb-category-product_slider').slick({
        infinite: true,
        arrows: false,
        dots: true,
        speed: 2000,
        slidesToShow: 4,
        slidesToScroll: 3,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*---------------------------------------------*/
    /*  JB's Single Blog Slider
/*----------------------------------------------*/
    $('.jb-single-blog_slider').slick({
        infinite: true,
        arrows: false,
        dots: true,
        speed: 2000,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /*---------------------------------------------*/
    /*  JB's Product Slider
/*----------------------------------------------*/
    $('.jb-product_slider').slick({
        infinite: false,
        arrows: false,
        dots: true,
        speed: 2000,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow: '<button class="slick-prev"><i class="fa fa-caret-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-caret-right"></i></button>',
        responsive: [{
                breakpoint: 1501,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
    /*---------------------------------------------*/
    /*  JB's CounterUp
/*----------------------------------------------*/
    $('.count').counterUp({
        delay: 10,
        time: 1000,
    });

    /*----------------------------------------*/
    /*  JB's Single Product Image Slider
 /*----------------------------------------*/
    $('.sp-largeimages').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        fade: true,
        asNavFor: '.sp-thumbs',
        prevArrow: '<button class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-chevron-right"></i></button>',
    });
    $('.sp-thumbs:not(.sp-thumbs-vertical)').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.sp-largeimages',
        arrows: false,
        dots: false,
        focusOnSelect: true,
        vertical: false,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 3,
                },
            },
        ],
    });
    $('.sp-thumbs-vertical').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        asNavFor: '.sp-largeimages',
        arrows: false,
        dots: false,
        focusOnSelect: true,
        centerMode: false,
        vertical: true,
        responsive: [{
            breakpoint: 576,
            settings: {
                vertical: false,
                slidesToShow: 2,
            },
        }, ],
    });

    /*----------------------------------------*/
    /* Product Details Zoom
/*----------------------------------------*/
    $('.sp-imagezoom').lightGallery({
        selector: '.sp-singleimage',
    });

    /*----------------------------------------*/
    /*  Star Rating Js
/*----------------------------------------*/
    $(function() {
        $('.star-rating').barrating({
            theme: 'fontawesome-stars',
        });
    });

    /*-------------------------------------------------*/
    /* Urani's Sticky Sidebar
/*-------------------------------------------------*/
    $('#sticky-sidebar').theiaStickySidebar({
        // Settings
        additionalMarginTop: 80,
    });
})(jQuery);