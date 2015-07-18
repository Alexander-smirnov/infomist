<?php
/**
 * Template Name: Interview
 */
get_header(); ?>

<div id="primary" class="content-area interview">
    <main id="main" class="site-main" role="main">
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        <?php
        $title = get_the_title();
        $temp = get_cat_ID($title);
        if ($title == 'Інтерв’ю') {$temp = 10;}
        $wp_query = null;
        $wp_query = new WP_Query();
        $wp_query->query('cat='.$temp.'&showposts=9'.'&paged='.$paged);
        ?>
        <ul class="interview-list">
            <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                <li class="list">
                    <a href="<?php the_permalink()?>">
                        <div class="thumb"><?php the_post_thumbnail() ?></div>
                        <?php
                        $whois = get_post_custom_values('whois');
                        $name = get_post_custom_values('name');
                        ?>
                        <h1><?php the_title() ?></h1>
                    </a >

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

<div id="secondary" class="widget-area sidebar" role="complementary">
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
</div>
<?php get_footer(); ?>
