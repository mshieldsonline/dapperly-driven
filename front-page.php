<?php get_header(); ?>

<main id="main" class="site-main">

	<!-- ======= HERO ======= -->
	<section class="site-hero">
		<div class="site-hero__bg">
			<?php
			// A featured image on the front page overrides the packaged collage.
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'dd-hero' );
			else : ?>
				<img src="<?php echo esc_url( DD_URI . '/assets/images/hero/hero-collage.png' ); ?>" alt="">
			<?php endif; ?>
		</div>
		<div class="dd-container">
			<div class="site-hero__content">
				<p class="site-hero__eyebrow"><?php esc_html_e( 'Automotive Lifestyle', 'dapperly-driven' ); ?></p>
				<h1 class="site-hero__heading">
					<?php esc_html_e( 'Wear It.', 'dapperly-driven' ); ?><br>
					<?php esc_html_e( 'Collect It.', 'dapperly-driven' ); ?><br>
					<?php esc_html_e( 'Live It.', 'dapperly-driven' ); ?>
				</h1>
				<p class="site-hero__sub">
					<?php esc_html_e( 'Clothing, die-cast models, and collectables for people who are passionate about cars and the culture that comes with them.', 'dapperly-driven' ); ?>
				</p>
				<div class="site-hero__actions">
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-cream">
							<?php esc_html_e( 'Shop Now', 'dapperly-driven' ); ?>
						</a>
					<?php endif; ?>
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-outline-cream">
						<?php esc_html_e( 'Our Story', 'dapperly-driven' ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ======= ANNOUNCEMENT STRIP ======= -->
	<div class="dd-strip">
		<span><?php esc_html_e( 'Free UK shipping over £50', 'dapperly-driven' ); ?></span>
		<span><?php esc_html_e( 'New Die-Cast Drop — Weekly', 'dapperly-driven' ); ?></span>
		<span><?php esc_html_e( 'Worldwide Delivery Available', 'dapperly-driven' ); ?></span>
	</div>

	<!-- ======= SHOP BY CATEGORY ======= -->
	<?php if ( class_exists( 'WooCommerce' ) ) :
		$categories = get_terms( [
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'exclude'    => [ get_option( 'default_product_cat' ) ],
			'number'     => 3,
		] );
		if ( ! is_wp_error( $categories ) && $categories ) :
	?>
	<section class="dd-section dd-section--white">
		<div class="dd-container">
			<div class="dd-section-header">
				<h2 class="dd-section-title"><?php esc_html_e( 'Shop by Category', 'dapperly-driven' ); ?></h2>
				<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="dd-section-link"><?php esc_html_e( 'View All →', 'dapperly-driven' ); ?></a>
			</div>
			<div class="dd-cat-grid">
				<?php foreach ( $categories as $cat ) :
					$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
					$image        = $thumbnail_id ? wp_get_attachment_image( $thumbnail_id, 'dd-card' ) : '';
				?>
					<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="dd-cat-card">
						<div class="dd-cat-card__image">
							<?php if ( $image ) : ?>
								<?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput ?>
							<?php else : ?>
								<div style="width:100%;height:100%;background:var(--dd-tint);display:flex;align-items:center;justify-content:center;font-size:48px;opacity:.5;">🚗</div>
							<?php endif; ?>
						</div>
						<div class="dd-cat-card__body">
							<div class="dd-cat-card__name"><?php echo esc_html( $cat->name ); ?></div>
							<div class="dd-cat-card__count"><?php echo esc_html( $cat->count ); ?> <?php esc_html_e( 'Products', 'dapperly-driven' ); ?></div>
							<div class="dd-cat-card__arrow"><?php esc_html_e( 'Shop Now →', 'dapperly-driven' ); ?></div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; endif; ?>

	<!-- ======= LATEST ARRIVALS ======= -->
	<?php if ( class_exists( 'WooCommerce' ) ) :
		$products = wc_get_products( [
			'status'  => 'publish',
			'limit'   => 4,
			'orderby' => 'date',
			'order'   => 'DESC',
		] );
		if ( $products ) :
	?>
	<section class="dd-section dd-section--tint">
		<div class="dd-container">
			<div class="dd-section-header">
				<h2 class="dd-section-title"><?php esc_html_e( 'Latest Arrivals', 'dapperly-driven' ); ?></h2>
				<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="dd-section-link"><?php esc_html_e( 'View All →', 'dapperly-driven' ); ?></a>
			</div>
			<div class="dd-product-grid">
				<?php foreach ( $products as $product ) : ?>
					<div class="dd-product-card">
						<div class="dd-product-card__image">
							<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
								<?php echo $product->get_image( 'dd-card' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
							</a>
						</div>
						<div class="dd-product-card__body">
							<?php
							$cats = wc_get_product_category_list( $product->get_id() );
							if ( $cats ) :
							?>
								<div class="dd-product-card__cat"><?php echo wp_strip_all_tags( $cats ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
							<?php endif; ?>
							<h3 class="dd-product-card__title">
								<a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_name() ); ?></a>
							</h3>
						</div>
						<div class="dd-product-card__footer">
							<span class="dd-product-card__price"><?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
							<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="btn btn-secondary" style="padding:8px 14px;font-size:11px;"><?php esc_html_e( 'View', 'dapperly-driven' ); ?></a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div style="text-align:center;margin-top:40px;">
				<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-primary">
					<?php esc_html_e( 'Browse All Products', 'dapperly-driven' ); ?>
				</a>
			</div>
		</div>
	</section>
	<?php endif; endif; ?>

	<!-- ======= LIFESTYLE BAND ======= -->
	<section class="dd-lifestyle">
		<div class="dd-container">
			<div class="dd-lifestyle__inner">
				<div class="dd-lifestyle__content">
					<p class="dd-lifestyle__eyebrow"><?php esc_html_e( 'The Dapperly Driven Story', 'dapperly-driven' ); ?></p>
					<h2 class="dd-lifestyle__heading"><?php esc_html_e( 'More Than a Brand. A Way of Life.', 'dapperly-driven' ); ?></h2>
					<p class="dd-lifestyle__body">
						<?php esc_html_e( 'Born from a genuine passion for cars and the culture that surrounds them — from the detail of a perfectly crafted model to the feel of quality clothing built for people who care. Everything we make is for those who truly get it.', 'dapperly-driven' ); ?>
					</p>
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-cream">
						<?php esc_html_e( 'Our Story', 'dapperly-driven' ); ?>
					</a>
				</div>
				<div class="dd-lifestyle__image">
					<?php
					$lifestyle_img_id = get_theme_mod( 'dd_lifestyle_image' );
					if ( $lifestyle_img_id ) :
						echo wp_get_attachment_image( $lifestyle_img_id, 'dd-card' ); // phpcs:ignore WordPress.Security.EscapeOutput
					else : ?>
						<span style="color:rgba(232,216,176,0.2);font-size:11px;letter-spacing:0.12em;text-transform:uppercase;"><?php esc_html_e( 'Lifestyle image', 'dapperly-driven' ); ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ======= WHY US ======= -->
	<section class="dd-section dd-section--tint">
		<div class="dd-container">
			<div class="dd-section-header">
				<h2 class="dd-section-title"><?php esc_html_e( 'Why Dapperly Driven', 'dapperly-driven' ); ?></h2>
			</div>
			<div class="dd-pillars">
				<?php
				$pillars = [
					[ 'icon' => '🚗', 'title' => __( 'Curated for Car People', 'dapperly-driven' ),  'body' => __( 'Everything is hand-picked for genuine enthusiasts, not just anyone.', 'dapperly-driven' ) ],
					[ 'icon' => '📦', 'title' => __( 'Quality You Can Feel', 'dapperly-driven' ),     'body' => __( 'From heavyweight tees to precision die-cast models — quality is non-negotiable.', 'dapperly-driven' ) ],
					[ 'icon' => '✦',  'title' => __( 'Limited & Exclusive', 'dapperly-driven' ),      'body' => __( 'Many products are limited run — own something that not everyone has.', 'dapperly-driven' ) ],
					[ 'icon' => '🚚', 'title' => __( 'Worldwide Delivery', 'dapperly-driven' ),       'body' => __( 'We ship globally, with free UK delivery on orders over £50.', 'dapperly-driven' ) ],
				];
				foreach ( $pillars as $p ) : ?>
					<div class="dd-pillar">
						<div class="dd-pillar__icon"><?php echo esc_html( $p['icon'] ); ?></div>
						<h3 class="dd-pillar__title"><?php echo esc_html( $p['title'] ); ?></h3>
						<p class="dd-pillar__body"><?php echo esc_html( $p['body'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ======= FROM THE BLOG ======= -->
	<?php
	$posts = get_posts( [ 'numberposts' => 3, 'post_status' => 'publish' ] );
	if ( $posts ) :
	?>
	<section class="dd-section dd-section--white">
		<div class="dd-container">
			<div class="dd-section-header">
				<h2 class="dd-section-title"><?php esc_html_e( 'From the Blog', 'dapperly-driven' ); ?></h2>
				<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="dd-section-link"><?php esc_html_e( 'Read All →', 'dapperly-driven' ); ?></a>
			</div>
			<div class="dd-blog-grid">
				<?php foreach ( $posts as $post ) :
					setup_postdata( $post );
					get_template_part( 'template-parts/card', 'post' );
				endforeach;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
