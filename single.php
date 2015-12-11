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

				<div class="banner__overlay__text">

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

	<aside class="g_sidebar">
		<div class="break-site-padding">
			<?php
				// This is repeated on `page-home` and should be improved
				$quandry = array(
					'posts_per_page' => 4,
					'post_status' => 'publish',
					'post_type' => 'post',
					'order' => 'DESC',
					'exclude' => $exclude_id
				);

				$blocks = get_posts($quandry);

				foreach($blocks as $post) {

					$highlight_color = get_post_meta( get_the_ID(), 'thrive_highlight_color', true);
					$infobox = (object) array(
						'title' => $post->post_title,
						'link' => esc_url( get_permalink() ),
						'excerpt' => strip_tags(get_the_excerpt()),
						'thumbnail_id' => get_post_thumbnail_id(),
						'classes' => 'infobox infobox--50 infobox--page infobox--' . $highlight_color
					);
					include('templates/tpl_infobox.php');

				} // End foreach $block
			?>
		</div>
	</aside>

<?php
	get_footer();
?>
