<?php
/**
 * The template for displaying all single posts.
 *
 * @package Infomist
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <?php
            $args = array(
                'post_parent' => 103,
                'post_type' => 'page',
                'paged' => $paged,
            );
            $subpages = new WP_query($args);
            if ($subpages->have_posts()) :
                $output = '<ul class="menu-event-wrapp">';

                while ($subpages->have_posts()) : $subpages->the_post();
                    $output .= '<li><div class="thumb"><a href="'.get_permalink().'">'.get_the_post_thumbnail().'</a></div>';
                endwhile;
                $output .= '</ul>';
            endif;
            echo $output;
            wp_reset_postdata();
            ?>
		<?php while ( have_posts() ) : the_post(); ?>


            <div class="posts-info">
                <?php the_post_thumbnail() ?>
                <div class="author">
                    <h2><?php the_title(); ?></h2>
                    <div class="com">
                        <span class="fa fa-eye"></span> <span class="top-post-pageview"> <?php the_pageview(); ?> </span>
                        <span class="fa fa-comment-o"></span> <span class="number-of-comments"><?php comments_number('0', '1', '%'); ?></span>
                    </div>
                    <div class="data"><?php the_time('d F Y  |  G:i');?></div>
                </div>
            </div>
            <p><?php the_content(); ?></p>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->




<?php get_sidebar(); ?>
<?php get_footer(); ?>
