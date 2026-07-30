<?php get_header(); ?>

<main id="main" class="site-main">

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<div class="dd-page-header">
			<div class="dd-container">
				<h1 class="dd-page-title"><?php single_post_title(); ?></h1>
			</div>
		</div>
	<?php endif; ?>

	<section class="dd-section dd-section--white">
		<div class="dd-container">

			<?php if ( have_posts() ) : ?>

				<div class="dd-blog-grid">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/card', 'post' ); ?>
					<?php endwhile; ?>
				</div>

				<?php dd_pagination(); ?>

			<?php else : ?>
				<p style="text-align:center;color:var(--dd-muted);padding-block:60px;"><?php esc_html_e( 'No posts found.', 'dapperly-driven' ); ?></p>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
