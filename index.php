<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section class="banner banner--400">

		<div class="banner__hero">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/banner.jpg" alt="" />
		</div>

		<div class="banner__overlay">

			<div class="banner__overlay__text">

				<h1>Stories</h1>

				<p>This is an intro paragraph</p>

			</div>

		</div>

	</section>

	<section class="postlist" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'postsnippet' ); ?>

			<?php endwhile; // End the loop. ?>


			<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => 'Previous page',
				'next_text'          => 'Next page',
				'before_page_number' => '<span class="meta-nav screen-reader-text">Page</span>',
			) );

			?>

		<?php else : // If no content, include the "No posts found" template. ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>
