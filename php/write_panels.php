<?php
/*
Plugin Name: Custom Write Panels
Description: Allows custom fields to be added to the WordPress Add / Edit Page. Now supports Custom Post Types.
Version: 2.0
Author: Matt Felten
Author URI: http://www.arkitect.org
/* ----------------------------------------------*/

// Content Options: text, textarea, wysiwyg

$key = "t3";
$meta_boxes = array(
	//event calendar pages
	/*"t3_eventaside" => array(
		"name" => "t3_eventaside",
		"title" => "Sidebar",
		"type" => "t3_event",
		"content" => "wysiwyg",
		"description" => "Put the event poster here or some other image/content [max width: 355 pixels]"
	),*/
	"t3_eventlocation" => array(
		"name" => "t3_eventlocation",
		"title" => "Location",
		"type" => "t3_event",
		"content" => "text",
		"description" => "Location / address for the event"
	),
	
	"t3_calsidebar" => array(
		"name" => "t3_calsidebar",
		"title" => "Sidebar Content",
		"type" => "t3_event",
		"content" => "wysiwyg"
	),
	"t3_calsidebar_btntxt" => array(
		"name" => "t3_calsidebar_btntxt",
		"title" => "Sidebar 1 Button Label",
		"type" => "t3_event",
		"content" => "text"
	),
	"t3_calsidebar_btnurl" => array(
		"name" => "t3_calsidebar_btnurl",
		"title" => "Sidebar 1 Button Link",
		"type" => "t3_event",
		"content" => "text",
		"description" => "Enter the URL for the button"
	),
	"t3_calsidebar2" => array(
		"name" => "t3_calsidebar2",
		"title" => "Sidebar 2 Content",
		"type" => "t3_event",
		"content" => "wysiwyg"
	),
	"t3_calsidebar_btntxt2" => array(
		"name" => "t3_calsidebar_btntxt2",
		"title" => "Sidebar 2 Button Label",
		"type" => "t3_event",
		"content" => "text"
	),
	"t3_calsidebar_btnurl2" => array(
		"name" => "t3_calsidebar_btnurl2",
		"title" => "Sidebar 2 Button Link",
		"type" => "t3_event",
		"content" => "text",
		"description" => "Enter the URL for the button"
	),
	
	"t3_eventmonth" => array(
		"name" => "t3_eventmonth",
		"title" => "Month",
		"description" => "Event Start Date - Month",
		"type" => "t3_event",
		"content" => "dropdown",
		"options" => array("1" => "January",
			"2" => "February",
			"3" => "March",
			"4" => "April",
			"5" => "May",
			"6" => "June",
			"7" => "July",
			"8" => "August",
			"9" => "September",
			"10" => "October",
			"11" => "November",
			"12" => "December"
			)
	),
	"t3_eventday" => array(
		"name" => "t3_eventday",
		"title" => "Day",
		"description" => "Event Start Date - Day",
		"type" => "t3_event",
		"content" => "dropdown",
		"options" => array("1" => "1",
			"2" => "2",
			"3" => "3",
			"4" => "4",
			"5" => "5",
			"6" => "6",
			"7" => "7",
			"8" => "8",
			"9" => "9",
			"10" => "10",
			"11" => "11",
			"12" => "12",
			"13" => "13",
			"14" => "14",
			"15" => "15",
			"16" => "16",
			"17" => "17",
			"18" => "18",
			"19" => "19",
			"20" => "20",
			"21" => "21",
			"22" => "22",
			"23" => "23",
			"24" => "24",
			"25" => "25",
			"26" => "26",
			"27" => "27",
			"28" => "28",
			"29" => "29",
			"30" => "30",
			"31" => "31"
			)
	),
	"t3_eventyear" => array(
		"name" => "t3_eventyear",
		"title" => "Year",
		"description" => "Event Start Date - Year",
		"type" => "t3_event",
		"content" => "dropdown",
		"options" => array("1" => date("Y"),
			"2" => date("Y")+1,
			"3" => date("Y")+2,
			"4" => date("Y")+3
			)
	),
	"t3_eventendmonth" => array(
		"name" => "t3_eventendmonth",
		"title" => "End Month",
		"description" => "Event End Date - Month",
		"type" => "t3_event",
		"content" => "dropdown",
		"options" => array("-1" => "--",
			"1" => "January",
			"2" => "February",
			"3" => "March",
			"4" => "April",
			"5" => "May",
			"6" => "June",
			"7" => "July",
			"8" => "August",
			"9" => "September",
			"10" => "October",
			"11" => "November",
			"12" => "December"
			)
	),
	"t3_eventendday" => array(
		"name" => "t3_eventendday",
		"title" => "End Day",
		"description" => "Event End Date - Day",
		"type" => "t3_event",
		"content" => "dropdown",
		"options" => array("-1" => "--",
			"1" => "1",
			"2" => "2",
			"3" => "3",
			"4" => "4",
			"5" => "5",
			"6" => "6",
			"7" => "7",
			"8" => "8",
			"9" => "9",
			"10" => "10",
			"11" => "11",
			"12" => "12",
			"13" => "13",
			"14" => "14",
			"15" => "15",
			"16" => "16",
			"17" => "17",
			"18" => "18",
			"19" => "19",
			"20" => "20",
			"21" => "21",
			"22" => "22",
			"23" => "23",
			"24" => "24",
			"25" => "25",
			"26" => "26",
			"27" => "27",
			"28" => "28",
			"29" => "29",
			"30" => "30",
			"31" => "31"
			)
	),
	"t3_eventendyear" => array(
		"name" => "t3_eventendyear",
		"title" => "End Year",
		"description" => "Event End Date - Year",
		"type" => "t3_event",
		"content" => "dropdown",
		"options" => array("1" => date("Y"),
			"2" => date("Y")+1,
			"3" => date("Y")+2,
			"4" => date("Y")+3
			)
	),
	//single event page
	"t3_eventintro" => array(
		"name" => "t3_eventintro",
		"title" => "Intro Paragraph",
		"type" => "t3_eventpage",
		"content" => "wysiwyg"
	),
	"t3_eventimg" => array(
		"name" => "t3_eventimg",
		"title" => "Intro Image",
		"type" => "t3_eventpage",
		"content" => "text",
		"description" => "URL of the image that appears in the intro at the top of the page"
	),
	"t3_eventsidebar" => array(
		"name" => "t3_eventsidebar",
		"title" => "Sidebar Content",
		"type" => "t3_eventpage",
		"content" => "wysiwyg"
	),
	"t3_eventsidebar_btntxt" => array(
		"name" => "t3_eventsidebar_btntxt",
		"title" => "Sidebar 1 Button Label",
		"type" => "t3_eventpage",
		"content" => "text"
	),
	"t3_eventsidebar_btnurl" => array(
		"name" => "t3_eventsidebar_btnurl",
		"title" => "Sidebar 1 Button Link",
		"type" => "t3_eventpage",
		"content" => "text",
		"description" => "Enter the URL for the button"
	),
	"t3_eventsidebar2" => array(
		"name" => "t3_eventsidebar2",
		"title" => "Sidebar 2 Content",
		"type" => "t3_eventpage",
		"content" => "wysiwyg"
	),
	"t3_eventsidebar_btntxt2" => array(
		"name" => "t3_eventsidebar_btntxt2",
		"title" => "Sidebar 2 Button Label",
		"type" => "t3_eventpage",
		"content" => "text"
	),
	"t3_eventsidebar_btnurl2" => array(
		"name" => "t3_eventsidebar_btnurl2",
		"title" => "Sidebar 2 Button Link",
		"type" => "t3_eventpage",
		"content" => "text",
		"description" => "Enter the URL for the button"
	),
	"t3_upcoming" => array(
		"name" => "t3_upcoming",
		"title" => "Upcoming Event ID",
		"type" => "t3_eventpage",
		"content" => "text",
		"description" => "Find and enter the post ID associated with the next upcoming event date"
	),
	//normal content pages
	"t3_pagesidebar" => array(
		"name" => "t3_pagesidebar",
		"title" => "Sidebar 1 Content",
		"type" => "page",
		"content" => "wysiwyg"
	),
	"t3_pagesidebar_btntxt" => array(
		"name" => "t3_pagesidebar_btntxt",
		"title" => "Sidebar 1 Button Label",
		"type" => "page",
		"content" => "text"
	),
	"t3_pagesidebar_btnurl" => array(
		"name" => "t3_pagesidebar_btnurl",
		"title" => "Sidebar 1 Button Link",
		"type" => "page",
		"content" => "text",
		"description" => "Enter the URL for the button"
	),
	"t3_pagesidebar2" => array(
		"name" => "t3_pagesidebar2",
		"title" => "Sidebar 2 Content",
		"type" => "page",
		"content" => "wysiwyg"
	),
	"t3_pagesidebar_btntxt2" => array(
		"name" => "t3_pagesidebar_btntxt2",
		"title" => "Sidebar 2 Button Label",
		"type" => "page",
		"content" => "text"
	),
	"t3_pagesidebar_btnurl2" => array(
		"name" => "t3_pagesidebar_btnurl2",
		"title" => "Sidebar 2 Button Link",
		"type" => "page",
		"content" => "text",
		"description" => "Enter the URL for the button"
	),
);

