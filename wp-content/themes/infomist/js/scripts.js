var $ = jQuery;

jQuery(document).ready(function () {
    jQuery('.content-wrapp p').each(function(){
        var lapky = $(this).html().replace("»", "\"");
        $(this).html(lapky);
        lapky = $(this).html().replace("«", "\"");
        $(this).html(lapky);
    });

    jQuery('li p a').each(function(){
        var lapky = $(this).html().replace("»", "\"");
        $(this).html(lapky);
        lapky = $(this).html().replace("«", "\"");
        $(this).html(lapky);
    });

    jQuery('.content-wrapp p span').each(function(){
        var lapky = $(this).html().replace("»", "\"");
        $(this).html(lapky);
        lapky = $(this).html().replace("«", "\"");
        $(this).html(lapky);
    });

    jQuery('.content-wrapp p strong').each(function(){
        var lapky = $(this).html().replace("»", "\"");
        $(this).html(lapky);
        lapky = $(this).html().replace("«", "\"");
        $(this).html(lapky);
    });

    jQuery('h1').each(function(){
        var lapky = $(this).html().replace("»", "\"");
        $(this).html(lapky);
        lapky = $(this).html().replace("«", "\"");
        $(this).html(lapky);
    });

    jQuery('h1').each(function(){
        var lapky = $(this).html().replace("»", "\"");
        $(this).html(lapky);
        lapky = $(this).html().replace("«", "\"");
        $(this).html(lapky);
    });

    jQuery('.date-start, .date-end').each(function(){
        var tire = $(this).html().replace("@", "-");
        $(this).html(tire);
    });

    //$.noConflict();
    jQuery('.fancybox').fancybox();
    jQuery(window).load(function () {
        jQuery('.flexslider').flexslider({
            animation: "slide",
            directionNav: true,
            animationLoop: true,
            controlNav: "thumbnails",
            start: function (slider) {
                jQuery('.flexslider').resize();
            }
        });
    });

    jQuery(".fa-align-justify").click(function () {
        jQuery(".hiden_sidebar").show('slow');
        jQuery('.fa-align-justify').hide();
        jQuery('.fa-times').show().css('display', 'inline');
    });
    jQuery(".fa-times").click(function () {
        jQuery(".hiden_sidebar").hide('slow');
        jQuery('.fa-align-justify').show().css('display', 'inline');
        jQuery('.fa-times').hide();
    });
    jQuery(document).mouseup(function (e) {
        var div = jQuery(".hiden_sidebar");
        if (jQuery(window).width() < '769') {
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                div.hide('slow');
                jQuery('.home .fa-align-justify').show();
                jQuery('.single-face .fa-align-justify').show().css('display', 'inline');
                jQuery('.fa-times').hide();
            }
        }
    });
    jQuery("#commentform").submit(function () {
        alert('Ваш коментар відправлено на модерацію.\n\rДякуємо, що ви з нами.');
    });
    jQuery(".event-info").hover(
        function () {
            $("#secondary").css('opacity', '0.2');
        },
        function () {
            jQuery("#secondary").css('opacity', '1');
        });
    jQuery('.widget_sp_image-image-link').addClass('fancybox');


    jQuery('a').each(function () {
        if (jQuery(this).has('img')) {
            jQuery(this).fancybox();
        }
    });

    jQuery('pre').each(function(){
        var link = $(this).html();
        $(this).find('a').remove();
        $(this).append('<span class="read-to">Читайте також: </span>', link);
    });

    $('.page-template-new-frontpage').addClass('home');

});
function getGridSize() {
    return (window.innerWidth < 600) ? 1 :
        (window.innerWidth < 900) ? 2 : 3;
}
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        directionNav: true,
        animationLoop: true,
        itemWidth: 250,
        itemMargin: 25,
        minItems: getGridSize(),
        maxItems: getGridSize(),
        start: function (slider) {
            $('.flexslider').resize();
        }
    });
    $('.refresh p a').append('<span class="obnova">оновлено</span>');

});
