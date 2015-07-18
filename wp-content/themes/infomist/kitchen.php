<?php
/**
 * Template Name: kitchen
 */
get_header(); ?>

    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        <ul class="about">
            <li>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gavrilyan.jpg" alt="Марія Гаврилян"/>
                <h2>Марія Гаврилян</h2>
                <h3>головний редактор</h3>
                <h4><a href="mailto:maria.gavrilyan@gmail.com">maria.gavrilyan@gmail.com</a></h4>
            </li>
            <li>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/shapoval.jpg" alt="Олена Шаповал"/>
                <h2>Олена Шаповал</h2>
                <h3>кореспондент</h3>
                <h4><a href="mailto:lena_shapoval111@ukr.net">lena_shapoval111@ukr.net</a></h4>
            </li>
            <li>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/makarenko.jpg" alt="Сергій Макаренко"/>
                <h2>Сергій Макаренко</h2>
                <h3>кореспондент</h3>
                <h4><a href="mailto:smak1991@ukr.net">smak1991@ukr.net</a></h4>
            </li>
        </ul>

    </main><!-- #main -->
</div><!-- #primary -->

    <div id="secondary" class="widget-area sidebar" role="complementary">
        <?php dynamic_sidebar( 'sidebar-4' ); ?>
    </div>
<?php get_footer(); ?>