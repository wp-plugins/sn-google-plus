<?php
    if (!function_exists('SNGP_AdminJS')) {
        function SNGP_AdminJS() {
            wp_enqueue_script('jquery');
            wp_register_script('SNGP_AdminJS', SNGP_PLUGIN_URL . 'js/admin.js');
            wp_enqueue_script('SNGP_AdminJS');
        }
    }
    
    if (!function_exists('SNGP_AdminCSS')) {
        function SNGP_AdminCSS() {
            wp_register_style("SNGP_AdminCSS", SNGP_PLUGIN_URL . 'css/admin.css', null, SNGP_VERSION);
            wp_enqueue_style('SNGP_AdminCSS');
        }

    }
    
    function SNGP_PluginSettings($action_links) {
        $settings_link = '<a href="options-general.php?page='.SNGP_ID.'">' . _e('Settings', 'SNGP') . '</a>';
        array_unshift($action_links, $settings_link);

        return $action_links;
    }
    
    if (!function_exists('SNGP_MenuOptions')) {
        function SNGP_MenuOptions() {
            add_options_page(SNGP_NAME, SNGP_NAME, 'manage_options', SNGP_ID, 'SNGP_SettingsPage');
        }
    }
    

    if (!function_exists('SNGP_SettingsPage')) {

        function SNGP_SettingsPage() {
            global $SNGP_IconsArray, $SNGP_DefaultOptions, $SNGP_buttonLangs;
            $options = get_option("SNGP_Settings");
            if (!is_array($options))
                $options = $SNGP_DefaultOptions;

            if (isset($_POST['SNGP_action']) && !empty($_POST['SNGP_action'])) {
                switch ($_POST['SNGP_action']) {
                    case 'slider':
                        $options['position']            = strip_tags(stripslashes($_POST['position']));
                        $options['left_position']       = intval($_POST['left_position']);
                        $options['top_position']        = intval($_POST['top_position']);
                        $options['logo_position']       = intval($_POST['logo_position']);
                        $options['action']              = strip_tags(stripslashes($_POST['action']));
                        $options['icon']                = strip_tags(stripslashes($_POST['icon']));
                        
                        $options['start_opacity']       = intval($_POST['start_opacity']);
                        $options['open_opacity']        = intval($_POST['open_opacity']);
                        $options['close_opacity']       = intval($_POST['close_opacity']);
                        
                        $options['open_time']           = intval($_POST['open_time']);
                        $options['close_time']          = intval($_POST['close_time']);
                        
                        $options['css_styles']          = strip_tags($_POST['css_styles']);
                    break;
                    case 'primary':
                        $options['pageURL']             = strip_tags(stripslashes($_POST['pageURL']));
                        $options['button_size']         = strip_tags(stripslashes($_POST['button_size']));
                        $options['button_lang']         = (array_key_exists($_POST['button_lang'], $SNGP_buttonLangs)) ? $_POST['button_lang'] : 'en_US';
                        $options['button_count']        = (strip_tags(stripslashes($_POST['button_count'])) == 'true') ? 'true' : 'false'; 
                    break;
                }
                update_option("SNGP_Settings", $options);
            }
            
            $pageURL                = htmlspecialchars($options['pageURL'], ENT_QUOTES);
            $button_lang            = htmlspecialchars($options['button_lang'], ENT_QUOTES);
            $button_size            = htmlspecialchars($options['button_size'], ENT_QUOTES);
            $button_count           = htmlspecialchars($options['button_count'], ENT_QUOTES);
            
            $availableLanguages     = $SNGP_buttonLangs;
            
            $css_styles     = $options['css_styles'];
            
            $position       = $options['position'];
            $top_position   = $options['top_position'];
            $left_position  = $options['left_position'];
            $logo_position  = $options['logo_position'];
            
            $open_time      = $options['open_time'];
            $close_time     = $options['close_time'];
            
            $start_opacity  = $options['start_opacity'];
            $open_opacity   = $options['open_opacity'];
            $close_opacity  = $options['close_opacity'];
            
            $action         = $options['action'];
            $icon           = $options['icon'];
            
            require_once 'admin/main.php';
        }

    }
    add_action('admin_menu', 'SNGP_MenuOptions');
    add_action('admin_init', 'SNGP_AdminJS');
    add_action('admin_init', 'SNGP_AdminCSS');