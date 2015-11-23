<?php
/*
Plugin Name: Pressbooks mPDF
Description: Open source PDF generation for Pressbooks via the mPDF library.
Version: 1.0
Author: BookOven Inc.
Author URI: http://www.pressbooks.com
Text Domain: pressbooks
License: GPLv2
*/

if ( ! defined( 'ABSPATH' ) )
	return;


// -------------------------------------------------------------------------------------------------------------------
// Setup some defaults
// -------------------------------------------------------------------------------------------------------------------

if ( ! defined( 'PB_MPDF_DIR' ) )
	define ( 'PB_MPDF_DIR', __DIR__ . '/' ); // Must have trailing slash!
	
// -------------------------------------------------------------------------------------------------------------------
// Check mpdf export paths
// -------------------------------------------------------------------------------------------------------------------

add_action( 'admin_notices', function () {
	$paths = array(
		PB_MPDF_DIR . 'symbionts/mpdf/ttfontdata',
		PB_MPDF_DIR . 'symbionts/mpdf/tmp',
		PB_MPDF_DIR . 'symbionts/mpdf/graph_cache',
	);

	foreach ( $paths as $path ) {
		if ( ! is_writable( $path ) ) {
			$_SESSION['pb_errors'][] = sprintf( __('The path "%s" is not writable. Please check and adjust the ownership and file permissions for mpdf export to work properly.', 'pressbooks'), $path );
		}
	}
} );