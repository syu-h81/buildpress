<?php
/**
 * The footer template.
 *
 * @package Syublog_Org_Theme
 */
?>
	</main>
	<footer class="site-footer bg-#1F2937">
		<div class="site-footer__inner">
			<small>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></small>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
