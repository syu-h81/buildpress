<?php
/**
 * The template for displaying single posts.
 *
 * @package Syublog_Org_Theme
 */
get_header();
?>
<section class="content-area bg-white p-4">
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
<?php if ( $related_query->have_posts() ) : ?>
	<section class="related-posts bg-white p-4" aria-labelledby="related-posts-title">
		<h2 id="related-posts-title" class="h4 mb-4"><?php esc_html_e( 'Related posts', 'syublog-org-theme' ); ?></h2>
		<div class="row row-cols-1 row-cols-md-3 g-3">
			<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
				<article <?php post_class( 'col', get_the_ID() ); ?>>
					<a class="card h-100 text-decoration-none text-reset" href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?>
						<?php endif; ?>
						<div class="card-body">
							<h3 class="h6 card-title"><?php the_title(); ?></h3>
							<time class="card-text small text-secondary" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>
					</a>
				</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_footer(); ?>
