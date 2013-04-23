<?php
/*
Plugin Name: Custom Get Functions
Description: Custom functions to pull needed info easily
Version: 1.0
Author: Matt Felten
Author URI: http://www.arkitect.org
/* ----------------------------------------------*/

if (!function_exists('get_page_id')) {
	// Get the id of a page by its name
	function get_page_id($page_name){
		global $wpdb;
		$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
		return $page_name;
	}
}

function is_subpage($parent = null) {
	global $post;
	if ( is_page() && $post->post_parent ) {
		if ($parent) {
			if ($parent == $post->post_parent) {
				return true;
			}else {
				return false;
			}
		}else {
			$parentID = $post->post_parent;
			return $parentID;
		}
	} else {
		return false;
	};
};

if(!function_exists('get_title')) {
	function get_title($page) {
		global $wpdb;
		
		if(!is_numeric($page)) {
			$page = get_page_id($page);
		}
		
		$title = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID = '".$page."'");
		return nl2br($title);
	}
}

if(!function_exists('get_slug')) {
	function get_slug($page) {
		global $wpdb;
		
		if(!is_numeric($page)) {
			$page = get_page_id($page);
		}
		
		$title = $wpdb->get_var("SELECT post_name FROM $wpdb->posts WHERE ID = '".$page."'");
		return nl2br($title);
	}
}

if(!function_exists('get_content')) {
	function get_content($page, $count) {
		global $wpdb;
		
		if(!is_numeric($page)) {
			$page = get_page_id($page);
		}
		
		$content = $wpdb->get_var("SELECT post_content_filtered FROM $wpdb->posts WHERE ID = '".$page."'");
		if (is_numeric($count)) {
			$content = textLimit($content, $count, 'word');
		}
		return apply_filters('the_content', $content);
	}
}

function countPosts($query) {
	$myPosts = new WP_Query();
	$myPosts->query($query);
	$count = 0;
	while ($myPosts->have_posts()) : $myPosts->the_post();
		$count++;
	endwhile;
	return $count;
}

function getFiles( $from = '.', $exempt = array('.','..','.ds_store','.svn'), $return = "file") {
	$files = array();
	if( is_dir($from) ) {    
    	if( $dh = opendir($from)) {
	        while( false !== ($file = readdir($dh)))  {
	            if(!in_array(strtolower($file),$exempt)) {
	             	$path = $from . '/' . $file;
	            	if( is_dir($path) ) {
						$files += rec_listFiles($path, $exempt, $return);
		            } else {
						if ($return == "file") {
							$files[] = $file;
						}else {
							$files[] = $path;
						}
					}
				}
	        }
	        closedir($dh);
	    }
	}
    return $files;
}

if (!function_exists('getTopLevelPage')) {
	// Get the id of a page by its name
	function getTopLevelPage(){
		global $post;
		$ancestors = count( $post->ancestors );
		if ($ancestors == 0) {
			$topLevel = $post->ID;
		}else {
			$topLevel = $post->ancestors[$ancestors - 1];
		}		
		
		return $topLevel;
	}
}

if (!function_exists('is_page_or_ancestor')) {
  function is_page_or_ancestor($page = '') { 
    global $post;

	$cat = $page;
    
    // If is not numeric get page ID
  	if (!is_numeric($page)) {
    	$page = get_page_id($page);

		$cat = get_cat_id($cat);
  	}
    
    // Recursive search through page hierarchy
    if ( is_page($page) || ( is_page() && in_array($page, $post->ancestors) ) ) {
    	return true;
    }

	// Check Category
	if ( (is_single() && in_category($cat) ) || is_category($cat) ) {
		return true;
	}
    return false;
  }
}

function get_first_image() {
	global $post, $posts;
	$first_img = '';

	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];

	if( empty( $first_img ) ) { //Defines a default image with 0 width
  		return false;
  	} else {
		return $first_img;
	}
}

function textLimit($string, $length, $type = 'char', $replacer = '...'){
	if ($type == 'char') {
		if(strlen($string) > $length) {
	  		return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
		}
	}else if ($type == 'word') {
		$explode = explode(' ',$string);
		if(count($explode) > $length){
	        for ($i = count($explode); $i > $length; $i--) {
				array_pop($explode);
			}
			return implode(" ", $explode).$replacer;
	    }
	}
	
	return $string;
}
?>
