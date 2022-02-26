<?php
// If the file is accessed directly, close access
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	exit();

$skuautoffxf_auto_number = 'skuautoffxf_auto_number';
$skuautoffxf_auto_prefix = 'skuautoffxf_auto_prefix';
$skuautoffxf_letters_and_numbers = 'skuautoffxf_letters_and_numbers';
$skuautoffxf_auto_id = 'skuautoffxf_auto_ID';
$skuautoffxf_auto_variant = 'skuautoffxf_auto_variant';
$skuautoffxf_previous = 'skuautoffxf_previous';
$glideffxf_data_install = 'glideffxf_data_install';
$skuautoffxf_duplicate_sku = 'skuautoffxf_duplicate_sku';

// For a regular site.
if ( !is_multisite() ) {
    delete_option( $skuautoffxf_auto_number );
    delete_option( $skuautoffxf_auto_prefix );
    delete_option( $skuautoffxf_letters_and_numbers );
    delete_option( $skuautoffxf_auto_id );
    delete_option( $skuautoffxf_auto_variant );
    delete_option( $skuautoffxf_previous );
	delete_option( $glideffxf_data_install );
    delete_option( $skuautoffxf_duplicate_sku );
} 
// For multisite assembly.
else {
	global $wpdb;

	$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
	$original_blog_id = get_current_blog_id();

	foreach ( $blog_ids as $blog_id )   {
		switch_to_blog( $blog_id );
        delete_site_option( $skuautoffxf_auto_number );
        delete_site_option( $skuautoffxf_auto_prefix );
        delete_site_option( $skuautoffxf_letters_and_numbers );  
        delete_site_option( $skuautoffxf_auto_id );
        delete_site_option( $skuautoffxf_auto_variant );
        delete_site_option( $skuautoffxf_previous );
		delete_site_option( $glideffxf_data_install );
        delete_site_option( $skuautoffxf_duplicate_sku );
	}

	switch_to_blog( $original_blog_id );
}