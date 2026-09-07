<?php
/**
 * Theme setup and assets.
 *
 * @package Syublog_Org_Theme
 */

function syublog_org_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'syublog-org-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'syublog_org_theme_setup' );

function syublog_org_theme_assets() {
	wp_enqueue_style( 'syublog-org-theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'syublog_org_theme_assets' );

function syublog_org_theme_widgets() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'syublog-org-theme' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here.', 'syublog-org-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'syublog_org_theme_widgets' );
