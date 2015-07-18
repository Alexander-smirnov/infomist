<?php
/**
 * Template Name: First-face
 */
get_header(); ?>

<div id="primary" class="content-area">
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
                <li class="single-news">
                    <a href="<?php the_permalink()?>">
                    <div class="thumb"> <?php echo get_wp_user_avatar($authordata->ID, 181, 'left'); ?></div>

                    <div class="posts-info">
                        <?php $author = get_the_author();?>
                        <?php $user_description = get_the_author_meta('description',$authordata->ID); ?>
                        <h2><span class="author-name"><?php echo $author; ?></span></h2>
                        <h4><?php echo $user_description; ?></h4>
                        <h3><?php the_title(); ?></h3>
                    </div>
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


