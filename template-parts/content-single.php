<?php
/**
 * The content template for single posts.
 *
 * @package Syublog_Org_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mb-4">
		<?php if ( has_category() ) : ?>
			<div class="d-flex flex-wrap gap-2 mb-3" aria-label="<?php esc_attr_e( 'Categories', 'syublog-org-theme' ); ?>">
				<?php foreach ( get_the_category() as $category ) : ?>
					<a class="badge rounded-pill bg-primary text-decoration-none" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<?php the_title( '<h1 class="entry-title display-6 fw-bold">', '</h1>' ); ?>
		<div class="entry-meta text-secondary small d-flex flex-wrap gap-2">
			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<span aria-hidden="true">・</span>
			<time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"><?php echo esc_html( get_the_modified_date() ); ?></time>
			<span aria-hidden="true">・</span>
			<span><?php echo esc_html( get_the_author() ); ?></span>
		</div>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="mb-4">
			<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid w-100 rounded-2' ) ); ?>
		</figure>
	<?php endif; ?>
	<div class="entry-content mt-4">
		<?php the_content(); ?>
	</div>
	<footer class="entry-footer mt-5">
		<?php $post_tags = get_the_tags(); ?>
		<?php if ( $post_tags ) : ?>
			<div class="d-flex flex-wrap align-items-center gap-2">
				<span class="text-secondary small fw-semibold"><?php esc_html_e( 'Tags', 'syublog-org-theme' ); ?></span>
				<?php foreach ( $post_tags as $tag ) : ?>
					<a class="badge rounded-pill bg-light text-dark text-decoration-none border" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="d-flex align-items-center gap-3 mt-4 pt-4 border-top">
			<div class="flex-shrink-0">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 56, '', '', array( 'class' => array( 'rounded-circle' ) ) ); ?>
			</div>
			<div>
				<strong class="d-block"><?php echo esc_html( get_the_author() ); ?></strong>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<p class="mb-0 text-secondary small"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</footer>
</article>
