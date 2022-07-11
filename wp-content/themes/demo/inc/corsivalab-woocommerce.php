<?php
//remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
//remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
//remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
//remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
//remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
//remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
//remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
//remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
//remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5);
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);


//add_action('sortby_checkbox', 'woocommerce_catalog_ordering', 20);
//add_action('corsivalab_all_notices', 'woocommerce_output_all_notices', 10);
//add_action( 'corsivalab_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering', 30 );
//add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);
//add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 90);
//add_action('corsivalab_title_product', 'woocommerce_template_single_title', 5);
//add_action('corsivalab_shortcontent_product', 'woocommerce_template_single_excerpt', 5);
//add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 11);
//add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25);
//add_action('woocommerce_shop_loop_addtocart', 'woocommerce_template_loop_add_to_cart', 15);


//add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby($sortby)
{
  $sortby['sale'] = 'Discount';
  return $sortby;
}

//add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );
function custom_woocommerce_get_catalog_ordering_args($args)
{
  $orderby_value = isset($_GET['orderby']) ? woocommerce_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));

  if ('sale' == $orderby_value) {
    $args['orderby'] = 'date';
    $args['order'] = 'ASC';
  }

  return $args;
}

add_filter('woocommerce_catalog_orderby', 'corsivalab_change_sorting_options_order', 5);
function corsivalab_change_sorting_options_order($options)
{
  $options = array(
    //'title' => 'A-Z',
    //'title-desc' => 'Z-A',
    //'date' => 'Newest',
    //'popularity' => 'Popularity',
    //'sale' => 'Discount',
    'price' => 'Price: low to high',
    'price-desc' => 'Price: high to low',
  );
  unset($options['rating']);
  unset($options['popularity']);
  unset($options['date']);
  return $options;
}




//add_filter( 'woocommerce_single_product_carousel_options', 'corsivalab_flexslider_add_options' );
function corsivalab_flexslider_add_options($options)
{
  $options['directionNav'] = true;
  return $options;
}
add_filter('woocommerce_add_to_cart_fragments', 'corsivalab_cart_count_fragments', 10, 1);
function corsivalab_cart_count_fragments($fragments)
{
  global $woocommerce;

  $cart_count = $woocommerce->cart->get_cart_contents_count();
  $cart_total = $woocommerce->cart->get_total();

  $fragments['.cart-count'] = '<div class="cart-count">' . $cart_count . '</div>';
  $fragments['.cart-total'] = '<div class="cart-total">' . $cart_total . '</div>';


  return $fragments;
}

//add_filter('woocommerce_add_to_cart_fragments', 'corsivalab_cart_mini_fragments');
function corsivalab_cart_mini_fragments($fragments)
{
  ob_start();
  global $woocommerce;
?>
  <div class="woocommerce-minicart-fragment">
    <?php woocommerce_mini_cart(); ?>
  </div>
  <?php $fragments['.woocommerce-minicart-fragment'] = ob_get_clean();
  return $fragments;
}

