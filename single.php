<?php
    get_header();

    while ( have_posts() ) : the_post();
    	$exclude_id = get_the_ID();
?>

	<section class="banner banner--post banner--600">

		<div class="banner__main">

			<div class="banner__hero">
				<?php
					$thumb_id = get_post_thumbnail_id();
					$image = wp_get_attachment_image_src($thumb_id, 'large', false);
				?>
				<img src="<?php echo $image[0]; ?>" alt="" />
			</div>

			<div class="banner__overlay">

				<div class="banner__overlay__text g_main_content g_main_content--lonely">

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<?php
						$banner_intro = get_post_meta( get_the_ID(), 'banner-text', true );
						// check if the custom field has a value
						if( ! empty( $banner_intro ) ) {
						  echo sprintf('<p>%s</p>', $banner_intro);
						}
					?>

				</div>

			</div>

		</div>

	</section>

	<article class="post g_main_content">
		<div class="post__meta">
			<p>Published: <?php the_date(); ?></p>
		</div>

		<section class="post__content">
			<?php the_content(); ?>
		</section>
	</article>

<?php endwhile; // End the loop. ?>

<?php
	$items = 7;
	$quandry = array(
		'posts_per_page' => $items,
		'post_status' => 'publish',
		'post_type' => 'post',
		'order' => 'DESC',
		'exclude' => $exclude_id
	);
	$blocks = get_posts($quandry);
?>

	<aside class="g_sidebar">
		<div class="break-site-padding">
			<?php
				$items -= 1;
				foreach($blocks as $post) :
				if ($items == 0) { break; } $items -= 1; ?>
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
		</div>
	</aside>

<?php
	get_footer();
?>
