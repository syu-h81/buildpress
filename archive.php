<?php
/**
 * The archive template.
 *
 * @package Syublog_Org_Theme
 */
get_header();
?>
<section class="content-area">
	<header>
		<h1 class="archive-title"><?php the_archive_title(); ?></h1>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
	</header>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
