<?php
/**
 * Template Name: All-news
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <?php
            $wp_query = null;
            $wp_query = new WP_Query();
            $wp_query->query('cat=6'.'&showposts=10'.'&paged='.$paged);
            ?>
            <ul class="all-news">
                <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                    <li class="single-news">
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
                    </li>
                <?php endwhile; // End of the loop. ?>
            </ul>
            <?php
            $argsss = array(
                'show_all'     => False, // показаны все страницы участвующие в пагинации
                'end_size'     => 1,     // количество страниц на концах
                'mid_size'     => 1,     // количество страниц вокруг текущей
                'prev_next'    => True,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                'prev_text'    => __('<'),
                'next_text'    => __('>'),
                'add_args'     => False,
                'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                'screen_reader_text' => __( '' ),
            );

            the_posts_pagination($argsss); ?>
            <?php wp_reset_query(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->

    <div id="secondary2" class="widget-area sidebar" role="complementary">
        <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
<?php get_footer(); ?>