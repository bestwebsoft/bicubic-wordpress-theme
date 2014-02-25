<?php
/**
 * The template for displaying the footer
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */ 
?>
</div><!-- .bicubic-container -->
<footer class="bicubic-footer bicubic-clear">
	<div>
		<div id="copyright" class="alignleft">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' );?></div>
		<div id="powered" class="alignright"><?php _e( 'Powered by', 'bicubic' ) ?> <a href="<?php echo esc_url( 'https://github.com/bestwebsoft' ); ?>" target="blank">Bestwebsoft</a> <?php _e( 'and' ,'bicubic' ); ?> <a href="http://wordpress.org/" target="blank">WordPress</a></div>
		<div class="bicubic-clear"></div>
	</div>	
</footer><!-- .bicubic-footer -->
<?php wp_footer(); ?>		
</body><!-- body -->
</html><!-- html -->