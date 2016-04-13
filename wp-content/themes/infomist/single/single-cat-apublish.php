<?php
/**
 * The template for displaying all single posts.
 *
 * @package Infomist
 */

get_header(); ?>

<div id="primary" class="content-area single-publish">
	<main id="main" class="site-main rerer" role="main">
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		<div class="author">
			<?php echo get_avatar($authordata->ID, 120, 120); ?>
			<?php $author = get_the_author();?>
			<div class="author-wrapp">
				<span class="about-author">Автор публікацій:</span>
				<h2><span class="author-name"><?php the_author_posts_link(); ?></span></h2>
				<?php $user_email = get_the_author_meta( 'user_email' ); ?>
				<span class="email"><a href="mailto:<?php echo $user_email ?>"><?php echo $user_email ?></a><span class="fa fa-envelope"></span></span>

				<div class="time-post">
					<?php
					the_time('d/m/Y  |  G:i');
					?>
				</div>
			</div>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title() ?></h1>
		<!--            --><?php //the_post_thumbnail() ?>
		<div class="content-wrapp">
			<?php the_content(); ?>
		</div>
		<!--			--><?php //the_post_navigation(); ?>

	<?php
	wp_related_posts();
	?>
		<div class="comments">
			<span class="fa fa-comments-o"></span> <span class="number-of-comments">��������: <?php comments_number('0', '1', '%'); ?></span>
		</div>

	<?php
	comments_template();

	?>

	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<div id="secondary" class="widget-area sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-4' ); ?>
</div>
<?php get_footer(); ?>
