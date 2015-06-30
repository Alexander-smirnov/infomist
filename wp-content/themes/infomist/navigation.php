<?php
/**
 * Template Name: Navigation
 */
get_header(); ?>

    <div id="primary" class="content-area navigation">
        <main id="main" class="site-main" role="main">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php
                global $post;
    $args = array(
        'post_parent' => 103,
        'post_type' => 'page',
        'paged' => $paged,
    );
    $subpages = new WP_query($args);
    if ($subpages->have_posts()) :
        $output = '<ul>';

        while ($subpages->have_posts()) : $subpages->the_post();
            $output .= '<li><div class="thumb">'.get_the_post_thumbnail().'</div><h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>
                        <p><a href="'.get_permalink().'">'.get_the_content().'</a></p><br />';
        endwhile;
        $output .= '</ul>';
    endif;
                echo $output;
    wp_reset_postdata();
                ?>
            <?php  endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>