$(function() {

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

    // food-slider
    $('.food-slide').each(function() {
        var slideNum = $('.food-slides img', $(this)).length;
        var slideCurrent = 0;
        var slideImage = $(this).find('.food-slides');
        var sliding = function() {
            if( slideCurrent < 0 ){
                slideCurrent = slideNum - 1;     
            } else if( slideCurrent > slideNum -1 ) {
                slideCurrent = 0;
            }
            var slideWidth = $('.food-slides').width();
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
    // food-slider till here

});