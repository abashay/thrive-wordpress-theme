<?php echo sprintf('<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ); ?>
	<article class="postlist__post cf" id="post-<?php the_ID(); ?>">

		<div class="postlist__post__thumbnail infobox infobox--25">
			<?php
				if ( has_post_thumbnail() ) {
					$thumb_id = get_post_thumbnail_id();
					echo thrive_infobox_picture($thumb_id);
				}
			?>
		</div>

		<div class="post">

			<?php the_title( '<h2 class="postlist__post__title">', '</h2>' ); ?>

			<div class="postlist__post__snippet">
				<p><?php echo the_excerpt_rss(); ?></p>
			</div>

			<div class="postlist__post__meta">
				<p class="readmore">Read more</p>
				<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		</div>

	</article>
</a>
