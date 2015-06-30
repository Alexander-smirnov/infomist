<?php
/**
 * Template Name: news
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <?php wp_nav_menu( array( 'theme_location' => 'news_menu', 'menu_id' => 'Меню новин' ) ); ?>
            <?php while ( have_posts() ) : the_post(); ?>



            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>