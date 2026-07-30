<?php get_header(); ?>

<main id="main" class="site-main">
	<section class="dd-section dd-section--white">
		<div class="dd-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php wc_get_template_part( 'content', 'single-product' ); ?>
			<?php endwhile; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
