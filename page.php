<?php

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

$subpages = array(
    'exclude' => get_the_ID(),
    'parent' => wp_get_post_parent_id( get_the_ID() ),
    'cover' => false,
    'width'=>'33'
);

get_header();

// Start the loop.
while ( have_posts() ) : the_post();

    // Output page banner
    include_once('templates/tpl_page_banner.php');

?>


<?php
    // TODO: Tidy this up:
    if ( preg_match( '#^teams/.+/.+?$#', $wp->request )
           OR preg_match( '#^about/.+/?$#', $wp->request )
           OR preg_match( '#^info/.+/?$#', $wp->request )
           OR preg_match( '#^join/.+/?$#', $wp->request ) ) : ?>

    <div class="post-wrapper">
    <section class="post__content g_main_content">

        <?php the_content(); ?>

    </section>

    <section class="g_sidebar">

        <?php echo thrive_get_subpages($subpages); ?>

    </section>
    </div>

<? else: ?>

    <section class="post__content">

        <?php the_content(); ?>

    </section>

<? endif; ?>

<?php
// End the loop.
endwhile;

if ( preg_match( '#^teams/.+/.+?$#', $wp->request )
           OR preg_match( '#^about/.+/?$#', $wp->request )
           OR preg_match( '#^info/.+/?$#', $wp->request )
           OR preg_match( '#^join/.+/?$#', $wp->request ) ) {
    get_endorsement();
}

get_footer(); ?>
