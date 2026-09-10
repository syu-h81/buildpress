<?php
/**
 * The header template.
 *
 * @package Syublog_Org_Theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Remix Icon CDN -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site">
	<header class="site-header bg-primary">
		<div class="site-header__inner d-flex align-items-center justify-content-between gap-4">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title mb-0"><a class="text-white text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title mb-0"><a class="text-white text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<form class="site-search d-flex" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="visually-hidden" for="site-search-input"><?php esc_html_e( 'Search', 'syublog-org-theme' ); ?></label>
				<div class="input-group">
					<i class="ri-search-line text-white/60 text-lg"></i>
					<input id="site-search-input" class="form-control site-search__input" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search...', 'syublog-org-theme' ); ?>">
				</div>
			</form>
		</div>
	</header>
	<nav class="header-category-nav border-top border-white border-opacity-25" aria-label="<?php esc_attr_e( 'Categories', 'syublog-org-theme' ); ?>">
		<div class="category-nav__inner">
			<ul class="category-nav__list list-unstyled d-flex flex-wrap justify-content-center gap-2 gap-md-4 mb-0">
				<?php
				$header_categories = array(
					'AI・ツール活用術',
					'HTML・CSS基礎知識',
					'フロントエンド開発Tips',
					'実務ノウハウ・案件対応',
					'最新トレンド・技術研究',
				);
				foreach ( $header_categories as $header_category_name ) :
					$header_category = get_term_by( 'name', $header_category_name, 'category' );
					if ( $header_category ) :
						$header_category_url = get_term_link( $header_category );
						if ( ! is_wp_error( $header_category_url ) ) :
							?>
							<li><a class="category-nav__link text-white text-decoration-none" href="<?php echo esc_url( $header_category_url ); ?>"><?php echo esc_html( $header_category_name ); ?></a></li>
							<?php
						else :
							?>
							<li><span class="category-nav__link text-white"><?php echo esc_html( $header_category_name ); ?></span></li>
							<?php
						endif;
					else :
						?>
						<li><span class="category-nav__link text-white"><?php echo esc_html( $header_category_name ); ?></span></li>
						<?php
					endif;
				endforeach;
				?>
			</ul>
		</div>
	</nav>
	<main class="site-main">
