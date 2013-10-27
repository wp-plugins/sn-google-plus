// retioSlider v0.5 - simple box slider based on jQuery
// Copyright (c) 2011 Matthew Lerczak - kiki.diavo@gmail.com
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
    
    if (jQuery.support.browser) {
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