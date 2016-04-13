<?php
/**
 * Template Name: Test grid
 */
get_header(); ?>
	<div class="left-wrapp">
		<div id="secondary2" class="widget-area sidebar hiden_sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-t1' ); ?>
		</div>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<span class="fa fa-align-justify"></span>
				<span class="fa fa-times"></span>

				<div id="own_ads" class="before_slider_sidebar" role="complementary">
					<?php dynamic_sidebar( 'sidebar-7' ); ?>
				</div>
				<?php
				$home_sl_query = new WP_Query();
				$home_sl_query->query( 'cat=16' . '&showposts=3' );
				?>
				<?php if ( $home_sl_query->have_posts() ) : ?>
					<?php $id_count = 0; ?>
					<div class="main-flexslider-container">
						<div class="main-sl-flexslider">
							<ul class="slides">
								<?php while ( $home_sl_query->have_posts() ) : $home_sl_query->the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<div class="flexslider-controls">
							<ol class="flex-control-nav">
								<?php while ( $home_sl_query->have_posts() ) : $home_sl_query->the_post(); ?>
									<li data-id="<?php echo $id_count; ?>">
										<h2 class="slider-title"><a
												href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</li>
									<?php $id_count ++; ?>
								<?php endwhile; ?>
							</ol>
						</div>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<div id="own_ads" class="under_slider_sidebar" role="complementary">
					<?php dynamic_sidebar( 'sidebar-8' ); ?>
				</div>
			</main>
			<!-- #main -->
		</div>
		<!-- #primary -->
		<div class="grid">
			<?php
			$projects = get_terms( 'spec_projects' );
			foreach ( $projects as $project ) {
				$project_name[] = $project->slug;
			}
			$tax_query = array(
				array(
					'taxonomy' => 'spec_projects',
					'terms'    => $project_name,
					'field'    => 'slug',
				),
				array(
					'taxonomy' => 'cat',
					'terms'    => array( 10 ),
					'field'    => 'term_id',
				),
				'relation' => 'OR'
			);
			$args      = array(
				'tax_query'      => $tax_query,
				'category__in'   => array( 10 ),
				'posts_per_page' => 8,
			);
			$wp_query  = new WP_Query( $args );
			$counter   = 1;
			?>
			<div class="row">
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<div class="col-md-6 col-xs-12 grid-col">
						<?php
						$post_id = get_the_ID(); ?>
						<div class="over">
							<?php echo get_the_post_thumbnail( $post_id, 'home_thumb' ); ?>
						</div>
						<h2 class="title"><?php the_title(); ?></h2>
						<?php
						$cats   = get_the_category( $post_id );
						$tax_is = get_the_terms( $post_id, 'spec_projects' );

						if ( $tax_is ) { ?>
							<div class="cat"><?php echo $tax_is[0]->name; ?></div>

						<?php } else {
							foreach ( $cats as $cat ) {
								if ( $cat->slug != 'zzz_news' ) {
									$cat_name = $cat->name;
								}
							} ?>
							<div class="cat"><?php echo $cat_name; ?></div>

						<?php }
						?>
					</div>
					<?php if ( $counter == 2 ) {
						echo '</div><div class="row">';
						$counter = 1;
					} else {
						$counter ++;
					}
					?>

				<?php endwhile;
				?>
			</div>
		</div>
	</div><!-- .left-wrapp -->
<iframe width="480" height="270" src="http://www.ustream.tv/embed/22273700?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>
	<div id="secondary" class="widget-area sidebar" role="complementary">
		<?php dynamic_sidebar( 'sidebar-t2' ); ?>
	</div>

<?php get_footer(); ?>