function writePanel_create() {
	global $meta_boxes, $key;
	
	$thisPage = false;
	foreach($meta_boxes as $meta_box) :
		if( $meta_box['type'] == writePanel_postType() ) :
			$thisPage = true;
		endif;
	endforeach;
	if( $thisPage == false ) :
		return;
	endif;

	if( function_exists( 'add_meta_box' ) ) :
		add_meta_box( 'new-meta-boxes', $key . ' Custom Page Options', 'writePanel_display', writePanel_postType(), 'normal', 'high' );
	endif;
}

function writePanel_display() {
	global $meta_boxes, $key;
	
?>
<div class="form-wrap">
<?php
	wp_nonce_field( plugin_basename( __FILE__ ), str_replace(" ", "_", $key ) . '_wpnonce', false, true );
	
	$data = get_post_meta( writePanel_postID() , str_replace(" ", "_", $key ), true);
	foreach($meta_boxes as $meta_box) :
		if( $meta_box['type'] == writePanel_postType() ) :
			if ( $meta_box[ 'content' ] == "text" ) :
?><div class="form-field form-required">
	<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
	<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?>" />
<?				if( $meta_box['description'] ) :
?>	<p><?php echo $meta_box[ 'description' ]; ?></p>
<?				endif;
?></div>

<? 			endif;
		
			if ( $meta_box[ 'content' ] == "textarea" ) :
?><div class="form-field form-required">
	<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
	<textarea name="<?php echo $meta_box[ 'name' ]; ?>" ><?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?></textarea>
<?				if( $meta_box['description'] ) :
?>	<p><?php echo $meta_box[ 'description' ]; ?></p>
<?				endif;
?></div>
<? 			endif;
		
			if ( $meta_box[ 'content' ] == "wysiwyg" ) :
?><div class="form-field form-required">
	<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
	<div>
		<textarea id="<?php echo $meta_box[ 'name' ]; ?>"name="<?php echo $meta_box[ 'name' ]; ?>" ><?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?></textarea>
	</div>
<?				if( $meta_box['description'] ) :
?>	<p><?php echo $meta_box[ 'description' ]; ?></p>
<?				endif;
?></div>
<? 			endif;
			
			if( $meta_box['content'] == 'dropdown' && !empty( $meta_box['options'] ) ) :
?><div class="form-field form-required <?php echo $meta_box[ 'name' ]; ?>">
	<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
	<div>
		<select name="<?=$meta_box['name']?>">
<?				foreach( $meta_box['options'] as $k => $v ) :
					if( isset( $data[ $meta_box['name'] ] ) &&  $data[ $meta_box['name'] ] == $v ) :
?>			<option value="<?=$v?>" selected="selected"><?=$v?></option>
<?					else :
?>			<option value="<?=$v?>"><?=$v?></option>
<?					endif;
				endforeach;
?>		</select>
	</div>
<?				if( $meta_box['description'] ) :
?>	<p><?php echo $meta_box[ 'description' ]; ?></p>
<?				endif;
?></div>


<?			endif;
		endif;
	endforeach;
?></div>
<?php
}

