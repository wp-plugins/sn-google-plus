<form method="post" id="SNGP_settings">
    <table width="100%" class="options">
        <tbody>
            <tr>
                <td class="catLeft"><?php _e('Page URL:', 'SNGP'); ?></td>
                <td><input type="text" name="pageURL" value="<?php echo $pageURL; ?>" /></td>
            </tr>
            <tr>
                <td class="catLeft"></td>
                <td class="extra small"><?php _e('e.g. <i>' . SNGP_BLOG_URL . '</i>', 'SNGP'); ?></td>
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Size:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="button_size">
                        <option <?php if ($button_size == 'small') echo 'selected="selected"'; ?> value="small"><?php _e('small', 'SNGP'); ?></option>
                        <option <?php if ($button_size == 'medium') echo 'selected="selected"'; ?> value="medium"><?php _e('medium', 'SNGP'); ?></option>
                        <option <?php if ($button_size == 'normal') echo 'selected="selected"'; ?> value="normal"><?php _e('normal', 'SNGP'); ?></option>
                        <option <?php if ($button_size == 'tall') echo 'selected="selected"'; ?> value="tall"><?php _e('tall', 'SNGP'); ?></option>
                    </select>
                </td>
                <td class="extra small"><?php _e('Determines the button size.', 'SNGP'); ?></td>                
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Add counter:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="button_count">
                        <option <?php if ($button_count == 'true') echo 'selected="selected"'; ?> value="true"><?php _e('yes', 'SNGP'); ?></option>
                        <option <?php if ($button_count == 'false') echo 'selected="selected"'; ?> value="false"><?php _e('no', 'SNGP'); ?></option>
                    </select>
                </td>
                <td class="extra small"><?php _e('Determines the button size.', 'SNGP'); ?></td>                
            </tr>
            <tr>
                <td class="catLeft"><?php _e('Language:', 'SNGP'); ?></td>
                <td class="inputTD">
                    <select name="button_lang">
                    <?php foreach ($availableLanguages as $langCode => $langName): ?>
                        <option <?php if ($button_lang == $langCode) echo 'selected="selected"'; ?> value="<?php echo $langCode; ?>"><?php echo $langName; ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
                <td class="extra small"><?php _e('Button language.', 'SNGP'); ?></td>                
            </tr>
            
            
            <tr>
                <td class="catLeft"><input type="hidden" name="SNGP_action" value="primary" /></td>
                <td><input type="submit" id="SNGPsubmit" name="SNGPsubmit" class="button-primary" value="<?php _e('Save settings', 'SNGP'); ?>" /></td>
            </tr>
        </tbody>
    </table>
</form>