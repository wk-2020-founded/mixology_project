$(function() {
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
});