<?php
/**
 * @package stock-toolkit
 * @version 1.0
 */
/*
Plugin Name: Plugin Toolkit
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is a toolkit plugin for stock theme.
Author: K. M. Didarul
Version: 1.0
Author URI: http://kmdidarul.com/multisite/stocktheme/
Text Domain: stock-toolkit
Domain Path: /languages/
*/

//Exit if accesed directly

if (!defined('ABSPATH')) { exit; }

// Translate direction
load_plugin_textdomain( 'stock-toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
//define
define('stock_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__)) . '/');
define('stock_ACC_PATH', plugin_dir_path( __FILE__));



//PRINT SHORTCODE IN WIDGET
add_filter('widget_text', 'do_shortcode');

//VC Addons load
require_once(stock_ACC_PATH . 'vc-adons/vc-blocks-load.php');

//Theme Shortcode

require_once(stock_ACC_PATH . 'theme-shortcodes/sections.php');

//shortcode depends on visual composer

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(is_plugin_active('js_composer/js_composer.php')){
  require_once(stock_ACC_PATH . 'theme-shortcodes/staff-shortcode.php');
}

//register stock toolkit file

function stock_toolkit_files(){
  wp_enqueue_style( 'owl-carousel', plugin_dir_url( __file__ ). 'assets/css/owl.carousel.min.css');
  wp_enqueue_style( 'plugin-toolkit', plugin_dir_url( __file__ ). 'assets/css/plugin-toolkit.css');
  wp_enqueue_style( 'owl-carousel', plugin_dir_url( __file__ ). 'assets/js/owl.carousel.min.js', array('jquery'), '200202', true);
  wp_enqueue_style( 'plugin-toolkit', plugin_dir_url( __file__ ). 'assets/js/plugin-toolkit.js', array('jquery'), '200203', true);
}

add_action('wp_enqueue_scripts', 'stock_toolkit_files');


add_action( 'woocommerce_after_add_to_cart_button', 'content_after_addtocart_button' );
 
function content_after_addtocart_button() {
echo '<div class="content-section">Add Your HTML, Text Or Image Content Here!</div>';
}

function sv_add_text_above_wc_shop_image() {
    
    echo '<h4 style="text-align: center;">Some sample text</h4>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'sv_add_text_above_wc_shop_image', 9 );



