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

get_header();

// Start the loop.
while ( have_posts() ) : the_post(); ?>

<section class="banner banner--post banner--400">

    <div class="banner__hero">
        <?php
            $thumb_id = get_post_thumbnail_id();
            if (isset($thumb_id) && $thumb_id != "") {
                $bannerimage = wp_get_attachment_image_src($thumb_id, 'large', false);
                $bannerimage = $bannerimage[0];
            } else {
                // Should look up a default in the settings
                $bannerimage = get_template_directory_uri() . '/assets/young-achievers-dinner-2013.jpg';
            }
        ?>
        <img src="<?php echo $bannerimage; ?>" alt="" />
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

</section>


<section class="post__content g_main_content">

    <?php the_content(); ?>

</section>

<section class="g_sidebar">

    <?php
        // If we are on the about section then we should should an about section navigation
        if ( preg_match( '#^about(/.+)?$#', $wp->request ) ) {


        if ( has_nav_menu( 'about-nav' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'about-nav',
                'walker' => new thrive_custom_walker_nav_menu
            ) );
        }

    } else { ?>

        NOT ABOUT SECTION

        <div class="infobox infobox--33">
            <a href="#">
                <img src="http://loremflickr.com/500/500?one" alt="" />
                <div class="infobox__content">
                    <h2>Optional featured page 2: eg event</h2>
                </div>
            </a>
        </div>

        <div class="infobox infobox--33">
            <a href="#">
                <img src="http://loremflickr.com/500/500?two" alt="" />
                <div class="infobox__content">
                    <h2>Optional featured page 2: eg event</h2>
                </div>
            </a>
        </div>

        <div class="infobox infobox--33">
            <a href="#">
                <img src="http://loremflickr.com/500/500?three" alt="" />
                <div class="infobox__content">
                    <h2>Optional featured page 2: eg event</h2>
                </div>
            </a>
        </div>

    <?php } // End section check ?>
</section>


<?php
// End the loop.
endwhile;

get_footer(); ?>
