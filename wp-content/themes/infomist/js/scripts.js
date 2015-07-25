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
    $(document).mouseup(function (e){ // ������� ����� �� ���-���������
        var div = $(".hiden_sidebar"); // ��� ��������� ID ��������
        if ($(window).width() < '769') {
            if (!div.is(e.target) // ���� ���� ��� �� �� ������ �����
                && div.has(e.target).length === 0) { // � �� �� ��� �������� ���������
                div.hide('slow'); // �������� ���
                $('.home .fa-align-justify').show();
                $('.single-face .fa-align-justify').show().css('display', 'inline');
                $('.fa-times').hide();
            }
        }
    });

});
