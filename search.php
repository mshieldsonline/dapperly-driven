<?php get_header(); ?>

<main id="main" class="site-main">

	<div class="dd-page-header">
		<div class="dd-container">
			<h1 class="dd-page-title">
				<?php
				/* translators: %s: search query */
				printf( esc_html__( 'Results for: %s', 'dapperly-driven' ), '<em>' . esc_html( get_search_query() ) . '</em>' );
				?>
			</h1>
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
				<p style="text-align:center;color:var(--dd-muted);padding-block:60px;">
					<?php esc_html_e( 'Nothing found. Try a different search.', 'dapperly-driven' ); ?>
				</p>
				<?php get_search_form(); ?>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
