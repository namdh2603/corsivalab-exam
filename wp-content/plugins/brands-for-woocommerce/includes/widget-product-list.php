<?php
class BeRocket_product_list_Widget extends BeRocket_Base_Product_List_Widget {
	public function __construct() {
        parent::__construct( 
            "berocket_product_list_widget", 
            __( "WooCommerce Brands Product List", 'brands-for-woocommerce' ),
            array( "description" => "" ) 
        );
        // $this->template = 'list';

        $this->defaults += array(
            'brands'      => '',
            'brand_field' => 'id',
        );

        $this->form_fields += array(
            'brands' => array(
                "title"  => __( 'Brands', 'brands-for-woocommerce' ),
                'type'   => 'autocomplete',
                'class'  => 'width100',
                // 'walker' => 'Br_Walker_Brand_Checklist',
            ),
        );
    }

    public function update( $new_instance, $old_instance ) {
        $new_instance['brands'] = empty( $_REQUEST['berocket_brand'] ) ? '' : serialize( $_REQUEST['berocket_brand'] );
        $instance = parent::update( $new_instance, $old_instance );
        return $instance;
    }

    public function widget( $args, $instance ) {
        if ( empty( $instance['brands'] ) ) return;
        $instance = array_merge( $this->defaults, $instance );

        // $instance = $this->set_cache_key( $instance );
        $BeRocket_product_brand = BeRocket_product_brand::getInstance();
        $products = $BeRocket_product_brand->get_from_cache( $instance['cache_key'] );

        if ( is_string( $products ) ) {
            $products = json_decode( $products );
        }

        if ( empty( $instance['per_page'] ) ) $instance['per_page'] = -1;

        if ( empty( $instance['slider'] ) ) {
            $instance['paged'] = isset( $_GET[ $instance['cache_key'] ] ) ? (int) $_GET[ $instance['cache_key'] ] : 1; 
        } else {
            $instance['paged'] = false;
            $instance['per_page'] = -1;
        }

        if ( empty( $products ) && empty( $products->products ) ) {
            $brands        = is_array( $instance['brands'] ) ? $instance['brands'] : unserialize( $instance['brands'] );
            $ordering_args = WC()->query->get_catalog_ordering_args( $instance['orderby'], $instance['order'] );
            $meta_query    = WC()->query->get_meta_query();
            $field         = empty( $instance['brand_field'] ) ? $this->defaults['brand_field'] : $instance['brand_field'];

            $products = wc_get_products(array(
                'meta_key'   => '_price',
                'status'     => 'publish',
                'limit'      => $instance['per_page'],
                'page'       => $instance['paged'],
                'paginate'   => true,
                'return'     => 'ids',
                'orderby'    => $instance['orderby'],
                'order'      => $instance['order'],
                'meta_query' => $meta_query,
                'tax_query'  => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => BeRocket_product_brand::$taxonomy_name,
                        'terms'    => $brands,
                        'field'    => $field,
                        'operator' => 'IN',
                    ),
                    array(
                        'taxonomy'  => 'product_visibility',
                        'terms'     => array( 'exclude-from-catalog' ),
                        'field'     => 'name',
                        'operator'  => 'NOT IN',
                    ),
                ),
            ));

            $BeRocket_product_brand->set_to_cache( $instance['cache_key'], json_encode($products) );
        }

        ob_start();
        echo $args['before_widget'];
        brfr_product_loop( $products, $instance );
        if ( !empty( $instance['title'] ) ) echo $args['before_title'], $instance['title'], $args['after_title'];
        echo $args['after_widget'];
        echo ob_get_clean();

        WC()->query->remove_ordering_args();
	}
}
