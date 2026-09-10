<?php
/**
 * The template for displaying single posts.
 *
 * @package Syublog_Org_Theme
 */
get_header();
?>
<section class="content-area p-5 bg-white">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content', 'single' ); ?>
		<div class="post-navigation my-4">
			<?php the_post_navigation(); ?>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; ?>
</section>
<?php get_sidebar(); ?>
<?php
$related_query = new WP_Query(
	array(
		'posts_per_page'      => 3,
		'post__not_in'        => array( get_the_ID() ),
		'category__in'        => wp_get_post_categories( get_the_ID() ),
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
?>
<?php get_footer(); ?>
