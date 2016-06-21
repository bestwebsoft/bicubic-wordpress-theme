<?php
/**
 * The template for displaying image attachments
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */
get_header(); ?>
<!-- content -->
<div class="entry-content">
	<?php if ( have_posts() ) :
		//the loop begin
		while ( have_posts() ) : the_post(); ?>
			<div <?php post_class() ?> >
				<!-- title of the post  -->
				<div class="bicubic-post-title">
					<h2><?php the_title(); ?></h2>
				</div><!-- .bicubic-post-title -->
				<div class="bicubic-attachment-meta">
					<div class="bicubic-post-date">
						<?php $metadata = wp_get_attachment_metadata();
						//show the date of publication
						_e( 'Posted on', 'bicubic' ); ?>
						<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"> <?php echo esc_html( get_the_date() ); ?></time>
						<?php _e( 'at', 'bicubic' ); ?>
						<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="<?php _e( 'Link to full-size image', 'bicubic' ); ?>"><?php echo $metadata['width']; ?> &times <?php echo $metadata['height']; ?></a>
						<?php _e( 'in', 'bicubic' ); ?>
						<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php _e( 'Return to', 'bicubic' );
						echo ' ' . esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a>.
						<?php //show edit post link
						edit_post_link( __( '(Edit)', 'bicubic' ), ' <span class="edit-link">', '</span>' ); ?>
					</div>
				</div><!-- .bicubic-attachment-meta -->
			</div><!-- post_class() -->
						<!-- navigation -->
			<div class="bicubic-nav-link">
				<div class="alignleft"><?php previous_image_link( false, '&larr; ' . __( 'Previous', 'bicubic' ) ); ?></div>
				<div class="alignright"><?php next_image_link( false, __( 'Next', 'bicubic' ) . ' &rarr;' ); ?></div>
				<div class="bicubic-clear"></div>
			</div><!-- .bicubic-nav-link -->
						<!-- content part -->
			<div class="bicubic-attachment">
				<?php $attachments = array_values( get_children( array(
					'post_mime_type' => 'image',
					'post_status'    => 'inherit',
					'post_parent'    => $post->post_parent,
					'post_type'      => 'attachment',
					'orderby'        => 'menu_order ID',
					'order'          => 'ASC',
				) ) );
				foreach ( $attachments as $k => $attachment ) :
					if ( $attachment->ID == $post->ID ) {
						break;
					}
				endforeach;
				//go to next image by click on attachment
				$k ++;
				//if there is more than 1 attachment in a gallery
				if ( count( $attachments ) > 1 ) :
					if ( isset( $attachments[ $k ] ) ) :
						// get the url of the next image attachment
						$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
					else :
						// or get the url of the first image attachment
						$next_attachment_url = get_attachment_link( $attachments[0]->ID );
					endif;
				else :
					// or, if there's only 1 image, get the URL of the image
					$next_attachment_url = wp_get_attachment_url();
				endif; ?>
				<!-- display attachment -->
				<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
					<?php echo wp_get_attachment_image( $post->ID, 'full' ); ?>
				</a>
				<!-- display description if it exist-->
				<?php if ( ! empty( $post->post_excerpt ) ) : ?>
					<div class="bicubic-attachment-caption">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; ?>
			</div><!-- .bicubic-attachment -->
			<!-- comments to post -->
			<?php comments_template();
		endwhile;
		// the loop end
	endif; ?>
</div><!-- .entry-content -->
<div class="bicubic-clear"></div>
<!-- footer -->
<?php get_footer();
