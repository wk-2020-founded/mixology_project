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
        var collaboContent2Offset = $('.collaboration-content:nth-child(2n)').offset().top;
        var collaboContent3Offset = $('.collaboration-content:last-child').offset().top;
        var stepOffset = $('#step-wrapper').offset().top;
        var fixedOffset = $('#fixed-bg').offset().top;
        var contactOffset = $('#contact-wrapper').offset().top;
        var scrollPos = $(window).scrollTop();
        var wh = $(window).height();

        // sm menu scroll show
        if (window.matchMedia( "(max-width: 768px)" ).matches) {
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
            // if (window.matchMedia( "(min-width: 481px)" ).matches) {
            // if(scrollPos > introOffset - wh * 0.7 ){
            //     $('.to-menu a').addClass('btn_slide');
            // }}
            // ここまで
            // max-width:480px js
            // if (window.matchMedia( "(max-width: 480px)" ).matches) {
            //     if(scrollPos > introOffset - wh * 0.7 ){
            //         $('.to-menu a').addClass('btn_slide_sm');
            // }}
            // ここまで
        }

        if(scrollPos > collaborationOffset - wh * 0.7 ){
            $('#collaboration-wrapper .section-title h2, #collaboration-wrapper .section-title p').addClass('fadein_from_bottom');
            $('#collaboration-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('.collaboration-content:first-child .img-wrap').css('display','block');
            $('.collaboration-content:first-child .animation-text').addClass('fadein_from_bottom');
            $('.collaboration-content:first-child .collaboration-line').addClass('line_slide');
            $('.collaboration-content:first-child .animation-btn-text').addClass('fadein_from_bottom');
            // if (window.matchMedia( "(min-width: 481px)" ).matches) {
            //     $('.collaboration-content:first-child .to-collaboration').addClass('btn_slide_2');
            // }
            // if (window.matchMedia( "(max-width: 480px)" ).matches) {
            //     $('.collaboration-content:first-child .to-collaboration').addClass('btn_slide_2_sm');
            // }
        }
        if(scrollPos > collaboContent2Offset - wh * 0.7){
            $('.collaboration-content:nth-child(2n) .img-wrap').css('display','block');
            $('.collaboration-content:nth-child(2n) .animation-text').addClass('fadein_from_bottom');
            $('.collaboration-content:nth-child(2n) .collaboration-line').addClass('line_slide');
            $('.collaboration-content:nth-child(2n) .animation-btn-text').addClass('fadein_from_bottom');
            // if (window.matchMedia( "(min-width: 481px)" ).matches) {
            //     $('.collaboration-content:nth-child(2n) .to-collaboration').addClass('btn_slide_2');
            // }
            // if (window.matchMedia( "(max-width: 480px)" ).matches) {
            //     $('.collaboration-content:nth-child(2n) .to-collaboration').addClass('btn_slide_2_sm');
            // }
        }
        if(scrollPos > collaboContent3Offset - wh * 0.7){
            $('.collaboration-content:last-child .img-wrap').css('display','block');
            $('.collaboration-content:last-child .animation-text').addClass('fadein_from_bottom');
            $('.collaboration-content:last-child .collaboration-line').addClass('line_slide');
            $('.collaboration-content:last-child .animation-btn-text').addClass('fadein_from_bottom');
            // if (window.matchMedia( "(min-width: 481px)" ).matches) {
            //     $('.collaboration-content:last-child .to-collaboration').addClass('btn_slide_2');
            // }
            // if (window.matchMedia( "(max-width: 480px)" ).matches) {
            //     $('.collaboration-content:last-child .to-collaboration').addClass('btn_slide_2_sm');
            // }
        }
        if(scrollPos > stepOffset - wh * 0.7 ){
            $('#step-wrapper .section-title h2, #step-wrapper .section-title p').addClass('fadein_from_bottom');
            $('#step-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('#step-wrapper .animation-text').addClass('fadein_from_bottom');
        }
        if(scrollPos > fixedOffset - wh * 0.7 ){
            $('#fixed-bg .section-title h2, #fixed-bg .section-title p').addClass('fadein_from_bottom');
            $('#fixed-bg .section-title .title-accent-line').addClass('title_line_slide');
            $('#fixed-bg .animation-text').addClass('fadein_from_bottom');
        }
        if(scrollPos > contactOffset - wh * 0.7 ){
            $('#contact-wrapper .section-title h2, #contact-wrapper .section-title p').addClass('fadein_from_bottom');
            $('#contact-wrapper .section-title .title-accent-line').addClass('title_line_slide');
            $('#contact-wrapper .animation-text').addClass('fadein_from_bottom');
        }
    });

    $("img.lazyload").lazyload();

});