<?php
/*
 * Include the WordPress Admin API interface settings for this plugin.
 * This will declare all menu pages, tabs and inputs etc but it does not
 * handle any business logic related to form functionality.
 */
class WP_Swift_Form_Builder_Admin_Interface_Settings {

    /*
     * Initializes the plugin.
     */
    public function __construct() {
        /*
         * Inputs
         */
        add_action( 'admin_menu', array($this, 'wp_swift_form_builder_add_admin_menu'), 20 );
        add_action( 'admin_init', array($this, 'wp_swift_form_builder_settings_init') );
        // add_action( 'init', array($this, 'validate_form'), 10, 3 );
    }	

	/*
	 *
	 */
	public function wp_swift_form_builder_add_admin_menu(  ) { 

	    add_submenu_page( 'edit.php?post_type=wp_swift_form', 'Form Builder Settings', 'Settings', 'manage_options', 'form_builder', array($this, 'wp_swift_form_builder_options_page')  );

	}

	/*
	 * to do
	 */
	public function validate_form() {
		if (isset($_POST["wp_swift_form_builder_settings"]["wp_swift_form_builder_email_template_primary_color"]) && $_POST["wp_swift_form_builder_settings"]["wp_swift_form_builder_email_template_primary_color"] === '') {
			unset($_POST["wp_swift_form_builder_settings"]["wp_swift_form_builder_email_template_primary_color"]);
			// $hex = $_POST["wp_swift_form_builder_settings"]["wp_swift_form_builder_email_template_primary_color"];
			
		}
	}

	/*
	 *
	 */
	public function wp_swift_form_builder_settings_init(  ) { 


	    register_setting( 'form-builder', 'wp_swift_form_builder_settings' );

	    add_settings_section(
	        'wp_swift_form_builder_plugin_page_section', 
	        __( 'Set your preferences for the Form Builder here', 'wp-swift-form-builder' ), 
	        array($this, 'wp_swift_form_builder_settings_section_callback'), 
	        'form-builder'
	    );

	    add_settings_field( 
			'wp_swift_form_builder_checkbox_javascript', 
			__( 'Disable JavaScript', 'wp-swift-form-builder' ), 
			array($this, 'wp_swift_form_builder_checkbox_javascript_render'),  
			'form-builder', 
			'wp_swift_form_builder_plugin_page_section' 
	    );

	    add_settings_field( 
			'wp_swift_form_builder_checkbox_css', 
			__( 'Disable CSS', 'wp-swift-form-builder' ), 
			array($this, 'wp_swift_form_builder_checkbox_css_render'),  
			'form-builder', 
			'wp_swift_form_builder_plugin_page_section' 
	    );

	    add_settings_field( 
	        'wp_swift_form_builder_email_template_primary_color', 
	        __( 'Email Template', 'wp-swift-form-builder' ), 
	        array($this, 'wp_swift_form_builder_email_template_primary_color_render'), 
	        'form-builder', 
	        'wp_swift_form_builder_plugin_page_section' 
	    );

	    add_settings_field( 
	        'wp_swift_form_builder_email_template_primary_color', 
	        __( 'Email Template', 'wp-swift-form-builder' ), 
	        array($this, 'wp_swift_form_builder_email_template_primary_color_render'), 
	        'form-builder', 
	        'wp_swift_form_builder_plugin_page_section' 
	    );	 
	    

	    add_settings_field( 
	        'wp_swift_form_builder_google_recaptcha', 
	        __( 'Google reCAPTCHA', 'wp-swift-form-builder' ), 
	        array($this, 'wp_swift_form_builder_google_recaptcha_render'), 
	        'form-builder', 
	        'wp_swift_form_builder_plugin_page_section' 
	    );	

	    add_settings_field( 
	        'wp_swift_form_builder_marketing_api', 
	        __( 'Marketing API', 'wp-swift-form-builder' ), 
	        array($this, 'wp_swift_form_builder_marketing_api_render'), 
	        'form-builder', 
	        'wp_swift_form_builder_plugin_page_section' 
	    );		        

	    /*add_settings_field( 
	        'wp_swift_form_builder_email_template_secondary_color', 
	        __( '', 'wp-swift-form-builder' ), 
	        array($this, 'wp_swift_form_builder_email_template_secondary_color_render'), 
	        'form-builder', 
	        'wp_swift_form_builder_plugin_page_section' 
	    );

	    add_settings_field( 
			'wp_swift_form_builder_select_css_framework', 
			__( 'CSS Framework', 'wp-swift-form-builder' ), 
			array($this, 'wp_swift_form_builder_select_css_framework_render'),  
			'form-builder', 
			'wp_swift_form_builder_plugin_page_section' 
	    );
	    add_settings_field( 
			'wp_swift_form_builder_checkbox_debug_mode', 
			__( 'Debug Mode', 'wp-swift-form-builder' ), 
			array($this, 'wp_swift_form_builder_checkbox_debug_mode_render'),  
			'form-builder', 
			'wp_swift_form_builder_plugin_page_section' 
	    );*/
	}

