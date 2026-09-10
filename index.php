<?php
/**
 * The main template file.
 *
 * @package Syublog_Org_Theme
 */
get_header();
?>
<div class="site-content d-flex gap-4">
	<section class="content-area flex-grow-1">
		<?php if ( have_posts() ) : ?>
			<div class="posts-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="article-card bg-white overflow-hidden">
						<a href="<?php the_permalink(); ?>" class="article-card__link">
							<?php if (has_post_thumbnail()) : ?>
								<?php
								the_post_thumbnail('medium_large', [
									'class' => 'article-card__image w-100',
									'alt'   => get_the_title(),
								]);
								?>
							<?php endif; ?>
							<div class="p-3">
								<div class="d-flex align-items-center gap-2 mb-2">
									<?php
									$categories = get_the_category();
									if (!empty($categories)) :
									?>
										<span class="badge article-card__badge rounded-pill">
											<?php echo esc_html($categories[0]->name); ?>
										</span>
									<?php endif; ?>
									<time
										class="article-card__date"
										datetime="<?php echo esc_attr(get_the_date('c')); ?>"
									>
										<?php echo esc_html(get_the_date('Y 年 n 月 j 日')); ?>
									</time>
								</div>
								<h2 class="article-card__title mb-2">
									<?php the_title(); ?>
								</h2>
								<p class="article-card__description mb-0">
									<?php echo esc_html(wp_trim_words(get_the_excerpt(), 45, '...')); ?>
								</p>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => '&lsaquo;',
				'next_text' => '&rsaquo;',
				'type' => 'list',
			) ); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing found.', 'syublog-org-theme' ); ?></p>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
