<?php
defined( 'ABSPATH' ) || exit;

define( 'DD_VERSION', '1.0.4' );
define( 'DD_DIR', get_template_directory() );
define( 'DD_URI', get_template_directory_uri() );

/* =====================================================
   THEME SETUP
   ===================================================== */
function dd_setup() {
	load_theme_textdomain( 'dapperly-driven', DD_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );

	// WooCommerce
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Custom logo
	add_theme_support( 'custom-logo', [
		'height'      => 60,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	] );

	// Image sizes
	add_image_size( 'dd-card',   600, 450, true );
	add_image_size( 'dd-hero',  1600, 800, true );
	add_image_size( 'dd-blog',   800, 500, true );

	// Menus
	register_nav_menus( [
		'primary' => __( 'Primary Navigation', 'dapperly-driven' ),
		'footer'  => __( 'Footer Navigation', 'dapperly-driven' ),
	] );
}
add_action( 'after_setup_theme', 'dd_setup' );

/* =====================================================
   CONTENT WIDTH
   ===================================================== */
function dd_content_width() {
	$GLOBALS['content_width'] = 1240;
}
add_action( 'after_setup_theme', 'dd_content_width', 0 );

/* =====================================================
   ENQUEUE SCRIPTS & STYLES
   ===================================================== */
function dd_enqueue() {
	// Google Fonts — DM Serif Display + DM Sans
	wp_enqueue_style(
		'dd-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap',
		[],
		null
	);

	wp_enqueue_style( 'dd-style', get_stylesheet_uri(), [ 'dd-fonts' ], DD_VERSION );
	wp_enqueue_script( 'dd-main', DD_URI . '/assets/js/main.js', [], DD_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dd_enqueue' );

/* =====================================================
   FONT PRECONNECT
   ===================================================== */
function dd_preconnect_fonts() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'dd_preconnect_fonts', 1 );

/* =====================================================
   EDITOR STYLES
   ===================================================== */
function dd_editor_styles() {
	add_editor_style( [
		'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,700&display=swap',
		'style.css',
		'assets/css/editor.css',
	] );
}
add_action( 'after_setup_theme', 'dd_editor_styles' );

/* =====================================================
   BLOCK EDITOR COLOUR PALETTE
   ===================================================== */
function dd_block_editor_settings() {
	add_theme_support( 'editor-color-palette', [
		[ 'name' => __( 'Navy', 'dapperly-driven' ),   'slug' => 'dd-navy',  'color' => '#0F2B5B' ],
		[ 'name' => __( 'Blue', 'dapperly-driven' ),   'slug' => 'dd-blue',  'color' => '#4A6FA5' ],
		[ 'name' => __( 'Cream', 'dapperly-driven' ),  'slug' => 'dd-cream', 'color' => '#E8D8B0' ],
		[ 'name' => __( 'Tint', 'dapperly-driven' ),   'slug' => 'dd-tint',  'color' => '#EEF2F8' ],
		[ 'name' => __( 'White', 'dapperly-driven' ),  'slug' => 'dd-white', 'color' => '#FEFEFE' ],
		[ 'name' => __( 'Text', 'dapperly-driven' ),   'slug' => 'dd-text',  'color' => '#1A2A3A' ],
		[ 'name' => __( 'Muted', 'dapperly-driven' ),  'slug' => 'dd-muted', 'color' => '#5A6A7A' ],
	] );

	add_theme_support( 'editor-font-sizes', [
		[ 'name' => __( 'Small', 'dapperly-driven' ),   'slug' => 'small',   'size' => 13 ],
		[ 'name' => __( 'Normal', 'dapperly-driven' ),  'slug' => 'normal',  'size' => 15 ],
		[ 'name' => __( 'Medium', 'dapperly-driven' ),  'slug' => 'medium',  'size' => 20 ],
		[ 'name' => __( 'Large', 'dapperly-driven' ),   'slug' => 'large',   'size' => 28 ],
		[ 'name' => __( 'XLarge', 'dapperly-driven' ),  'slug' => 'x-large', 'size' => 40 ],
	] );
}
add_action( 'after_setup_theme', 'dd_block_editor_settings' );

/* =====================================================
   WIDGETS
   ===================================================== */
function dd_widgets_init() {
	$defaults = [
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	];

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Sidebar', 'dapperly-driven' ),
		'id'   => 'sidebar-1',
	] ) );

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Footer Column 1', 'dapperly-driven' ),
		'id'   => 'footer-1',
	] ) );

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Footer Column 2', 'dapperly-driven' ),
		'id'   => 'footer-2',
	] ) );

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Footer Column 3', 'dapperly-driven' ),
		'id'   => 'footer-3',
	] ) );
}
add_action( 'widgets_init', 'dd_widgets_init' );

/* =====================================================
   EXCERPT
   ===================================================== */
function dd_excerpt_length( $length ) {
	return is_admin() ? $length : 25;
}
add_filter( 'excerpt_length', 'dd_excerpt_length' );

function dd_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'dd_excerpt_more' );

/* =====================================================
   WOOCOMMERCE — LAYOUT
   ===================================================== */
function dd_woo_remove_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'init', 'dd_woo_remove_sidebar' );

function dd_woo_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'dd_woo_products_per_page' );

function dd_woo_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'dd_woo_columns' );

/* =====================================================
   WOOCOMMERCE — CART AJAX COUNT
   ===================================================== */
function dd_woo_cart_count( $fragments ) {
	$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	$fragments['.cart-count'] = '<span class="cart-count">' . esc_html( $count ) . '</span>';
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'dd_woo_cart_count' );

/* =====================================================
   WOOCOMMERCE — HIDE PRICE/CART IF NO PRICE SET
   ===================================================== */
add_action( 'woocommerce_before_single_product_summary', function() {
	global $product;
	if ( $product && ! $product->get_price() ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}
} );

/* =====================================================
   INCLUDE PARTIALS
   ===================================================== */
require DD_DIR . '/inc/template-tags.php';
require DD_DIR . '/inc/nav-walker.php';