//remove_action('template_redirect', 'wc_track_product_view', 20);
//add_action('template_redirect', 'corsivalab_wc_track_product_view', 20);
function corsivalab_wc_track_product_view()
{
  if (!is_singular('product')) {
    return;
  }
  global $post;
  if (empty($_COOKIE['woocommerce_recently_viewed'])) {
    $viewed_products = array();
  } else {
    $viewed_products = wp_parse_id_list((array) explode('|', wp_unslash($_COOKIE['woocommerce_recently_viewed'])));
  }
  // Unset if already in viewed products list.
  $keys = array_flip($viewed_products);
  if (isset($keys[$post->ID])) {
    unset($viewed_products[$keys[$post->ID]]);
  }
  $viewed_products[] = $post->ID;
  if (count($viewed_products) > 15) {
    array_shift($viewed_products);
  }
  wc_setcookie('woocommerce_recently_viewed', implode('|', $viewed_products));
}
//add_shortcode('corsivalab-recently-products-viewed', 'corsivalab_recently_viewed_shortcode');
function corsivalab_recently_viewed_shortcode()
{
  $viewed_products = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array) explode('|', wp_unslash($_COOKIE['woocommerce_recently_viewed'])) : array();
  $viewed_products = array_reverse(array_filter(array_map('absint', $viewed_products)));
  ob_start();
  if (!empty($viewed_products)) {
    $product_ids = implode(",", $viewed_products);
    $products_query = new WP_Query(array(
      'post_type'         => 'product',
      'post_status'       => 'publish',
      'post__in' => $viewed_products,
      'posts_per_page' => 3,
    )); ?>
    <div class="viewed-product">
      <?php if ($products_query->have_posts()) : while ($products_query->have_posts()) : $products_query->the_post();
          global $post, $product; ?>
          <div class="product-item">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>">
            </a>
          </div>
      <?php endwhile;
        wp_reset_postdata();
      endif; ?>
    </div>
  <?php } else {
    echo '<div class="viewed-product">You have not seen any product!</div>';
  }
  return ob_get_clean();
}
//add_action('woocommerce_before_checkout_form', 'corsivalab_add_notification_to_cart_checkout', 1);
//add_action('woocommerce_before_cart', 'corsivalab_add_notification_to_cart_checkout', 99);
function corsivalab_add_notification_to_cart_checkout()
{
  $tc_page = tr_options_field('corsivalab_options.tc_page');
  $privacy_page = tr_options_field('corsivalab_options.privacy_page');
  $returns_policies_page = tr_options_field('corsivalab_options.returns_policies_page');
  echo '<div class="notification-cart">By placing your order you agree to our <a href="' . get_page_link($tc_page) . '">Terms & Conditions</a>, <a href="' . get_page_link($privacy_page) . '">Privacy</a> and <a href="' . get_page_link($returns_policies_page) . '">Returns Policies</a>.</div>';
}

