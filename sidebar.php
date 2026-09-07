<?php
/**
 * The sidebar template.
 *
 * @package Syublog_Org_Theme
 */
?>
<aside class="site-sidebar" aria-label="<?php esc_attr_e( 'Sidebar', 'syublog-org-theme' ); ?>">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif; ?>
</aside>
