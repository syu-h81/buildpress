<?php
/**
 * The default content template.
 *
 * @package Syublog_Org_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
		<div class="entry-meta"><?php echo esc_html( get_the_date() ); ?></div>
	</header>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</article>
