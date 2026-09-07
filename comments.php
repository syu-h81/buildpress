<?php
/**
 * The template for displaying comments.
 *
 * @package Syublog_Org_Theme
 */
if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area mt-5 pt-4 border-top">
	<?php if ( have_comments() ) : ?>
		<h2 class="h4"><?php comments_number(); ?></h2>
		<ol class="comment-list list-unstyled mb-4">
			<?php wp_list_comments(); ?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
