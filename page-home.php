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
 
$featured_posts = thrive_featured_posts();

get_header(); ?>
	
	<section class="home-banner">
		<div class="slider">
			<div class="slider__slide">
				Large image rotation thing here with one call to action...
			</div>
		</div>
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
				<a href="#">
					<img src="http://loremflickr.com/500/500?two" alt="" />
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
