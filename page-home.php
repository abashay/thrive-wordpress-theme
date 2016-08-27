<?php

$page_id = get_option( 'page_on_front' );
$image = wp_get_attachment_image_src(
	get_post_thumbnail_id(),
	'large',
	false);
if( isset( $image[0]) ){
	$image_url = $image[0];
} else {
	$image_url = get_template_directory_uri() . "/assets/banner.jpg";
}

get_header(); ?>

	<section class="banner banner--home">

		<a href="/about/">

			<div class="banner__main">

				<div class="banner__hero">
					<img src="<?php echo $image_url;?>" alt="" />
				</div>

				<div class="banner__overlay">

					<div class="banner__overlay__text">

						<div class="banner__overlay__text__container">

							<h1>We want to see disadvantaged communities changed for good through the service of young leaders.</h1>

							<span class="btn">
								Find out more
							</span>

						</div>

					</div>

				</div>

			</div>

		</a>

	</section>

	<section>

	<?php
		$quandry = array(
			'posts_per_page' => 10,
			'post_status' => 'publish',
			'post_type' => 'any',
			'meta_key' => 'thrive_featured_page',
			'orderby' => 'meta_value',
			'order' => 'ASC',
		);

		$blocks = get_posts($quandry);

		foreach($blocks as $post) {

			$highlight_color = get_post_meta( get_the_ID(), 'thrive_highlight_color', true);
			$infobox = (object) array(
				'title' => $post->post_title,
				'link' => esc_url( get_permalink() ),
				'excerpt' => strip_tags(get_the_excerpt()),
				'thumbnail_id' => get_post_thumbnail_id(),
				'classes' => 'infobox infobox--33 infobox--page infobox--' . $highlight_color
			);
			include('templates/tpl_infobox.php');

		} // End foreach $block
	?>

	</section>

<?php get_footer(); ?>
