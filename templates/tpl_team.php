<div class="team">
<?php foreach ($team_members as $team) : ?>
  <div class="team__member">
    <h2><?php echo $team->post_title; ?></h2>
    <p><?php echo $team->post_content; ?></p>
  </div>
<?php endforeach; ?>
</div>
