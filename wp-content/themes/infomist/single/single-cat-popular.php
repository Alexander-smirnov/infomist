<?php
/**
 * The template for displaying all single posts.
 *
 * @package Infomist
 */

get_header(); ?>
<?php
if (in_category(4020) ) {
    include (TEMPLATEPATH . '/single/single-cat-apublish.php');
} else {
    ?>
<div id="primary" class="content-area single-news">
    <main id="main" class="site-main " role="main">
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        <div class="posts-info">
            <div class="time-post">
                <?php
                the_time('d/m/Y  |  G:i');
                ?>
            </div>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="author">
                <?php $author = get_the_author();?>
                <span class="label">Автор: </span>
                <span class="author-name"><?php echo $author; ?></span>
            </div>
        </div>
        <h1><?php the_title() ?></h1>
        <!--            --><?php //the_post_thumbnail() ?>
        <div class="content-wrapp">
            <?php the_content(); ?>
        </div>
        <!--			--><?php //the_post_navigation(); ?>

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
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
</div>
<?php }
get_footer(); ?>
