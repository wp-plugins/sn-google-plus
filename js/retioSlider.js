// retioSlider v0.3 - simple box slider based on jQuery
// Copyright (c) 2011 Mateusz Lerczak - kiki.diavo@gmail.com
// http://mateuszlerczak.com/retioslider/
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
    
    var sContentDIV = $(this).children('.slider-content');
    var sLogoDIV    = $(this).children('.slider-logo');
    var sLogoIMG    = (settings['type'] == 'slider') ? sLogoDIV.children() : sLogoDIV.children().children();

    var ieSuck      = jQuery.browser.msie;
    
    var oDirection  = settings['direction'];
    var oLength     = settings['openLenght'];
    var cLength     = settings['closeLenght'];

    var oTime       = settings['openTime'];
    var cTime       = settings['closeTime'];

    var oOpacity    = settings['openOpacity'];
    var cOpacity    = settings['closeOpacity'];
    var sOpacity    = settings['startOpacity'];
    
    var action      = settings['action'];
    
    var oSettings   = {};
    var cSettings   = {};
    var sliderCSS   = {};

    $(this).addClass('slider-'+oDirection);
    switch (oDirection) {
        case 'left':
        case 'right':
            if (settings['type'] == 'slider') {
                sContentDIV.addClass('slider-float-'+oDirection);
                cLength = -($(this).width() + 1);
            }
        break;
        case 'top':
        case 'bottom':
            if (settings['type'] == 'slider')
               cLength = -($(this).height() + 1);
        break;
    }
    
    if (sLogoIMG.width() && sLogoIMG.height()) {  
        var horizontalSize  = (-sLogoIMG.width() + "px");
        var verticalSize    = (-sLogoIMG.height() + "px");
        
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
    
    if (!ieSuck) {
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
    
    $(this).bind({
        click: function(){
            $(this).toggleClass('slider-clicked');
            if ($(this).hasClass('slider-clicked')) {
                $(this).stop().animate(oSettings, oTime);
            } else {
                $(this).stop().animate(cSettings, cTime);
            }
        },
        mouseenter: function(){
            $(this).stop().animate(oSettings, oTime);
        },
        mouseleave: function(){
            $(this).stop().animate(cSettings, cTime);
        }
    });
    
    switch (action) {
        case 'click':
            $(this).unbind('mouseenter');
            $(this).unbind('mouseleave');
        break;
        case 'hover':
            $(this).unbind('click');
        break;
    }
    
    $(this).show();
    return this;
 }})(jQuery);