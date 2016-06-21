<?php
/**
 * The Header template for our theme
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php wp_head(); ?>
</head>
<!-- head -->
<body <?php body_class(); ?>>
<!-- header of the blog-->
<header class="bicubic-header">
	<div>
		<!--title of the blog: display first and second letters in gray color  -->
		<?php $title_first_letters = substr( get_bloginfo(), 0, 2 );
		$title_other_letters       = substr( get_bloginfo(), 2 ); ?>
		<h1 id="header" style="<?php echo sprintf( 'color: #%s;', get_header_textcolor() ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo '<span class="bicubic-letters">' . $title_first_letters . '</span>' . $title_other_letters; ?></a>
		</h1>
		<!-- insert a search form in header -->
		<?php get_search_form(); ?>
		<div class="bicubic-clear"></div>
		<!-- description of the blog -->
		<div id="description" style="<?php echo sprintf( 'color: #%s;', get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<div class="bicubic-clear"></div>
		<!-- header image -->
		<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
		<!-- primary menu of the blog -->
		<nav id="nav">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => 'bicubic-nav-menu',
				'container'      => '',
			) ); ?>
			<div class="bicubic-clear"></div>
		</nav>
		<!-- #nav -->
	</div>
</header>
<!-- .bicubic-header -->
<!-- content part -->
<div class="bicubic-container">