//add_filter('woocommerce_breadcrumb_defaults', 'corsivalab_change_breadcrumb_delimiter');
function corsivalab_change_breadcrumb_delimiter($defaults)
{
  // Change the breadcrumb delimeter from '/' to '>'
  $defaults['delimiter'] = '<img src="' . get_stylesheet_directory_uri() . '/assets/icons/Arrow_Grey.png" alt="">';
  return $defaults;
}
add_filter('woocommerce_product_description_heading', 'corsivalab_tab_product_description_heading');
function corsivalab_tab_product_description_heading()
{
  return '';
}
//add_action('woocommerce_single_product_summary', 'corsivalab_form_when_stock_available', 31);
function corsivalab_form_when_stock_available()
{
  global $product;
  if (!$product->is_in_stock()) {  ?>
    <div class="form-email-stock">
      <div class="title-mail">Email when stock available</div>
      <?php echo do_shortcode('[contact-form-7 id="223" title="Email when stock available"]'); ?>
    </div>
  <?php
  }
}
add_filter('woocommerce_product_add_to_cart_text', 'corsivalab_change_text_addtocart');
add_filter('woocommerce_product_single_add_to_cart_text', 'corsivalab_change_text_addtocart', 20, 2);
function corsivalab_change_text_addtocart()
{
  return esc_html__('ADD TO BAG');
}
//add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_by_sku', 10 );
function woocommerce_template_loop_product_title_by_sku()
{
  global $product;
  $sku = $product->get_sku();
  if (!$sku) {
    $sku = $product->name;
  }
  echo '<h2 class="woocommerce-loop-product__title">' . $sku . '</h2>';
}
//add_action('woocommerce_single_product_summary', 'corsivalab_woocommerce_loop_item_cat_func', 6);
//add_action('corsivalab_woocommerce_loop_item_cat', 'corsivalab_woocommerce_loop_item_cat_func');
function corsivalab_woocommerce_loop_item_cat_func()
{
  global $product;
  $id = $product->get_id();
  $term_list = get_the_terms($id, 'product_cat');
  $types = '';
  foreach ($term_list as $term_single) {
    $types .= ucfirst($term_single->slug) . ', ';
  }
  $typesz = rtrim($types, ', ');
  echo '<div class="list-categories">' . $typesz . '</div>';
}
//add_filter( 'woocommerce_format_sale_price', 'corsivalab_invert_formatted_sale_price', 10, 3 );
function corsivalab_invert_formatted_sale_price($price, $regular_price, $sale_price)
{
  return '<ins>' . (is_numeric($sale_price) ? wc_price($sale_price) : $sale_price) . '</ins> <del>' . (is_numeric($regular_price) ? wc_price($regular_price) : $regular_price) . '</del>';
}
function my_commonPriceHtml($price_amt, $regular_price, $sale_price)
{
  $html_price = '';
  //if product is in sale
  if (($price_amt == $sale_price) && ($sale_price != 0)) {
    $html_price .= '<div class="price-inner"><div class="price">';
    $html_price .= '<div class="regular">' . wc_price($sale_price) . '</div>';
    $html_price .= '<div class="sale">' . wc_price($regular_price) . '</div>';
    $html_price .= '</div></div>';
  } //in sale but free
  //   else if (($price_amt == $sale_price) && ($sale_price == 0)) {
  //     $html_price .= '<ins>Free!</ins>';
  //     $html_price .= '<del>' . wc_price($regular_price) . '</del>';
  //   } //not is sale
  //   else if (($price_amt == $regular_price) && ($regular_price != 0)) {
  //     $html_price .= '<div class="price">';
  //     $html_price .= '<div class="regular">' . wc_price($regular_price) . '</div>';
  //     $html_price .= '</div>';
  //   } //for free product
  //   else if (($price_amt == $regular_price) && ($regular_price == 0)) {
  //     $html_price .= '<ins>Free!</ins>';
  //   }
  return $html_price;
}
//add_filter('woocommerce_get_price_html', 'corsivalab_change_product_price_html', 100, 2);
function corsivalab_change_product_price_html($price, $product)
{
  if ($product->is_type('simple')) {
    $regular_price = $product->get_regular_price();
    $sale_price = $product->get_sale_price();
    $price_amt = $product->get_price();
    return my_commonPriceHtml($price_amt, $regular_price, $sale_price);
  } else {
    return $price;
  }
}
//add_action('woocommerce_after_add_to_cart_button', 'woocommerce_enquire_now_button');
function  woocommerce_enquire_now_button()
{
  echo '<div class="sep"></div><a class="enquire-btn" data-fancybox="" data-src="#enquire-popup" href="javascript:;">ENQUIRE NOW</a>';
}
add_action('woocommerce_before_quantity_input_field', 'corsivalab_display_quantity_minus');
function corsivalab_display_quantity_minus()
{
  if (is_product() || is_cart()) {
    echo '<button type="button" class="minus">-</button>';
  }
}
add_action('woocommerce_after_quantity_input_field', 'corsivalab_display_quantity_plus');
function corsivalab_display_quantity_plus()
{
  if (is_product() || is_cart()) {
    echo '<button type="button" class="plus">+</button>';
  }
}
add_action('wp_footer', 'corsivalab_add_cart_quantity_plus_minus');
function corsivalab_add_cart_quantity_plus_minus()
{
  if (is_product() || is_cart()) : ?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('body').on('click', 'button.plus, button.minus', function() {
          // Get current quantity values
          var qty = $(this).parent('.quantity').find('.qty');
          var val = parseFloat(qty.val());
          var max = parseFloat(qty.attr('max'));
          var min = parseFloat(qty.attr('min'));
          var step = parseFloat(qty.attr('step'));
          // Change the value if plus or minus
          if ($(this).is('.plus')) {
            if (max && (max <= val)) {
              qty.val(max);
            } else {
              qty.val(val + step);
            }
          } else {
            if (min && (min >= val)) {
              qty.val(min);
            } else if (val > 1) {
              qty.val(val - step);
            }
          }
          $('.update-cart').prop("disabled", false);
        });
      });
    </script>
  <?php endif;
}
//add_action('woocommerce_after_add_to_cart_button', 'corsivalab_add_to_wishlist', 99);
function corsivalab_add_to_wishlist()
{
  echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}
