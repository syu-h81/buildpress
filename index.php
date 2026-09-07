<?php
/**
 * The main template file.
 *
 * @package Syublog_Org_Theme
 */
get_header();
?>
<section class="content-area">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nothing found.', 'syublog-org-theme' ); ?></p>
	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
