<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Infomist
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/fav.ico">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div class="wrapper">
        <?php dynamic_sidebar( 'top-header' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logotype.png" alt="Logo"/></a></h1>
		</div><!-- .site-branding -->
        <ul class="social">
            <li class="facebook">
                <a href="https://www.facebook.com/infomist.ck.ua">
                    <span class="fa fa-facebook"></span>
                </a>
            </li>
            <li class="vk">
                <a href="https://vk.com/public97238909">
                    <span class="fa fa-bold"></span>
                </a>
            </li>
            <li class="youtube">
                <a href="https://www.youtube.com/channel/UCie5GwjAmKUzPeeAJeU4ZNw">
                    <span class="fa fa-youtube"></span>
                </a>
            </li>
            <li class="rss">
                <a href="<?php get_home_url() ?>/?feed=news.yandex.ru">
                    <span class="fa fa-rss"></span>
                </a>
            </li>
        </ul>
        <script type="text/javascript">
            var date = new Date();
            var h = date.getHours();
            var templateUrl = '<?= get_bloginfo("template_url"); ?>';
            if (h >= 17 && h <= 19) {
                $('#masthead').css("background", "url('"+templateUrl+"/"+"images/17-20.jpg') no-repeat").css("background-size", "cover");
            } else {
            if ((h >= 20 && h <= 23) || (h >= 0 && h <= 3)) {
                $('#masthead').css("background", "url('"+templateUrl+"/"+"images/20-4.jpg') no-repeat").css("background-size", "cover");
            }else {
            if (h >= 4 && h <= 7) {
                $('#masthead').css("background", "url('"+templateUrl+"/"+"images/4-7.jpg') no-repeat").css("background-size", "cover");
            } else {
            if (h >= 8 && h <= 16) {
                $('#masthead').css("background", "url('"+templateUrl+"/"+"images/7-17.jpg') no-repeat").css("background-size", "cover");
            }}}}
        </script>
        <?php dynamic_sidebar( 'bottom-header' ); ?>
	</header><!-- #masthead -->
	<div id="content" class="site-content">