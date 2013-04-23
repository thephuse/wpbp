<?php
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rel_canonical' );


if( !function_exists( 'mf_rearrange_menu' ) ) :
	function mf_rearrange_menu() {
		global $menu;
		
		$posts = $menu[5];
		$media = $menu[10];
		$links = $menu[15];
		$pages = $menu[20];
		$comments = $menu[25];
		
		unset($menu[5]); // Unset Posts
		unset($menu[10]); // Unset Media
		unset($menu[15]); // Unset Links
		unset($menu[20]); // Unset Pages
		unset($menu[25]); // Unset Comments

		$menu[5] = $pages;		
		$menu[10] = $media;
		
		//$menu[30] = array( '', 'read', 'separator2', '', 'wp-menu-separator' );
	}
	if( is_admin() ) :
		add_action('admin_menu', 'mf_rearrange_menu');
	endif;
endif;

if( !function_exists( 'mf_remove_widgets' ) ) :
	function mf_remove_widgets() {	
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
		//remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
	
		remove_meta_box( 'postcustom', 'post', 'normal' ); // Custom Fields
		//remove_meta_box( 'postexcerpt', 'post', 'normal' );
		//remove_meta_box( 'commentstatusdiv', 'post', 'normal' ); // Discussion	
		//remove_meta_box( 'commentsdiv', 'post', 'normal' );
		remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
		remove_meta_box( 'slugdiv', 'post', 'normal' );
		remove_meta_box( 'authordiv', 'post', 'normal' );
		//remove_meta_box( 'tagsdiv', 'post', 'side' );
		
		remove_meta_box( 'postcustom', 'page', 'normal' ); // Custom Fields	
		remove_meta_box( 'commentstatusdiv', 'page', 'normal' ); // Discussion
		remove_meta_box( 'commentsdiv', 'page', 'normal' );	
		remove_meta_box( 'slugdiv', 'page', 'normal' );	
		remove_meta_box( 'authordiv', 'page', 'normal' );		
		remove_meta_box( 'tagsdiv', 'page', 'side' );
	}

	if( is_admin() ) :
		add_action('admin_menu', 'mf_remove_widgets' );
	endif;
endif;


add_action( 'admin_head', 'mf_admin_css' );
add_action( 'admin_print_footer_scripts', 'mf_admin_js' );

if( !function_exists( 'mf_admin_css' ) ) :
	function mf_admin_css() {
		echo <<<CSS
	<style type="text/css">
		#header-logo, #wphead #site-visit-button, #favorite-actions, #contextual-help-link-wrap, #user_info p > a[href='profile.php'], #footer { display:none; }
	</style>
CSS;
	}
endif;

if( !function_exists( 'mf_admin_js' ) ) :
	function mf_admin_js() {
		echo <<<JS
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#user_info p').after('<p></p>');
			$('#user_info p > a, #user_info p > span').appendTo($('#user_info p:last'));
			$('#user_info p:first').remove();
			$('#contextual-help-link-wrap').remove();
		});
	</script>
JS;
	}
endif;

?>