<?php get_header(); ?>

<main id="main" class="site-main">

	<div class="dd-page-header">
		<div class="dd-container">
			<?php woocommerce_page_title(); ?>
		</div>
	</div>

	<section class="dd-section dd-section--white">
		<div class="dd-container">

			<?php if ( woocommerce_product_loop() ) : ?>

				<div class="dd-shop-toolbar">
					<?php woocommerce_result_count(); ?>
					<?php woocommerce_catalog_ordering(); ?>
				</div>

				<?php woocommerce_product_loop_start(); ?>
					<?php woocommerce_product_subcategories(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				<?php woocommerce_product_loop_end(); ?>

				<?php woocommerce_pagination(); ?>

			<?php else : ?>
				<?php do_action( 'woocommerce_no_products_found' ); ?>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
