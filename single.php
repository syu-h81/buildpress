<?php
/**
 * The template for displaying single posts.
 *
 * @package Syublog_Org_Theme
 */
get_header();
?>
<section class="content-area">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content', 'single' ); ?>
		<?php the_post_navigation(); ?>
		<?php comments_template(); ?>
	<?php endwhile; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
