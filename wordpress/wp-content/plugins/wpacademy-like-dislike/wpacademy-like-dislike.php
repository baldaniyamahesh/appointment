<?php
/*
* Plugin Name: WPacademy Like/Dislike
* Plugin URI: https://wpacademy.pk
* Author: WPacademy.PK
* Author URI: https://wpacademy.pk
* Description: Simple Post Like & Dislike System.
* Version: 1.0.0
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpaclike
*/

//If this file is called directly, abort.
if (!defined( 'WPINC' )) {
    die;
}

//Define Constants
if ( !defined('WPAC_PLUGIN_VERSION')) {
    define('WPAC_PLUGIN_VERSION', '1.0.0');
}
if ( !defined('WPAC_PLUGIN_DIR')) {
    define('WPAC_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

//Include Scripts & Styles
if( !function_exists('wpac_plugin_scripts')) {
    function wpac_plugin_scripts() {
        wp_enqueue_style('wpac-css', WPAC_PLUGIN_DIR. 'assets/css/style.css');
        wp_enqueue_script('wpac-js', WPAC_PLUGIN_DIR. 'assets/js/main.js', 'jQuery', '1.0.0', true );
    }
    add_action('wp_enqueue_scripts', 'wpac_plugin_scripts');
}

//Settings Page HTML
function wpac_settings_page_html() {

 //Check if current user have admin access.
    if(!is_admin()) {
        return;
    }
   ?>
     <div class="wrap">
            
            <form action="options.php" method="post">
            	<?php
                 settings_fields( 'wpac-settings');
                  do_settings_sections( 'wpac-settings');
                   submit_button( 'Save Changes' );
               ?>
            </form>
   <?php
}

//Top Level Administration Menu
function wpac_register_menu_page() {
    add_menu_page( 'WPAC Like System', 'WPAC Settings', 'manage_options', 'wpac-settings', 'wpac_settings_page_html', 'dashicons-thumbs-up', 30 );
}
add_action('admin_menu', 'wpac_register_menu_page');

function wpac_plugin_settings(){

    // register 2 new settings for "wpac-settings" page
    register_setting( 'wpac-settings', 'wpac_like_btn_label' );
    register_setting( 'wpac-settings', 'wpac_dislike_btn_label' );

    // register a new section in the "wpac-setings" page
    add_settings_section( 'wpac_label_settings_section', 'WPAC Button Labels', 'wpac_plugin_settings_section_cb', 'wpac-settings' );

    // register a new field in the "wpac-settings" page
    add_settings_field( 'wpac_like_label_field', 'Like Button Label', 'wpac_like_label_field_cb', 'wpac-settings', 'wpac_label_settings_section' );
    // register a new field in the "wpac-settings" page
    add_settings_field( 'wpac_dislike_label_field', 'Dislike Button Label', 'wpac_dislike_label_field_cb', 'wpac-settings', 'wpac_label_settings_section' );
}
add_action('admin_init', 'wpac_plugin_settings');

// Section callback function
function wpac_plugin_settings_section_cb(){
    echo '<p>Define Button Labels</p>';
}

// Field callback function
function wpac_like_label_field_cb(){ 
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('wpac_like_btn_label');
    // output the field
    ?>
    <input type="text" name="wpac_like_btn_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function wpac_dislike_label_field_cb(){ 
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('wpac_dislike_btn_label');
    // output the field
    ?>
    <input type="text" name="wpac_dislike_btn_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

?>