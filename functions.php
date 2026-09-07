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
	wp_enqueue_style(
		'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css',
		array(),
		'5.3.8'
	);
	wp_enqueue_style(
		'syublog-org-theme-style',
		get_stylesheet_uri(),
		array( 'bootstrap' ),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_script(
		'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.8',
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'syublog_org_theme_assets' );

function syublog_org_theme_bootstrap_attributes( $tag, $handle, $src ) {
	if ( 'bootstrap' === $handle ) {
		$tag = sprintf(
			'<link rel="stylesheet" href="%1$s" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">',
			esc_url( $src )
		);
	}

	return $tag;
}
add_filter( 'style_loader_tag', 'syublog_org_theme_bootstrap_attributes', 10, 3 );

function syublog_org_theme_bootstrap_script_attributes( $tag, $handle, $src ) {
	if ( 'bootstrap' === $handle ) {
		$tag = sprintf(
			'<script src="%1$s" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>',
			esc_url( $src )
		);
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'syublog_org_theme_bootstrap_script_attributes', 10, 3 );

function syublog_org_theme_content_heading_classes( $content ) {
	$heading_classes = array(
		'2' => 'border-start border-3 border-primary ps-2 mt-5 mb-3 fw-bold',
		'3' => 'bg-light border px-3 py-2 mt-4 mb-3 fw-semibold',
	);

	return preg_replace_callback(
		'/<h([23])\b([^>]*)>/i',
		function ( $matches ) use ( $heading_classes ) {
			$level      = $matches[1];
			$attributes = $matches[2];
			$classes    = $heading_classes[ $level ];

			if ( preg_match( '/\sclass=(["\'])(.*?)\1/i', $attributes, $class_match ) ) {
				$classes    = trim( $class_match[2] . ' ' . $classes );
				$attributes = str_replace(
					$class_match[0],
					' class="' . esc_attr( $classes ) . '"',
					$attributes
				);
			} else {
				$attributes .= ' class="' . esc_attr( $classes ) . '"';
			}

			return '<h' . $level . $attributes . '>';
		},
		$content
	);
}
add_filter( 'the_content', 'syublog_org_theme_content_heading_classes', 20 );

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
