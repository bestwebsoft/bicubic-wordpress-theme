<?php
/**
 * The template for displaying Comments
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
} ?>
<?php if ( have_comments() ) : ?>
	<div class="bicubic-comments">
		<h3 id="comments">
			<?php printf( _n( '%1$s response to &#8220;%2$s&#8221;', '%1$s responses to &#8220;%2$s&#8221;', get_comments_number(), 'bicubic' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
		</h3><!-- #comments -->
		<div class="bicubic-comments-navigation">
			<div class="alignleft"><?php previous_comments_link( '&larr; ' . __( 'Older comments', 'bicubic' ) ) ?></div>
			<div class="alignright"><?php next_comments_link( __( 'Newer comments', 'bicubic' ) . '&rarr;' ) ?></div>
		</div><!-- .bicubic-comments-navigation -->
		<div class="commentlist">
			<?php wp_list_comments( 'type=all&callback=bicubic_comment' ); ?>
		</div><!-- .commentlist -->
		<div class="bicubic-comments-navigation">
			<div class="alignleft"><?php previous_comments_link( '&larr; ' . __( 'Older comments', 'bicubic' ) ) ?></div>
			<div class="alignright"><?php next_comments_link( __( 'Newer comments', 'bicubic' ) . '&rarr;' ) ?></div>
		</div><!-- .bicubic-comments-navigation -->
	</div><!-- .bicubic-comments-->
<?php else :
	if ( comments_open() ) : ?>
		<div class="bicubic-comments">
			<h3><?php _e( 'There are no comments', 'bicubic' ); ?></h3>
		</div><!-- .bicubic-comments-->
	<?php elseif ( get_post_type() != 'page' ) : ?>
		<div class="bicubic-comments">
			<h3><?php _e( 'Comments are closed.', 'bicubic' ); ?></h3>
		</div><!-- .bicubic-comments-->
	<?php endif;
endif;
if ( comments_open() ) {
	comment_form();
}
