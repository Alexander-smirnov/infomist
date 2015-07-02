<?php
/**
 * The template for displaying all single posts.
 *
 * @package Infomist
 */

get_header(); ?>

<div id="primary" class="content-area interview">
    <main id="main" class="site-main " role="main">
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        <div class="posts-info">
            <?php while ( have_posts() ) : the_post(); ?>

        <?php the_post_thumbnail() ?>
        <div class="custom-interview">
            <div class="time-post">
                <?php the_time('d.m.Y  |  G:i'); ?>
            </div>
            <?php
                $whois = get_post_custom_values('whois');
                $name = get_post_custom_values('name');
            ?>
            <h2><?php the_title(); ?></h2>
            <h4><?php the_excerpt() ?></h4>

        </div>
        </div>
        <div class="content-wrapp">
            <?php the_content(); ?>
        </div>
    <?php
    wp_related_posts();
    ?>
        <div class="comments">
            <span class="fa fa-comments-o"></span> <span class="number-of-comments">Коментарі: <?php comments_number('0', '1', '%'); ?></span>
        </div>

    <?php
    comments_template();

    ?>

    <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->
<div id="secondary" class="widget-area sidebar" role="complementary">
    <?php dynamic_sidebar( 'sidebar-6' ); ?>
</div>
<?php get_footer(); ?>
