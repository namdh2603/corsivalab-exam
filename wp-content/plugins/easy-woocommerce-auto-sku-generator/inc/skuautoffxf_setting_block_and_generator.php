<?php
/**
 * Opening a wrapper hook for a website bar and information and bulk generator
 */


function skuautoffxf_action_open() {
    if ( isset( $_GET['section'] ) && $_GET['section'] === 'skuautoffxf' ){
?>
        <?php add_thickbox(); ?>

		<h1><?php echo __( 'Easy Auto SKU Generator for WooCommerce', 'easy-woocommerce-auto-sku-generator' ); ?></h1>
		<div class="wrapper_setting_ffxf">
		<div class="block_left">

		<div id="postbox-container-2" class="postbox-container postbox">
				<div class="meta-box-sortables">
					<div id="woocommerce_awooc_call_to_rate" class="postbox__ffxf">
					<div class="inside">
					<span class="dashicons dashicons-admin-generic my_generic_two"></span>
							<h2><span><?php echo __( 'Bulk generation SKU', 'easy-woocommerce-auto-sku-generator' ); ?></span></h2>
							<p><?php echo __( 'Some features are not yet available and are under development. Please wait for the update.', 'easy-woocommerce-auto-sku-generator' ); ?></p>
							<hr>

							<div class="mass_generate">
								<div><i class="woocommerce-help-tip" data-tip="<?php echo __( 'This function will save the SKU of the loy of all goods, but first set the settings and save the page. You can also turn off the SKU generation on those products that already have SKU', 'easy-woocommerce-auto-sku-generator' ); ?>"></i> <?php echo __( 'Bulk generate SKU for all products', 'easy-woocommerce-auto-sku-generator' ); ?></div>
								<div><a id="generate_mass_sku" class="button-primary open"><?php echo __( 'Generate all SKU', 'easy-woocommerce-auto-sku-generator' ); ?></a></div>
							</div>
							<hr>
							<div class="mass_generate">
								<div><i class="woocommerce-help-tip" data-tip="<?php echo __( 'You can create SKUs in separate categories. To do this, first save the settings, and then run the generator in the desired category. Thus, you can create more diverse SKUs, for example, with different prefixes.', 'easy-woocommerce-auto-sku-generator' ); ?>"></i> <?php echo __( 'Bulk generate SKU by Category', 'easy-woocommerce-auto-sku-generator' ); ?></div>
								<div><a id="generate_mass_sku_category" name="save" class="button-primary woocommerce-save-button open_category"><?php echo __( 'Generate by Category', 'easy-woocommerce-auto-sku-generator' ); ?></a></div>
							</div>
							<hr>
							<div class="mass_generate">
								<div><i class="woocommerce-help-tip" data-tip="<?php echo __( 'The function is under development and will most likely be available in paid versions.', 'easy-woocommerce-auto-sku-generator' ); ?>"></i> <?php echo __( 'Bulk generate SKU by Attributes', 'easy-woocommerce-auto-sku-generator' ); ?></div>
								<div><button name="save" class="button-primary woocommerce-save-button disabled" disabled><?php echo __( 'Generate by Attributes', 'easy-woocommerce-auto-sku-generator' ); ?></button></div>
							</div>
							<hr>
							<div class="mass_generate">
								<div><i class="woocommerce-help-tip" data-tip="<?php echo __( 'The function is under development and will most likely be available in paid versions.', 'easy-woocommerce-auto-sku-generator' ); ?>"></i> <?php echo __( 'Bulk generate SKU by product tags', 'easy-woocommerce-auto-sku-generator' ); ?></div>
								<div><button name="save" class="button-primary woocommerce-save-button disabled" disabled><?php echo __( 'Generate by tags', 'easy-woocommerce-auto-sku-generator' ); ?></button></div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div id="postbox-container-4" class="postbox-container postbox">
				<div class="meta-box-sortables">
					<div id="woocommerce_awooc_call_to_rate" class="postbox__ffxf">
					<div class="inside">
					<span class="dashicons dashicons-chart-pie"></span>
							<h2><span><?php echo __( 'Recommended Plugins', 'easy-woocommerce-auto-sku-generator' ); ?></span></h2>
							<p><span><?php echo __( 'Let me recommend some plugins that can provide the greatest conversion for your store.', 'easy-woocommerce-auto-sku-generator' ); ?></p>
							<hr>
							<div class="recomendated_plugin_block">
								<div><img src="https://ps.w.org/carousel-upsells-and-related-product-for-woocommerce/assets/icon-256x256.png" alt=""></div>
								<div>
								    <a href="/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=carousel-upsells-and-related-product-for-woocommerce&amp;TB_iframe=true&amp;width=772&amp;height=468" class="thickbox open-plugin-details-ffxf-modal" aria-label="Carousel Upsells and Related Product for Woocommerce" data-title="Carousel Upsells and Related Product for Woocommerce"><h4><?php echo __( 'Carousel Upsells and Related Product for Woocommerce.', 'easy-woocommerce-auto-sku-generator' ); ?></h4></a>
								</div>
							</div>
							<hr>
							<div class="recomendated_plugin_block">
								<div><img src="https://ps.w.org/art-woocommerce-order-one-click/assets/icon.svg" alt=""></div>
								<div>
								<a href="/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=art-woocommerce-order-one-click&amp;TB_iframe=true&amp;width=772&amp;height=468" class="thickbox open-plugin-details-ffxf-modal" aria-label="Art WooCommerce Order One Click" data-title="Art WooCommerce Order One Click"><h4><?php echo __( 'Art WooCommerce Order One Click', 'easy-woocommerce-auto-sku-generator' ); ?></h4></a>
								</div>
							</div>
							<hr>
							<div class="recomendated_plugin_block">
								<div><img src="https://ps.w.org/luckywp-scripts-control/assets/icon-128x128.png" alt=""></div>
								<div>
								<a href="/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=luckywp-scripts-control&amp;TB_iframe=true&amp;width=600&amp;height=550" class="thickbox open-plugin-details-ffxf-modal" aria-label="LuckyWP Scripts Control" data-title="LuckyWP Scripts Control"><h4><?php echo __( 'LuckyWP Scripts Control', 'easy-woocommerce-auto-sku-generator' ); ?></h4></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div id="postbox-container-1" class="postbox-container postbox">
				<div class="meta-box-sortables">
					<div id="woocommerce_awooc_call_to_rate" class="postbox__ffxf">

						<div class="inside inside_icons">
							<span class="dashicons dashicons-businessperson"></span>
							<h2><span><?php echo __( 'Message from the author', 'easy-woocommerce-auto-sku-generator' ); ?></span></h2>
							<p><?php echo __( 'New function “Bulk generate SKU for all products” has been added. You can mass update the SKU now, but before save the general settings.', 'easy-woocommerce-auto-sku-generator' ); ?></p>
							<p><?php echo __( 'We will refine the function of mass generation and add new functions. We are waiting your advice on the', 'easy-woocommerce-auto-sku-generator' ); ?> <a href="https://wordpress.org/support/plugin/easy-woocommerce-auto-sku-generator/" target="_blank"><?php echo __( 'support forum', 'easy-woocommerce-auto-sku-generator' ); ?></a>.</p>
							<p><?php echo __( 'Some functions will be available only in the professional version of the plugin. The most active installers and testers are waiting gifts – pro version the plugin "Easy Auto SKU Generator for WooCommerce".', 'easy-woocommerce-auto-sku-generator' ); ?></p>
						</div>
					</div>
				</div>
			</div>

			<div id="postbox-container-3" class="postbox-container postbox">
				<div class="meta-box-sortables">
					<div id="woocommerce_awooc_call_to_rate" class="postbox__ffxf">
					<div class="inside">
					<span class="dashicons dashicons-buddicons-topics"></span>
							<h2><span><?php echo __( 'Donate to development', 'easy-woocommerce-auto-sku-generator' ); ?></span></h2>

							<p><?php echo __( 'You can make a donation to make the plugin Easy Auto SKU Generator for WooCommerce even better!', 'easy-woocommerce-auto-sku-generator' ); ?></p>

							<p><?php echo __( 'Choose how much you want to donate?', 'easy-woocommerce-auto-sku-generator' ); ?></p>
                                <div class="slidecontainer">
                                  <input type="range" min="4" max="100" value="50" class="slider" id="myRange">
                                </div>

                            <p class="center"><a id="donate" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?&cmd=_xclick&business=studia55x5@yandex.ru&currency_code=USD&amount=4&item_name=On%20coffee%20for%20the%20developer"><?php echo __( 'To donate', 'easy-woocommerce-auto-sku-generator' ); ?> $<span id="demo">51</span></a> </p>
                            <p class="center"><a href="https://wordpress.org/support/plugin/easy-woocommerce-auto-sku-generator/reviews/" target="_blank"><?php echo __( 'Leave feedback on the official repository', 'easy-woocommerce-auto-sku-generator' ); ?></a></p>
						</div>
					</div>
				</div>
			</div>




		</div>

		<div><span class="dashicons dashicons-rest-api my_generic"></span>
	<?php
    }
}
add_action( 'woocommerce_settings_products', 'skuautoffxf_action_open' );