add_action('woocommerce_cart_actions', 'corsivalab_btn_clear_cart', 1);
function corsivalab_btn_clear_cart()
{
  echo '<a href="' . esc_url(add_query_arg('empty_cart', 'yes')) . '" class="button btn-cart clear-cart">Clear cart</a>';
}
add_action('wp_loaded', 'corsivalab_woocommerce_empty_cart_action', 20);
function corsivalab_woocommerce_empty_cart_action()
{
  if (isset($_GET['empty_cart']) && 'yes' === esc_html($_GET['empty_cart'])) {
    WC()->cart->empty_cart();
    $referer  = wp_get_referer() ? esc_url(remove_query_arg('empty_cart')) : wc_get_cart_url();
    wp_safe_redirect($referer);
  }
}
add_filter('woocommerce_checkout_fields', 'corsivalab_checkout_fields');
function corsivalab_checkout_fields($fields)
{
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_company']);
  //unset($fields['billing']['billing_last_name']);
  // $fields['billing']['billing_first_name']['label'] = false;
  // $fields['billing']['billing_last_name']['label'] = false;
  // $fields['billing']['billing_company']['label'] = false;
  // $fields['billing']['billing_email']['label'] = false;
  // $fields['billing']['billing_country']['label'] = false;
  // $fields['billing']['billing_phone']['label'] = false;
  // $fields['billing']['billing_postcode']['label'] = false;
  $fields['billing']['billing_first_name']['placeholder'] = 'First Name*';
  $fields['billing']['billing_last_name']['placeholder'] = 'Last Name*';
  $fields['billing']['billing_email']['placeholder'] = 'Email*';
  $fields['billing']['billing_phone']['placeholder'] = 'Phone*';
  $fields['billing']['billing_first_name']['priority'] = 1;
  $fields['billing']['billing_last_name']['priority'] = 2;
  $fields['billing']['billing_phone']['priority'] = 89;
  //$fields['billing']['billing_company']['priority'] = 4;
  //$fields['billing']['billing_email']['priority'] = 5;
  // $fields['billing']['billing_email']['class'][0] = 'form-row-wide';
  // $fields['billing']['billing_country']['class'][0] = 'form-row-first';
  // $fields['billing']['billing_phone']['class'][0] = 'form-row-first';


  unset($fields['shipping']['shipping_state']);
  unset($fields['shipping']['shipping_company']);
  //unset($fields['shipping']['shipping_last_name']);
  // $fields['shipping']['shipping_first_name']['label'] = false;
  // $fields['shipping']['shipping_last_name']['label'] = false;
  // $fields['shipping']['shipping_email']['label'] = false;
  // $fields['shipping']['shipping_country']['label'] = false;
  // $fields['shipping']['shipping_phone']['label'] = false;
  // $fields['shipping']['shipping_postcode']['label'] = false;
  $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name*';
  $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name*';
  $fields['shipping']['shipping_email']['placeholder'] = 'Email*';
  $fields['shipping']['shipping_phone']['placeholder'] = 'Phone*';
  // $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name*';
  // $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name*';
  // $fields['shipping']['shipping_email']['placeholder'] = 'Email Address*';
  // $fields['shipping']['shipping_company']['placeholder'] = 'Company Name*';
  // $fields['shipping']['shipping_phone']['placeholder'] = 'Contact Number*';
  $fields['shipping']['shipping_first_name']['priority'] = 1;
  $fields['shipping']['shipping_last_name']['priority'] = 2;
  $fields['shipping']['shipping_phone']['priority'] = 89;
  // $fields['shipping']['shipping_email']['priority'] = 5;
  //$fields['shipping']['shipping_company']['priority'] = 4;
  // $fields['shippin']['shippin_email']['class'][0] = 'form-row-wide';
  //$fields['shipping']['shipping_first_name']['class'][0] = 'form-row-first';
  // $fields['shipping']['shipping_country']['class'][0] = 'form-row-first';
  // $fields['shipping']['shipping_country']['class'][0] = 'form-row-first';
  // $fields['shipping']['shipping_phone']['class'][0] = 'form-row-first';
  // $fields['order']['order_comments']['label'] = false;
  return $fields;
}
add_filter('woocommerce_default_address_fields', 'corsivalab_edit_default_address_fields', 100, 1);
function corsivalab_edit_default_address_fields($fields)
{
  $fields['city']['priority'] = 41;
  // $fields['city']['label'] = false;
  $fields['city']['placeholder'] = 'Town/City';
  $fields['city']['class'][0] = 'form-row-last';
  // $fields['address_1']['label'] = false;
  // $fields['address_1']['priority'] = 7;
  $fields['address_1']['placeholder'] = 'Address Line 1*';
  // $fields['address_2']['label'] = false;
  // $fields['address_2']['priority'] = 8;
  $fields['address_2']['placeholder'] = 'Address Line 2';
  // $fields['postcode']['label'] = false;
  $fields['postcode']['placeholder'] = 'Postcode/Zip*';
  // $fields['postcode']['class'][0] = 'form-row-last';
  return $fields;
}
add_filter('woocommerce_product_tabs', 'corsivalab_rename_and_remove_tabs', 98);
function corsivalab_rename_and_remove_tabs($tabs)
{
  //$tabs['description']['title'] = 'What\'s Included?';    // Rename the description tab
  //$tabs['reviews']['title'] = 'Product Reviews';        // Rename the reviews tab
  //$tabs['description']['priority'] = 1;
  unset($tabs['additional_information']);
  //unset($tabs['reviews']);
  //unset($tabs['description']);
  return $tabs;
}
function corsivalab_add_register_fields()
{ ?>
  <p class="form-row form-row-wide">
    <label><?php esc_html_e('Gender', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    <input type="date" class="input-text form-control" name="reg_dob" id="reg_dob" />
  </p>
  <p class="form-row form-row-wide">
    <label><?php esc_html_e('Date of birth', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    <select type="text" class="input-text form-control" name="reg_gender" id="reg_gender">
      <option>Male</option>
      <option>Female</option>
      <option>None</option>
    </select>
  </p>
<?php
}
//add_action('woocommerce_register_form_start', 'corsivalab_add_register_fields');
function corsivalab_validate_extra_register_fields($username, $email, $validation_errors)
{
  if (isset($_POST['reg_dob']) && empty($_POST['reg_dob'])) {
    $validation_errors->add('reg_dateofbirth_error', 'Date Of Birth is required!');
  }
  if (isset($_POST['reg_gender']) && empty($_POST['reg_gender'])) {
    $validation_errors->add('reg_gender_error', 'Gender is required!');
  }
  return $validation_errors;
}
//add_action('woocommerce_register_post', 'corsivalab_validate_extra_register_fields', 10, 3);
function corsivalab_save_extra_register_fields($customer_id)
{
  if (isset($_POST['reg_dob'])) {
    update_user_meta($customer_id, 'account_dob', sanitize_text_field($_POST['reg_dob']));
    //update_user_meta($customer_id, 'billing_dateofbirth', sanitize_text_field($_POST['reg_dateofbirth']));
  }
  if (isset($_POST['reg_gender'])) {
    update_user_meta($customer_id, 'account_gender', sanitize_text_field($_POST['reg_gender']));
    //update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['reg_contactnumber']));
  }
}
//add_action('woocommerce_created_customer', 'corsivalab_save_extra_register_fields');
//add_filter ( 'woocommerce_account_menu_items', 'corsivalab_remove_my_account_nav' );
function corsivalab_remove_my_account_nav($menu_links)
{
  unset($menu_links['dashboard']); // Remove Dashboard
  unset($menu_links['edit-address']); // Addresses
  unset($menu_links['payment-methods']); // Remove Payment Methods
  unset($menu_links['downloads']); // Disable Downloads
  unset($menu_links['customer-logout']); // Remove Logout link
  $menu_links['orders'] = 'order History';
  return $menu_links;
}
//add_filter ( 'woocommerce_account_menu_items', 'corsivalab_reorder_my_account_menu', 999 );
function corsivalab_reorder_my_account_menu()
{
  //unset( $item['dashboard'] ); // Remove Dashboard
  unset($item['edit-address']); // Addresses
  unset($item['payment-methods']); // Remove Payment Methods
  unset($item['downloads']); // Disable Downloads
  unset($item['customer-logout']); // Remove Logout link
  $item = array(
    'dashboard'       => __('dashboard', 'woocommerce'),
    'edit-account'       => __('Profile', 'woocommerce'),
    'orders'             => __('Orders History', 'woocommerce'),
    'change-password'       => __('Change Password', 'woocommerce'),
  );
  return $item;
}
//add_filter ( 'woocommerce_account_menu_items', 'corsivalab_change_password_link', 40 );
function corsivalab_change_password_link($menu_links)
{
  $menu_links = array_slice($menu_links, 0, 5, true)
    + array('change-password' => 'Change Password')
    + array_slice($menu_links, 5, NULL, true);
  return $menu_links;
}
//add_action( 'init', 'corsivalab_add_endpoint' );
function corsivalab_add_endpoint()
{
  add_rewrite_endpoint('change-password', EP_PAGES);
}
//add_action( 'woocommerce_account_change-password_endpoint', 'corsivalab_change_password_endpoint_content' );
function corsivalab_change_password_endpoint_content()
{ ?>
  <div class="form-change-password">
    <?php wc_get_template('myaccount/form-edit-account.php', array('user' => get_user_by('id', get_current_user_id()))); ?>
  </div>
<?php }
//add_action( 'woocommerce_save_account_details', 'corsivalab_save_account_details', 12, 1 );
function corsivalab_save_account_details($user_id)
{
  // For Favorite color
  if (isset($_POST['account_dob']))
    update_user_meta($user_id, 'account_dob', sanitize_text_field($_POST['account_dob']));
  // For Billing email (added related to your comment)
  if (isset($_POST['account_gender']))
    update_user_meta($user_id, 'account_gender', sanitize_text_field($_POST['account_gender']));
}
//add_filter( 'woocommerce_account_orders_columns','corsivalab_change_view_order_column');
function corsivalab_change_view_order_column($columns = array())
{
  unset($columns['order-total']); // remove Total column
  //unset($columns['order_date']); // remove Date column
  $columns['order-number'] = "Order No.";
  $columns['order-actions'] = "Details";
  return $columns;
}
//add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number', 1, 2);
function change_woocommerce_order_number($order_id, $order)
{
  $prefix = 'S2021-0000000';
  // You can use either one of $order->id (or) $order_id
  // Both will work
  return $prefix . $order->id;
}


//add_filter( 'woocommerce_pagination_args', 	'corsivalab_woo_pagination_arrrow' );
function corsivalab_woo_pagination_arrrow($args)
{

  $args['prev_text'] = file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/dropdown-arrow.svg');
  $args['next_text'] = file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/dropdown-arrow.svg');

  return $args;
}


//remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
//add_action('woocommerce_after_shop_loop', 'corsivalab_woo_pagination', 10);
function corsivalab_woo_pagination()
{
  global $wp_query;
  $big = 999999999; // need an unlikely integer
  $pages = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'type'  => 'array',
    'prev_text' => '<img src="' . get_stylesheet_directory_uri() . '/assets/icons/products-arrow-left.png">',
    'next_text' => '<img src="' . get_stylesheet_directory_uri() . '/assets/icons/dark-arrow-right.png">',
  ));
  if (is_array($pages)) {
    echo '<div class="corsivalab-nav-woocommerce">';
    $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
    $max_paged = $wp_query->max_num_pages;
    $num_max = $max_paged + 1;
    if ($paged != 1) {
      echo $pages[0];
    }
    echo '<span>' . $paged . ' of ' . $max_paged . '</span>';
    if ($paged != $max_paged) {
      echo end($pages);
    }
    echo '</div>';
  }
}

//add_filter( 'woocommerce_package_rates', 'corsivalab_hide_shipping_when_free_is_available', 100 );
function corsivalab_hide_shipping_when_free_is_available($rates)
{
  $free = array();
  foreach ($rates as $rate_id => $rate) {
    if ('free_shipping' === $rate->method_id) {
      $free[$rate_id] = $rate;
      break;
    }
  }
  return !empty($free) ? $free : $rates;
}

add_filter('woocommerce_order_actions', 'bbloomer_show_thank_you_page_order_admin_actions', 9999, 2);

function bbloomer_show_thank_you_page_order_admin_actions($actions, $order)
{
  //    if ( $order->has_status( wc_get_is_paid_statuses() ) ) {
  $actions['view_thankyou'] = 'Display thank you page';
  //    }
  return $actions;
}

add_action('woocommerce_order_action_view_thankyou', 'bbloomer_redirect_thank_you_page_order_admin_actions');

function bbloomer_redirect_thank_you_page_order_admin_actions($order)
{
  $url = $order->get_checkout_order_received_url();
  add_filter('redirect_post_location', function () use ($url) {
    return $url;
  });
}
