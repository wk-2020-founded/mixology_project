$(function() {

    // top-wrapper スライドショー
    var speed = 3000; // フェードイン・フェードアウトの処理時間（1000で1秒）
    var times = 6000; // 画像切り替えの間隔（1000で1秒）
    var className = '#top-wrapper';
    var bgArray = [
    // トップスライドヘッダーの画像はここ
    // 変更箇所はURL内の「top_wrapper_image_1.jpg」の部分で、挿入したい画像のタイトルを入力する
    "img/top_wrapper_image_3.jpg",
    "img/top_wrapper_image_5.jpg",
    "img/top_wrapper_image_4.jpg"
    ];

    $.each(bgArray.reverse(), function(i, value) {
        $(className).prepend('<div class="slides" style="background-image:url(' + value + ');"></div>');
    });
    var bgNo = 1;
    var bgLength = bgArray.length;
    setInterval(function(){
        $(className + ' .slides:nth-child(' + bgNo + ')').fadeOut(speed);
        $(className + ' .slides:nth-child(' + ( bgNo === bgLength ? 1 : bgNo + 1) + ')').fadeIn(speed);
        if ( bgNo >= bgLength ) {
          bgNo = 1;
        } else {
          bgNo += 1;
        }
      }, times);
    // top-wrapper スライドショー ここまで

    // メニューバー 
        $('nav ul li a, .to-delivery, .to-takeout, .to-collaboration, .step-text a, .menu-description a, .menu ul li .link-item').click(function() {
            var href = $(this).attr('href');
            var position = $(href).offset().top;
            $('html, body').animate({
                'scrollTop': position
            }, 1000);
        });
        $('.menu-trigger').click(function() {
            if($(this).hasClass('active')) {
                $(this).removeClass('active');
                $('#menu-show').fadeOut();
            }else {
                $(this).addClass('active');
                $('#menu-show').fadeIn();
            }
            $('.menu-bar').addClass('menu_animation_show');
            $('.menu ul li').addClass('fadein_from_bottom');
       });
    
        $('.menu ul li a').click(function() {
            $('.menu-trigger').removeClass('active');
            $('#menu-show').fadeOut();
        });

    // menu bar till here

    $(window).on('load scroll', function (){
        var introOffset = $('#intro-wrapper').offset().top;
        var collaborationOffset = $('#collaboration-wrapper').offset().top;
        var collaboContentOffset = $('.collaboration-content:last-child').offset().top;
        var stepOffset = $('#step-wrapper').offset().top;
        var menuOffset = $('#menu-wrapper').offset().top;
        var contactOffset = $('#contact-wrapper').offset().top;
        var scrollPos = $(window).scrollTop();
        var wh = $(window).height();

        // sm menu scroll show
        if (window.matchMedia( "(max-width: 480px)" ).matches) {
            if(scrollPos >= introOffset ){
                $('.sm-menu').fadeIn();
            } else {
                $('.sm-menu').fadeOut();
            }
        }
        // ここまで

        if(scrollPos > introOffset - wh * 0.7 ){
            $('#intro-wrapper .section-title h2').addClass('fadein_from_bottom');
            $('#intro-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('#intro-wrapper .animation-text').addClass('fadein_from_bottom');
            $('#intro-wrapper .animation-btn-text').addClass('fadein_from_bottom');
            // min-width:481px js
            if (window.matchMedia( "(min-width: 481px)" ).matches) {
            if(scrollPos > introOffset - wh * 0.7 ){
                $('.to-menu a').addClass('btn_slide');
            }}
            // ここまで
            // max-width:480px js
            if (window.matchMedia( "(max-width: 480px)" ).matches) {
                if(scrollPos > introOffset - wh * 0.7 ){
                    $('.to-menu a').addClass('btn_slide_sm');
            }}
            // ここまで
        }

        if(scrollPos > collaborationOffset - wh * 0.7 ){
            $('#collaboration-wrapper .section-title h2, #collaboration-wrapper .section-title p').addClass('fadein_from_bottom');
            $('#collaboration-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('#collaboration-wrapper .img-wrap').css('display','block');
            $('.collaboration-content:first-child .animation-text').addClass('fadein_from_bottom');
            $('.collaboration-content:first-child .collaboration-line').addClass('line_slide');
            $('#collaboration-wrapper .animation-btn-text').addClass('fadein_from_bottom');
            // min-width:481px js
            if (window.matchMedia( "(min-width: 481px)" ).matches) {
                if(scrollPos > collaborationOffset - wh * 0.7 ){
                    $('.to-collaboration').addClass('btn_slide_2');
                }}
            // ここまで
            // max-width:480px js
                if (window.matchMedia( "(max-width: 480px)" ).matches) {
                    if(scrollPos > collaborationOffset - wh * 0.7 ){
                        $('.to-collaboration').addClass('btn_slide_2_sm');
                }}
            // ここまで
        }

        if(scrollPos > collaboContentOffset - wh){
            $('.collaboration-content:last-child .img-wrap').css('display','block');
            $('.collaboration-content:last-child .animation-text').addClass('fadein_from_bottom');
            $('.collaboration-content:last-child .collaboration-line').addClass('line_slide');
        }
        if(scrollPos > stepOffset - wh * 0.7 ){
            $('#step-wrapper .section-title h2, #step-wrapper .section-title p').addClass('fadein_from_bottom');
            $('#step-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('#step-wrapper .animation-text').addClass('fadein_from_bottom');
        }
        if(scrollPos > menuOffset - wh * 0.7 ){
            $('#menu-wrapper .section-title h2, #menu-wrapper .section-title p').addClass('fadein_from_bottom');
            $('#menu-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('#menu-wrapper .animation-text').addClass('fadein_from_bottom');
        }
        if(scrollPos > contactOffset - wh * 0.7 ){
            $('#contact-wrapper .section-title h2, #contact-wrapper .section-title p').addClass('fadein_from_bottom');
            $('#contact-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('#contact-wrapper .animation-text').addClass('fadein_from_bottom');
        }
    });


    // menu-tab
        $('.delivery-menu-tab').click(function(){
            $('.delivery-active').removeClass('delivery-active');
            $(this).addClass('delivery-active');
            $('.delivery-show').removeClass('delivery-show');
            // クリックしたタブからインデックス番号を取得
            const index = $(this).index();
            // クリックしたタブと同じインデックス番号をもつコンテンツを表示
            $('.delivery-menu-list').eq(index).addClass('delivery-show');
        });

        $('.takeout-menu-tab').click(function(){
            $('.takeout-active').removeClass('takeout-active');
            $(this).addClass('takeout-active');
            $('.takeout-show').removeClass('takeout-show');
            // クリックしたタブからインデックス番号を取得
            const index = $(this).index();
            // クリックしたタブと同じインデックス番号をもつコンテンツを表示
            $('.takeout-menu-list').eq(index).addClass('takeout-show');
        });             
    // menu-tab till here

    // // slick slider
    //     if (window.matchMedia( "(min-width: 481px)" ).matches) {
    //         $('.slider').slick({
    //             arrows: false,
    //             autoplay:true,
    //             autoplaySpeed:0,
    //             cssEase: 'linear',
    //             speed: 7000,
    //             dots:false,
    //             slidesToShow: 6,
    //             slidesToScroll: 1,
    //         });
    //     }
    //     if (window.matchMedia( "(max-width: 480px)" ).matches) {
    //         $('.slider').slick({
    //             arrows: false,
    //             autoplay:true,
    //             autoplaySpeed:0,
    //             cssEase: 'linear',
    //             speed: 5000,
    //             dots:false,
    //             slidesToShow: 2,
    //             slidesToScroll: 1,
    //         });
    //     }
        

    //     $('.food-slider').slick({
    //         arrows: true,
    //         autoplay: false,
    //         dots:true,
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //     });

    //     $('.takeout-menu-tab').click(function () { //タブなど切り替えの要素を指定
    //         $('.food-slider').slick('setPosition'); //今回のキモ「setPosition」
    //     });
    // // slick slider till here

    $('.food-slide').each(function() {
        var slideNum = $('.food-slides img', $(this)).length;
        var slideCurrent = 0;
        var slideWidth = $('.food-slides').width();
        var slideImage = $(this).find('.food-slides');
        var sliding = function() {
            if( slideCurrent < 0 ){
                slideCurrent = slideNum - 1;     
            } else if( slideCurrent > slideNum -1 ) {
                slideCurrent = 0;
            }
            slideImage.animate({
                left: slideCurrent * -slideWidth
            });    
        }
        $(this).find('.prev-btn').click(function(){
            slideCurrent--;
            sliding();
          });
        $(this).find('.next-btn').click(function() {
            slideCurrent++;
            sliding();
        });
    });

});