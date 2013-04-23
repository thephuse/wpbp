<? if ( post_password_required() ) : ?>
				<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
<?
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?
	// You can start editing here -- including this comment!
?>

<? 	if ( have_comments() ) : ?>
		<div class="comments">
			<h3><? comments_number(); ?> <?if(comments_open()){?>(<a href="#respond">Leave One</a>)<?}?></h3>
			<ul id="comments">
				<? wp_list_comments( array( 'avatar_size' => 60 )); ?>
			</ul>
		</div>
<? 		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="pagination">
				<div class="nav">
					<span class="prevbtn"><? next_comments_link( 'Newer Comments' ); ?></span>
					<? previous_comments_link( 'Older Comments' ); ?>
				</div>
			</div>
<? 		endif; // check for comment navigation 

	else : // or, if we don't have comments:

		/* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */
		if( !comments_open() ) :
?>	<p>Comments are closed.</p>
<? 		endif; // end ! comments_open() 

	endif; // end have_comments() 
	
	$fields =  array(
		'author' => '<label for="author">' . __( 'Name' ) . ( $req ? '*' : '' ) . '</label> <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />',
		'email'  => '<label for="email">' . __( 'Email' ) . ( $req ? '*' : '' ) . '</label> <input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />',
		'url'    => '<label for="website">' . __( 'Website' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />',
	);
	
	$required_text = ' Required fields are marked <span class="required">*</span>';


?>	<? comment_form( array(
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field' => '<label for="comment-area">Comments*</label><textarea id="comment-area" name="comment" aria-required="true"></textarea>',
			'comment_notes_before' => '',
			'comment_notes_after' => '<p class="fine-print">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>'
		)); ?>