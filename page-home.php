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

$featured_posts = thrive_featured_posts(2);

$pages_top = array(
	'include' => '78, 66',
	'post_type' => 'page',
	'post_status' => 'publish'
);
$pages_top = get_pages($pages_top);

$pages_bottom = array(
	'include' => '108',
	'post_type' => 'page',
	'post_status' => 'publish'
);
$pages_bottom = get_pages($pages_bottom);

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

		<?php if(count($pages_top) > 0): ?>
			<?php foreach($pages_top as $post) : ?>
				<div class="infobox infobox--50 infobox--page">
					<?php echo sprintf('<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ); ?>
						<?php
							if ( has_post_thumbnail() ) {
								$thumb_id = get_post_thumbnail_id();
								echo thrive_infobox_picture($thumb_id);
							}
							$excerpt = strip_tags(get_the_excerpt());
						?>
						<div class="infobox__content">
							<h2><?php echo $post->post_title; ?></h2>
							<?php if($excerpt){ echo "<p>" . $excerpt . "</p>"; } ?>
						</div>
					</a>
				</div>
			<? endforeach; ?>
		<?php endif; ?>

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

		<?php if(count($pages_bottom) > 0): ?>
			<?php foreach($pages_bottom as $post) : ?>
				<div class="infobox infobox--50 infobox--page">
					<?php echo sprintf('<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ); ?>
						<?php
							if ( has_post_thumbnail() ) {
								$thumb_id = get_post_thumbnail_id();
								echo thrive_infobox_picture($thumb_id);
							}
							$excerpt = strip_tags(get_the_excerpt());
						?>
						<div class="infobox__content">
							<h2><?php echo $post->post_title; ?></h2>
							<?php if($excerpt){ echo "<p>" . $excerpt . "</p>"; } ?>
						</div>
					</a>
				</div>
			<? endforeach; ?>
		<?php endif; ?>


<?php get_footer(); ?>
