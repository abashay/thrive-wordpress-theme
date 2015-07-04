<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();

// Start the loop.
while ( have_posts() ) : the_post(); ?>

<section class="banner banner--post banner--400">

	<div class="banner__hero">
		<?php
			$thumb_id = get_post_thumbnail_id();
			$image = wp_get_attachment_image_src($thumb_id, 'large', false);
		?>
		<img src="<?php echo $image[0]; ?>" alt="" />
	</div>

	<div class="banner__overlay">

		<div class="banner__overlay__text">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</div>

	</div>

</section>


<?php
// End the loop.
endwhile;

get_footer(); ?>
