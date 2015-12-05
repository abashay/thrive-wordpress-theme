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

$donate_url = "/give/now?";

get_header();

// Start the loop.
while ( have_posts() ) : the_post(); ?>

<section class="banner banner--post banner--give">

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

            <div class="banner--give__text">
                <?php
                    $banner_intro = get_post_meta( get_the_ID(), 'banner-text', true );
                    // check if the custom field has a value
                    if( ! empty( $banner_intro ) ) {
                      echo sprintf('<p>%s</p>', $banner_intro);
                    }
                ?>
            </div>

            <div class="banner--give__form giveform">

                <ul class="giveform__tabs">
                    <li class="giveform__tabs--single">
                        <a href="#">Single Gift</a>
                    </li>

                    <li class="giveform__tabs--regular">
                        <a href="<?php get_site_url(); ?>/give/regularly/">Regular Gift</a>
                    </li>
                </ul>

                <div class="giveform__form" id="giveform__regulargift">
                    <form class="" method="get" action="<?php echo $donate_url; ?>" >
                        <input class="giveform__form__buttons" type="submit" value="£15" name="amount" />
                    </form>
                    <form class="" method="get" action="<?php echo $donate_url; ?>">
                        <input class="giveform__form__buttons" type="submit" value="£20" name="amount" />
                    </form>
                    <form class="" method="get" action="<?php echo $donate_url; ?>">
                        <input class="giveform__form__buttons" type="submit" value="£30" name="amount" />
                    </form>
                    <form class="giveform__form__customamount" method="get" action="<?php echo $donate_url; ?>">
                        <input class="giveform__form__custom" type="text" placeholder="£" name="amount" /><input class="giveform__form__customsubmit" type="submit" value="Go" />
                    </form>
                </div>
            </div>

        </div>

    </div>

</section>


<section>

    <div class="infobox infobox--50">
        <a href="<?php echo $donate_url; ?>amount=£25" class="donatelink">
            <img src="http://loremflickr.com/500/500?one" />
            <div class="infobox__content">
                <h2>£25</h2>
                <p>Lorem ipsum dolar sit amet</p>
            </div>
        </a>
    </div>

    <div class="infobox infobox--50 infobox--story">
        <a href="<?php echo $donate_url; ?>amount=£35&amp;" class="donatelink">
            <img src="http://loremflickr.com/500/500?two" />
            <div class="infobox__content">
                <h2>£35</h2>
                <p>Lorem ipsum dolar sit amet</p>
            </div>
        </a>
    </div>

    <div class="infobox infobox--50">
        <a href="<?php echo $donate_url; ?>amount=£50&amp;a=Thrive" class="donatelink">
            <img src="http://loremflickr.com/500/500?two" />
            <div class="infobox__content">
                <h2>£50</h2>
                <p>Lorem ipsum dolar sit amet</p>
            </div>
        </a>
    </div>

    <div class="infobox infobox--50 infobox--post">
        <a href="#">
            <div class="infobox__content">
                <h2>Give by post</h2>
                <p>You can give to the work of Thrive by post too...</p>
            </div>
        </a>
    </div>

</section>


<?php
// End the loop.
endwhile;

get_footer(); ?>
