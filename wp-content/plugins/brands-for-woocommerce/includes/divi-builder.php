<?php
function berocket_apl_et_builder_ready() {
    if( class_exists('ET_Builder_Module') ) {
        class ET_Builder_Module_brands_by_name extends ET_Builder_Module {
            function init() {
                $this->name       = __( 'Brands by Name', 'brands-for-woocommerce' );
                $this->slug       = 'et_pb_brands_by_name';

                $this->whitelisted_fields = array(
                    'image',
                    'imgh',
                    'imgw',
                    'text',
                    'column',
                    'position',
                    'style',
                );

                $this->fields_defaults = array(
                    'image' => array('off'),
                    'imgh' => array( '64px', 'add_default_setting' ),
                    'text' => array('on', 'add_default_setting'),
                    'column' => array( 2, 'add_default_setting' ),
                    'position' => array( '1' ),
                    'style' => array( 'vertical' ),
                );
            }

            function get_fields() {
                $fields = array(
                    'image' => array(
                        "label"             => esc_html__( 'Display image', 'brands-for-woocommerce' ),
                        'type'              => 'yes_no_button',
                        'options'           => array(
                            'off' => esc_html__( "No", 'et_builder' ),
                            'on'  => esc_html__( 'Yes', 'et_builder' ),
                        ),
                    ),
                    'imgh' => array(
                        "label"             => esc_html__( 'Maximum image height', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'imgw' => array(
                        "label"             => esc_html__( 'Maximum image width', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'text' => array(
                        "label"             => esc_html__( 'Display name', 'brands-for-woocommerce' ),
                        'type'              => 'yes_no_button',
                        'options'           => array(
                            'off' => esc_html__( "No", 'et_builder' ),
                            'on'  => esc_html__( 'Yes', 'et_builder' ),
                        ),
                    ),
                    'column' => array(
                        "label"             => esc_html__( 'Columns', 'brands-for-woocommerce' ),
                        'type'              => 'number',
                    ),
                    'position' => array(
                        "label"           => esc_html__( 'Position', 'brands-for-woocommerce' ),
                        'type'            => 'select',
                        'options'         => array(
                            '1' => esc_html__( 'Name after image', 'brands-for-woocommerce' ),
                            '2'  => esc_html__( 'Name before image', 'brands-for-woocommerce' ),
                            '3'  => esc_html__( 'Name under image', 'brands-for-woocommerce' ),
                            '4'  => esc_html__( 'Show only on letter click', 'brands-for-woocommerce' ),
                        ),
                    ),
                    'style' => array(
                        "label"           => esc_html__( 'Style', 'brands-for-woocommerce' ),
                        'type'            => 'select',
                        'options'         => array(
                            'vertical' => esc_html__( 'Vertical', 'brands-for-woocommerce' ),
                            'horizontal'  => esc_html__( 'Horizontal', 'brands-for-woocommerce' ),
                        ),
                    ),
                    'color' => array(
                        "label"           => esc_html__( 'Color', 'brands-for-woocommerce' ),
                        'type'            => 'color',
                        'options'         => array(
                            'vertical' => esc_html__( 'Vertical', 'brands-for-woocommerce' ),
                            'horizontal'  => esc_html__( 'Horizontal', 'brands-for-woocommerce' ),
                        ),
                    ),
                );

                return $fields;
            }

            function shortcode_callback( $atts, $content = null, $function_name = '' ) {
                $atts['image'] = ! empty($atts['image']) && $atts['image'] == 'on';
                $atts['text'] = empty($atts['text']) || $atts['text'] == 'on';

                $BeRocket_product_brand = BeRocket_product_brand::getInstance();

                return $BeRocket_product_brand->brands_catalog_shortcode($atts);
            }

            protected function _add_additional_border_fields() {
                parent::_add_additional_border_fields();

                $this->advanced_options["border"]['css'] = array(
                    'main' => array(
                        'border_radii'  => "%%order_class%% .et_pb_image_wrap",
                        'border_styles' => "%%order_class%% .et_pb_image_wrap",
                    )
                );

            }
        }
        new ET_Builder_Module_brands_by_name;
        class ET_Builder_Module_brands_list extends ET_Builder_Module {
            function init() {
                $this->name       = __( 'Brands List', 'brands-for-woocommerce' );
                $this->slug       = 'et_pb_brands_list';

                $this->whitelisted_fields = array(
                    'use_image',
                    'imgh',
                    'text',
                    'hide_empty',
                    'slider',
                    'per_row',
                    'count',
                    'orderby',
                    'padding',
                    'border_color',
                    'border_width',
                );

                $this->fields_defaults = array(
                    'use_image' => array('on', 'add_default_setting'),
                    'imgh' => array( '64px', 'add_default_setting' ),
                    'text' => array('off', 'add_default_setting'),
                    'hide_empty' => array('on', 'add_default_setting'),
                    'slider' => array('off', 'add_default_setting'),
                    'per_row' => array('3', 'add_default_setting'),
                    'count' => array('', 'add_default_setting'),
                    'orderby' => array('name', 'add_default_setting'),
                    'padding' => array('3px', 'add_default_setting'),
                    'border_color' => array('', 'add_default_setting'),
                    'border_width' => array('', 'add_default_setting'),
                );
            }

            function get_fields() {
                $fields = array(
                    'title' => array(
                        "label"             => esc_html__( 'Title', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'use_image' => array(
                        "label"             => esc_html__( 'Display image', 'brands-for-woocommerce' ),
                        'type'              => 'yes_no_button',
                        'options'           => array(
                            'off' => esc_html__( "No", 'et_builder' ),
                            'on'  => esc_html__( 'Yes', 'et_builder' ),
                        ),
                    ),
                    'imgh' => array(
                        "label"             => esc_html__( 'Image height', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'use_name' => array(
                        "label"             => esc_html__( 'Display name', 'brands-for-woocommerce' ),
                        'type'              => 'yes_no_button',
                        'options'           => array(
                            'off' => esc_html__( "No", 'et_builder' ),
                            'on'  => esc_html__( 'Yes', 'et_builder' ),
                        ),
                    ),
                    'hide_empty' => array(
                        "label"             => esc_html__( 'Hide brands without products', 'brands-for-woocommerce' ),
                        'type'              => 'yes_no_button',
                        'options'           => array(
                            'off' => esc_html__( "No", 'et_builder' ),
                            'on'  => esc_html__( 'Yes', 'et_builder' ),
                        ),
                    ),
                    'slider' => array(
                        "label"             => esc_html__( 'Display as slider', 'brands-for-woocommerce' ),
                        'type'              => 'yes_no_button',
                        'options'           => array(
                            'off' => esc_html__( "No", 'et_builder' ),
                            'on'  => esc_html__( 'Yes', 'et_builder' ),
                        ),
                    ),
                    'per_row' => array(
                        "label"             => esc_html__( 'Brands per row', 'brands-for-woocommerce' ),
                        'type'              => 'number',
                    ),
                    'count' => array(
                        "label"             => esc_html__( 'Number of brands', 'brands-for-woocommerce' ),
                        'type'              => 'number',
                    ),
                    'orderby' => array(
                        "label"           => esc_html__( 'Order By', 'brands-for-woocommerce' ),
                        'type'            => 'select',
                        'options'         => array(
                            'name' => esc_html__( 'Brand name', 'brands-for-woocommerce' ),
                            'count'  => esc_html__( 'Count of products', 'brands-for-woocommerce' ),
                        ),
                    ),
                    'padding' => array(
                        "label"             => esc_html__( 'Padding around brands', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'border_color' => array(
                        "label"           => esc_html__( 'Border color', 'brands-for-woocommerce' ),
                        'type'            => 'color',
                    ),
                    'border_width' => array(
                        "label"             => esc_html__( 'Border width', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                );

                return $fields;
            }

            function shortcode_callback( $atts, $content = null, $function_name = '' ) {
                $atts['use_image'] = empty($atts['use_image']) || $atts['use_image'] == 'on';
                $atts['use_name'] = ! empty($atts['use_name']) && $atts['use_name'] == 'on';
                $atts['hide_empty'] = empty($atts['hide_empty']) || $atts['hide_empty'] == 'on';
                $atts['slider'] = ! empty($atts['slider']) && $atts['slider'] == 'on';

                $BeRocket_product_brand = BeRocket_product_brand::getInstance();

                return $BeRocket_product_brand->brands_list_shortcode($atts);
            }

            protected function _add_additional_border_fields() {
            }
        }
        new ET_Builder_Module_brands_list;
        class ET_Builder_Module_brands_products extends ET_Builder_Module {
            function init() {
                $this->name       = __( 'Brands Products', 'brands-for-woocommerce' );
                $this->slug       = 'et_pb_brands_products';

                $this->whitelisted_fields = array(
                    'brand_id',
                    'brand_slug',
                    'columns',
                    'orderby',
                    'order',
                );

                $this->fields_defaults = array(
                    'brand_id' => array('', 'add_default_setting'),
                    'brand_slug' => array('', 'add_default_setting'),
                    'columns' => array( '4', 'add_default_setting' ),
                    'orderby' => array('title', 'add_default_setting'),
                    'order' => array('desc', 'add_default_setting'),
                );
            }

            function get_fields() {
                $fields = array(
                    'brand_id' => array(
                        "label"             => esc_html__( 'brand ID(s)', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'brand_slug' => array(
                        "label"             => esc_html__( 'brand slug(s)', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'columns' => array(
                        "label"             => esc_html__( 'count of columns for product list', 'brands-for-woocommerce' ),
                        'type'              => 'number',
                    ),
                    'orderby' => array(
                        "label"           => esc_html__( 'Order By', 'brands-for-woocommerce' ),
                        'type'            => 'select',
                        'options'         => array(
                            'title' => esc_html__( 'Order by title', 'brands-for-woocommerce' ),
                            'name' => esc_html__( 'Order by post name (post slug)', 'brands-for-woocommerce' ),
                            'date' => esc_html__( 'Order by date', 'brands-for-woocommerce' ),
                            'modified' => esc_html__( 'Order by last modified date', 'brands-for-woocommerce' ),
                            'rand' => esc_html__( 'Random order', 'brands-for-woocommerce' ),
                        ),
                    ),
                    'order' => array(
                        "label"           => esc_html__( 'Order Type', 'brands-for-woocommerce' ),
                        'type'            => 'select',
                        'options'         => array(
                            'asc' => esc_html__( 'ascending', 'brands-for-woocommerce' ),
                            'desc'  => esc_html__( 'descending', 'brands-for-woocommerce' ),
                        ),
                    ),
                );

                return $fields;
            }

            function shortcode_callback( $atts, $content = null, $function_name = '' ) {

                $BeRocket_product_brand = BeRocket_product_brand::getInstance();

                return $BeRocket_product_brand->products_shortcode($atts);
            }

            protected function _add_additional_border_fields() {
            }
        }
        new ET_Builder_Module_brands_products;
        class ET_Builder_Module_product_brands_info extends ET_Builder_Module {
            function init() {
                $this->name       = __( 'Brand info for product page', 'brands-for-woocommerce' );
                $this->slug       = 'et_pb_product_brands_info';

                $this->whitelisted_fields = array(
                    'type',
                    'product_id',
                );

                $this->fields_defaults = array(
                    'type' => array('name,image,description', 'add_default_setting'),
                    'product_id' => array('', 'add_default_setting'),
                );
            }

            function get_fields() {
                $fields = array(
                    'type' => array(
                        "label"             => esc_html__( 'Data type', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'product_id' => array(
                        "label"             => esc_html__( 'Product ID', 'brands-for-woocommerce' ),
                        'type'              => 'number',
                    ),
                );

                return $fields;
            }

            function shortcode_callback( $atts, $content = null, $function_name = '' ) {
                $BeRocket_product_brand = BeRocket_product_brand::getInstance();

                return $BeRocket_product_brand->shortcode_product_brands_info($atts);
            }

            protected function _add_additional_border_fields() {
            }
        }
        new ET_Builder_Module_product_brands_info;
        class ET_Builder_Module_brands_info extends ET_Builder_Module {
            function init() {
                $this->name       = __( 'Brand info', 'brands-for-woocommerce' );
                $this->slug       = 'et_pb_brands_info';

                $this->whitelisted_fields = array(
                    'type',
                    'id',
                );

                $this->fields_defaults = array(
                    'type' => array('name,image,description', 'add_default_setting'),
                    'id' => array('', 'add_default_setting'),
                );
            }

            function get_fields() {
                $fields = array(
                    'type' => array(
                        "label"             => esc_html__( 'Data type', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'id' => array(
                        "label"             => esc_html__( 'Brand ID', 'brands-for-woocommerce' ),
                        'type'              => 'number',
                    ),
                );

                return $fields;
            }

            function shortcode_callback( $atts, $content = null, $function_name = '' ) {
                $BeRocket_product_brand = BeRocket_product_brand::getInstance();

                return $BeRocket_product_brand->shortcode_brands_info($atts);
            }

            protected function _add_additional_border_fields() {
            }
        }
        new ET_Builder_Module_brands_info;
        class ET_Builder_Module_brands_product_thumbnail extends ET_Builder_Module {
            function init() {
                $this->name       = __( 'Brand thumbnail', 'brands-for-woocommerce' );
                $this->slug       = 'et_pb_brands_product_thumbnail';
                $this->fb_support = true;

                $this->whitelisted_fields = array(
                    'post_id',
                    'width',
                    'height',
                    'position',
                );

                $this->fields_defaults = array(
                    'post_id' => array('', 'add_default_setting'),
                    'width' => array('35%', 'add_default_setting'),
                    'height' => array('', 'add_default_setting'),
                    'position' => array('right', 'add_default_setting'),
                );
            }

            function get_fields() {
                $fields = array(
                    'post_id' => array(
                        "label"             => esc_html__( 'Product ID', 'brands-for-woocommerce' ),
                        'type'              => 'number',
                    ),
                    'width' => array(
                        "label"             => esc_html__( 'Data type', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'height' => array(
                        "label"             => esc_html__( 'Data type', 'brands-for-woocommerce' ),
                        'type'              => 'text',
                    ),
                    'position' => array(
                        "label"           => esc_html__( 'Position', 'brands-for-woocommerce' ),
                        'type'            => 'select',
                        'options'         => array(
                            'none' => esc_html__( 'none', 'brands-for-woocommerce' ),
                            'left' => esc_html__( 'left', 'brands-for-woocommerce' ),
                            'right' => esc_html__( 'right', 'brands-for-woocommerce' ),
                        ),
                    ),
                );

                return $fields;
            }

            function shortcode_callback( $atts, $content = null, $function_name = '' ) {
                $BeRocket_product_brand = BeRocket_product_brand::getInstance();

                return $BeRocket_product_brand->shortcode_brands_product_thumbnail($atts);
            }

            protected function _add_additional_border_fields() {
            }
        }
        new ET_Builder_Module_brands_product_thumbnail;
    }
}

add_action('et_builder_modules_loaded', 'berocket_apl_et_builder_ready');
