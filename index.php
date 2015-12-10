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

			</div>

		</div>

	</section>

	<section class="postlist" role="main">

		<?php if ( have_posts() ) : ?>

			<?php $i=1; while ( have_posts() ) : the_post(); ?>

				<?php
					if ($i <= 2) {
						get_template_part( 'content', 'postinfobox' );
					} else {
						get_template_part( 'content', 'postsnippet' );
					}
				?>

			<?php $i++; endwhile; // End the loop. ?>


			<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'mid_size'			=> 3,
				'prev_text'          => '&#9668;<span class="screen-reader-text"> Previous page</span>',
				'next_text'          => '&#9658;<span class="screen-reader-text"> Next page</span>',
			) );

			?>

		<?php else : // If no content, include the "No posts found" template. ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>
