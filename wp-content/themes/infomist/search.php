<?php
/**
 * The template for displaying search results pages.
 *
 * @package Infomist
 */
get_header(); ?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php printf( esc_html__( 'Результати пошуку по запиту: %s', 'infomist' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->
<!--                --><?php //$s = $_GET['s'];?>
                <?php query_posts('showposts=10'.'&paged='.$paged.'&'.$query_string); ?>
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'search' );
                    ?>

                <?php endwhile; ?>
                <?php
                $argsss = array(
                    'show_all'     => False, // показаны все страницы участвующие в пагинации
                    'end_size'     => 1,     // количество страниц на концах
                    'mid_size'     => 1,     // количество страниц вокруг текущей
                    'prev_next'    => True,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text'    => __('« Попередня'),
                    'next_text'    => __('Наступна »'),
                    'add_args'     => False,
                    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                    'screen_reader_text' => __( '' ),
                );

                the_posts_pagination($argsss); ?>
            <?php else : ?>

                <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

        </main><!-- #main -->

    </section><!-- #primary -->

    <div id="secondary" class="widget-area sidebar" role="complementary">
        <?php dynamic_sidebar( 'sidebar-4' ); ?>
    </div>
<?php get_footer(); ?>