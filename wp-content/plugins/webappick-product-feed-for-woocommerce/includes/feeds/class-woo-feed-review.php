<?php /** @noinspection PhpUnusedPrivateMethodInspection, PhpUndefinedMethodInspection, PhpUnused, PhpUnusedPrivateFieldInspection, PhpUnusedLocalVariableInspection, DuplicatedCode, PhpUnusedParameterInspection, PhpForeachNestedOuterKeyValueVariablesConflictInspection, RegExpRedundantEscape */

/**
 * Class Google Product Review
 *
 * Responsible for processing and generating feed for Google.com
 *
 * @since 1.0.0
 * @package Google
 *
 */
class Woo_Feed_Review {

    /**
     * This variable is responsible for holding all product attributes and their values
     *
     * @since   1.0.0
     * @var     array $products Contains all the product attributes to generate feed
     * @access  public
     */
    public $products;

    /**
     * This variable is responsible for making error number
     *
     * @since   1.0.0
     * @var     int $errorCounter Generate error number
     * @access  public
     */
    public $errorCounter;

    /**
     * Feed Wrapper text for enclosing each product information
     *
     * @since   1.0.0
     * @var     string $feedWrapper Feed Wrapper text
     * @access  public
     */
    public $feedWrapper = 'review';

    /**
     * Store product information
     *
     * @since   1.0.0
     * @var     array $storeProducts
     * @access  public
     */
    private $storeProducts;

    /**
     * Product Ids
     *
     * @since   1.0.0
     * @var     array $ids
     * @access  public
     */
    private $ids;

    /**
     * Review Data
     *
     * @since   1.0.0
     * @var     array $data
     * @access  public
     */
    private $data;

    /**
     * Define the core functionality to generate feed.
     *
     * Set the feed rules. Map products according to the rules and Check required attributes
     * and their values according to merchant specification.
     * @var Woo_Generate_Feed $feedRule Contain Feed Configuration
     * @since    1.0.0
     */
    public function __construct( $feedRule ) {

        $feedRule['itemWrapper'] = $this->feedWrapper;

        $this->products = new Woo_Feed_Products_v3( $feedRule );

        // When update via cron job then set productIds.
        if ( ! isset( $feedRule['productIds'] ) ) {

            $feedRule['productIds'] = $this->products->query_products();

            // $feedRule['productIds'] = $this->get_products_with_reviews();

        }


        $products = $this->products->get_products( $feedRule['productIds'] );

        $product_names = [];

        foreach ( $products as $product ) {
            $product_names[] = $product['product_name'];
        }

        $product_ids = [];

        foreach ( $product_names as $product_name ) {
            $product_by_title = get_page_by_title($product_name, OBJECT, 'product');
            if ( is_object( $product_by_title) ) {
                $product_ids[] = $product_by_title->ID;
            }
        }

        if ( ! empty($product_ids) ) {
            $this->ids = array_filter($product_ids, 'strlen');
        } else {
            $this->ids = array_filter($feedRule['productIds'], 'strlen');
        }

        $this->rules = $feedRule;

        $this->data = $this->processReviewsData($feedRule);

    }


    /**
     * Return Feed
     *
     * @return array|bool|string
     */
    public function returnFinalProduct() {
        if ( ! empty( $this->products ) ) {

            if ( 'xml' == $this->rules['feedType'] ) {
                // return $this->get_feed($this->products);
                $feed = array(
                    'header' => $this->get_xml_feed_header(),
                    'body'   => $this->get_xml_feed_body(),
                    'footer' => $this->get_xml_feed_footer(),
                );

                return $feed;
            }
        }

        $feed = array(
            'body'   => '',
            'header' => '',
            'footer' => '',
        );

        return $feed;
    }

    /**
     * Get products having reviews
     *
     * @return array $ids product ids
     */
    public function get_products_with_reviews() {
        $args = array(
            'post_type'     => 'product',
            'fields'        => 'ids',
            'status'        => 'approve',
            'comment_count' => array(
                'value'   => 0,
                'compare' => '>',
            ),
        );

        $ids = get_posts($args);

        return $ids ? $ids : array();
    }

