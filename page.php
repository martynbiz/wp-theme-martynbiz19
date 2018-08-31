<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package martynbiz19
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<div class="grid-container u-padding-y">
		<div class="grid-x grid-padding-x page">
			<div class="small-12 cell">
				<?php
				while ( have_posts() ) : the_post();

					the_content();

				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
