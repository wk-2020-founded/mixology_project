$(function() {

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
