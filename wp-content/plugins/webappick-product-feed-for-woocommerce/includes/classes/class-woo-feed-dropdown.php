<?php
/**
 * The file that defines the merchants attributes dropdown
 *
 * A class definition that includes attributes dropdown and functions used across the admin area.
 *
 * @link       https://webappick.com/
 * @since      1.0.0
 *
 * @package    Woo_Feed
 * @subpackage Woo_Feed/includes
 * @author     Ohidul Islam <wahid@webappick.com>
 */

class Woo_Feed_Dropdown {
	
	public $cats = array();
	public $output_types = array();
	
	public function __construct() {
	    $this->output_types = $this->get_output_types();
	}

    /**
     * Get Output Types
     *
     * @return array
     */
    function get_output_types() {
        $output_types = array(
            '1'  => 'Default',
            '2'  => 'Strip Tags',
            '3'  => 'UTF-8 Encode',
            '4'  => 'htmlentities',
            '5'  => 'Integer',
            '6'  => 'Price',
            '7'  => 'Rounded Price',
            '8'  => 'Remove Space',
            '9'  => 'CDATA',
            '10' => 'Remove Special Character',
            '11' => 'Remove ShortCodes',
            '12' => 'ucwords',
            '13' => 'ucfirst',
            '14' => 'strtoupper',
            '15' => 'strtolower',
            '16' => 'urlToSecure',
            '17' => 'urlToUnsecure',
            '18' => 'only_parent',
            '19' => 'parent',
            '20' => 'parent_if_empty',
            '21' => '',
            '22' => '',
        );

        return apply_filters('woo_feed_output_types', $output_types);
    }
	
