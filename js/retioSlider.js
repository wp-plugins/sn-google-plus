// retioSlider v0.6.1 - simple box slider based on jQuery
// Copyright (c) 2011-2013 Matthew Lerczak - kiki.diavo@gmail.com
// https://github.com/retio/retioSlider
// Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
(function($) {
$.fn.retioSlider = function(options) {
    var settings = jQuery.extend({
        'action'        : 'hover',
        'direction'     : 'left',
        
        'openLenght'    : 0,   
        'closeLenght'   : 0,   
        
        'openTime'      : 500,   
        'closeTime'     : 500,
        
        'startOpacity'  : 0.75,
        'openOpacity'   : 1,
        'closeOpacity'  : 0.75,
        
        'type'          : 'slider'
    }, options);
    
    if ($(window).width() < 768) {
        return;
    }
    
    var slider  = $(this),
    sContentDIV = $(this).children('.slider-content'),
    sLogoDIV    = $(this).children('.slider-logo'),
    sLogoIMG    = (settings['type'] == 'slider') ? sLogoDIV.children() : sLogoDIV.children().children(),
    
    oDirection  = settings['direction'],
    oLength     = settings['openLenght'],
    cLength     = settings['closeLenght'],

    oTime       = settings['openTime'],
    cTime       = settings['closeTime'],

    oOpacity    = settings['openOpacity'],
    cOpacity    = settings['closeOpacity'],
    sOpacity    = settings['startOpacity'],
    
    action      = settings['action'],
    
    oSettings   = {},
    cSettings   = {},
    sliderCSS   = {};

    slider.addClass('slider-'+oDirection);
    switch (oDirection) {
        case 'left':
        case 'right':
            if (settings['type'] == 'slider') {
                sContentDIV.addClass('slider-float-'+oDirection);
                cLength = -(slider.width() + 1);
            }
        break;
        case 'top':
        case 'bottom':
            if (settings['type'] == 'slider')
               cLength = -(slider.height() + 1);
        break;
    }
    
    if (sLogoIMG.width() || sLogoIMG.height()) {  
        var horizontalSize  = (-sLogoIMG.width() + "px"),
        verticalSize    = (-sLogoIMG.height() + "px");
        
        switch (oDirection) {
            case 'left':
                sLogoDIV.css('right', horizontalSize);
            break;
            case 'right':
                sLogoDIV.css("left", horizontalSize);
            break;
            case 'top':
                sLogoDIV.css('bottom', verticalSize);
            break;
            case 'bottom':
                sLogoDIV.css('top', verticalSize);
            break;
        }
    }
    
    switch (oDirection) {
        case 'left':
        case 'right':
            if (settings['logoPosition'] >= 0)
                sLogoDIV.css('top', settings['logoPosition'] + 'px');                
        break;
        case 'top':
        case 'bottom':
            if (settings['logoPosition'] >= 0)
                sLogoDIV.css('left', settings['logoPosition'] + 'px');     
        break;
    }
    
    if ($.browser.name !== 'msie') {
        sliderCSS['opacity'] = sOpacity;
        oSettings['opacity'] = oOpacity;
        cSettings['opacity'] = cOpacity;
    }
    
    if (settings['type'] == 'slider') {
        oSettings[oDirection] = oLength;
        cSettings[oDirection] = cLength;
    }
    
    switch (oDirection) {
        case 'left':
        case 'right':
            if (settings['topPosition'] >= 0)
                sliderCSS['top'] = settings['topPosition'] + 'px';
        break;
        case 'top':
        case 'bottom':
            if (settings['leftPosition'] >= 0)
                sliderCSS['left'] = settings['leftPosition'] + 'px';
        break;
    }

    sliderCSS[oDirection] = cLength;
    $(this).css(sliderCSS);
    
    sLogoDIV.bind({
        click: function(){
            slider.toggleClass('slider-clicked');
            if (slider.hasClass('slider-clicked')) {
                slider.stop().animate(oSettings, oTime);
            } else {
                slider.stop().animate(cSettings, cTime);
            }
        }
    });
        
   slider.bind({
        mouseenter: function(){
            slider.stop().animate(oSettings, oTime);
        },
        mouseleave: function(){
            slider.stop().animate(cSettings, cTime);
        }
    });
    
    switch (action) {
        case 'click':
            slider.unbind('mouseenter');
            slider.unbind('mouseleave');
        break;
        case 'hover':
            sLogoDIV.unbind('click');
        break;
    }
    
    slider.show();
    return this;
 }})(jQuery);
(function($){$.browserTest=function(a,z){var u='unknown',x='X',m=function(r,h){for(var i=0;i<h.length;i=i+1){r=r.replace(h[i][0],h[i][1]);}return r;},c=function(i,a,b,c){var r={name:m((a.exec(i)||[u,u])[1],b)};r[r.name]=true;r.version=(c.exec(i)||[x,x,x,x])[3];if(r.name.match(/safari/)&&r.version>400){r.version='2.0';}if(r.name==='presto'){r.version=($.browser.version>9.27)?'futhark':'linear_b';}r.versionNumber=parseFloat(r.version,10)||0;r.versionX=(r.version!==x)?(r.version+'').substr(0,1):x;r.className=r.name+r.versionX;return r;};a=(a.match(/Opera|Navigator|Minefield|KHTML|Chrome/)?m(a,[[/(Firefox|MSIE|KHTML,\slike\sGecko|Konqueror)/,''],['Chrome Safari','Chrome'],['KHTML','Konqueror'],['Minefield','Firefox'],['Navigator','Netscape']]):a).toLowerCase();$.browser=$.extend((!z)?$.browser:{},c(a,/(camino|chrome|firefox|netscape|konqueror|lynx|msie|opera|safari)/,[],/(camino|chrome|firefox|netscape|netscape6|opera|version|konqueror|lynx|msie|safari)(\/|\s)([a-z0-9\.\+]*?)(\;|dev|rel|\s|$)/));$.layout=c(a,/(gecko|konqueror|msie|opera|webkit)/,[['konqueror','khtml'],['msie','trident'],['opera','presto']],/(applewebkit|rv|konqueror|msie)(\:|\/|\s)([a-z0-9\.]*?)(\;|\)|\s)/);$.os={name:(/(win|mac|linux|sunos|solaris|iphone)/.exec(navigator.platform.toLowerCase())||[u])[0].replace('sunos','solaris')};if(!z){$('html').addClass([$.os.name,$.browser.name,$.browser.className,$.layout.name,$.layout.className].join(' '));}};$.browserTest(navigator.userAgent);})(jQuery);