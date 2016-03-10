<?php
/**
 * Template Name: Full Text Page
 */

// Set up page banner
$image = wp_get_attachment_image_src(
    get_post_thumbnail_id(),
    'large',
    false);

$banner = (object) array(
    'title' => get_the_title(),
    'subtitle' => get_post_meta( get_the_ID(), 'banner-text', true ),
    'image' => $image[0]
);

get_header();

// Start the loop.
while ( have_posts() ) : the_post();

    // Output page banner
    include_once('templates/tpl_page_banner.php');

?>

    <section class="post__content post__content--nosidebar">
        <h2 class="post__content__headline"><?php echo the_title(); ?></h2>
        <?php the_content(); ?>
    </section>

<?php
// End the loop.
endwhile;

get_footer(); ?>
