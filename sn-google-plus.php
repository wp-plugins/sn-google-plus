<?php
/*
  Plugin Name: SN Google Plus
  Plugin URI: http://wp-extend.info/plugins/google/sn-google-plus/
  Description: SN Google Plus button.
  Author: Retio
  Author URI: http://mateuszlerczak.com
  Version: 1.4
  Text Domain: SNGP
  Domain Path: /lang/
 */

    global $wp_version;  

    if (version_compare($wp_version, "3.0", "<"))  
        exit(_e('"SN Google Plus" works on WP 3.0+'));  

    require_once 'define.php';
    require_once 'sn-google-plus-admin.php';
    require_once 'sn-google-plus-functions.php';

    add_action('init', 'RetioSlider_CSS');
    add_action('init', 'RetioSlider_JS');
    add_action('wp_footer', 'SNGP_Button');
    
    load_plugin_textdomain('SNGP', null, SNGP_DIR . '/lang/');