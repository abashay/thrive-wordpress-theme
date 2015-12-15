<?php
    $default_banner_image = get_template_directory_uri() . "/assets/banner.jpg";
    if ( !isset( $banner->image ) ) {
        $banner->image = $default_banner_image;
    }
?>
<section class="banner banner--400">
    <div class="banner__main">

        <div class="banner__hero">
            <?php echo sprintf('<img src="%s" alt="" />', $banner->image); ?>
        </div>

        <div class="banner__overlay">
            <div class="banner__overlay__text">
                <?php
                    echo sprintf('<h1>%s</h1>', $banner->title);

                    if ( isset( $banner->subtitle ) ) {
                        echo sprintf('<p>%s</p>', $banner->subtitle);
                    }
                ?>
            </div>
        </div>
    </div>
</section>
