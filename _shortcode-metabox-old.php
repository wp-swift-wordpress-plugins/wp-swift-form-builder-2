<?php


/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function form_shortcode_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function form_shortcode_add_meta_box() {
    add_meta_box(
        'form_shortcode-form-shortcode',
        __( 'Form Shortcode', 'form_shortcode' ),
        'form_shortcode_html',
        'wp_swift_form',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'form_shortcode_add_meta_box' );

function form_shortcode_html( $post) {
    wp_nonce_field( '_form_shortcode_nonce', 'form_shortcode_nonce' );
	$id = get_the_id();
	// echo "<pre>"; var_dump($id); echo "</pre>";
	?>
    <p>Copy the shortcode below in to the page editor</p>

    <p>
        <label for="form_shortcode_test"><?php _e( 'Test', 'form_shortcode' ); ?></label><br>
        <input type="text" name="form_shortcode_test" id="form_shortcode_test" value='[form id="4"]' readonly>
        <textarea name="" id="" cols="30" rows="1" class="copy-to-clip">[form id="4"]</textarea>
        <a href="#" class="copy-shortcode" data-id="<?php echo $id ?>">Copy Shortcode</a>
    </p>
    <input readonly class="copy" value='[form id="<?php echo $id ?>"]' onclick="this.focus();this.select()" onfocus="this.focus();this.select();">

	<hr>
	<input type="text" id="copyTarget" value='[form id="<?php echo $id ?>"]' readonly> <a href="#" id="copyButton">Copy</a><br><br>
<input type="text" placeholder="Click here and press Ctrl-V to see clipboard contents">
<hr>
<input type="button" id="btnSearch" value="Search" onclick="GetValue();" />
<p id="message" ></p><br>
<button onclick="copyToClipboard('message')">Copy</button>
<hr>
<pre class="copy">[form id="4"]</pre>
    <?php 




}

// function form_shortcode_save( $post_id ) {
//     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
//     if ( ! isset( $_POST['form_shortcode_nonce'] ) || ! wp_verify_nonce( $_POST['form_shortcode_nonce'], '_form_shortcode_nonce' ) ) return;
//     if ( ! current_user_can( 'edit_post', $post_id ) ) return;

//     if ( isset( $_POST['form_shortcode_test'] ) )
//         update_post_meta( $post_id, 'form_shortcode_test', esc_attr( $_POST['form_shortcode_test'] ) );
// }
// add_action( 'save_post', 'form_shortcode_save' );

/*
    Usage: form_shortcode_get_meta( 'form_shortcode_test' )
*/