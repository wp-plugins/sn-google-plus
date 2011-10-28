<?php
define('SNGP_ID', 'SN-Google-Plus');
define('SNGP_NAME', 'SN Google Plus');
define('SNGP_VERSION', '1.1');
define('SNGP_AUTHOR', 'Mateusz "Retio" Lerczak');

define('SNGP_DIR', basename(dirname(__FILE__)));
define('SNGP_IMAGE_DIR', WP_PLUGIN_DIR. '/' . SNGP_DIR . '/img/');
define('SNGP_IMAGE_URL', WP_PLUGIN_URL. '/' . SNGP_DIR . '/img/');

define('SNGP_MAIN_FILE', SNGP_DIR.'.php');
define('SNGP_PLUGIN_URL', WP_PLUGIN_URL . '/' . SNGP_DIR . '/');

define('SNGP_FB_URL', 'https://www.facebook.com/pages/SN-Google-Plus/223052061093742');
define('SNGP_URL', 'http://mateuszlerczak.com/sn-google-plus/');

define('SNGP_BLOG_URL', str_replace("https://", "http://", get_bloginfo('wpurl')));

$SNGP_DefaultOptions = array(
    'pageURL'               => '',
    'button_lang'           => (WPLANG == 'pl_PL') ? 'pl' : 'en_US',
    'button_size'           => 'tall',
    'button_count'          => 'true',
    'position'              => 'left',
    'left_position'         => 50,
    'top_position'          => 150,
    'logo_position'         => 0,
    'action'                => 'hover',
    'icon'                  => 'left.png',
    'open_time'             => 500,
    'close_time'            => 500,
    'start_opacity'         => 75,
    'open_opacity'          => 100,
    'close_opacity'         => 75,
    'css_styles'            => 'border:0;-webkit-border-bottom-left-radius: 10px;-moz-border-radius-bottomleft: 10px;border-bottom-left-radius: 10px;'
);

$SNGP_IconsArray = array(
    'left.png',
    'right.png',
    'top.png',
    'bottom.png',
    'sngp-icon1.png',
    'sngp-icon2.png',
    'sngp-icon3.png',
    'sngp-icon4.png',
    'sngp-icon5.png',
    'sngp-icon6.png',
    'sngp-icon7.png',
    'sngp-icon8.png',
);

$SNGP_buttonLangs = array(
    'ar' => 'العربية',
    'bg' => 'български',
    'ca' => 'català',
    'zh-CN' => '中文 ‏（簡体）',
    'zh-TW' => '中文 ‏（繁體）',
    'hr' => 'hrvatski',
    'cs' => 'čeština',
    'da' => 'dansk',
    'nl' => 'Nederlands',
    'en-US' => 'English ‏(US)',
    'en-GB' => 'English ‏(UK)',
    'et' => 'eesti',
    'fil' => 'Filipino',
    'fi' => 'suomi',
    'fr' => 'français',
    'de' => 'Deutsch',
    'el' => 'Ελληνικά',
    'iw' => 'עברית',
    'hi' => 'हिन्दी',
    'hu' => 'magyar',
    'id' => 'Bahasa Indonesia',
    'it' => 'italiano',
    'ja' => '日本語',
    'ko' => '한국어',
    'lv' => 'latviešu',
    'lt' => 'lietuvių',
    'ms' => 'Bahasa Melayu',
    'no' => 'norsk',
    'fa' => 'فارسی',
    'pl' => 'polski',
    'pt-BR' => 'português ‏(Brasil)',
    'pt-PT' => 'Português ‏(Portugal)',
    'ro' => 'română',
    'ru' => 'русский',
    'sr' => 'српски',
    'sv' => 'svenska',
    'sk' => 'slovenský',
    'sl' => 'slovenščina',
    'es' => 'español',
    'es-419' => 'español ‏(Latinoamérica y el Caribe)',
    'th' => 'ไทย',
    'tr' => 'Türkçe',
    'uk' => 'українська',
    'vi' => 'Tiếng Việt'
);