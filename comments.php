<?php 
/**
 * The template for displaying Comments
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */

if ( !empty( $_SERVER[ 'SCRIPT_FILENAME' ] ) && 'comments.php' == basename( $_SERVER[ 'SCRIPT_FILENAME' ] ) )
	die ( 'Please do not load this page directly. Thanks!' );
if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'bicubic' ); ?></p>
<?php return;
}
// if have some comments show them
if ( have_comments() ) : ?>
	<div class="bicubic-comments">
		<!-- title of the commentlist -->
		<h3 id="comments">
			<?php $n = get_comments_number(); 
				printf( _n( 'One Response to', '%1$s Response to' , $n, 'bicubic' ), $n);
				echo ' &#8220;' . get_the_title() . '&#8221;'; ?>			
		</h3><!-- #comments -->
		<!-- comments navigation -->
		<div class="bicubic-comments-navigation">
			<div class="alignleft"><?php previous_comments_link( '&larr; ' . __( 'Older comments', 'bicubic' ) ) ?></div>
			<div class="alignright"><?php next_comments_link( __( 'Newer comments', 'bicubic' ) . '&rarr;' ) ?></div>
		</div><!-- .bicubic-comments-navigation -->
		<!-- show comments -->
		<div class="commentlist">
			<?php wp_list_comments( 'type=all&callback=bicubic_comment' ); ?>  
		</div><!-- .commentlist -->
		<!-- comments navigation -->
		<div class="bicubic-comments-navigation">
			<div class="alignleft"><?php previous_comments_link( '&larr; ' . __( 'Older comments', 'bicubic' ) ) ?></div>
			<div class="alignright"><?php next_comments_link( __( 'Newer comments', 'bicubic' ) . '&rarr;' ) ?></div>
		</div><!-- .bicubic-comments-navigation -->
	</div><!-- .bicubic-comments-->	 
<?php else :
	/* this is displayed if there are no comments, but comments are open */
	if ( comments_open() ) : ?>
		<div class="bicubic-comments">
			<!-- if comments are open, but there are no comments. -->
			<h3><?php _e( 'There are no comments', 'bicubic' ); ?></h3>
		</div><!-- .bicubic-comments-->	 
		<!-- this is displayed if comments are closed and post type is not "page"-->
	<?php elseif ( get_post_type() != 'page' ) : ?>
		<div class="bicubic-comments">
			<h3><?php _e( 'Comments are closed.', 'bicubic' ); ?></h3>
		</div><!-- .bicubic-comments-->	 
	<?php endif;
endif; ?>
<!-- if comments are open show comment form -->
<?php if ( comments_open() ) {
	comment_form(); //show commet form 
} ?>