	/**
	 * Dropdown of Merchant List
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function merchantsDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'merchantsDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Merchant();
			$options = $this->cache_dropdown( 'merchantsDropdown', $attributes->merchants(), $selected );
		}
		return $options;
	}

    /**
     * Dropdown of Country List
     *
     * @param string $selected
     *
     * @return string
     */
    public function countriesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'countriesDropdown', $selected );
        if ( false === $options ) {
            $options    = $this->cache_dropdown( 'countriesDropdown', woo_feed_countries(), $selected );
        }
        return $options;
    }
	
	/**
	 * @param int|int[] $selected
	 *
	 * @return string
	 */
	public function outputTypes( $selected = 1 ) {
		$output_types = '';
		if ( ! is_array( $selected ) ) {
			$selected = (array) explode( ',', $selected );
		}
		foreach ( $this->output_types as $key => $value ) {
			$output_types .= "<option value=\"{$key}\"" . selected( in_array( $key, $selected ), true, false ) . ">{$value}</option>";
		}
		// @TODO remove update_option( 'woo_feed_output_type_options', $output_types, false );
		
		return $output_types;
	}
	
	/**
	 * Read txt file which contains google taxonomy list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function googleTaxonomy( $selected = '' ) {
		// Get All Google Taxonomies
		$fileName           = WOO_FEED_FREE_ADMIN_PATH . '/partials/templates/taxonomies/google_taxonomy.txt';
		$customTaxonomyFile = fopen( $fileName, 'r' ); // phpcs:ignore
		$str                = '';
		if ( ! empty( $selected ) ) {
			$selected = trim( $selected );
			if ( ! is_numeric( $selected ) ) {
				$selected = html_entity_decode( $selected );
			} else {
				$selected = (int) $selected;
			}
		}
		if ( $customTaxonomyFile ) {
			// First line contains metadata, ignore it
			fgets( $customTaxonomyFile ); // phpcs:ignore
			while ( $line = fgets( $customTaxonomyFile ) ) { // phpcs:ignore
				list( $catId, $cat ) = explode( '-', $line );
				$catId = (int) trim( $catId );
				$cat   = trim( $cat );
                $is_selected = selected( $selected, is_numeric( $selected ) ? $catId : $cat, false );
                $str .= "<option value='{$catId}' {$is_selected} >{$cat}</option>";
			}
		}
		if ( ! empty( $str ) ) {
			$str = '<option></option>' . $str;
		}

		return $str;
	}

	/**
	 * Read txt file which contains google taxonomy list
	 *
	 * @return array
	 */
	public function googleTaxonomyArray() {
		// Get All Google Taxonomies
		$fileName           = WOO_FEED_FREE_ADMIN_PATH . '/partials/templates/taxonomies/google_taxonomy.txt';
		$customTaxonomyFile = fopen( $fileName, 'r' );  // phpcs:ignore
		$taxonomy           = array();
		if ( $customTaxonomyFile ) {
			// First line contains metadata, ignore it
			fgets( $customTaxonomyFile );  // phpcs:ignore
			while ( $line = fgets( $customTaxonomyFile ) ) {  // phpcs:ignore
				list( $catId, $cat ) = explode( '-', $line );
				$taxonomy[] = array(
					'value' => absint( trim( $catId ) ),
					'text'  => trim( $cat ),
				);
			}
		}
		$taxonomy = array_filter( $taxonomy );

		return $taxonomy;
	}

    /**
     * Read txt file which contains facebook taxonomy list
     *
     * @param string $selected
     *
     * @return string
     */
    public function facebookTaxonomy( $selected = '' ) {
        // Get All Facebook Taxonomies
        $fileName           = WOO_FEED_FREE_ADMIN_PATH . '/partials/templates/taxonomies/fb_taxonomy.txt';
        $customTaxonomyFile = fopen( $fileName, 'r' ); // phpcs:ignore
        $str                = '';
        if ( ! empty( $selected ) ) {
            $selected = trim( $selected );
            if ( ! is_numeric( $selected ) ) {
                $selected = html_entity_decode( $selected );
            } else {
                $selected = (int) $selected;
            }
        }
        if ( $customTaxonomyFile ) {
            // First line contains metadata, ignore it
            fgets( $customTaxonomyFile ); // phpcs:ignore
            while ( $line = fgets( $customTaxonomyFile ) ) { // phpcs:ignore
                list( $catId, $cat ) = explode( ',', $line );
                $catId = (int) trim( $catId );
                $cat   = trim( $cat );
                $is_selected = selected( $selected, is_numeric( $selected ) ? $catId : $cat, false );
                $str .= "<option value='{$catId}' {$is_selected} >{$cat}</option>";
            }
        }
        if ( ! empty( $str ) ) {
            $str = '<option></option>' . $str;
        }

        return $str;
    }

	/**
	 * Read txt file which contains facebook taxonomy list
	 *
	 * @return array
	 */
	public function facebookTaxonomyArray() {
		// Get All Facebook Taxonomies
		$fileName           = WOO_FEED_FREE_ADMIN_PATH . '/partials/templates/taxonomies/fb_taxonomy.txt';
		$customTaxonomyFile = fopen( $fileName, 'r' );  // phpcs:ignore
		$taxonomy           = array();
		if ( $customTaxonomyFile ) {
			// First line contains metadata, ignore it
			fgets( $customTaxonomyFile );  // phpcs:ignore
			while ( $line = fgets( $customTaxonomyFile ) ) {  // phpcs:ignore
				list( $catId, $cat ) = explode( ',', $line );
				$taxonomy[] = array(
					'value' => absint( trim( $catId ) ),
					'text'  => trim( $cat ),
				);
			}
		}
		$taxonomy = array_filter( $taxonomy );

		return $taxonomy;
	}

    /**
     * Get product related post meta keys (filtered)
     *
     * @return array
     */
    protected function getCustomAttributes() {
        $attributes = woo_feed_get_cached_data( 'woo_feed_dropdown_product_custom_attributes' );
        if ( false === $attributes ) {
            // Get Variation Attributes
            global $wpdb;
            $attributes = array();
            $sql        = "SELECT DISTINCT( meta_key ) FROM $wpdb->postmeta
			WHERE post_id IN (
			    SELECT ID FROM $wpdb->posts WHERE post_type = 'product_variation' -- local attributes will be found on variation product meta only with attribute_ suffix
			) AND (
			    meta_key LIKE 'attribute_%' -- include only product attributes from meta list
			    AND meta_key NOT LIKE 'attribute_pa_%'
			)";
            // sanitization ok
            $localAttributes = $wpdb->get_col( $sql ); // phpcs:ignore
            foreach ( $localAttributes as $localAttribute ) {
                $localAttribute = str_replace( 'attribute_', '', $localAttribute );
                $attributes[ Woo_Feed_Products_v3::PRODUCT_ATTRIBUTE_PREFIX . $localAttribute ] = ucwords( str_replace( '-', ' ', $localAttribute ) );
            }

            // Get Product Custom Attributes
            $sql              = 'SELECT meta.meta_id, meta.meta_key as name, meta.meta_value as type FROM ' . $wpdb->postmeta . ' AS meta, ' . $wpdb->posts . " AS posts WHERE meta.post_id = posts.id AND posts.post_type LIKE '%product%' AND meta.meta_key='_product_attributes';";
            $customAttributes = $wpdb->get_results( $sql ); // phpcs:ignore

            if ( ! empty( $customAttributes ) ) {
                foreach ( $customAttributes as $value ) {
                    $product_attr = maybe_unserialize( $value->type );
                    if ( ! empty( $product_attr ) && is_array( $product_attr ) ) {
                        foreach ( $product_attr as $key => $arr_value ) {
                            if ( strpos( $key, 'pa_' ) === false ) {
                                $attributes[ Woo_Feed_Products_v3::PRODUCT_ATTRIBUTE_PREFIX . $key ] = ucwords( str_replace( '-', ' ', $arr_value['name'] ) );
                            }
                        }
                    }
                }
            }
            woo_feed_set_cache_data( 'woo_feed_dropdown_product_custom_attributes', $attributes );
        }

        // @TODO implement filter hook
        return (array) $attributes;
    }

    /**
     * Get All Taxonomy
     *
     * @return array
     */
    protected function getAllTaxonomy() {
        // $info = woo_feed_get_cached_data( 'woo_feed_dropdown_product_taxonomy' );
        //
        // if ( false === $info ) {

        $data = get_object_taxonomies( 'product' );
        $info = array();
        global $wp_taxonomies;
        $default_excludes = array(
            'product_type',
            'product_visibility',
            'product_cat',
            'product_tag',
            'product_shipping_class',
            'translation_priority',
        );

        /**
         * Exclude Taxonomy from dropdown
         *
         * @param array $user_excludes
         * @param array $default_excludes
         */
        $user_excludes = apply_filters( 'woo_feed_dropdown_exclude_taxonomy', null, $default_excludes );
        if ( is_array( $user_excludes ) && ! empty( $user_excludes ) ) {
            $default_excludes = array_merge( $default_excludes, $user_excludes );
        }

        if ( count( $data ) ) {
            foreach ( $data as $key => $value ) {
                if ( in_array($value, $default_excludes, true) || strpos( $value, 'pa_' ) !== false ) {
                    continue;
                }
                $label = isset( $wp_taxonomies[ $value ] ) ? $wp_taxonomies[ $value ]->label . " [{$value}]" : $value;
                $info[ Woo_Feed_Products_v3::PRODUCT_TAXONOMY_PREFIX . $value ] = $label;
            }
        }
        // woo_feed_set_cache_data( 'woo_feed_dropdown_product_taxonomy', $info );
        // }

        return (array) $info;
    }

    /**
     * Get All Options
     *
     * @return array
     */
    protected function getAllOptions() {
        $_wp_options = wp_list_pluck( get_option( 'wpfp_option', array() ), 'option_name');
        $_wp_options_val = str_replace('wf_option_', '', $_wp_options);
        $_wp_options = array_combine($_wp_options, $_wp_options_val);

        return $_wp_options;
    }
	
	// Product Attribute DropDowns.
	
	/**
	 * Get All Default WooCommerce Attributes
	 * @return array
	 */
	protected function getAttributeTaxonomies() {
		$taxonomies = woo_feed_get_cached_data( 'getAttributeTaxonomies' );
		if ( false === $taxonomies ) {
			// Load the main attributes
			$globalAttributes = wc_get_attribute_taxonomy_labels();
			if ( count( $globalAttributes ) ) {
				foreach ( $globalAttributes as $key => $value ) {
					$taxonomies[ Woo_Feed_Products_v3::PRODUCT_ATTRIBUTE_PREFIX . 'pa_' . $key ] = $value;
				}
			}
			woo_feed_set_cache_data( 'getAttributeTaxonomies', $taxonomies );
		}
		
		return $taxonomies;
	}

    /**
     * Get All Custom Attributes
     *
     * @return array
     */
    protected function getProductMetaKeys() {
        $info = woo_feed_get_cached_data( 'woo_feed_dropdown_meta_keys' );
        if ( false === $info ) {
            global $wpdb;
            $info = [];
            // Load the main attributes.

            $default_exclude_keys = [
                // WP internals.
                '_edit_lock',
                '_wp_old_slug',
                '_edit_last',
                '_wp_old_date',
                // WC internals.
                '_downloadable_files',
                '_sku',
                '_weight',
                '_width',
                '_height',
                '_length',
                '_file_path',
                '_file_paths',
                '_default_attributes',
                '_product_attributes',
                '_children',
                '_variation_description',
                // ignore variation description, engine will get child product description from WC CRUD WC_Product::get_description().
                // Plugin Data.
                '_wpcom_is_markdown',
                // JetPack Meta.
                '_yith_wcpb_bundle_data',
                // Yith product bundle data.
                '_et_builder_version',
                // Divi builder data.
                '_vc_post_settings',
                // Visual Composer (WP Bakery) data.
                '_enable_sidebar',
                'frs_woo_product_tabs',
                // WooCommerce Custom Product Tabs http://www.skyverge.com/.
            ];

            /**
             * Exclude meta keys from dropdown
             *
             * @param array $exclude meta keys to exclude.
             * @param array $default_exclude_keys Exclude keys by default.
             */
            $user_exclude = apply_filters( 'woo_feed_dropdown_exclude_meta_keys', null, $default_exclude_keys );

            if ( is_array( $user_exclude ) && ! empty( $user_exclude ) ) {
                $user_exclude         = esc_sql( $user_exclude );
                $default_exclude_keys = array_merge( $default_exclude_keys, $user_exclude );
            }

            $default_exclude_keys = array_map( 'esc_sql', $default_exclude_keys );
            $exclude_keys         = '\'' . implode( '\', \'', $default_exclude_keys ) . '\'';

            $default_exclude_key_patterns = [
                '%_et_pb_%', // Divi builder data
                'attribute_%', // Exclude product attributes from meta list
                '_yoast_wpseo_%', // Yoast SEO Data
                '_acf-%', // ACF duplicate fields
                '_aioseop_%', // All In One SEO Pack Data
                '_oembed%', // exclude oEmbed cache meta
                '_wpml_%', // wpml metas
                '_oh_add_script_%', // SOGO Add Script to Individual Pages Header Footer.
            ];

            /**
             * Exclude meta key patterns from dropdown
             *
             * @param array $exclude meta keys to exclude.
             * @param array $default_exclude_key_patterns Exclude keys by default.
             */
            $user_exclude_patterns = apply_filters( 'woo_feed_dropdown_exclude_meta_keys_pattern', null, $default_exclude_key_patterns );
            if ( is_array( $user_exclude_patterns ) && ! empty( $user_exclude_patterns ) ) {
                $default_exclude_key_patterns = array_merge( $default_exclude_key_patterns, $user_exclude_patterns );
            }
            $exclude_key_patterns = '';
            foreach ( $default_exclude_key_patterns as $pattern ) {
                $exclude_key_patterns .= $wpdb->prepare( ' AND meta_key NOT LIKE %s', $pattern );
            }

            $sql = "SELECT DISTINCT( meta_key ) FROM $wpdb->postmeta WHERE 1=1 AND post_id IN ( SELECT ID FROM $wpdb->posts WHERE post_type = 'product' OR post_type = 'product_variation' ) AND ( meta_key NOT IN ( $exclude_keys ) $exclude_key_patterns )";

            // sql escaped, cached
            $data = $wpdb->get_results( $sql ); // phpcs:ignore

            if ( count( $data ) ) {
                foreach ( $data as $value ) {
                    //TODO Remove ACF Fields
                    $info[ Woo_Feed_Products_v3::POST_META_PREFIX . $value->meta_key ] = $value->meta_key;
                }
            }
            woo_feed_set_cache_data( 'woo_feed_dropdown_meta_keys', $info );
        }

        return (array) $info;
    }
	
	/**
	 * Product Attributes
	 *
	 * @return array
	 */
	protected function get_product_attributes() {
		$attributes = array(
			'--1'                       => esc_html__( 'Primary Attributes', 'woo-feed' ),
			'id'                        => esc_html__( 'Product Id', 'woo-feed' ),
			'title'                     => esc_html__( 'Product Title', 'woo-feed' ),
            'parent_title'              => esc_html__( 'Parent Title', 'woo-feed' ),
			'description'               => esc_html__( 'Product Description', 'woo-feed' ),
			'description_with_html'     => esc_html__( 'Product Description (with HTML)', 'woo-feed' ),
			'short_description'         => esc_html__( 'Product Short Description', 'woo-feed' ),
            'primary_category'          => esc_html__( 'Parent Category', 'woo-feed' ),
            'primary_category_id'       => esc_html__( 'Parent Category ID', 'woo-feed' ),
            'child_category'            => esc_html__( 'Child Category', 'woo-feed' ),
            'child_category_id'         => esc_html__( 'Child Category ID', 'woo-feed' ),
			'product_type'              => esc_html__( 'Product Category [Category Path]', 'woo-feed' ),
			'product_full_cat'          => esc_html__( 'Product Full Category [Category Full Path]', 'woo-feed' ),
			'link'                      => esc_html__( 'Product URL', 'woo-feed' ),
            'parent_link'               => esc_html__( 'Parent URL', 'woo-feed' ),
			'canonical_link'            => esc_html__( 'Canonical URL', 'woo-feed' ),
			'ex_link'                   => esc_html__( 'External Product URL', 'woo-feed' ),
            'add_to_cart_link'          => esc_html__( 'Add to Cart URL', 'woo-feed' ),
			'item_group_id'             => esc_html__( 'Parent Id [Group Id]', 'woo-feed' ),
			'sku'                       => esc_html__( 'SKU', 'woo-feed' ),
            'sku_id'                    => esc_html__( 'SKU_ID', 'woo-feed' ),
			'parent_sku'                => esc_html__( 'Parent SKU', 'woo-feed' ),
			'availability'              => esc_html__( 'Availability', 'woo-feed' ),
			'availability_date'         => esc_html__( 'Availability Date', 'woo-feed' ),
			'quantity'                  => esc_html__( 'Quantity', 'woo-feed' ),
			'currency'                  => esc_html__( 'Currency', 'woo-feed' ),
			'price'                     => esc_html__( 'Regular Price', 'woo-feed' ),
			'current_price'             => esc_html__( 'Price', 'woo-feed' ),
			'sale_price'                => esc_html__( 'Sale Price', 'woo-feed' ),
			'price_with_tax'            => esc_html__( 'Regular Price With Tax', 'woo-feed' ),
			'current_price_with_tax'    => esc_html__( 'Price With Tax', 'woo-feed' ),
			'sale_price_with_tax'       => esc_html__( 'Sale Price With Tax', 'woo-feed' ),
			'sale_price_sdate'          => esc_html__( 'Sale Start Date', 'woo-feed' ),
			'sale_price_edate'          => esc_html__( 'Sale End Date', 'woo-feed' ),
			'reviewer_name'             => esc_html__( 'Reviewer Name', 'woo-feed' ),
			'weight'                    => esc_html__( 'Weight', 'woo-feed' ),
            'weight_unit'               => esc_html__( 'Weight Unit', 'woo-feed' ),
			'width'                     => esc_html__( 'Width', 'woo-feed' ),
			'height'                    => esc_html__( 'Height', 'woo-feed' ),
			'length'                    => esc_html__( 'Length', 'woo-feed' ),
            'shipping'                  => esc_html__( 'Shipping (Google Format)', 'woo-feed' ),
            'shipping_cost'             => esc_html__( 'Shipping Cost', 'woo-feed' ),
			'shipping_class'            => esc_html__( 'Shipping Class', 'woo-feed' ),
			'type'                      => esc_html__( 'Product Type', 'woo-feed' ),
			'variation_type'            => esc_html__( 'Variation Type', 'woo-feed' ),
			'visibility'                => esc_html__( 'Visibility', 'woo-feed' ),
			'rating_total'              => esc_html__( 'Total Rating', 'woo-feed' ),
			'rating_average'            => esc_html__( 'Average Rating', 'woo-feed' ),
			'tags'                      => esc_html__( 'Tags', 'woo-feed' ),
			'sale_price_effective_date' => esc_html__( 'Sale Price Effective Date', 'woo-feed' ),
			'is_bundle'                 => esc_html__( 'Is Bundle', 'woo-feed' ),
			'author_name'               => esc_html__( 'Author Name', 'woo-feed' ),
			'author_email'              => esc_html__( 'Author Email', 'woo-feed' ),
			'date_created'              => esc_html__( 'Date Created', 'woo-feed' ),
			'date_updated'              => esc_html__( 'Date Updated', 'woo-feed' ),
            'tax'                       => esc_html__( 'Tax', 'woo-feed' ),
			'tax_class'                 => esc_html__( 'Tax Class', 'woo-feed' ),
			'tax_status'                => esc_html__( 'Tax Status', 'woo-feed' ),
			'---1'                      => '',
		);

        $custom_fields = woo_feed_product_custom_fields();
        $custom_identifier_filter = new Woo_Feed_Custom_Identifier_Filter( $custom_fields );
        $custom_identifier = iterator_to_array( $custom_identifier_filter );
        $product_attribute_enables = [];
        if ( ! empty( $custom_identifier ) ) {
            $attributes['--2']  = esc_html__( 'Custom Fields by CTX Feed', 'woo-feed' );

            foreach ( $custom_identifier as $key => $value ) {
                $product_attribute_enables[ 'woo_feed_identifier_' . sanitize_text_field( wp_unslash( $key ) ) ] = sanitize_text_field( $value[0] );
            }
            $attributes['---2']  = '';
        }
        array_splice_preserve_keys( $attributes, count($attributes) - 1, 0, $product_attribute_enables );

		// Subscription & Installment Attributes
		if ( class_exists( 'WC_Subscriptions' ) ) {
			$attributes['--3']  = esc_html__( 'Subscription & Installment', 'woo-feed' );
			$attributes = array_merge(
				$attributes,
				array(
					'subscription_period'          => esc_html__( 'Subscription Period', 'woo-feed' ),
					'subscription_period_interval' => esc_html__( 'Subscription Period Length', 'woo-feed' ),
					'subscription_amount'          => esc_html__( 'Subscription Amount', 'woo-feed' ),
					'installment_months'           => esc_html__( 'Installment Months', 'woo-feed' ),
					'installment_amount'           => esc_html__( 'Installment Amount', 'woo-feed' ),
				)
			);
			$attributes['---3'] = '';
		}

		// Unit Price Measure & Unit Price Base Measure Attributes

		$unit_price_attributes = array(
			'unit_price_measure'      => esc_html__( 'Unit Price Measure', 'woo-feed' ),
			'unit_price_base_measure' => esc_html__( 'Unit Price Base Measure', 'woo-feed' ),
		);

		if ( class_exists( 'WooCommerce_Germanized' ) ) {
			$attributes['--4']  = esc_html__( 'WooCommerce Germanized', 'woo-feed' );
			$attributes = array_merge( $attributes,$unit_price_attributes);
			$attributes += array(
				'wc_germanized_gtin' => 'GTIN',
				'wc_germanized_mpn'  => 'MPN',
			);
			$attributes['---4'] = '';
		}else {
			$identifiers = woo_feed_get_options('woo_feed_identifier');
			if ( 'enable' === $identifiers['unit_pricing_base_measure']
			     && 'enable' === $identifiers['unit_pricing_measure']
			     && 'enable' === $identifiers['unit']
			) {
				$attributes['--4']  = esc_html__( 'Unit Price', 'woo-feed' );
				$attributes = array_merge( $attributes,$unit_price_attributes);
				$attributes['---4'] = '';
			}
		}

		// All In One SEO Attributes
		if ( class_exists( 'AIOSEO\Plugin\AIOSEO' ) ) {
			$attributes['--5']  = esc_html__( 'ALL IN ONE SEO', 'woo-feed' );
			$attributes = array_merge(
				$attributes,
				array(
					'_aioseop_title'         => esc_html__( 'Title [All in One SEO]', 'woo-feed' ),
					'_aioseop_description'   => esc_html__( 'Description [All in One SEO]', 'woo-feed' ),
					'_aioseop_canonical_url' => esc_html__( 'Canonical URL [All in One SEO]', 'woo-feed' ),
				)
			);
			$attributes['---5'] = '';
		}

		// Yoast Identifier Attributes.
		if ( class_exists( 'WPSEO_Frontend' ) || class_exists( 'WPSEO_Premium' ) ) {
			$attributes['--6']  = esc_html__( 'Yoast SEO', 'woo-feed' );

			$yoast_attributes = array(
				'yoast_wpseo_title'    => esc_html__( 'Title [Yoast SEO]', 'woo-feed' ),
				'yoast_wpseo_metadesc' => esc_html__( 'Description [Yoast SEO]', 'woo-feed' ),
				'yoast_canonical_url'  => esc_html__( 'Canonical URL [Yoast SEO]', 'woo-feed' ),

			);

			if ( class_exists( 'Yoast_WooCommerce_SEO' ) ) {
				$yoast_attributes += array(
					'yoast_gtin8'  => esc_html__( 'GTIN8 [Yoast SEO]', 'woo-feed' ),
					'yoast_gtin12' => esc_html__( 'GTIN12 / UPC [Yoast SEO]', 'woo-feed' ),
					'yoast_gtin13' => esc_html__( 'GTIN13 / EAN [Yoast SEO]', 'woo-feed' ),
					'yoast_gtin14' => esc_html__( 'GTIN14 / ITF-14 [Yoast SEO]', 'woo-feed' ),
					'yoast_isbn'   => esc_html__( 'ISBN [Yoast SEO]', 'woo-feed' ),
					'yoast_mpn'    => esc_html__( 'MPN [Yoast SEO]', 'woo-feed' ),
				);
			}
			$attributes = array_merge(
				$attributes, $yoast_attributes
			);

			$attributes['---6'] = '';
		}

		// Rank Math SEO Attributes
		if ( class_exists( 'RankMath' ) || class_exists( 'RankMathPro' ) ) {

			$attributes['--7'] = esc_html__('Rank Math SEO', 'woo-feed');
			$attributes = array_merge(
				$attributes,
				array(
					'rank_math_title'         => esc_html__('Title [RankMath SEO]', 'woo-feed'),
					'rank_math_description'   => esc_html__('Description [RankMath SEO]', 'woo-feed'),
					'rank_math_canonical_url' => esc_html__('Canonical URL [RankMath SEO]', 'woo-feed'),
					'rank_math_gtin'          => esc_html__('GTIN [RankMath Pro SEO]', 'woo-feed'),
				)
			);
			$attributes['---7'] = '';
		}

        // Image Attributes.
		$attributes['--8'] = esc_html__( 'Image Attributes', 'woo-feed' );
		$attributes += array(
			'image'         => esc_html__( 'Main Image', 'woo-feed' ),
			'feature_image' => esc_html__( 'Featured Image', 'woo-feed' ),
			'images'        => esc_html__( 'Images [Comma Separated]', 'woo-feed' ),
			'image_1'       => esc_html__( 'Additional Image 1', 'woo-feed' ),
			'image_2'       => esc_html__( 'Additional Image 2', 'woo-feed' ),
			'image_3'       => esc_html__( 'Additional Image 3', 'woo-feed' ),
			'image_4'       => esc_html__( 'Additional Image 4', 'woo-feed' ),
			'image_5'       => esc_html__( 'Additional Image 5', 'woo-feed' ),
			'image_6'       => esc_html__( 'Additional Image 6', 'woo-feed' ),
			'image_7'       => esc_html__( 'Additional Image 7', 'woo-feed' ),
			'image_8'       => esc_html__( 'Additional Image 8', 'woo-feed' ),
			'image_9'       => esc_html__( 'Additional Image 9', 'woo-feed' ),
			'image_10'      => esc_html__( 'Additional Image 10', 'woo-feed' ),
		);
		$attributes['---8'] = '';

		// Product Attribute.
		$_attributes = $this->getAttributeTaxonomies();
		if ( ! empty( $_attributes ) && is_array( $_attributes ) ) {
			$attributes['--50']  = esc_html__( 'Product Attributes', 'woo-feed' );
			$attributes         += $this->getAttributeTaxonomies();
			$attributes['---50'] = '';
		}


        $_custom_attributes = $this->getCustomAttributes();
        if ( ! empty( $_custom_attributes ) && is_array( $_custom_attributes ) ) {
            $attributes['--51']  = esc_html__( 'Product Custom Attributes', 'woo-feed' );
            $attributes          += $_custom_attributes;
            $attributes['---51'] = '';
        }

		$_taxonomies = $this->getAllTaxonomy();
		if ( ! empty( $_taxonomies ) && is_array( $_taxonomies ) ) {
			$attributes['--52']  = esc_html__( 'Product Taxonomies', 'woo-feed' );
			$attributes          += $_taxonomies;
			$attributes['---52'] = '';
		}

        $_wp_options = $this->getAllOptions();
        if ( ! empty( $_wp_options ) && is_array( $_wp_options ) ) {
            $attributes['--53']  = esc_html__( 'WP Options', 'woo-feed' );
            $attributes          += $_wp_options;
            $attributes['---53'] = '';
        }

		// Category Mapping
        $_category_mappings = $this->getCustomCategoryMappedAttributes();
        if ( ! empty( $_category_mappings ) && is_array( $_category_mappings ) ) {
            $attributes['--54']  = esc_html__( 'Category Mappings', 'woo-feed' );
            $attributes          += $_category_mappings;
            $attributes['---54'] = '';
        }

		// Custom Fields & Post Metas
        $_meta_keys = $this->getProductMetaKeys();
        if ( ! empty( $_meta_keys ) && is_array( $_meta_keys ) ) {
            $attributes['--55']  = esc_html__( 'Custom Fields & Post Metas', 'woo-feed' );
            $attributes          += $_meta_keys;
            $attributes['---55'] = '';
        }


		return apply_filters('woo_feed_product_attribute_dropdown',$attributes);
	}

    /**
     * Get Category Mappings
     * @return array
     */
    protected function getCustomCategoryMappedAttributes() {
        global $wpdb;
        // Load Custom Category Mapped Attributes
        $info = array();
        // query cached and escaped
        $data = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->options WHERE option_name LIKE %s;", Woo_Feed_Products_v3::PRODUCT_CATEGORY_MAPPING_PREFIX . '%' ) );  // phpcs:ignore
        if ( count( $data ) ) {
            foreach ( $data as $key => $value ) {
                $opts                        = maybe_unserialize( $value->option_value );
                $opts                        = maybe_unserialize( $opts );
                $info[ $value->option_name ] = is_array( $opts ) && isset( $opts['mappingname'] ) ? $opts['mappingname'] : str_replace( 'wf_cmapping_',
                    '',
                    $value->option_name );
            }
        }
        return (array) $info;
    }
	
	/**
	 * Local Attribute List to map product value with merchant attributes
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function product_attributes_dropdown( $selected = '' ) {
		
		$attributeDropdown = $this->get_cached_dropdown( 'woo_feed_dropdown_product_attributes', $selected );
		
		if ( false === $attributeDropdown ) {
			return $this->cache_dropdown( 'woo_feed_dropdown_product_attributes', $this->get_product_attributes(), $selected, __( 'Select Attributes', 'woo-feed' ) );
		}
		
		return $attributeDropdown;
	}
	
	// Helper functions.
	
	/**
	 * Get Cached Dropdown Entries
	 *
	 * @param string $key      cache key
	 * @param string $selected selected option
	 *
	 * @return string|false
	 */
	protected function get_cached_dropdown( $key, $selected = '' ) {
		$options = woo_feed_get_cached_data( $key );
		if ( strlen( $selected ) ) {
			$selected = esc_attr( $selected );
			$options = str_replace( "value=\"{$selected}\"", "value=\"{$selected}\" selected", $options );
		}
		return empty( $options ) ? false : $options;
	}
	
	/**
	 * create dropdown options and cache for next use
	 *
	 * @param string $cache_key cache key
	 * @param array  $items     dropdown items
	 * @param string $selected  selected option
	 * @param string $default   default option
	 *
	 * @return string
	 */
	protected function cache_dropdown( $cache_key, $items, $selected = '', $default = '' ) {
		
		if ( empty( $items ) || ! is_array( $items ) ) {
			return '';
		}
		
		if ( ! empty( $default ) ) {
			$options = '<option value="" class="disabled" selected>' . esc_html( $default ) . '</option>';
		} else {
			$options = '<option></option>';
		}
		
		foreach ( $items as $key => $value ) {
			if ( substr( $key, 0, 2 ) == '--' ) {
				$options .= "<optgroup label=\"{$value}\">";
			} elseif ( substr( $key, 0, 2 ) == '---' ) {
				$options .= '</optgroup>';
			} else {
				$options .= sprintf( '<option value="%s">%s</option>', $key, $value );
			}
		}
		
		woo_feed_set_cache_data( $cache_key, $options );
		
		if ( strlen( $selected ) ) {
			$selected = esc_attr( $selected );
			$options = str_replace( "value=\"{$selected}\"", "value=\"{$selected}\" selected", $options );
		}
		
		return $options;
	}


    /**
     * Get WP Option Table Item List
     *
     * @param string $selected
     */
    public function woo_feed_get_wp_options( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'woo_feed_dropdown_wp_options', $selected );
        if ( false === $options ) {
            global $wpdb;
            $default_exclude_keys = array(
                'db_version',
                'cron',
                'wpfp_option',
                'recovery_keys',
                'wf_schedule',
                'woo_feed_output_type_options',
                'ftp_credentials',
            );

            /**
             * Exclude Option Names from dropdown
             *
             * @param array $exclude Option Names to exclude.
             * @param array $default_exclude_keys Option Names by default.
             */
            $user_exclude = apply_filters( 'woo_feed_dropdown_exclude_option_names', null, $default_exclude_keys );

            if ( is_array( $user_exclude ) && ! empty( $user_exclude ) ) {
                $user_exclude         = esc_sql( $user_exclude );
                $default_exclude_keys = array_merge( $default_exclude_keys, $user_exclude );
            }

            $default_exclude_keys = array_map( 'esc_sql', $default_exclude_keys );
            $exclude_keys         = '\'' . implode( '\', \'', $default_exclude_keys ) . '\'';

            $default_exclude_key_patterns = array(
                'mailserver_%',
                '_transient%',
                '_site_transient%',
                'wf_config%',
                'wf_feed_%',
                'wpfw_%',
                'wf_dattribute_%',
                'wf_cmapping_%',
                'webappick-woo%',
                'widget_%',
            );

            /**
             * Exclude Option Name patterns from dropdown
             *
             * @param array $exclude Option Name Patter to exclude.
             * @param array $default_exclude_key_patterns Option Name Patters by default.
             */
            $user_exclude_patterns = apply_filters(
                'woo_feed_dropdown_exclude_option_name_pattern',
                null,
                $default_exclude_key_patterns
            );
            if ( is_array( $user_exclude_patterns ) && ! empty( $user_exclude_patterns ) ) {
                $default_exclude_key_patterns = array_merge( $default_exclude_key_patterns, $user_exclude_patterns );
            }
            $exclude_key_patterns = '';
            foreach ( $default_exclude_key_patterns as $pattern ) {
                $exclude_key_patterns .= $wpdb->prepare( ' AND option_name NOT LIKE %s', $pattern );
            }

            /** @noinspection SqlConstantCondition */
            $query = "SELECT * FROM $wpdb->options
			WHERE 1=1 AND
			( option_name NOT IN ( $exclude_keys ) $exclude_key_patterns )";
            // sql escaped, cached
            $options = $wpdb->get_results( $query ); // phpcs:ignore
            $item    = array();
            if ( is_array( $options ) && ! empty( $options ) ) {
                foreach ( $options as $key => $value ) {
                    $item[ esc_attr( $value->option_name ) . '-' . esc_attr( $value->option_name ) ] = esc_html( $value->option_name );
                }
            }
            $options = $this->cache_dropdown( 'woo_feed_dropdown_wp_options', $item, $selected );
        }
        // HTML option element with escaped label and value
        echo $options; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
	
	// Merchant Attribute DropDown.
	
	/**
	 * Dropdown of Google Attribute List
	 *
	 * @param string $selected
     * @param array $merchants
	 *
	 * @return string
	 */
	public function googleAttributesDropdown( $selected = '', $merchants = [] ) {
		$options = $this->get_cached_dropdown( 'googleAttributesDropdown', $selected );
		
		if ( false === $options ) {
            $attributes_obj = new Woo_Feed_Default_Attributes();
            $attributes = apply_filters( 'woo_feed_filter_dropdown_attributes', $attributes_obj->googleAttributes(), $merchants );
			return $this->cache_dropdown( 'googleAttributesDropdown', $attributes, $selected );
		}
		return $options;
	}

    /**
     * Dropdown of Facebook Template
     *
     * @param string $selected
     *
     * @return string
     */
    public function facebookAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'facebookAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'facebookAttributesDropdown', $attributes->facebookAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Google Local Inventory Ads Template
     *
     * @param string $selected
     *
     * @return string
     */
    public function google_localAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'google_localAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'google_localAttributesDropdown', $attributes->googleAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Google Local Product Inventory Template
     *
     * @param string $selected
     *
     * @return string
     */
    public function google_local_inventoryAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'google_local_inventoryAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'google_local_inventoryAttributesDropdown', $attributes->googleAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Google Promotions Template
     *
     * @param string $selected
     *
     * @return string
     */
    public function google_promotionsAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'google_promotionsAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'google_promotionsAttributesDropdown', $attributes->googleAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Bing Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function bingAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'bingAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'bingAttributesDropdown', $attributes->bingAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Bing Local Inventory Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function bing_local_inventoryAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'bing_local_inventoryAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'bing_local_inventoryAttributesDropdown', $attributes->bingAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Snapchat Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function snapchatAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'snapchatAttributesDropdown', $selected );
        if ( false === $options ) {
            $attributes_obj = new Woo_Feed_Default_Attributes();
            $attributes = apply_filters( 'woo_feed_filter_dropdown_attributes', $attributes_obj->googleAttributes(), [ 'snapchat' ] );
            return $this->cache_dropdown( 'snapchatAttributesDropdown', $attributes, $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Google Review Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function googlereviewAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'googlereviewAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'googlereviewAttributesDropdown', $attributes->googlereviewAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Wine Searcher Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function wine_searcherAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'wine_searcherAttributesDropdown', $selected );
        if ( false === $options ) {
            $attributes_obj = new Woo_Feed_Default_Attributes();
            $attributes = apply_filters( 'woo_feed_filter_dropdown_attributes', $attributes_obj->winesearcherAttributes(), [ 'winesearcher' ] );
            return $this->cache_dropdown( 'wine_searcherAttributesDropdown', $attributes, $selected );
        }
        return $options;
    }

    /**
     * Dropdown of TikTok Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function tiktokAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'tiktokAttributesDropdown', $selected );
        if ( false === $options ) {
            $attributes_obj = new Woo_Feed_Default_Attributes();
            $attributes = apply_filters( 'woo_feed_filter_dropdown_attributes', $attributes_obj->tiktokAttributes(), [ 'tiktok' ] );
            return $this->cache_dropdown( 'tiktokAttributesDropdown', $attributes, $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Modalova Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function modalovaAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'modalovaAttributesDropdown', $selected );
        if ( false === $options ) {
            $attributes_obj = new Woo_Feed_Default_Attributes();
            $attributes = apply_filters( 'woo_feed_filter_dropdown_attributes', $attributes_obj->modalovaAttributes(), [ 'modalova' ] );
            return $this->cache_dropdown( 'modalovaAttributesDropdown', $attributes, $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Catch.com.au Attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function catchdotcomAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'catchDotComAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'catchDotComAttributesDropdown', $attributes->catchdotcomAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of Fashionchick.nl attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function fashionchickAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'fashionchickAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'fashionchickAttributesDropdown', $attributes->fashionchickAttributes(), $selected );
        }
        return $options;
    }

    /**
     * Dropdown of GoedGeplaatst.nl attribute List
     *
     * @param string $selected
     *
     * @return string
     */
    public function goedgeplaatstAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'goedgeplaatstAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'goedgeplaatstAttributesDropdown', $attributes->goedgeplaatstAttributes(), $selected );
        }
        return $options;
    }

    /**
	 * Google Shopping Action Attribute list
	 * Alias of google attribute dropdown for facebook
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function google_shopping_actionAttributesDropdown( $selected = '' ) {
        return $this->googleAttributesDropdown( $selected, [ 'google_shopping_action' ] );
	}


    /**
     * Google Dynamic Ads Attribute list
     *
     * @param string $selected
     *
     * @return string
     */
    public function google_dynamic_adsAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'google_dynamic_adsAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'google_dynamic_adsAttributesDropdown', $attributes->google_dynamic_adsAttributes(), $selected );
        }
        return $options;
    }
	
	/**
	 * Pinterest Attribute list
	 * Alias of google attribute dropdown for pinterest
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function pinterestAttributesDropdown( $selected = '' ) {
        return $this->googleAttributesDropdown( $selected, [ 'pinterest' ] );
	}

    /**
     * Pinterest Catelog Attribute list
     * Alias of google attribute dropdown for pinterest catelog
     *
     * @param string $selected
     *
     * @return string
     */
    public function pinterest_rssAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'pinterest_rssAttributesDropdown', $selected );

        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            return $this->cache_dropdown( 'pinterest_rssAttributesDropdown', $attributes->pinterest_rssAttributes(), $selected );
        }
        return $options;
    }
	
	/**
	 * AdRoll Attribute list
	 * Alias of google attribute dropdown for AdRoll
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function adrollAttributesDropdown( $selected = '' ) {
        return $this->googleAttributesDropdown( $selected, [ 'adroll' ] );
	}
	
	/**
	 * Skroutz Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function skroutzAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'skroutzAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'skroutzAttributesDropdown', $attributes->skroutzAttributes(), $selected );
		}
		return $options;
	}

    /**
     * Best Price Attribute list
     *
     * @param string $selected
     *
     * @return string
     */
    public function bestpriceAttributesDropdown( $selected = '' ) {
        $options = $this->get_cached_dropdown( 'bestpriceAttributesDropdown', $selected );
        if ( false === $options ) {
            $attributes = new Woo_Feed_Default_Attributes();
            $options = $this->cache_dropdown( 'bestpriceAttributesDropdown', $attributes->bestpriceAttributes(), $selected );
        }
        return $options;
    }

	/**
	 * Daisycon Advertiser (General) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisyconAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_AttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_AttributesDropdown', $attributes->daisyconAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Automotive) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_automotiveAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_automotiveAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_automotiveAttributesDropdown', $attributes->daisycon_automotiveAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Books) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_booksAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_booksAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_booksAttributesDropdown', $attributes->daisycon_booksAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Cosmetics) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_cosmeticsAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_cosmeticsAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_cosmeticsAttributesDropdown', $attributes->daisycon_cosmeticsAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Daily Offers) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_daily_offersAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_daily_offersAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_daily_offersAttributesDropdown', $attributes->daisycon_daily_offersAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Electronics) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_electronicsAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_electronicsAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_electronicsAttributesDropdown', $attributes->daisycon_electronicsAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Food & Drinks) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_food_drinksAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_food_drinksAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_food_drinksAttributesDropdown', $attributes->daisycon_food_drinksAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Home & Garden) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_home_gardenAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_home_gardenAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_home_gardenAttributesDropdown', $attributes->daisycon_home_gardenAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Housing) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_housingAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_housingAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_housingAttributesDropdown', $attributes->daisycon_housingAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Fashion) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_fashionAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_fashionAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_fashionAttributesDropdown', $attributes->daisycon_fashionAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Studies & Trainings) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_studies_trainingsAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_studies_trainingsAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_studies_trainingsAttributesDropdown', $attributes->daisycon_studies_trainingsAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Telecom: Accessories) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_telecom_accessoriesAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_telecom_accessoriesAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_telecom_accessoriesAttributesDropdown', $attributes->daisycon_telecom_accessoriesAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Telecom: All-in-one) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_telecom_all_in_oneAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_telecom_all_in_oneAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_telecom_all_in_oneAttributesDropdown', $attributes->daisycon_telecom_all_in_oneAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Telecom: GSM + Subscription) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_telecom_gsm_subscriptionAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_telecom_gsm_subscriptionAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_telecom_gsm_subscriptionAttributesDropdown', $attributes->daisycon_telecom_gsm_subscriptionAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Telecom: GSM only) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_telecom_gsmAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_telecom_gsmAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_telecom_gsmAttributesDropdown', $attributes->daisycon_telecom_gsmAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Telecom: Sim only) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_telecom_simAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_telecom_simAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_telecom_simAttributesDropdown', $attributes->daisycon_telecom_simAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Magazines) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_magazinesAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_magazinesAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_magazinesAttributesDropdown', $attributes->daisycon_magazinesAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Holidays: Accommodations) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_holidays_accommodationsAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_holidays_accommodationsAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_holidays_accommodationsAttributesDropdown', $attributes->daisycon_holidays_accommodationsAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Holidays: Accommodations and transport) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_holidays_accommodations_and_transportAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_holidays_accommodations_and_transportAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_holidays_accommodations_and_transportAttributesDropdown', $attributes->daisycon_holidays_accommodations_and_transportAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Holidays: Trips) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_holidays_tripsAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_holidays_tripsAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_holidays_tripsAttributesDropdown', $attributes->daisycon_holidays_tripsAttributes(), $selected );
		}
		return $options;
	}
	
	/**
	 * Daisycon Advertiser (Work & Jobs) Attribute list
	 *
	 * @param string $selected
	 *
	 * @return string
	 */
	public function daisycon_work_jobsAttributesDropdown( $selected = '' ) {
		$options = $this->get_cached_dropdown( 'daisycon_work_jobsAttributesDropdown', $selected );
		if ( false === $options ) {
			$attributes = new Woo_Feed_Default_Attributes();
			$options = $this->cache_dropdown( 'daisycon_work_jobsAttributesDropdown', $attributes->daisycon_work_jobsAttributes(), $selected );
		}
		return $options;
	}
}
