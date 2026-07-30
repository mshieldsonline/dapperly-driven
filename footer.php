<footer id="colophon" class="site-footer">
	<div class="dd-container">

		<div class="site-footer__grid">

			<!-- Brand column -->
			<div class="site-footer__brand">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<span style="font-family:var(--dd-font-serif);font-size:18px;color:var(--dd-navy);"><?php bloginfo( 'name' ); ?></span>
				<?php endif; ?>
				<p><?php bloginfo( 'description' ); ?></p>
			</div>

			<!-- Footer columns via widgets -->
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<?php else : ?>
				<div>
					<h4><?php esc_html_e( 'Shop', 'dapperly-driven' ); ?></h4>
					<ul>
						<?php if ( class_exists( 'WooCommerce' ) ) : ?>
							<li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'All Products', 'dapperly-driven' ); ?></a></li>
							<li><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_html_e( 'Cart', 'dapperly-driven' ); ?></a></li>
							<li><a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"><?php esc_html_e( 'Checkout', 'dapperly-driven' ); ?></a></li>
							<li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><?php esc_html_e( 'My Account', 'dapperly-driven' ); ?></a></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<?php else : ?>
				<div>
					<h4><?php esc_html_e( 'Explore', 'dapperly-driven' ); ?></h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'dapperly-driven' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'dapperly-driven' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'dapperly-driven' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div><?php dynamic_sidebar( 'footer-3' ); ?></div>
			<?php else : ?>
				<div>
					<h4><?php esc_html_e( 'Get in Touch', 'dapperly-driven' ); ?></h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'dapperly-driven' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

		</div>

		<div class="site-footer__bottom">
			<p>
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
				<?php esc_html_e( 'All rights reserved.', 'dapperly-driven' ); ?>
			</p>
			<?php
			wp_nav_menu( [
				'theme_location' => 'footer',
				'menu_class'     => 'footer-nav',
				'container'      => false,
				'depth'          => 1,
				'fallback_cb'    => false,
			] );
			?>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
