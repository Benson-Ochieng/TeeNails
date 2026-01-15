<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
		return;
?>
<div>
	<div class="comments-wrapper">
	<?php if ( have_comments() ) : ?>
		<h5 class="h5-xl"><?php comments_number( esc_html__('0 Comments', 'lanotte'), esc_html__('1 Comment', 'lanotte'), esc_html__('% Comments', 'lanotte') ); ?></h5>
			<?php wp_list_comments('callback=lanotte_theme_comment'); ?>
	<?php endif; ?>
<?php
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$comment_args = array(
				'class_container' => '',
				'id_form' => '',        
				'class_form' => 'row comment-form',                       
				'title_reply'=>esc_html__( 'Leave A Comment', 'lanotte' ),
				'title_reply_before' =>'<h5 class="h5-xl">',
				'title_reply_after' => '</h5>',
				'fields' => apply_filters( 'comment_form_default_fields', array(
						'author'    => '<div class="col-md-12">
								<p class="black--color">Name*</p>
								<input type="text" name="name" class="form-control name" placeholder="'.esc_attr__('Enter Your Name*', 'lanotte').'" required> 
							</div>',
						'email'     => '<div class="col-md-12">
								<p class="black--color">Email*</p>
								<input type="email" name="email" class="form-control email" placeholder="'.esc_attr__('Enter Your Email*', 'lanotte').'" required> 
							</div>',
				) ),   
				'comment_field' => '<div class="col-md-12 input-message">
										<p class="black--color">Add Comment *</p>
										<textarea class="form-control message" name="comment" rows="6" placeholder="'.esc_attr__('Write a comment...', 'lanotte').'" required></textarea>
									</div>',
				'label_submit' => esc_html__( 'Post A Comment', 'lanotte' ),
				'submit_button' =>  '<button type="submit" class="btn rose--btn tra-black--hover %3$s" name="%1$s" id="%2$s">%4$s</button>',
				'submit_field' => 	'<div class="col-lg-12 form-btn">%1$s %2$s</div>',
				'comment_notes_before' => '',
				'comment_notes_after' => '',               
			)
?>		
		</div>
</div>
<?php if ( comments_open() ) : ?>
<?php comment_form($comment_args); ?>
<?php endif; ?> 
