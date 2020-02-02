<?php
/**
 * Meilleur Business functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Meilleur Business
 */

if ( ! function_exists( 'meilleur_business_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meilleur_business_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Meilleur Business, use a find and replace
	 * to change 'meilleur-business' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'meilleur-business', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'meilleur-business-blog', 360, 270, true);
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'meilleur-business' ),
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' , array(
		'height'		=>45,	
		'width'			=>45,	
		'flex-height'	=>true,	
		'flex-width'	=>true,
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'meilleur_business_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'meilleur_business_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meilleur_business_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meilleur_business_content_width', 640 );
}
add_action( 'after_setup_theme', 'meilleur_business_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meilleur_business_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'meilleur-business' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'meilleur-business' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'meilleur-business' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'meilleur-business' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'meilleur-business' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'meilleur-business' ), 4 ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'meilleur_business_widgets_init' );

/**
 * Register custom fonts.
 */
function meilleur_business_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'meilleur-business' ) ) {
		$fonts[] = 'Montserrat:300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins: on or off', 'meilleur-business' ) ) {
		$fonts[] = 'Poppins:300,400,500,600';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function meilleur_business_scripts() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$fonts_url = meilleur_business_fonts_url();
	$primary_color = meilleur_business_get_option( 'primary_color' );
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'meilleur-business-google-fonts', $fonts_url, array(), null );
	}	

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . $min . '.css', '', '4.7.0' );

	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() .'/assets/css/slick-theme' . $min . '.css', '', 'v2.2.0');

	wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/assets/css/slick' . $min . '.css', '', 'v1.8.0');

	wp_enqueue_style( 'meilleur-business-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight' . $min . '.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'meilleur-business-navigation', get_template_directory_uri() . '/assets/js/navigation' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'meilleur-business-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'meilleur-business-custom-js', get_template_directory_uri() . '/assets/js/custom' . $min . '.js', array('jquery'), '20151215', true );  

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meilleur_business_scripts' );

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

// post type competidores
function competidor_post_type() {

	$labels=array(
		'name'                  => 'competidores',
		'singular_name'         => 'Competidor' ,
		'menu_name'             =>  'Poke Competitors', 'text_domain' ,
		'all_items'             =>  'Todos Competidores' ,
		'add_new_item'          => 'Adicionar Competidor' ,
		'add_new'               => 'Adicionar Competidor' ,
		'edit_item'             => 'Editar Competidor' ,
		'update_item'           =>  'Atualizar' ,
	);

	$args = array(
		'label'                 => __( 'poke Competidores', 'text_domain' ),
		'description'           => __( 'poke Descricao', 'text_domain' ),
		'labels'                => $labels,
		'supports'              =>  array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon' => 'dashicons-share-alt',
	);
	register_post_type( 'competidores', $args );

}
add_action( 'init', 'competidor_post_type' );

// cria o post type duplas
function duplas_post_type() {

	$labels_duplas=array(
		'name'                  => 'Duplas',
		'singular_name'         => 'Duplas' ,
		'menu_name'             =>  'Duplas', 'text_domain' ,
		'all_items'             =>  'Todas as Duplas' ,
		'add_new_item'          => 'Adicionar dupla' ,
		'add_new'               => 'Adicionar nova Dupla' ,
		'edit_item'             => 'Editar Dupla' ,
		'update_item'           =>  'Atualizar dupla' ,
	);

	$args_duplas = array(
		'label'                 => __( 'Duplas', 'text_domain' ),
		'description'           => __( 'poke Descricao 2', 'text_domain' ),
		'labels'                => $labels_duplas,
		'supports'              =>  array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest' => true,
		'can_export'            => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon' => 'dashicons-admin-users',
	);
	register_post_type( 'duplas', $args_duplas );

}
add_action( 'init', 'duplas_post_type' );


//cria o post type times 
function times_post_type() {

	$labels_times=array(
		'name'                  => 'Times',
		'singular_name'         => 'Times' ,
		'menu_name'             =>  'Times', 'text_domain' ,
		'all_items'             =>  'Todos os Times' ,
		'add_new_item'          => 'Adicionar time' ,
		'add_new'               => 'Adicionar nova time' ,
		'edit_item'             => 'Editar Time' ,
		'update_item'           =>  'Atualizar time' ,
	);

	$args_times = array(
		'label'                 => __( 'Time', 'text_domain' ),
		'description'           => __( 'Membros do time', 'text_domain' ),
		'labels'                => $labels_times,
		'supports'              =>  array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest' 					=> true,
		'can_export'            => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon' => 'dashicons-admin-users',
	);
	register_post_type( 'times', $args_times );

}
add_action( 'init', 'times_post_type' );


//Cria o post Type Tipos
function criar_tipos() {

	$labels=array(
		'name'                  => 'Tipos',
		'singular_name'         => 'Tipo' ,
		'all_items'             =>  'Todos os tipos' ,
		'add_new'               => 'Adicionar tipo' ,
		'edit_item'             => 'Editar Tipo' ,
		'update_item'           =>  'Atualizar tipo' ,
	);

	$args = array(
		'labels'                => $labels,
		'supports'              =>  array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		'show_in_menu'          => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'publicly_queryable'    => true,
		'menu_icon' => 'dashicons-star-filled',
	);
	register_post_type( 'tipos', $args);

}
add_action( 'init', 'criar_tipos' );


//adding custom columns
add_filter( 'manage_edit-tipos_columns', 'my_edit_tipos_columns' ) ;

function my_edit_tipos_columns( $columns ) {

	$columns = array(
		'cb' => '&lt;input type="checkbox" />',
		'title' => __( 'Tipos' ),
		'date' => __( 'Date' )
	);

	return $columns;
}