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
