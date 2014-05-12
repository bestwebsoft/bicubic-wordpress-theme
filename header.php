<?php
/**
 * The Header template for our theme
 *
 * @subpackage Bicubic
 * @since Bicubic 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- title of the blog -->
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' );?>"/>
		<?php wp_head(); ?>
	</head><!-- head -->
	<body <?php body_class(); ?>>
		<!-- header of the blog-->
		<header class="bicubic-header">													
			<div>
				<!--title of the blog: display first and second letters in gray color  -->
				<?php $title_first_letters = substr( get_bloginfo(), 0, 2 ); 				
					$title_other_letters = substr( get_bloginfo(), 2 ) ;?>
				<h1 id="header" style="<?php if ( get_header_textcolor() == 'blank' ) { echo 'visibility:hidden;'; } else { ?> color:#<?php echo get_header_textcolor(); } ?>"><a href="<?php echo home_url(); ?>"><?php echo '<span class="bicubic-letters">' . $title_first_letters . '</span>' . $title_other_letters ;?></a></h1>
				<!-- incert a search form in header -->
				<?php get_search_form(); ?>
				<div class="bicubic-clear"></div>
				<!-- description of the blog -->
				<div id="description" style="<?php if ( get_header_textcolor() == 'blank' ) { echo 'visibility:hidden;'; }?>"><?php bloginfo( 'description' ); ?></div>
				<div class="bicubic-clear"></div>
				<!-- header image -->
				<?php if ( get_header_image() ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
				<?php endif; ?>
				<!-- primary menu of the blog -->
				<nav id="nav">
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary',
						'menu_class' 	 => 'bicubic-nav-menu',
						'container'		 => ''
					) ); ?>
					<div class="bicubic-clear"></div>
				</nav> <!-- #nav -->
			</div>		
		</header><!-- .bicubic-header -->
		<!-- content part -->
		<div class="bicubic-container">