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

$featured_posts = thrive_featured_posts(1);

get_header(); ?>

	<section class="banner banner--home">

		<a href="/about/">

			<div class="banner__hero">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/banner.jpg" alt="" />
			</div>

			<div class="banner__overlay">

				<div class="banner__overlay__text">

					<h1>Should your circumstances dictate your destiny?</h1>

					<span class="btn">
						Find out more
					</span>

				</div>

			</div>

		</a>

	</section>

	<section>

		<div class="infobox infobox--50">
			<a href="#">
				<img src="http://loremflickr.com/500/500?one" alt="" />
				<div class="infobox__content">
					<h2>Optional featured page 2: eg event</h2>
				</div>
			</a>
		</div>

		<?php if(count($featured_posts) > 0): ?>
			<?php foreach($featured_posts as $post) : ?>

			<?php
				setup_postdata( $post );
				$excerpt = strip_tags(get_the_excerpt());
			?>

			<div class="infobox infobox--50 infobox--story">
				<?php echo sprintf('<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ); ?>
					<?php
						if ( has_post_thumbnail() ) {
							$thumb_id = get_post_thumbnail_id();
							echo thrive_infobox_picture($thumb_id);
						}
					?>
					<div class="infobox__content">
						<h2><?php echo $post->post_title; ?></h2>
						<?php if($excerpt){ echo "<p>" . $excerpt . "</p>"; } ?>
					</div>
				</a>
			</div>

			<?php endforeach; // End foreach featured post ?>

		<?php endif; // End if featured posts ?>

	<!--<div class="story-box">
		Optional featured page 2: Join in
	</div>

	<div class="story-box">
		Optional featured page 3: Join in
	</div>-->

<?php get_footer(); ?>
