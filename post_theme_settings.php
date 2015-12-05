<?php

  // Add a custom meta box on pages
  // Allows admin to feature page on the homepage and set highlight colour

  add_action( 'add_meta_boxes', 'thrive_add_featured_page_meta_box' );
  add_action( 'save_post', 'thrive_save_postdata' );


  function thrive_add_featured_page_meta_box() {
    $screens = array( 'post', 'page' );

    foreach ( $screens as $screen ) {
      add_meta_box(
        'thrive_page_custom_attributes',
        'Theme Settings',
        'thrive_featured_page_setup',
        $screen,
        'side',
        'default'
      );
    }
  }

  function thrive_featured_page_setup($post) {
    // Use nonce for verification
    wp_nonce_field( 'thrive_field_nonce', 'thrive_noncename' );

    // Get saved value, if none exists, set a default selected
    $saved_homepage = get_post_meta( $post->ID, 'thrive_featured_page', true);
    if( !$saved_homepage ) {
      $saved_homepage = '0';
    }

    $saved_highlight_colour = get_post_meta( $post->ID, 'thrive_highlight_color', true);
    if( !$saved_highlight_colour ) {
      $saved_highlight_colour = 'blue';
    }

    $saved_banner_text = get_post_meta( $post->ID, 'banner-text', true);
    if( !$saved_banner_text ){
      $saved_banner_text = '';
    }

    if( $post->post_type == 'post') {
      $featured_options = array(
        '0'       => 'No',
        '1'      => 'Yes',
      );
    } else {
      $featured_options = array(
        '0'       => 'No',
        '1'      => 'Top',
        '2'   => 'Bottom'
      );
    }

    $highlight_options = array(
      'red'       => 'Red',
      'green'     => 'Green',
      'blue'      => 'Blue'
    );

    include_once('templates/tpl_post_theme_settings.php');
  }

  /* When the post is saved, saves our custom data */
  function thrive_save_postdata( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }

    if ( !wp_verify_nonce( $_POST['thrive_noncename'], 'thrive_field_nonce' ) ) {
      return;
    }

    if ( isset($_POST['thrive_highlight_color']) && $_POST['thrive_highlight_color'] != "" ){
      update_post_meta( $post_id, 'thrive_highlight_color', $_POST['thrive_highlight_color'] );
    }

    if ( isset($_POST['thrive_featured_page']) && $_POST['thrive_featured_page'] != "" ){
      update_post_meta( $post_id, 'thrive_featured_page', $_POST['thrive_featured_page'] );
    }
  }

?>
