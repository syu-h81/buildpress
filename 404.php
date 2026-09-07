<?php
/**
 * The template for displaying 404 pages.
 *
 * @package Syublog_Org_Theme
 */
get_header();
?>
<section class="content-area">
	<h1><?php esc_html_e( 'Page not found', 'syublog-org-theme' ); ?></h1>
	<p><?php esc_html_e( 'The page you are looking for could not be found.', 'syublog-org-theme' ); ?></p>
	<?php get_search_form(); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
