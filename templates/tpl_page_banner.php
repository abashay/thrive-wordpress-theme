<?php
    $default_banner_image = get_template_directory_uri() . "/assets/banner.jpg";
    if ( !isset( $banner->image ) ) {
        $banner->image = $default_banner_image;
    }
?>
<section class="banner banner--400">
    <div class="banner__main">

        <div class="banner__hero">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/banner.jpg" alt="" />
        </div>

        <div class="banner__overlay">
            <div class="banner__overlay__text">
                <h1><?php echo $banner->title; ?></h1>

                <?php if ($banner->subtitle) : ?>
                    <p><?php echo $banner->subtitle; ?></p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
