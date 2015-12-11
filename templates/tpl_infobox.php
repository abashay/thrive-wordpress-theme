<div class="<?php echo $infobox->classes ?>">

    <a href="<?php echo $infobox->link; ?>" rel="bookmark">

        <?php echo thrive_infobox_picture($infobox->thumbnail_id); ?>

        <div class="infobox__content">
            <h2><?php echo $infobox->title; ?></h2>

            <?php if($infobox->excerpt):?>
            <p><?php echo $infobox->excerpt ?></p>
            <?php endif; ?>
        </div>

    </a>
</div>