    public function sampleData() {
        $data = array(
            'filetype' => 'xml',
            'reviews'  => array(
                array(
                    'review' => array(
                        'review_id'     => '1',
                        'reviewer'      => array(
                            'reviewer_id' => '11',
                            'name'        => 'Anamul Haque 2',
                        ),
                        'reviewer-link' => 'anamulhaque@gmail.com',
                        'products'      => array(
                            'product' => array(
                                array(
                                    'product-id'   => '50',
                                    'product-name' => 'Hoodie with logo',
                                    'product-link' => 'http://www.chaldal.com/hoodie',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'review' => array(
                        'review_id'     => '2',
                        'reviewer'      => array(
                            'reviewer_id' => '12',
                            'name'        => 'Tanvir Hayder',
                        ),
                        'reviewer-link' => 'tanvirhayder@gmail.com',
                        'products'      => array(
                            'product' => array(
                                array(
                                    'product-id'   => '10',
                                    'product-name' => 'Beanie',
                                    'product-link' => 'http://www.chaldal.com/beanie',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );

        return $data;
    }

    /**
     * Process Reviews Data
     *
     * @param mixed $config feed configuration
     *
     */
    public function processReviewsData( $config ) {
        $ids = $this->ids;

        $feed                       = array();
        $feed['version']            = '2.3';
        $feed['aggregator']['name'] = 'review';
        $feed['publisher']['name']  = 'CTX Feed – WooCommerce Product Feed Generator by Webappick';
        $feed['reviews']            = array();

        if ( $ids && is_array($ids) ) {
            foreach ( $ids as $id ) {
                $product = wc_get_product($id);

                $reviews = get_comments(
                    array(
                        'post_id'   => $id,
                        'post_type' => 'product',
                        'parent'    => 0,
                    )
                );

                $review = array();

                if ( $reviews && is_array($reviews) ) {
                    foreach ( $reviews as $single_review ) {
                        $review_content = $single_review->comment_content;
                        $rating         = get_comment_meta( $single_review->comment_ID, 'rating', true);
                        $review_content = woo_feed_strip_all_tags(wp_specialchars_decode($review_content));
                        $review_content = preg_replace('/[^A-Za-z0-9-]/', ' ', $review_content);
                        $review_content = ! empty($review_content) ? "<![CDATA[" . woo_feed_strip_all_tags(wp_specialchars_decode($review_content)) . "]]>" : "";
                        $review_product_url = ! empty($product->get_permalink()) ? "<![CDATA[" . $product->get_permalink() . "]]>" : "";
                        $review_id = ! empty($single_review->comment_ID) ? "<![CDATA[" . $single_review->comment_ID . "]]>" : "";
                        $review_author = ! empty($single_review->comment_author) ? "<![CDATA[" . $single_review->comment_author . "]]>" : "";
                        $review_user_id = ! empty($single_review->user_id) ? "<![CDATA[" . $single_review->user_id . "]]>" : "";
                        $review_time = ! empty($single_review->comment_date_gmt) ? "<![CDATA[" . $single_review->comment_date_gmt . "]]>" : "";

                        $review['review']['review_id']                = $review_id;
                        $review['review']['reviewer']['name']         = $review_author;
                        $review['review']['reviewer']['reviewer_id']  = $review_user_id;
                        $review['review']['content']                  = $review_content;
                        $review['review']['review_timestamp']         = $review_time;
                        $review['review']['review_url']               = $review_product_url;
                        $review['review']['ratings']["overall"]       = $rating;
                        $review['review']['products']                 = array();
                        $review['review']['products']['product']      = array();

                        // Get Product Attribute values by type and assign to product array
                        foreach ( $config['attributes'] as $attr_key => $attribute ) {
                            $merchant_attribute = isset($config['mattributes'][ $attr_key ]) ? $config['mattributes'][ $attr_key ] : '';

                            // Add Prefix and Suffix into Output
                            $prefix     = $config['prefix'][ $attr_key ];
                            $suffix     = $config['suffix'][ $attr_key ];
                            $merchant   = $config['provider'];
                            $feedType   = $config['feedType'];

                            if ( 'pattern' == $config['type'][ $attr_key ] ) {
                                $attributeValue = $config['default'][ $attr_key ];
                            } else {
                                $attributeValue = $this->products->getAttributeValueByType($product, $attribute, $merchant_attribute);
                            }

                            //add prefix - suffix to attribute value
                            $attributeValue = $prefix . $attributeValue . $suffix;
                            $attributeValue = ! empty($attributeValue) ? "<![CDATA[" . $attributeValue . "]]>" : "";

                            if ( "review_temp_gtin" === $merchant_attribute ) {
                                $review['review']['products']['product']['product_ids']['gtins']['gtin'] = $attributeValue;
                            } elseif ( "review_temp_mpn" === $merchant_attribute ) {
                                $review['review']['products']['product']['product_ids']['mpns']['mpn'] = $attributeValue;
                            } elseif ( "review_temp_sku" === $merchant_attribute ) {
                                $review['review']['products']['product']['product_ids']['skus']['sku'] = $attributeValue;
                            } elseif ( "review_temp_brand" === $merchant_attribute ) {
                                $review['review']['products']['product']['product_ids']['brands']['brand'] = $attributeValue;
                            } else {
                                $review['review']['products']['product'][ $merchant_attribute ] = $attributeValue;
                            }                        
                        }

                        array_push($feed['reviews'], $review);
                    }
                }
            }
        }

        return $feed;
    }

    /**
     * Convert an array to XML
     *
     * @param array $array array to convert
     * @param mixed $xml xml object
     *
     */
    function woo_feed_array_to_xml( $array, &$xml ) {
        foreach ( $array as $key => $value ) {
            if ( is_array($value) ) {
                if ( ! is_numeric($key) ) {
                    $subnode = $xml->addChild("$key");
                    $this->woo_feed_array_to_xml($value, $subnode);
                } else {
                    $this->woo_feed_array_to_xml($value, $xml);
                }
            } else {
                if ( "overall" === $key ) {
                    $rating = $xml->addChild($key,"$value");
                    $rating->addAttribute('min','1');
                    $rating->addAttribute('max','5');
                } else {
                    $xml->addChild("$key","$value");
                }
            }
        }
    }

    /**
     * Make XML Feed
     *
     * @return string
     */
    public function make_review_xml_feed() {
        // create simpleXML object
        $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\"?><feed xmlns:vc=\"http://www.w3.org/2007/XMLSchema-versioning\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"http://www.google.com/shopping/reviews/schema/product/2.3/product_reviews.xsd\"></feed>");
        $this->woo_feed_array_to_xml($this->data, $xml);
        $feedBody = $xml->asXML();

        $data = new DOMDocument();
        $data->preserveWhiteSpace = false;
        $data->formatOutput = true;
        $data->loadXML($feedBody);
        $feedBody = $data->saveXML();

        return $feedBody;
    }

    /**
     * Make xml node
     *
     * @param string $attribute Attribute Name
     * @param string $value Attribute Value
     * @param bool   $cdata
     * @param string $space
     *
     * @return string
     */
    function formatXMLLine( $attribute, $value, $cdata, $space = '' ) {
        // Make single XML  node
        if ( ! empty( $value ) ) {
            $value = trim( $value );
        }
        if ( gettype( $value ) == 'array' ) {
            $value = wp_json_encode( $value );
        }
        if ( false === strpos( $value, '<![CDATA[' ) && 'http' === substr( trim( $value ), 0, 4 ) ) {
            $value = "<![CDATA[$value]]>";
        } elseif ( false === strpos( $value, '<![CDATA[' ) && true === $cdata && ! empty( $value ) ) {
            $value = "<![CDATA[$value]]>";
        } elseif ( $cdata ) {
            if ( ! empty( $value ) ) {
                $value = "<![CDATA[$value]]>";
            }
        }

        if ( 'g:additional_image_link' == substr( $attribute, 0, 23 ) ) {
            $attribute = 'g:additional_image_link';
        }

        return "$space<$attribute>$value</$attribute>";
    }

    /**
     * Make XML Feed Body
     * @param array $data review product array
     *
     * @return string
     */
    public function create_xml_lines( $data ) {
        $output = '';

        if ( ! empty($data) && is_array($data) ) {
            foreach ( $data as $data_item_key => $data_item ) {
                $chunk_data = array_chunk($data_item, 1, true);
                $output .= '<review>';
                foreach ( $chunk_data as $key => $value ) {
                    foreach ( $value as $item_key => $item_value ) {
                        if ( is_array($item_value) ) {
                            if ( is_int($item_key) ) {
                                $output .= '</'. key($value) .'>';
                                $output .= '<'. key($value) .'>';
                            }else {
                                $output .= '<'. $item_key .'>';
                            }
                        }else {
                            $output .= '<'. $item_key .'>';
                        }
                        if ( is_array($item_value) ) {
                            foreach ( $item_value as $item_value2_key => $item_value2 ) {
                                if ( is_array($item_value2) ) {
                                    if ( is_int($item_value2_key) ) {
                                        $output .= '</'. key($item_value) .'>';
                                        $output .= '<'. key($item_value) .'>';
                                    }else {
                                        $output .= '<'. $item_value2_key .'>';
                                    }
                                }else {
                                    $output .= '<'. $item_value2_key .'>';
                                }
                                if ( is_array($item_value2) ) {

                                    foreach ( $item_value2 as $item_value3_key => $item_value3_value ) {
                                        if ( is_array($item_value3_value) ) {
                                            if ( is_int($item_value3_key) ) {
                                                $output .= '</'. key($item_value2) .'>';
                                                $output .= '<'. key($item_value2) .'>';
                                            }else {
                                                $output .= '<'. $item_value3_key .'>';
                                            }
                                        }else {
                                            $output .= '<'. $item_value3_key .'>';
                                        }
                                        if ( is_array($item_value3_value) ) {
                                            foreach ( $item_value3_value as $item_value4_key => $item_value4_value ) {
                                                if ( is_array($item_value4_value) ) {
                                                    if ( is_int($item_value4_key) ) {
                                                        $output .= '</'. key($item_value2) .'>';
                                                        $output .= '<'. key($item_value2) .'>';
                                                    }else {
                                                        $output .= '<'. $item_value4_key .'>';
                                                    }
                                                }else {
                                                    $output .= '<'. $item_value4_key .'>';
                                                }

                                                if ( is_array($item_value4_value) ) {
                                                    foreach ( $item_value4_value as $item_value5_key => $item_value5_value ) {
                                                        if ( is_array($item_value5_value) ) {
                                                            if ( is_int($item_value5_key) ) {
                                                                $output .= '</'. key($item_value3_value) .'>';
                                                                $output .= '<'. key($item_value3_value) .'>';
                                                            }else {
                                                                $output .= '<'. $item_value5_key .'>';
                                                            }
                                                        }else {
                                                            $output .= '<'. $item_value5_key .'>';
                                                        }

                                                        //test end
                                                        if ( is_array($item_value5_value) ) {
                                                            if ( is_int($item_value5_key) ) {
                                                                $output .= '</'. key($item_value3_value) .'>';
                                                            }else {
                                                                $output .= '</'. $item_value5_key .'>';
                                                            }
                                                        }else {
                                                            $output .= '</'. $item_value5_key .'>';
                                                        }
                                                    }
                                                }else {
                                                    $output .= $item_value4_value;
                                                }

                                                if ( is_array($item_value4_value) ) {
                                                    if ( is_int($item_value4_key) ) {
                                                        $output .= '</'. key($item_value2) .'>';
                                                    }else {
                                                        $output .= '</'. $item_value4_key .'>';
                                                    }
                                                }else {
                                                    $output .= '</'. $item_value4_key .'>';
                                                }
                                            }
                                        }else {
                                            $output .= $item_value3_value;
                                        }
                                        if ( is_array($item_value3_value) ) {
                                            if ( is_int($item_value3_key) ) {
                                                $output .= '</'. key($item_value2) .'>';
                                            }else {
                                                $output .= '</'. $item_value3_key .'>';
                                            }
                                        }else {
                                            $output .= '</'. $item_value3_key .'>';
                                        }
                                    }
                                }else {
                                    $output .= $item_value2;
                                }
                                if ( is_array($item_value2) ) {
                                    if ( is_int($item_value2_key) ) {
                                        $output .= '</'. key($item_value) .'>';
                                    }else {
                                        $output .= '</'. $item_value2_key .'>';
                                    }
                                }else {
                                    $output .= '</'. $item_value2_key .'>';
                                }
                            }
                        }else {
                            $output .= $item_value;
                        }
                        if ( is_array($item_value) ) {
                            if ( is_int($item_key) ) {
                                $output .= '</'. key($value) .'>';
                            }else {
                                $output .= '</'. $item_key .'>';
                            }
                        }else {
                            $output .= '</'. $item_key .'>';
                        }
                    }
                }
                $output .= '</review>';
            }
        }

        return $output;
    }

}