function writePanel_tinyMCE() {
	global $meta_boxes;
	$wysiwyg_editors = array();
	
	foreach($meta_boxes as $meta_box) {
		if ( $meta_box[ "content" ] == "wysiwyg" ) {
			$wysiwyg_editors[] = $meta_box['name'];
		}
	}
	
	if ( count( $wysiwyg_editors ) > 0 ) {
		foreach ($wysiwyg_editors as $editorId) {
			$wysiwygIds[] = "#".$editorId;
		}
		$editorIds = implode(",", $wysiwygIds);
		?>
		<script type="text/javascript">
			/* <![CDATA[ */
				// JQ JS to add the class 'mceEditor' to the excerpt textarea pre WP 2.5
				jQuery(document).ready( function () { 
					jQuery("<?=$editorIds?>").addClass("mceEditor"); 
					if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
						jQuery("<?=$editorIds?>").wrap( "<div id='editorcontainer'></div>" );
						<? foreach ($wysiwyg_editors as $editorId) { ?>
						tinyMCE.execCommand("mceAddControl", false, "<?=$editorId?>");
						<? } ?>
					}
				}); 
			/* ]]> */
		</script>
		<?php
	}
}

function writePanel_save( $post_id ) {
	global $meta_boxes, $key;
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post->ID;
	}
	
	foreach( $meta_boxes as $meta_box ) {
		$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
		if ($meta_box[ 'content' ] == "wysiwyg") {
			$data[ $meta_box[ 'name' ] ] = wpautop( $_POST[ $meta_box[ 'name' ] ] );
		}
	}

	if ( !wp_verify_nonce( $_POST[ str_replace(" ", "_", $key ) . '_wpnonce' ], plugin_basename(__FILE__) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', writePanel_postID() ))
		return $post_id;

	update_post_meta( $post_id, str_replace(" ", "_", $key ), $data );
}

function writePanel_postID() {
	if ( isset($_GET['post']) )
		$post_id = (int) $_GET['post'];
	elseif ( isset($_POST['post_ID']) )
		$post_id = (int) $_POST['post_ID'];
	else
		$post_id = 0;
	return $post_id;
}

function writePanel_post( $id = false ) {
	if( $id ) :
		$post = get_post( $id ) ;
	else :
		$post = get_post( writePanel_postID() );
	endif;
	return $post;
}

function writePanel_postType() {
	global $post;
	$post_id = writePanel_postID();
	if( $_REQUEST['post_type'] ) :
		return $_REQUEST['post_type'];
	endif;
	
	if( $post ) :
		return $post->post_type;
	else :
		if( $post_id ) :
			$post = writePanel_post( $post_id );
			if( $post ) :
				return $post->post_type;
			endif;
		endif;
	endif;
	return null;
}

if ( is_admin() ) {
	add_action( 'admin_menu', 'writePanel_create' );
	add_action( 'admin_head', 'writePanel_tinyMCE');
	add_action( 'save_post', 'writePanel_save' );
}
?>
