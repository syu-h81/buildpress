<?php
/**
 * The sidebar template.
 *
 * @package Syublog_Org_Theme
 */
?>
<aside class="sidebar" aria-label="<?php esc_attr_e( 'Sidebar', 'syublog-org-theme' ); ?>">
	
	<!-- Popular Posts Section -->
	<section class="widget-popular-posts p-4 bg-white rounded-3 custom-shadow">
		<h2 class="widget-title">
			<i class="ri-fire-line text-xl text-primary"></i>
			<?php esc_html_e( '人気の記事', 'syublog-org-theme' ); ?>
		</h2>
		<ul class="sidebar-posts-list">
			<?php
			$popular_posts = new WP_Query(
				array(
					'posts_per_page' => 5,
					'orderby'        => 'comment_count',
					'order'          => 'DESC',
					'post_type'      => 'post',
				)
			);
			if ( $popular_posts->have_posts() ) :
				while ( $popular_posts->have_posts() ) :
					$popular_posts->the_post();
					?>
					<li class="post-item border-bottom-0 d-flex align-items-center justify-content-center gap-3">
						<div class="sidebar-post-item-img">
							<?php if ( has_post_thumbnail() ) : ?>
									<?php
									the_post_thumbnail(
										'thumbnail',
										array(
											'class' => 'img-fluid rounded-3',
											'alt'   => get_the_title(),
										)
									);
									?>
							<?php else : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<img
										src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/default-thumbnail.png' ); ?>"
										class="img-fluid rounded-3"
										alt="<?php esc_attr_e( 'Default Thumbnail', 'syublog-org-theme' ); ?>"
									>
								</a>
							<?php endif; ?>
						</div>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</li>
					<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</ul>
	</section>

	<!-- Categories Section -->
	<section class="widget-categories mt-4 p-4 bg-white rounded-3 custom-shadow">
		<h2 class="widget-title">
			<i class="ri-folder-line text-xl text-primary"></i>
			<?php esc_html_e( 'Categories', 'syublog-org-theme' ); ?>
		</h2>
		<ul class="categories-list">
			<?php
			$categories = get_categories(
				array(
					'orderby' => 'count',
					'order'   => 'DESC',
					'number'  => 10,
				)
			);
			foreach ( $categories as $category ) :
				?>
				<li class="category-item border-bottom-0">
					<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" title="<?php echo esc_attr( $category->name ); ?>">
						<?php echo esc_html( $category->name ); ?>
					</a>
					<span class="category-count"><?php echo esc_html( $category->count ); ?></span>
				</li>
				<?php
			endforeach;
			?>
		</ul>
	</section>

	<!-- Tags Section -->
	<section class="widget-tags mt-4 p-4 bg-white rounded-3 custom-shadow">
		<h2 class="widget-title">
			<i class="ri-price-tag-3-line text-xl text-primary"></i>
			<?php esc_html_e( 'Tags', 'syublog-org-theme' ); ?>
		</h2>
		<div class="tags-cloud">
			<?php
			$tags = get_tags(
				array(
					'orderby' => 'count',
					'order'   => 'DESC',
					'number'  => 20,
				)
			);
			if ( $tags ) :
				foreach ( $tags as $tag ) :
					$tag_link = get_tag_link( $tag->term_id );
					$tag_class = 'tag-item';
					// Add size class based on post count
					if ( $tag->count > 5 ) {
						$tag_class .= ' tag-large';
					} elseif ( $tag->count > 2 ) {
						$tag_class .= ' tag-medium';
					} else {
						$tag_class .= ' tag-small';
					}
					?>
					<a href="<?php echo esc_url( $tag_link ); ?>" class="<?php echo esc_attr( $tag_class ); ?>" title="<?php echo esc_attr( $tag->name ); ?>">
						<?php echo esc_html( $tag->name ); ?>
					</a>
					<?php
				endforeach;
			endif;
			?>
		</div>
	</section>

</aside>
