<?php $opacityRange = range(5,100,5); ?>
<h3><?php _e('Slider settings', 'SNGP'); ?></h3>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" id="SNGP_settings">
    <table width="100%" class="options" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="catLeft"><?php _e('Position:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="position" id="position" onchange="SNGP_selectPosition()">
                        <option <?php if ($position == 'left') echo 'selected="selected"'; ?> value="left"><?php _e('left', 'SNGP'); ?></option>
                        <option <?php if ($position == 'right') echo 'selected="selected"'; ?> value="right"><?php _e('right', 'SNGP'); ?></option>
                        <option <?php if ($position == 'top') echo 'selected="selected"'; ?> value="top"><?php _e('top', 'SNGP'); ?></option>
                        <option <?php if ($position == 'bottom') echo 'selected="selected"'; ?> value="bottom"><?php _e('bottom', 'SNGP'); ?></option>
                    </select>
                </td>
                <td class="extra small"><?php _e('Position of slider', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Top position:', 'SNGP'); ?></td>
                <td class="inputTD_small"><input id="topPosition" type="text" name="top_position" value="<?php echo $top_position; ?>" /></td>
                <td class="extra small"><?php _e('Number of pixels from the top edge (Works only at left or right position)', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Left position:', 'SNGP'); ?></td>
                <td class="inputTD_small"><input readonly="readonly" type="text" id="leftPosition" name="left_position" value="<?php echo $left_position; ?>" /></td>
                <td class="extra small"><?php _e('Number of pixels from the left edge (Works only at top or bottom position)', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Logo position:', 'SNGP'); ?></td>
                <td class="inputTD_small"><input type="text" id="leftPosition" name="logo_position" value="<?php echo $logo_position; ?>" /></td>
                <td class="extra small"><?php _e('Logo position in px', 'SNGP'); ?></td>
            </tr>            
            <tr>
                <td class="catLeft"><?php _e('Action:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="action">
                        <option <?php if ($action == 'hover') echo 'selected="selected"'; ?> value="hover"><?php _e('hover', 'SNGP'); ?></option>
                        <option <?php if ($action == 'click') echo 'selected="selected"'; ?> value="click"><?php _e('click', 'SNGP'); ?></option>
                    </select>
                </td>
                <td class="extra small"><?php _e('Slider action after hover or click', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Open time:', 'SNGP'); ?></td>
                <td class="inputTD_small"><input type="text" name="open_time" value="<?php echo $open_time; ?>" /></td>
                <td class="extra small"><?php _e('Slider opening time in ms.', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Close time:', 'SNGP'); ?></td>
                <td class="inputTD_small"><input type="text" name="close_time" value="<?php echo $close_time; ?>" /></td>
                <td class="extra small"><?php _e('Slider closing time in ms.', 'SNGP'); ?></td>
            </tr>
            
            <tr>
                <td class="catLeft"><?php _e('Start opacity:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="start_opacity">
                        <?php foreach ($opacityRange as $k => $oValue): ?>
                        <option <?php if ($start_opacity == $oValue) echo 'selected="selected"'; ?> value="<?php echo $oValue; ?>"><?php echo $oValue; ?>%</option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="extra small"><?php _e('Start opacity of "SN Google Plus" box', 'SNGP'); ?></td>
            </tr>
            
            <tr>
                <td class="catLeft"><?php _e('Open opacity:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="open_opacity">
                        <?php foreach ($opacityRange as $k => $oValue): ?>
                        <option <?php if ($open_opacity == $oValue) echo 'selected="selected"'; ?> value="<?php echo $oValue; ?>"><?php echo $oValue; ?>%</option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="extra small"><?php _e('Open opacity of "SN Google Plus" box', 'SNGP'); ?></td>
            </tr>
            
            <tr>
                <td class="catLeft"><?php _e('Close opacity:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="close_opacity">
                        <?php foreach ($opacityRange as $k => $oValue): ?>
                        <option <?php if ($close_opacity == $oValue) echo 'selected="selected"'; ?> value="<?php echo $oValue; ?>"><?php echo $oValue; ?>%</option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="extra small"><?php _e('Close opacity of "SN Google Plus" box', 'SNGP'); ?></td>
            </tr>
            
            <tr>
                <td class="catLeft"><?php _e('Icon:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <table>
                        <tbody>
                        <?php if (is_array($SNGP_IconsArray) && count($SNGP_IconsArray) > 1): ?>
                            <?php foreach ($SNGP_IconsArray as $k => $fIcon):
                                $checked = ($icon == $fIcon) ? 'checked="checked"' : '';
                             ?>
                            <tr>
                                <td><input <?php echo $checked; ?> type="radio" name="icon" value="<?php echo $fIcon; ?>" /></td>
                                <td style="background-color:#FAFAFA;"><img src="<?php echo SNGP_PLUGIN_URL . 'img/'.$fIcon; ?>" alt="<?php echo $fIcon; ?>" /></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </td>
                <td class="extra small"><?php _e('Slider icon', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"><?php _e('CSS Styles:', 'SNGP'); ?></td>
                <td class="inputTD" colspan="2"><textarea name="css_styles"><?php echo $css_styles; ?></textarea></td>
            </tr>
            <tr>
                <td class="catLeft"></td>
                <td class="extra small" colspan="2"><?php _e('You can overload css styles of slider-content box. ', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"></td>
                <td colspan="2">
                    <input type="hidden" name="SNGP_action" value="slider">
                    <input type="submit" id="SNGPsubmit-icon" name="SNGP_submit" class="button-primary" value="<?php _e('Save settings', 'SNGP'); ?>" />
                </td>
            </tr>
        </tbody>
    </table>
</form>