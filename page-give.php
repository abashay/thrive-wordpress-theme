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

$image_folder = get_template_directory_uri() . '/assets/';

get_header();

// Start the loop.
while ( have_posts() ) : the_post(); ?>

<section class="banner banner--post banner--give">

    <div class="banner__main">

        <div class="banner__hero">
            <?php
                $thumb_id = get_post_thumbnail_id();
                if (isset($thumb_id) && $thumb_id != "") {
                    $bannerimage = wp_get_attachment_image_src($thumb_id, 'large', false);
                    $bannerimage = $bannerimage[0];
                } else {
                    // Should look up a default in the settings
                    $bannerimage = $image_folder . 'young-achievers-dinner-2013.jpg';
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
                            <input class="giveform__form__buttons" type="submit" value="£25" name="amount" />
                        </form>
                        <form class="" method="get" action="<?php echo $donate_url; ?>">
                            <input class="giveform__form__buttons" type="submit" value="£50" name="amount" />
                        </form>
                        <form class="" method="get" action="<?php echo $donate_url; ?>">
                            <input class="giveform__form__buttons" type="submit" value="£75" name="amount" />
                        </form>
                        <form class="" method="get" action="<?php echo $donate_url; ?>">
                            <input class="giveform__form__buttons" type="submit" value="£Other" name="" />
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>


<section>

    <div class="infobox infobox--50">
        <a href="<?php echo $donate_url; ?>amount=£25" class="donatelink">
            <img src="<?php echo $image_folder . 'give/give25.jpg'; ?>" />
            <div class="infobox__content">
                <h2>£25</h2>
                <p>£25 could give a young person one month's mentoring in a safe space with a trained volunteer</p>
            </div>
        </a>
    </div>

    <div class="infobox infobox--50 infobox--story">
        <a href="<?php echo $donate_url; ?>amount=£50" class="donatelink">
            <img src="<?php echo $image_folder . 'give/give50.jpg'; ?>" />
            <div class="infobox__content">
                <h2>£50</h2>
                <p>£50 could unleash the potential of a young leader with one session of training followed by 1:1 coaching</p>
            </div>
        </a>
    </div>

    <div class="infobox infobox--50">
        <a href="<?php echo $donate_url; ?>amount=£75" class="donatelink">
            <img src="<?php echo $image_folder . 'give/give75.jpg'; ?>" />
            <div class="infobox__content">
                <h2>£75</h2>
                <p>£75 could allow a young person facing a particularly tough situation to receive weekly mentoring from one of our qualified youth workers for a month</p>
            </div>
        </a>
    </div>

    <div class="infobox infobox--50 infobox--blue">
        <a href="/give/other-ways-to-give/">
            <img src="<?php echo $image_folder . 'give/post.jpg'; ?>" />
            <div class="infobox__content">
                <h2>Other ways to give</h2>
                <p>Send a cheque, fundraise for us, remember us in your will – there’s lots of ways you can help.</p>
            </div>
        </a>
    </div>

</section>


<?php
// End the loop.
endwhile;

get_footer(); ?>
