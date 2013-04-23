<?php
//Include any of these as needed:
//include( TEMPLATEPATH . '/php/defaults.php' );
//include( TEMPLATEPATH . '/php/getInfo.php' );
//include( TEMPLATEPATH . '/php/shortcodes.php' );
//include( TEMPLATEPATH . '/php/wpcf7.php' );
//include( TEMPLATEPATH . '/php/write_panels.php' );

// add different sizes of featured images/post thumbnails
if( function_exists( 'add_theme_support' ) ) :
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 200, true ); // default post thumbnails
	add_image_size( 'rotator', 660, 300, true ); // featured post rotator size
	add_image_size( 'smthumb', 80, 80, true ); // small post thumbnails
endif;

// register one or more sidebar areas
if ( function_exists('register_sidebar') )
    register_sidebars(1, array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    )
  );

// set up main nav menu
add_action( 'init', 'add_menus' );
function add_menus() {
	if( function_exists( 'register_nav_menu' ) ) :
		register_nav_menu( 'main-nav', 'Main Navigation' );
	endif;	
}

// custom header support, use for an editable banner or logo
$headerDefaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 960,
	'height'                 => 150,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $headerDefaults );

// modified from http://pastebin.com/aUZuQrZy snippet for different excerpt lengths
// this uses the post content regardless of custom excerpt
/* eg:
	<?php if($post->post_excerpt) {
		the_excerpt();
	} else {
		custom_excerpt(16);
	}?>
*/
function custom_excerpt($excerpt_length = 55, $id = false, $echo = true) {
    $text = '';

	global $post;
	$text = get_the_content('');

	$text = strip_shortcodes( $text );
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
	
	$text = strip_tags($text);
	
		$excerpt_more = '...';
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		} else {
			$text = implode(' ', $words);
		}
	if($echo)
  echo apply_filters('the_content', $text);
	else
	return $text;
}

function get_custom_excerpt($excerpt_length = 55, $id = false, $echo = false) {
 return custom_excerpt($excerpt_length, $id, $echo);
}

// Custom Post Types
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'slides',
    array(
      'labels' => array(
        'name' => __( 'Home Slides' ),
        'singular_name' => __( 'Home Slide' )
      ),
      'public' => false,
      'show_ui' => true,
      'rewrite' => false,
      'query_var' => false,
      'exclude_from_search' => true,
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
    )
  );
  // for a public custom post type
	/*register_post_type( 'custom',
		array(
      'labels' => array(
				'name' => __( 'Custom' ),
				'singular_name' => __( 'Custom' )
			),
      'public' => true,
      'show_ui' => true,
      'rewrite' => true,
      'query_var' => false,
      'has_archive' => true,
      'supports' => array('title', 'editor')
		)
	);*/
}

//get custom field value
function get_custom_field($key, $echo = FALSE) {
  global $post;
  $custom_field = get_post_meta($post->ID, $key, true);
  if ($echo == FALSE) return $custom_field;
  echo $custom_field;
}

?>