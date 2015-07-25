<?php
/**
 * The template for displaying all single posts.
 *
 * @package Infomist
 */

get_header(); ?>
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
<div class="left-wrapp">

    <div id="secondary2" class="widget-area sidebar hiden_sidebar" role="complementary">
        <?php dynamic_sidebar( 'sidebar-5' ); ?>
    </div>
    <div id="primary" class="content-area two-side">
        <main id="main" class="site-main single-news single-face" role="main">
            <span class="fa fa-align-justify"></span>
            <span class="fa fa-times"></span>
            <div class="posts-info">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="author">
                    <?php echo get_wp_user_avatar($authordata->ID, 181, 'left'); ?>
                    <div class="data"><?php the_time('d.m.Y');?></div>
                    <?php $user_description = get_the_author_meta('description',$authordata->ID); ?>
                    <?php $author = get_the_author();?>
                    <h2><span class="author-name"><?php echo $author; ?></span></h2>
                    <h4><?php echo $user_description; ?></h4>
                </div>
            </div>
        <?php the_post_thumbnail() ?>
            <div class="content-wrapp">
                <?php the_content(); ?>
            </div>
        <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <div class="after-post">
        <h2>Всі статті автора: <?php echo $author ?></h2>
<!--        --><?php //var_dump($author); ?>
        <?php echo do_shortcode('[latestbyauthor author="'.$author. '"show="5"]'); ?>
        <div class="comments">
            <span class="fa fa-comments-o"></span> <span class="number-of-comments">Коментарі: <?php comments_number('0', '1', '%'); ?></span>
        </div>
        <?php comments_template(); ?>
    </div>
</div>

<div id="secondary" class="widget-area sidebar" role="complementary">
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
</div>
<?php get_footer(); ?>
