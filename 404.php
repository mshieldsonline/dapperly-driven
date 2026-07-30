<?php get_header(); ?>

<main id="main" class="site-main">
	<section class="dd-section dd-section--white">
		<div class="dd-container">
			<div class="dd-not-found">
				<div class="dd-not-found__code">404</div>
				<h1><?php esc_html_e( 'Page Not Found', 'dapperly-driven' ); ?></h1>
				<p><?php esc_html_e( "The page you're looking for doesn't exist or has moved.", 'dapperly-driven' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back to Home', 'dapperly-driven' ); ?></a>
				<form class="dd-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search…', 'dapperly-driven' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
					<button type="submit" class="btn btn-secondary"><?php esc_html_e( 'Search', 'dapperly-driven' ); ?></button>
				</form>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
