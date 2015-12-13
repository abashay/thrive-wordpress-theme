<div class="<?php echo $infobox->classes ?>">

    <a href="<?php echo $infobox->link; ?>" rel="bookmark">

        <?php if (isset( $infobox->thumbnail_id ) ) {
            echo thrive_infobox_picture($infobox->thumbnail_id);
        } else if ( isset( $infobox->image ) ) {
            echo sprintf("<img src='%s'> alt='' />", $infobox->image);
        } ?>

        <div class="infobox__content">
            <h2><?php echo $infobox->title; ?></h2>

            <?php if(isset($infobox->excerpt)):?>
            <p><?php echo $infobox->excerpt ?></p>
            <?php endif; ?>
        </div>

    </a>
</div>
