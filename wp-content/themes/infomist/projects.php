<?php
/**
 * Template Name: Projects
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
                <h1><?php the_title(); ?></h1>
                <?php
                $title = get_the_title();
                $projects = get_terms('spec_projects');
                foreach ($projects as $project) {
                    $projects_name = $project->name;
                    $projects_id = $project->term_id; ?>

                    <?php
                    $tax_query = array(
                        array(
                            'taxonomy' => 'spec_projects',
                            'terms' => $projects_id,
                        )
                    );
                    $args = array(
                        'tax_query' => $tax_query,
                    );
                    $query = new WP_Query($args);
                    ?>
                    <h2 class="project_title"><?php echo $projects_name ?></h2>
                    <div class="flexslider">
                    <ul class="projects-list slides" style="overflow: hidden;">
                        <?php
                        while ($query->have_posts())  : $query->the_post(); ?>
                            <li class="list">
                                <div class="thumb">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail() ?>
                                    </a>
                                </div>
                                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?> </a></h3>
                            </li>
                            <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                    </div>
                <?php } ?>




        </main>
        <!-- #main -->
    </div><!-- #primary -->
    <div id="secondary" class="widget-area sidebar" role="complementary">
        <?php dynamic_sidebar('sidebar-3'); ?>
    </div>
<?php get_footer(); ?>