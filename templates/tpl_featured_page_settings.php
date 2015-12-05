<p><strong>Display on homepage</strong></p>
<?php
  foreach($featured_options as $key => $label) {
    printf(
      '<input type="radio" name="thrive_featured_page" value="%1$s" id="thrive_featured_page[%1$s]" %3$s />'.
      '<label for="thrive_featured_page[%1$s]"> %2$s ' .
      '</label><br>',
      esc_attr($key),
      esc_html($label),
      checked($saved_homepage, $key, false)
    );
  }
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
