<?php
    get_header();

    while ( have_posts() ) : the_post();
?>

	<article class="post">

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

		<section class="post__content">

			<?php the_content(); ?>

		</section>

	</article>


<?php
	// End the loop.
	endwhile;

	get_footer();
?>
