<?php
get_header(); ?>

    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="author">
            <?php echo get_avatar($authordata->ID, 120, 120); ?>
            <?php $author = get_the_author();?>
            <div class="author-wrapp">
                <span class="about-author">Автор публікацій:</span>
                <h2><span class="author-name"><?php echo $author; ?></span></h2>
                <?php $user_email = get_the_author_meta( 'user_email' ); ?>
                <span class="email"><a href="mailto:<?php echo $user_email ?>"><?php echo $user_email ?></a></span>
            </div>
        </div>

        <?php
        $title = get_the_title();
        $temp = get_cat_ID($title);
        $wp_query = null;
		 $args = array(
       'posts_per_page' => 10,
        'paged' => $paged,
		'cat' => $temp,
		'date_query' => array(
        array(
            'column' => 'post_date_gmt',
            'after'  => '7 days ago',
        )
),
   );
        $wp_query = new WP_Query($args);
 //       $wp_query->query('cat='.$temp.'&showposts=10'.'&paged='.$paged);

        ?>
        <ul class="all-news">

            <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                <li class="single-news">

                    <a href="<?php the_permalink()?>">
                        <?php the_post_thumbnail() ?>
                    </a >
                    <div class="posts-info">
                        <?php the_time('d/m/Y  |  G:i');?>
                        <?php $count = get_post_meta($post->ID, '_pageviews', true); ?>
                        <span class="fa fa-eye"></span> <span class="top-post-pageview">
                            <?php the_pageview(); ?>
                        </span>
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
            'show_all'     => False, // �������� ��� �������� ����������� � ���������
            'end_size'     => 1,     // ���������� ������� �� ������
            'mid_size'     => 1,     // ���������� ������� ������ �������
            'prev_next'    => True,  // �������� �� ������� ������ "����������/��������� ��������".
            'prev_text'    => __('<'),
            'next_text'    => __('>'),
            'add_args'     => False,
            'add_fragment' => '',     // ����� ������� ���������� �� ���� �������.
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