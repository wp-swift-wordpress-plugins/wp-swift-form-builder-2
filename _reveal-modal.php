<?php
add_action( 'wp_footer', 'wp_swift_form_builder_modal_reveal', 1);
/**
 * Load in the html for the modal reveal
 *
 * @since    1.0.0
 */
function wp_swift_form_builder_modal_reveal() {
?>
<div class="reveal" id="form-builder-reveal" data-reveal>
  <div id="form-builder-reveal-content"></div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
}