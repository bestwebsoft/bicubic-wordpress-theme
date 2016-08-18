<?php
/**
 * Bicubic functions and definitions
 *
 * @subpackage Bicubic
 * @since      Bicubic 1.0
 */

//set content width
if ( ! isset( $content_width ) ) {
	$content_width = 540;
}

// sets up theme, theme support: custom background, menus, post thumbnails. it is translate-ready.
function bicubic_setup() {
	// load_theme_textdomain() for translation/localization support
	load_theme_textdomain( 'bicubic', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	// add post-thumbnails with one size
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'bicubic-size', 540, 9999 );
	// add rss feed
	add_theme_support( 'automatic-feed-links' );
	// add custom backgroung with default color #eeeeee
	$defaults = array(
		'default-color' => 'eeeeee',
	);
	add_theme_support( 'custom-background', $defaults );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'bicubic' ) );
	//add custom-header support
	$args = array(
		'width'              => 940,
		'height'             => 180,
		'uploads'            => true,
		'header-text'        => true,
		'default-text-color' => '63ac2e',
	);
	add_theme_support( 'custom-header', $args );
	//add editor_style support
	add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );
}

function bicubic_register_sidebar() {
	/* Right sidebar */
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'bicubic' ),
		'id'            => 'bicubic-sidebar',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'bicubic' ),
		'before_widget' => '<li class="widget %s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}

// register scripts and styles
function bicubic_scripts_styles() {
	wp_enqueue_script( 'bicubic-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	wp_enqueue_script( 'bicubic-placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', array( 'jquery' ) );
	// load script for comment-reply
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// loads main stylesheet.
	wp_enqueue_style( 'bicubic-style', get_stylesheet_uri() );
	// loads the internet Explorer specific stylesheet.
	wp_enqueue_style( 'bicubic-ie', get_template_directory_uri() . '/css/ie.css', array( 'bicubic-style' ) );
	wp_style_add_data( 'bicubic-ie', 'conditional', 'lt IE 9' );
	$string_js = array(
		'chooseFile'      => __( 'Choose file...', 'bicubic' ),
		'fileNotSelected' => __( 'File is not selected', 'bicubic' ),
		'homeUrl'        => home_url(),
	);
	wp_localize_script( 'bicubic-script', 'bicubicStringJs', $string_js );
}

//this function used as callback to wp_list_comments()
function bicubic_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php $comment_parents = get_comment( $comment, ARRAY_A );
				// show avatar of commenter smaller if comment is child
				$comment_parents = $comment_parents['comment_parent'];
				if ( 0 == $comment_parents ) {
					echo get_avatar( $comment, $size = '64' );
				} else {
					echo get_avatar( $comment, $size = '32' );
				} ?>
				<!-- show comment meta information -->
				<div class="comment-meta alignleft">
					<div class="commentmetadata">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
							<?php printf( __( '%1$s at %2$s', 'bicubic' ), get_comment_date(), get_comment_time() ); ?>
						</a>
					</div>
					<!-- .commentmetadata -->
					<div class="bicubic-says">
						<cite class="fn"><?php echo get_comment_author_link(); ?></cite>
						<span class="says"><?php _e( 'says', 'bicubic' ); ?></span>
					</div>
					<!-- .bicubic-says -->
				</div>
				<!-- .comment-meta -->
				<div class="bicubic-clear"></div>
			</div>
			<!-- comment-author -->
			<?php if ( '0' == $comment->comment_approved ) : // show this if comment is not approved ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'bicubic' ) ?></em>
				<br />
			<?php endif;
			comment_text() //show comment text ?>
			<!-- reply link -->
			<div class="reply">
				<?php $args = array(
					'reply_text' => __( 'Reply', 'bicubic' ),
					'max_depth'  => $args['max_depth'],
					'depth'      => $depth,
				);
				comment_reply_link( $args );
				// edit link link for trackback and pingback looks differently
				if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) {
					edit_comment_link( __( '(Edit)', 'bicubic' ), '', '' );
				} else {
					edit_comment_link( __( '(Edit)', 'bicubic' ), ' | ', '' );
				} ?>
			</div>
			<!-- .reply -->
		</div>
		<!-- #comment -->
	</li>
<?php }

// function for ie
function bicubic_ie() { ?>
	<!--[if lte IE 9]>
	<script>
		var e = ( "article, aside, figcaption, figure, footer, header, hgroup, nav, section, time" ).split( ', ' );
		for ( var i = 0; i < e.length; i++ ) {
			document.createElement( e[ i ] );
		}
	</script>
	<style type="text/css" media="screen">
		#search > div,
		#search-div-left,
		#search-div-right,
		input[type="text"],
		input[type="password"],
		textarea,
		.bicubic-select,
		.bicubic-custom-file,
		.bicubic-custom-file-content,
		.bicubic-custom-file-text,
		#submit,
		.bicubic-reset-form input[type="reset"],
		.bicubic-submit-button input[type="submit"],
		.bicubic-active-opt {
			behavior: url('js/PIE.htc');
		}

		.bicubic-custom-file-text,
		.bicubic-select,
		.bicubic-active-opt {
			-pie-background: linear-gradient(#fcfcfc, #f7f7f7);
		}
	</style>
	<![endif]-->
<?php }

// add hooks
add_action( 'after_setup_theme', 'bicubic_setup' );
add_action( 'widgets_init', 'bicubic_register_sidebar' );
add_action( 'wp_enqueue_scripts', 'bicubic_scripts_styles' );
add_action( 'wp_print_scripts', 'bicubic_ie', 8 );
