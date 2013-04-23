<?php
/*
Plugin Name: Custom Shortcodes
Description: Added custom shortcodes
Version: 1.0
Author: Matt Felten
Author URI: http://www.arkitect.org
/* ----------------------------------------------*/

function sc_secure_mail($atts) {
	extract(shortcode_atts(array(
		"mailto" => '',
		"txt" => ''
	), $atts));
	$mailto = antispambot($mailto, 1);
	$txt = antispambot($txt);
	return '<a href="mailto:' . $mailto . '">' . $txt . '</a>';
}

function sc_get_permalink($atts) {
	extract(shortcode_atts(array(
		"page" => '',
		"post" => '',
		"cat" => ''
	), $atts));
	
	if ($page != "")
		return get_permalink($page);
	
	if ($post != "")
		return get_permalink($post);
		
	if ($cat != "")
		return get_category_link($cat);
}

function sc_get_rss() {
	global $lib;
	
	$content = '<div class="rss">'."\n";
	$content .= '<h4>News by <span>|</span><a href="http://www.adbrandetc.com"><img src="'.$lib.'images/logo.adbrandetc.png" width="100" height="22" alt="Ad Brand Etc" /></a></h4>'."\n";
	
	$rss = fetch_feed('http://www.adbrandetc.com/category/elephantik/feed/');
	$maxitems = $rss->get_item_quantity(3);
	$rss_items = $rss->get_items(0, $maxitems);

	if ($maxitems == 0) :
		$content .= "<p>No items.</p>\n";
	else :
	    foreach ( $rss_items as $item ) : 
		    $content .= '<div class="rssPost">'."\n";
			$content .= '<p class="date">'.$item->get_date('n.j.y')."</p>\n";
			$content .= '<h3><a href="'.$item->get_permalink().'">'.$item->get_title()."</a></h3>\n";
			$content .= "<p>".$item->get_description()."</p>\n";
			$content .= "</div>\n";
	    endforeach;
	endif;
	
	$content .= "</div>\n";
	return $content;
}

if ( function_exists('add_shortcode') ) {
	add_shortcode('sm', 'sc_secure_mail');
	add_shortcode('link', 'sc_get_permalink');
	add_shortcode('rss', 'sc_get_rss');
	add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 3600;' ) );
}
?>
