/**
 * Flexslider init
 */
jQuery(window).load(function ($) {

//Flexslider
    jQuery('.text-sl-flexslider').flexslider({
        animation: "slide",
        controlsContainer: ".text-flexslider-container",
        slideshow: false
    });
    jQuery('.main-sl-flexslider').flexslider({
        animation: "slide",
		animationLoop: true,
        directionNav: false,
        controlsContainer: ".main-flexslider-container",
        slideshow: true,
        start: function (slider) {
            jQuery('.flexslider-controls li:first').addClass('flex-active');
            jQuery('.flexslider-controls li').click(function () {
                var slideTo = jQuery(this).attr("data-id")
                var slideToInt = parseInt(slideTo)
                if (slider.currentSlide != slideToInt) {
                    slider.flexAnimate(slideToInt)
                }
            });
        },
        before: function (slider) {
            var nextSlide = slider.animatingTo;
            jQuery('.flexslider-controls li').removeClass('flex-active');
            jQuery('.flexslider-controls li[data-id=' + nextSlide + ']').addClass('flex-active');
        }
    });

});