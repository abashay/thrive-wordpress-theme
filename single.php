<?php
  get_header();

  the_post();

  // Set up page banner
  $image = wp_get_attachment_image_src(
    get_post_thumbnail_id(),
    'large',
    false);

  $banner = (object) array(
    'title' => get_the_title(),
    'subtitle' => get_post_meta( get_the_ID(), 'banner-text', true ),
    'image' => $image[0]
  );

  // Set up sidebar
  $exclude_id = get_the_ID();
  $quandry = array(
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'post_type' => 'post',
    'order' => 'DESC',
    'exclude' => $exclude_id
  );
  $blocks = get_posts($quandry);

  // Output page banner
  include_once('templates/tpl_page_banner.php');
?>
  <div class="post-wrapper">

  <article class="post g_main_content">
    <div class="post__meta">
      <p>Published: <?php the_date(); ?></p>
    </div>

    <section class="post__content">
      <?php the_content(); ?>
    </section>
  </article>

  <aside class="g_sidebar">
    <div class="break-site-padding">
      <?php
        foreach($blocks as $post) {
          $highlight_color = get_post_meta( get_the_ID(), 'thrive_highlight_color', true);
          $infobox = (object) array(
            'title' => $post->post_title,
            'link' => esc_url( get_permalink() ),
            'excerpt' => strip_tags(get_the_excerpt()),
            'thumbnail_id' => get_post_thumbnail_id(),
            'classes' => 'infobox infobox--50 infobox--page infobox--' . $highlight_color
          );

          include('templates/tpl_infobox.php');
        } // End foreach $block
      ?>
    </div>
  </aside>

</div>

<?php get_footer(); ?>
