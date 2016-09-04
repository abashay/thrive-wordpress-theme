<?php
  $advocates = array(
    array(
      'name' => 'CIT Awards',
      'logo' => get_template_directory_uri() . '/assets/advocates/cit.png',
      'label' => 'CIT Awards<br />Highly Commended'
    ),
    array(
      'name' => 'Oxford Community and Voluntary Action',
      'logo' => get_template_directory_uri() . '/assets/advocates/ocva.png',
      'label' => 'High Sheriff Community Integration Award'
    ),
    array(
      'name' => 'Inspire - Stories to lift your spirits',
      'logo' => get_template_directory_uri() . '/assets/advocates/inspire.png',
      'label' => 'Runner-up<br />Inspiring Project Award'
    ),
    array(
      'name' => 'Oxford City Council',
      'logo' => get_template_directory_uri() . '/assets/advocates/occ.png',
      'label' => 'Partner'
    ),
    array(
      'name' => 'Tearfund',
      'logo' => get_template_directory_uri() . '/assets/advocates/tearfund.png',
      'label' => 'Partner'
    )
  );
?>

<section class="advocate_banner">
  <?php foreach($advocates as $advocate) { ?>
  <div class="advocate_banner__advocate">
    <img alt="<?php echo $advocate['name'] ?>" class="advocate_banner__advocate__logo" src="<?php echo $advocate['logo'] ?>" />
    <p class="advocate_banner__advocate__label"><?php echo $advocate['label'] ?></p>
  </div>
  <?php } ?>
</section>