<?php get_header(); ?>

<main id="main" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="dd-post-header">
			<div class="dd-container">
				<p class="dd-post-meta">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<?php
					$cats = get_the_category();
					if ( $cats ) {
						echo ' &middot; <a href="' . esc_url( get_category_link( $cats[0]->term_id ) ) . '">' . esc_html( $cats[0]->name ) . '</a>';
					}
					?>
				</p>
				<h1 class="dd-post-title"><?php the_title(); ?></h1>
			</div>
		</div>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="dd-container">
				<div class="dd-post-thumbnail">
					<?php the_post_thumbnail( 'dd-hero' ); ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="dd-section dd-section--white">
			<div class="dd-container">
				<div class="dd-post-content">
					<?php the_content(); ?>
					<div style="margin-top:40px;padding-top:24px;border-top:1px solid var(--dd-border);">
						<?php the_tags( '<p style="font-size:12px;color:var(--dd-muted);">' . __( 'Tags: ', 'dapperly-driven' ), ', ', '</p>' ); ?>
					</div>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>
