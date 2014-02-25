<?php 
/**
 * The template for displaying search form
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */
?>
<form name="search-form" id="search" action =" <?php echo home_url(); ?> " method="get">
	<div>
		<!-- search field -->
		<div id="search-div-left">
			<input type="search" name="s" id="s" placeholder="<?php _e( 'Enter search keyword', 'bicubic' ) ?>" value="<?php the_search_query(); ?>"/>
		</div><!-- #search-div-left -->
		<!-- search button -->
		<div id="search-div-right">
			<input type="submit" id="search-submit" value=""/>
		</div><!-- #search-div-right -->
	</div>				
</form><!-- #search -->