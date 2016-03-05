<div class="endorsement endorsement--bg_<?php echo mt_rand(1, 3); ?>">
    <div class="endorsement__headline">
        What others are saying about Thrive
    </div>

    <?php if ($endorsement->image) { ?>
    <div class="endorsement__avatar">
        <img class="endorsement__avatar__img" src="<?php echo $endorsement->image; ?>" alt="" />
    </div>
    <?php } ?>

    <blockquote class="endorsement__body">
        <p><?php echo $endorsement->post_content; ?></p>

        <attr class="endorsement__body__attr"><?php echo $endorsement->post_title ?></attr>
    </blockquote>
</div>
