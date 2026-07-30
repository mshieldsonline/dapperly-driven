<?php get_header(); ?>

<main id="main" class="site-main">

	<div class="dd-page-header">
		<div class="dd-container">
			<?php the_archive_title( '<h1 class="dd-page-title">', '</h1>' ); ?>
			<?php the_archive_description( '<p style="color:var(--dd-muted);margin-top:10px;">', '</p>' ); ?>
		</div>
	</div>

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
