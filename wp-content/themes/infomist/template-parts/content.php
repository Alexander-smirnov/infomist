<?php
/**
 * Template part for displaying posts.
 *
 * @package Infomist
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <div class="single-news">
            <a href="<?php the_permalink()?>">
                <?php the_post_thumbnail() ?>
            </a >
            <div class="posts-info">
                <?php the_time('d/m/Y  |  G:i');?>
                <span class="fa fa-eye"></span> <span class="top-post-pageview"> <?php the_pageview(); ?> </span>
                <span class="fa fa-comment-o"></span> <span class="number-of-comments"><?php comments_number('0', '1', '%'); ?></span>
            </div>

            <h2>
                <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
            </h2>
            <p><a href="<?php the_permalink()?>"><?php the_excerpt(); ?></a></p>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-## -->