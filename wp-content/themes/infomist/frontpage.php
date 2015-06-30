<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>
<div class="left-wrapp">
    <div id="secondary2" class="widget-area sidebar" role="complementary">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="slider">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/slide-center.jpg" alt="temp slider"/>
                <ul class="slide-list">
                    <li>
                        <a href="#">Lorem ipsum dolor sit amet consectetuer</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor sit amet consectetuer</a>
                    </li>
                    <li>
                        <a href="#">Lorem ipsum dolor sit amet consectetuer</a>
                    </li>
                </ul>
                <?php wp_reset_query(); ?>
            </div>
            <div class="perl-wrapp">
                <h2>Перли тижня</h2>
                    <?php
                    $wp_query = null;
                    $wp_query = new WP_Query();
                    $wp_query->query('cat=14'.'&showposts=1');
                    ?>
                    <ul class="perl">
                        <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                            <li class="single-perl">
                                <div class="thumb"><?php the_post_thumbnail(); ?></div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                            </li>
                        <?php endwhile; // End of the loop. ?>
                    </ul>
            </div>
            <div class="top-news-wrapp">
                <?php $link=get_permalink(32); ?>
                <h2><a href="<?php echo $link ?>">Топ-новини</a></h2>
                <?php
                $wp_query = null;
                $wp_query = new WP_Query();
                $wp_query->query('cat=5'.'&showposts=5');
                ?>
                <ul class="top-news">
                    <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                        <li class="single-top-news">
                            <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail(); ?></a></div>
                            <div class="time-post">
                                <?php the_time('d.m.Y  |  G:i'); ?>
                            </div>
                            <h3><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
                        </li>
                    <?php endwhile; // End of the loop. ?>
                </ul>
            </div>
            <div class="top-news-wrapp">
                <h2>Навігатор подій</h2>
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
                                $output .= '<li>
                                <div class="thumb">
                                    <a href="'.get_permalink().'">'.get_the_post_thumbnail().'</a>
                                    <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                                </div>

                                </li>';
                            endwhile;
                            $output .= '</ul>';
                        endif;
                        echo $output;
                        wp_reset_postdata();
                        ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->


</div>
<div id="secondary" class="widget-area sidebar" role="complementary">
    <h2 class="slide">ТЕМА ТИЖНЯ</h2>
    <img src="<?php echo get_stylesheet_directory_uri()?>/images/slide-top.jpg" alt="temp slider"/>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<?php get_footer(); ?>