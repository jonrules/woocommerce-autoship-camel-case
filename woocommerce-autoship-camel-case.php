<?php

/*
Plugin Name: WC Autoship Camel Case
Plugin URI: https://wooautoship.com
Description: Change instances of 'Auto-Ship' to 'AutoShip'
Version: 1.0
Author: Patterns In the Cloud
Author URI: http://patternsinthecloud.com
License: Single-site
*/

function wc_autoship_camel_case_install() {

}
register_activation_hook( __FILE__, 'wc_autoship_camel_case_install' );

function wc_autoship_camel_case_deactivate() {

}
register_deactivation_hook( __FILE__, 'wc_autoship_camel_case_deactivate' );

function wc_autoship_camel_case_uninstall() {

}
register_uninstall_hook( __FILE__, 'wc_autoship_camel_case_uninstall' );

function wc_autoship_camel_case_replace( $translated_text, $text, $domain ) {
	if ( strpos( $domain, 'wc-autoship' ) !== 0 ) {
		return $translated_text;
	}

	$find = array(
		'Auto-Ship',
		'auto-ship',
		'Autoship'
	);
	$replace = array(
		'AutoShip',
		'autoship',
		'AutoShip'
	);
	$translation = str_replace( $find, $replace, $translated_text );
	return $translation;
}
add_filter( 'gettext', 'wc_autoship_camel_case_replace', 10, 3 );