function skuautoffxf_modal_setting() {
	if ( isset( $_GET['section'] ) && $_GET['section'] === 'skuautoffxf' ) { ?>

	    <!-- MODAL - Bulk generate SKU for all products -->
        <div class="ffxf-modal-frame modal_generate">
            <div class="ffxf-modal">
                 <div class="ffxf-modal-inset">
                    <div class="button close"><i class="dashicons dashicons-no-alt"></i></div>
                        <div class="ffxf-modal-body">
                            <h2><?php echo __( 'Bulk generate SKU for all products', 'easy-woocommerce-auto-sku-generator' ); ?></h2>
                            <p id="text_generate_modal"><?php echo __( 'If you saved the general settings, you can continue. Based on the saved settings, the next step will be performed. After clicking on the button “Create SKU for all products”, the creation process for all goods will be launched in your online store, and this will take some time.', 'easy-woocommerce-auto-sku-generator' ); ?></p>

                            <button class="generate_button"><?php echo __( 'Create SKU for all products', 'easy-woocommerce-auto-sku-generator' ); ?></button>

                            <label for="check_generate" id="check_gen">
                                <input id="check_generate" name="check_generate" type="checkbox" class="checkbox check_generate_on">  <?php echo __( 'Re-create existing SKUs?', 'easy-woocommerce-auto-sku-generator' ); ?>
                            </label>

                            <div class="progress-pie-chart" data-percent="1" style="display:none">
                              <div class="ppc-progress">
                                <div class="ppc-progress-fill"></div>
                              </div>
                              <div class="ppc-percents">
                                <div class="pcc-percents-wrapper">
                                  <span id="chet">%</span>
                                </div>
                              </div>
                            </div>

                            <p class="ps"><?php echo __( 'There are', 'easy-woocommerce-auto-sku-generator' ); ?> <?php echo wp_count_posts('product')->publish; ?> <?php echo __( 'products in your store.', 'easy-woocommerce-auto-sku-generator' ); ?></p>
                            <div class="over">
                            <div class="my-posts"></div>
                            </div>
                        </div>
                 </div>
            </div>
        </div>

        <!-- MODAL - Bulk generate SKU by Category -->

        <div class="ffxf-modal-frame modal_generate_category">
            <div class="ffxf-modal">
                 <div class="ffxf-modal-inset">
                    <div class="button close_category"><i class="dashicons dashicons-no-alt"></i></div>
                        <div class="ffxf-modal-body">
                            <h2><?php echo __( 'Bulk generate SKU by Category', 'easy-woocommerce-auto-sku-generator' ); ?></h2>
                            <p id="text_generate_modal"><?php echo __( 'If you saved the general settings, you can continue. Based on the saved settings, the next step will be performed. To get started, select a category and then click on "Generate SKU by Category". If you check the box "Re-create existing SKUs?" then SKU will be recreated.', 'easy-woocommerce-auto-sku-generator' ); ?></p>

                            <?php echo wc_product_dropdown_categories(); ?>
                            <br>

                            <button class="generate_button_category"><?php echo __( 'Generate SKU by Category', 'easy-woocommerce-auto-sku-generator' ); ?></button>

                            <label for="check_generate_category" id="check_gen">
                                <input id="check_generate_category" name="check_generate_category" type="checkbox" class="checkbox check_generate_on">  <?php echo __( 'Re-create existing SKUs?', 'easy-woocommerce-auto-sku-generator' ); ?>
                            </label>

                            <div class="progress-pie-chart" data-percent="1" style="display:none">
                              <div class="ppc-progress">
                                <div class="ppc-progress-fill"></div>
                              </div>
                              <div class="ppc-percents">
                                <div class="pcc-percents-wrapper">
                                  <span id="chet">%</span>
                                </div>
                              </div>
                            </div>

                            <p class="ps"><?php echo __( 'There are', 'easy-woocommerce-auto-sku-generator' ); ?> <?php echo wp_count_posts('product')->publish; ?> <?php echo __( 'products in your store.', 'easy-woocommerce-auto-sku-generator' ); ?></p>
                            <div class="over">
                            <div class="my-posts"></div>
                            </div>
                        </div>
                 </div>
            </div>
        </div>

        <div class="ffxf-modal-overlay"></div>
	<?php }
	}
add_action( 'admin_footer', 'skuautoffxf_modal_setting', 999 );

/**
 * Add generate all product
 */
require_once ( plugin_dir_path(__FILE__) . 'generate_all.php' );

/**
 * Add generate all product by category
 */
require_once ( plugin_dir_path(__FILE__) . 'generate_category.php' );

add_action( 'admin_init', 'register_my_setting' );
function register_my_setting() {
	register_setting( 'my_options_group', 'my_option_name', 'intval' );
}