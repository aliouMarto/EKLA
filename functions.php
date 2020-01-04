<?php
/**
 * ekla_byAli functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ekla_byAli
 */

if ( ! function_exists( 'ekla_byali_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ekla_byali_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ekla_byAli, use a find and replace
		 * to change 'ekla_byali' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ekla_byali', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header_menu' => esc_html__( 'Primary', 'ekla_byali' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ekla_byali_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ekla_byali_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ekla_byali_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ekla_byali_content_width', 640 );
}
add_action( 'after_setup_theme', 'ekla_byali_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ekla_byali_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ekla_byali' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ekla_byali' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ekla_byali_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ekla_byali_scripts() {
	wp_enqueue_style( 'ekla_byali-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ekla_byali-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ekla_byali-scriptjs', get_template_directory_uri() . '/js/script.js', array(), '20151215', true );

	wp_enqueue_script( 'ekla_byali-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ekla_byali_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




// CPT IMAGE BOUTIQUES

function cptui_register_my_cpts() {

	/**
	 * Post Type: images boutiques.
	 */

	$labels = [
		"name" => __( "images boutiques", "ekla_byali" ),
		"singular_name" => __( "image", "ekla_byali" ),
		"menu_name" => __( "Mes images boutiques", "ekla_byali" ),
		"all_items" => __( "Toutes les images boutiques", "ekla_byali" ),
	];

	$args = [
		"label" => __( "images boutiques", "ekla_byali" ),
		"labels" => $labels,
		"description" => "Les images pour la boutique visible sur la page d\'accueil",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "boutique", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "custom-fields", "revisions" ],
	];

	register_post_type( "boutique", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



// CPT MARQUES


function cptui_register_my_cpts_marques() {

	/**
	 * Post Type: Les marques.
	 */

	$labels = [
		"name" => __( "Les marques", "ekla_byali" ),
		"singular_name" => __( "marque", "ekla_byali" ),
	];

	$args = [
		"label" => __( "Les marques", "ekla_byali" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "marques", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "marques", $args );
}

add_action( 'init', 'cptui_register_my_cpts_marques' );




function cptui_register_my_cpts_header() {

	/**
	 * Post Type: headers.
	 */

	$labels = [
		"name" => __( "headers", "ekla_byali" ),
		"singular_name" => __( "header", "ekla_byali" ),
	];

	$args = [
		"label" => __( "headers", "ekla_byali" ),
		"labels" => $labels,
		"description" => "Header du site",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "header", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "header", $args );
}

add_action( 'init', 'cptui_register_my_cpts_header' );




function cptui_register_my_cpts_collections_home() {

	/**
	 * Post Type: images collections home.
	 */

	$labels = [
		"name" => __( "images collections home", "ekla_byali" ),
		"singular_name" => __( "images collections home", "ekla_byali" ),
		"all_items" => __( "Toutes les images collections home", "ekla_byali" ),
	];

	$args = [
		"label" => __( "images collections home", "ekla_byali" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "collections_home", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "collections_home", $args );
}

add_action( 'init', 'cptui_register_my_cpts_collections_home' );







function cptui_register_my_cpts_footer() {

	/**
	 * Post Type: footer.
	 */

	$labels = [
		"name" => __( "footer", "ekla_byali" ),
		"singular_name" => __( "footer", "ekla_byali" ),
	];

	$args = [
		"label" => __( "footer", "ekla_byali" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "footer", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "footer", $args );
}

add_action( 'init', 'cptui_register_my_cpts_footer' );




function cptui_register_my_cpts_image_collectionpage() {

	/**
	 * Post Type: Images page collections.
	 */

	$labels = [
		"name" => __( "Images page collections", "ekla_byali" ),
		"singular_name" => __( "collections", "ekla_byali" ),
		"all_items" => __( "Toutes les images de la page collections", "ekla_byali" ),
	];

	$args = [
		"label" => __( "Images page collections", "ekla_byali" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "image_collectionpage", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "image_collectionpage", $args );
}

add_action( 'init', 'cptui_register_my_cpts_image_collectionpage' );




function cptui_register_my_cpts_reseaux_sociaux() {

	/**
	 * Post Type: reseaux_sociaux.
	 */

	$labels = [
		"name" => __( "reseaux_sociaux", "ekla_byali" ),
		"singular_name" => __( "reseaux_sociaux", "ekla_byali" ),
	];

	$args = [
		"label" => __( "reseaux_sociaux", "ekla_byali" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "reseaux_sociaux", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "reseaux_sociaux", $args );
}

add_action( 'init', 'cptui_register_my_cpts_reseaux_sociaux' );