	/*
	 *
	 */
	public function wp_swift_form_builder_google_recaptcha_render(  ) { 
	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?>
	    <p>Google reCAPTCHA protects internet users from spam and abuse wherever they go.</p>
		<table id="table-wp-swift-form-builder-google-recaptcha">
			<tr>
				<td><input type="password" autocomplete="new-password" name="wp_swift_form_builder_settings[wp_swift_form_builder_google_recaptcha][site_key]" value="<?php
			    	if (isset($options['wp_swift_form_builder_google_recaptcha']['site_key']) && $options['wp_swift_form_builder_google_recaptcha']['site_key'] != '') {
			     		echo ''.$options['wp_swift_form_builder_google_recaptcha']['site_key'].'';
			     	}?>">
			     </td>
				<td class="title">Site Key</td>
				<td class="desc">Use this in the HTML code your site serves to users.</i></td>
			</tr>
			<tr>
				<td><input type="password" autocomplete="new-password" name="wp_swift_form_builder_settings[wp_swift_form_builder_google_recaptcha][secret_key]" value="<?php
			    	if (isset($options['wp_swift_form_builder_google_recaptcha']['secret_key']) && $options['wp_swift_form_builder_google_recaptcha']['secret_key'] != '') {
			     		echo ''.$options['wp_swift_form_builder_google_recaptcha']['secret_key'].'';
			     	}?>">
			     </td>
				<td class="title">Secret Key</td>
				<td class="desc">Use this for communication between your site and Google.</i></td>
			</tr>	
			<tr>
				<td><input type="email" name="wp_swift_form_builder_settings[wp_swift_form_builder_google_recaptcha][owner]" value="<?php
			    	if (isset($options['wp_swift_form_builder_google_recaptcha']['owner']) && $options['wp_swift_form_builder_google_recaptcha']['owner'] != '') {
			     		echo ''.$options['wp_swift_form_builder_google_recaptcha']['owner'].'';
			     	}?>">
			     </td>
				<td class="title">Owner</td>
				<td class="desc">The google account to which this is associated.</i></td>
			</tr>						
		</table>
		<p><small>Google reCAPTCHAs must turned on each individual form via the settings tab.</small></p>
	    <?php

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_marketing_api_render(  ) { 
	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?>
	    <input type="password" autocomplete="new-password" name="wp_swift_form_builder_settings[wp_swift_form_builder_marketing_api]" value="<?php
	    	if (isset($options['wp_swift_form_builder_marketing_api']) && $options['wp_swift_form_builder_marketing_api'] != '') {
	     		echo ''.$options['wp_swift_form_builder_marketing_api'].'';
	     	}
	     	?>"> <small>This will be used for GDLP compliant sign up forms.</small>
	    <?php

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_email_template_primary_color_render(  ) { 
	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?>
	    <input type="text" name="wp_swift_form_builder_settings[wp_swift_form_builder_email_template_primary_color]" value="<?php
	    	if (isset($options['wp_swift_form_builder_email_template_primary_color']) && $options['wp_swift_form_builder_email_template_primary_color'] != '') {
	     		echo ''.$options['wp_swift_form_builder_email_template_primary_color'].'';
	     	}
	     	?>"> <small>Primary Colour</small>
	    <?php

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_email_template_secondary_color_render(  ) { 

	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?>
	    <input type="text" name="wp_swift_form_builder_settings[wp_swift_form_builder_email_template_secondary_color]" value="<?php
	    	if (isset($options['wp_swift_form_builder_email_template_secondary_color'])) {
	     	echo $options['wp_swift_form_builder_email_template_secondary_color'];
	     	} ?>"> <small>Secondary Colour</small>
	    <?php

	}	

	/*
	 *
	 */
	public function wp_swift_form_builder_text_field_0_render(  ) { 

	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?>
	    <input type='text' name='wp_swift_form_builder_settings[wp_swift_form_builder_text_field_0]' value='<?php echo $options['wp_swift_form_builder_text_field_0']; ?>'>
	    <?php

	}
	/*
	 *
	 */
	public function wp_swift_form_builder_checkbox_javascript_render(  ) { 

		
	    $options = get_option( 'wp_swift_form_builder_settings' );

	    ?>
	    <input type='checkbox' name='wp_swift_form_builder_settings[wp_swift_form_builder_checkbox_javascript]' <?php 
	     if (isset($options['wp_swift_form_builder_checkbox_javascript'])) {
	         checked( $options['wp_swift_form_builder_checkbox_javascript'], 1 );
	     } 
	    ?> value='1'>
	    <small>You can disable JavaScript here if you prefer to user your own or even not at all.</small>
	    <?php

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_checkbox_css_render(  ) { 

	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?>
	    <input type='checkbox' name='wp_swift_form_builder_settings[wp_swift_form_builder_checkbox_css]' <?php //checked( $options['wp_swift_form_builder_checkbox_css'], 1 );
	        if (isset($options['wp_swift_form_builder_checkbox_css'])) {
	            checked( $options['wp_swift_form_builder_checkbox_css'], 1 );
	        }  ?> value='1'>
	    <small>Same goes for CSS</small>
	    <?php

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_radio_field_2_render(  ) { 

	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?>
	    <input type='radio' name='wp_swift_form_builder_settings[wp_swift_form_builder_radio_field_2]' <?php //checked( $options['wp_swift_form_builder_radio_field_2'], 1 );
	    if (isset($options['wp_swift_form_builder_radio_field_2'])) {
	         checked( $options['wp_swift_form_builder_radio_field_2'], 1 );
	     } ?> value='1'>
	    <?php

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_select_css_framework_render(  ) { 

	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?><select name='wp_swift_form_builder_settings[wp_swift_form_builder_select_css_framework]'>
	        <option value='zurb_foundation' <?php selected( $options['wp_swift_form_builder_select_css_framework'], 'zurb_foundation' ); ?>>Zurb Foundation</option>
	        <option value='bootstrap' <?php selected( $options['wp_swift_form_builder_select_css_framework'], 'bootstrap' ); ?>>Bootstrap</option>
	        <option value='custom' <?php selected( $options['wp_swift_form_builder_select_css_framework'], 'custom' ); ?>>None</option>
	    </select><?php

	}

		/*
	 *
	 */
	public function wp_swift_form_builder_checkbox_debug_mode_render(  ) { 

	    $options = get_option( 'wp_swift_form_builder_settings' );
	    ?><input type="checkbox" name="wp_swift_form_builder_settings[wp_swift_form_builder_checkbox_debug_mode]" value="1" <?php 
	    	if (isset($options['wp_swift_form_builder_checkbox_debug_mode'])) {
	         	checked( $options['wp_swift_form_builder_checkbox_debug_mode'], 1 );
	     	} 
	    ?>>
	    <small><b>Do not use on live sites!</b></small><br>
	    <small>You can set this to debug mode if you are a developer. This will skip default behaviour such as sending emails.</small><?php

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_settings_section_callback(  ) { 

	    echo __( 'Form Builder global settings', 'wp-swift-form-builder' );

	}

	/*
	 *
	 */
	public function wp_swift_form_builder_options_page(  ) { 
	    ?>
	        <div id="form-builder-wrap" class="wrap">
		        <h2>WP Swift: Form Builder</h2>

		        <form action='options.php' method='post'>
		            
		            <?php
		            settings_fields( 'form-builder' );
		            do_settings_sections( 'form-builder' );
		            submit_button();
		            ?>

		        </form>
	        </div>
	    <?php 
	}
}
// Initialize the class
$form_builder_admin_interface_settings = new WP_Swift_Form_Builder_Admin_Interface_Settings();