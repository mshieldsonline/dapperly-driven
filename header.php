<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'dapperly-driven' ); ?></a>

<header id="masthead" class="site-header">
	<div class="dd-container">
		<div class="site-header__inner">

			<!-- Branding -->
			<a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<img src="<?php echo esc_url( DD_URI . '/assets/images/logos/logo2.fw.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="dd-logo">
				<?php endif; ?>
			</a>

			<!-- Primary nav -->
			<nav id="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'dapperly-driven' ); ?>">
				<?php
				wp_nav_menu( [
					'theme_location' => 'primary',
					'menu_class'     => 'primary-nav',
					'container'      => false,
					'walker'         => new DD_Nav_Walker(),
					'fallback_cb'    => function() {
						echo '<ul class="primary-nav">';
						echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'dapperly-driven' ) . '</a></li>';
						if ( class_exists( 'WooCommerce' ) ) {
							echo '<li><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '">' . esc_html__( 'Shop', 'dapperly-driven' ) . '</a></li>';
						}
						echo '<li><a href="' . esc_url( home_url( '/blog/' ) ) . '">' . esc_html__( 'Blog', 'dapperly-driven' ) . '</a></li>';
						echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">' . esc_html__( 'About', 'dapperly-driven' ) . '</a></li>';
						echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Contact', 'dapperly-driven' ) . '</a></li>';
						echo '</ul>';
					},
				] );
				?>
			</nav>

			<!-- Cart icon (WooCommerce) -->
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<div class="header-cart">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'View cart', 'dapperly-driven' ); ?>">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
							<path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
							<line x1="3" y1="6" x2="21" y2="6"/>
							<path d="M16 10a4 4 0 01-8 0"/>
						</svg>
						<span class="cart-count"><?php echo esc_html( WC()->cart ? WC()->cart->get_cart_contents_count() : 0 ); ?></span>
					</a>
				</div>
			<?php endif; ?>

			<!-- Mobile toggle -->
			<button class="nav-toggle" aria-controls="primary-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'dapperly-driven' ); ?>">
				<span></span><span></span><span></span>
			</button>

		</div>
	</div>
</header>
