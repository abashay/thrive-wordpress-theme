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


<?php if ( preg_match( '#^teams/.+/?$#', $wp->request ) OR preg_match( '#^about/.+/?$#', $wp->request ) ) : ?>

    <section class="post__content g_main_content">

        <?php the_content(); ?>

    </section>

    <section class="g_sidebar">


        <?php
            $atts = array(
                'parent' => wp_get_post_parent_id( get_the_ID() ),
                'cover' => false,
                'width'=>'33'
            );
            echo thrive_get_subpages($atts);
        ?>

        <?php /*
            $page_parent = wp_get_post_parent_id( get_the_ID() );
            $args = array(
                'post_type'      => 'page',
                'post_parent'    => $page_parent,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
                'meta_query' => array(
                    array(
                        'key' => 'hide-from-nav',
                        'compare' => 'NOT EXISTS'
                    ),
                )
             );

            $sibling_pages = new WP_Query( $args );
        ?>

        <?php if ( $sibling_pages->have_posts() ) : ?>

            <?php while ( $sibling_pages->have_posts() ) : $sibling_pages->the_post(); ?>

                <div id="parent-<?php the_ID(); ?>" class="parent-page">

                    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

                </div>

            <?php endwhile; ?>

        <?php endif; wp_reset_query(); */?>

    </section>

<? else: ?>

    <section class="post__content">

        <?php the_content(); ?>

    </section>

<? endif; ?>

<?php
// End the loop.
endwhile;

get_footer(); ?>
