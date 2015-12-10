<?php

$quandry = array(
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'post_type' => 'any',
	'meta_key' => 'thrive_featured_page',
	'orderby' => 'meta_value',
	'order' => 'ASC',
);

$blocks = get_posts($quandry);

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

	<?php // TODO: Tidy this up ?>

	<?php if(count($blocks) > 0): ?>
		<?php foreach($blocks as $post) : ?>
			<?php $highlight_color = get_post_meta( get_the_ID(), 'thrive_highlight_color', true); ?>
			<div class="infobox infobox--50 infobox--page infobox--<?php echo $highlight_color; ?>">
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

	</section>

<?php get_footer(); ?>
