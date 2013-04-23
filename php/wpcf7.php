<?php
/*
Plugin Name: WPCF7 Customization
Description: Removes the extra stuff from WPCF7
Version: 1.0
Author: Matt Felten
Author URI: http://www.arkitect.org
/* ----------------------------------------------*/


function deregister_cf7_js() {
	if ( !is_page_or_ancestor( 49 ) ) {
		wp_deregister_script( 'contact-form-7' );
	}
}

function deregister_ct7_styles() {
	wp_deregister_style( 'contact-form-7' );
}

// Change the URL to the ajax-loader image
function change_wpcf7_ajax_loader($content) {
	if ( is_page_or_ancestor( 49 ) ) {
		$string = $content;
		$pattern = '/(<img class="ajax-loader" style="visibility: hidden;" alt="ajax loader" src=")(.*)(" \/>)/i';
		$replacement = "$1".get_stylesheet_directory_uri()."/lib/images/load.gif$3";
		$content =  preg_replace($pattern, $replacement, $string);
	}
	return $content;
}
 
// If the Contact Form 7 Exists, do the tweaks
if ( function_exists('wpcf7_contact_form') ) {
	add_action( 'wp_print_styles', 'deregister_ct7_styles', 100 );
	add_action( 'wp_print_scripts', 'deregister_cf7_js', 100 );
	add_filter( 'the_content', 'change_wpcf7_ajax_loader', 100 );
}

?>
