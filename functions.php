<?php
/**
 * soundstheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package soundstheme
 */

if ( ! function_exists( 'soundstheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function soundstheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on soundstheme, use a find and replace
		 * to change 'soundstheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'soundstheme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'soundstheme' ),
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
		add_theme_support( 'custom-background', apply_filters( 'soundstheme_custom_background_args', array(
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
add_action( 'after_setup_theme', 'soundstheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soundstheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soundstheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'soundstheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soundstheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'soundstheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'soundstheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'soundstheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function soundstheme_scripts() {
	wp_enqueue_style( 'soundstheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'soundstheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'soundstheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'soundstheme_scripts' );

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




/* Beuchat & Waldis's functions */

/**
 * Register Widget Area.
 *
 */
function wpgyan_widgets_init() {

	register_sidebar( array(
		'name' => 'Header Sidebar',
		'id' => 'header_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpgyan_widgets_init' );
function footer_widgets_init() {

 register_sidebar( array(
	 'name' => 'Footer Sidebar',
	 'id' => 'footer_sidebar',
	 'before_widget' => '<div>',
	 'after_widget' => '</div>',
	 'before_title' => '',
	 'after_title' => '',
 ) );
}
add_action( 'widgets_init', 'footer_widgets_init' );

/* Ajout de la class .anchorlink au liens du menus*/
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="anchorlink"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');
/* On ajoute le script js à la file enqueue */
function anchorenq() {
	return wp_enqueue_script( 'anchor-scipt', get_stylesheet_uri() . '/../js/anchorlink.js' );
}
add_action( 'wp_enqueue_scripts', 'anchorenq', 1.0 );


/* Home page template (pas nécessaire) */
/*
if(get_page_by_title("Home") == null)
{
    $post = array(
        "post_title" => "Home",
        "post_status" => "publish",
        "post_type" => "page",
        "menu_order" => "-100",
        "page_template" => "single-page-theme.php"
    );

    wp_insert_post($post);

    $home_page = get_page_by_title("Home");
    update_option("page_on_front",$home_page->ID);
    update_option("show_on_front","page");
}
*/

/* Menu one page link */
/*
function new_nav_menu_items($items)
{
    $items = "";

    $args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
    $the_query = new WP_Query($args);

    if($the_query->have_posts()):
        while($the_query->have_posts()):
            $the_query->the_post();
                $items .= '<li><a href="#post-'. get_the_ID() .'">' . get_the_title() . '</a></li>';
        endwhile;
    else:
        echo "";
    endif;
    return $items;
}
add_filter("wp_nav_menu_items", "new_nav_menu_items");
*/
