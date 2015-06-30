<?php
/**
 * Template Name: Navigation-sub
 */
get_header(); ?>

    <div id="primary" class="content-area interview">
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
                    $output .= '<li><div class="thumb"><a href="'.get_permalink().'">'.get_the_post_thumbnail().'</a></div></li>';
                endwhile;
                $output .= '</ul>';
            endif;
            echo $output;
            wp_reset_postdata();
            ?>
            <?php
            $title = get_the_title();
            $temp = get_cat_ID($title);
            if ($title == 'Інтерв’ю') {$temp = 10;}
            $wp_query = null;
            $wp_query = new WP_Query();
            $wp_query->query('cat='.$temp.'&showposts=3'.'&paged='.$paged);
            ?>
            <ul class="navigation-list">
                <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                    <li class="list">
                        <a href="<?php the_permalink()?>">
                            <div class="thumb"><?php the_post_thumbnail() ?></div>
                            <?php
                            $data = get_post_custom_values('data');
                            ?>
                            <h1><?php the_title() ?></h1>
                            <h2><?php echo $data[0] ?></h2>
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>