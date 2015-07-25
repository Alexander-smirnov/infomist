$(document).ready(function() {
    $('.fancybox').fancybox();
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            directionNav: true,
            animationLoop: true,
            controlNav: "thumbnails",
            start: function(slider){
                $('.flexslider').resize();
            }
        });
    });

    $(".fa-align-justify").click(function(){
        $(".hiden_sidebar").show('slow');
        $('.fa-align-justify').hide();
        $('.fa-times').show().css('display', 'inline');
    });
    $(".fa-times").click(function(){
        $(".hiden_sidebar").hide('slow');
        $('.fa-align-justify').show().css('display', 'inline');
        $('.fa-times').hide();
    });
    $(document).mouseup(function (e){ // событие клика по веб-документу
        var div = $(".hiden_sidebar"); // тут указываем ID элемента
        if ($(window).width() < '769') {
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                div.hide('slow'); // скрываем его
                $('.home .fa-align-justify').show();
                $('.single-face .fa-align-justify').show().css('display', 'inline');
                $('.fa-times').hide();
            }
        }
    });

});
