<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="featured-img">
					<!-- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> --> <!-- UNCOMMENT FOR LINK TO ARTICLE -->
					<!-- <a href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>"> --> <!-- UNCOMMENT FOR LINK TO IMAGE -->
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					<!-- </a> -->
				</div>
				<?php endif; ?>
				<!-- /post thumbnail -->

				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<?php edit_post_link(); ?>

				<br class="clear">

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
