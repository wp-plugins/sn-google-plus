<?php

    if (!function_exists('SNGP_ScriptInit')) {
        function SNGP_ScriptInit() {
            $jsReady = SNGP_JSReady();
            $html .= '<script type="text/javascript">'."\n";
            $html .= "  jQuery(document).ready(function(){jQuery('.".SNGP_ID."').retioSlider({".$jsReady."});});\n";
            $html .= '</script>'."\n";
            return $html;
        }
    }

    if (!function_exists('SNGP_ScriptInitGoogle')) {
        function SNGP_ScriptInitGoogle() {
            global $SNGP_DefaultOptions;

            $options = get_option("SNGP_Settings");
            if (!$options)
                $options = $SNGP_DefaultOptions;   
            
            $lang = $options['button_lang'];
            
            $html .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">'."\n";
            $html .= "  {lang:'$lang'}\n";
            $html .= '</script>'."\n";
            return $html;
        }
    }
    
    if (!function_exists('SNGP_Footer')) {
        function SNGP_Footer() {
            return '<div class="sn-footer-url"><a href="'.SNGP_URL.'" title="'.SNGP_NAME.'">'.SNGP_NAME.'</a></div>'."\n";
        }
    }

    if (!function_exists('SNGP_Button')) {
        function SNGP_Button() {
            global $SNGP_DefaultOptions;

            $options = get_option("SNGP_Settings");
            if (!$options)
                $options = $SNGP_DefaultOptions;   

            
            $imageURL = SNGP_IMAGE_URL . $options['icon'];
            list ($iWidth, $iHeight) = getimagesize(SNGP_IMAGE_DIR . $options['icon']);
            list ($bWidth, $bHeight, $bMarginLeft) = SNGP_BoxDimensions($options['button_size'], $options['button_count']);
            
            
            $html  = '<!-- '.SNGP_NAME.' '.SNGP_VERSION.' START -->'."\n";
            $html .= SNGP_ScriptInitGoogle();
            $html .= SNGP_ScriptInit();
            $html .= '<div class="'.SNGP_ID.' slider-box">'."\n";
            $html .= '  <div class="slider-content" style="overflow:hidden!important;width:'.$bWidth.'px;height:'.$bHeight.'px;'.$options['css_styles'].'">'."\n";
            $html .= '  <div style="margin-left:'.$bMarginLeft.'px">'."\n";
            $html .= '  <g:plusone';
            if ($options['button_count'])
                $html .= ' count="'.$options['button_count'].'"';
            if ($options['pageURL'])
                $html .= ' href="'.$options['pageURL'].'"';
            if ($options['button_size'] && $options['button_size'] != 'normal')
                $html .= ' size="'.$options['button_size'].'"';
            $html .= '></g:plusone>'."\n";
            $html .=    '</div>'."\n";
            $html .=    SNGP_Footer();
            $html .=    '</div>'."\n";
            $html .= '  <div class="slider-logo"><img src="'.$imageURL.'" width="'.$iWidth.'" height="'.$iHeight.'" /></div>'."\n";
            $html .= '</div>'."\n";
            $html .= '<!-- '.SNGP_NAME.' '.SNGP_VERSION.' END -->'."\n";
            echo $html;
        }
    }
    
    if (!function_exists('RetioSlider_CSS')) {
        function RetioSlider_CSS() {
            wp_register_style("SNGP_CSS", SNGP_PLUGIN_URL . 'css/retioSlider.css', null, SNGP_VERSION);
            wp_enqueue_style('SNGP_CSS');
        }
    }
    
    if (!function_exists('RetioSlider_JS')) {
        function RetioSlider_JS() {
            wp_enqueue_script('jquery');
            wp_register_script('SNGP_JS', SNGP_PLUGIN_URL . 'js/retioSlider.min.js');
            wp_enqueue_script('SNGP_JS');
        }
    }
    

/**
 * Others func
 */
    

    function SNGP_JSReady() {
        global $SNGP_DefaultOptions;
        
        $options = get_option("SNGP_Settings");
        if (!$options)
            $options = $SNGP_DefaultOptions;    
        
        $params = array();
        $params['direction'] = $options['position'];
        switch ($params['direction']) {
            case 'left':
            case 'right':
                if ($options['top_position'] >= 0)
                    $params['topPosition'] = $options['top_position'];
            break;
            case 'top':
            case 'bottom':
                if ($options['left_position'] >= 0)
                    $params['leftPosition'] = $options['left_position'];
            break;
        }

        $params['startOpacity'] = $options['start_opacity'] / 100;
        $params['openOpacity']  = $options['open_opacity'] / 100;
        $params['closeOpacity'] = $options['close_opacity'] / 100;

        $params['openTime']     = ($options['open_time'] >= 0) ? $options['open_time'] : 0;
        $params['closeTime']    = ($options['close_time'] >= 0) ? $options['close_time'] : 0;
        $params['action']       = $options['action'];
        $params['logoPosition'] = ($options['logo_position'] >= 0) ? $options['logo_position'] : 0;

        $p = '';
        foreach($params as $name => $value)
            $p .= ((is_int($value) || is_float($value))) ? "'$name':$value," : "'$name':'$value',";

        $p = (substr($p, -1) == ',') ? substr($p, 0, -1) : $p;
        return $p;
    }
    
    function SNGP_BoxDimensions($size, $count) {
        switch (true) {
            case ($size == 'tall'):
                $width  = 80;
                $height = 80; 
                $marginLeft = 15;
            break;
            case ($size == 'small' && $count == 'true'):
                $width  = 80;
                $height = 35; 
                $marginLeft = 5;
            break;
            case ($size == 'small' && $count == 'false'):
                $width  = 80;
                $height = 35; 
                $marginLeft = 28;
            break;
            case ($size == 'medium' && $count == 'true'):
                $width  = 90;
                $height = 40; 
                $marginLeft = 0;
            break;
            case ($size == 'medium' && $count == 'false'):
                $width  = 80;
                $height = 40; 
                $marginLeft = 24;
            break;
            default:
            case ($size == 'normal' && $count == 'true'):
                $width  = 106;
                $height = 44; 
                $marginLeft = 0;
            break;
            case ($size == 'normal' && $count == 'false'):
                $width  = 80;
                $height = 44; 
                $marginLeft = 21;
            break;
        }
        return array($width, $height, $marginLeft);
    }