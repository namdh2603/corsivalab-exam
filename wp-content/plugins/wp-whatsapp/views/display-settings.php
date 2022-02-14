<table class="form-table">
    <p><?php echo __('Setting text and style for the floating widget.', 'ninjateam-whatsapp') ?></p>
    <tbody>
        <tr>
            <th scope="row"><label for="time_symbols"><?php echo __('Time Symbols', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <input name="time_symbols[hourSymbol]" placeholder="h" type="text" id="time_symbols-hour" value="<?php echo esc_attr($option['time_symbols'][0]) ?>" class="small-text code" style="text-align: center">
                <span>:<span>
                        <input name="time_symbols[minSymbol]" placeholder="m" type="text" id="time_symbols-minutes" value="<?php echo esc_attr($option['time_symbols'][1]) ?>" class="small-text code" style="text-align: center">
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="nta-wa-switch-control"><?php echo __('Show on desktop', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <div class="nta-wa-switch-control">
                    <input type="checkbox" id="nta-wa-switch" name="showOnDesktop" <?php checked($option['showOnDesktop'], 'ON') ?>>
                    <label for="nta-wa-switch" class="green"></label>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="nta-wa-switch-control"><?php echo __('Show on mobile', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <div class="nta-wa-switch-control">
                    <input type="checkbox" id="nta-wa-switch-mb" name="showOnMobile" <?php checked($option['showOnMobile'], 'ON') ?>>
                    <label for="nta-wa-switch-mb" class="green"></label>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="displayCondition"><?php echo __('Display', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <select name="displayCondition" id="displayCondition">
                    <option <?php selected($option['displayCondition'], 'excludePages'); ?> value="excludePages"><?php echo __("Show on all pages except", "ninjateam-whatsapp") ?></option>
                    <option <?php selected($option['displayCondition'], 'includePages'); ?> value="includePages"><?php echo __("Show on these pages...", "ninjateam-whatsapp") ?></option>
                </select>
                <p class="description"><?php _e("Please select 'Show on all pages except' if you want to display the widget on WooCommerce pages.", 'ninjateam-whatsapp') ?></p>
            </td>
        </tr>
        <th scope="row">
            <!-- <label for="widget_show_on_pages">
                <?php // echo __('Select pages', 'ninjateam-whatsapp') ?>
            </label> -->
        </th>
        <td class="nta-wa-pages-content include-pages <?php echo esc_attr($option['displayCondition'] == 'includePages' ? '' : 'hide-select') ?>">
            <input type="checkbox" id="include-pages-checkall" />
            <label for="include-pages-checkall">All</label>
            <ul id="nta-wa-display-pages-list">
                <?php
                $array_includes = $option['includePages'];
                if (!$array_includes) {
                    $array_includes = array();
                }
                foreach ($pages as $page):
                    ?>
                    <li>
                        <input <?php if (in_array($page->ID, $array_includes)) {
                                    echo 'checked="checked"';
                                } ?> name="includePages[]" class="includePages" type="checkbox" value="<?php echo esc_attr($page->ID) ?>" id="nta-wa-hide-page-<?php echo esc_attr($page->ID) ?>" />
                        <label for="nta-wa-hide-page-<?php echo esc_attr($page->ID) ?>"><?php echo esc_html($page->post_title) ?></label>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </td>

        <td class="nta-wa-pages-content exclude-pages <?php echo esc_attr($option['displayCondition'] == 'excludePages' ? '' : 'hide-select') ?>">
            <input type="checkbox" id="exclude-pages-checkall" />
            <label for="exclude-pages-checkall">All</label>
            <ul id="nta-wa-display-pages-list">
                <?php
                $array_excludes = $option['excludePages'];
                if (!$array_excludes) {
                    $array_excludes = array();
                }
                foreach ($pages as $page):
                ?>
                    <li>
                        <input <?php if (in_array($page->ID, $array_excludes)) {
                                    echo 'checked="checked"';
                                } ?> name="excludePages[]" class="excludePages" type="checkbox" value="<?php echo esc_attr($page->ID) ?>" id="nta-wa-show-page-<?php echo esc_attr($page->ID) ?>" />
                        <label for="nta-wa-show-page-<?php echo esc_attr($page->ID) ?>"><?php echo esc_html($page->post_title) ?></label>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>
        </td>
        </tr>
    </tbody>
</table>
<button class="button button-large button-primary wa-save"><?php echo __('Save Changes', 'ninjateam-whatsapp') ?><span></span></button>