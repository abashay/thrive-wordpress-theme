<p><strong>Banner text</strong></p>
<?php
  printf(
    '<textarea name="banner-text" id="banner-text" rows="4" style="%2$s">%1$s</textarea>',
    esc_html($saved_banner_text),
    'width: 100%'
  );
?>

<p>
  <strong>Display order on homepage (eg: 3)</strong><br />
  <small>Leave empty to hide from page</small>
</p>

<?php
  printf(
    '<input type="text" name="thrive_featured_page" id="thrive_featured_page" value="%1$s" size="4" />',
    $saved_homepage
  );
?>

<p><strong>Highlight colour</strong></p>
<?php
  foreach($highlight_options as $key => $label) {
    printf(
      '<input type="radio" name="thrive_highlight_color" value="%1$s" id="thrive_highlight_color[%1$s]" %3$s />'.
      '<label for="thrive_highlight_color[%1$s]"> %2$s ' .
      '</label><br>',
      esc_attr($key),
      esc_html($label),
      checked($saved_highlight_colour, $key, false)
    );
  }
?>
