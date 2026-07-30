<?php get_header(); ?>

<main id="main" class="site-main">

	<div class="dd-page-header">
		<div class="dd-container">
			<h1 class="dd-page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<section class="dd-section dd-section--white">
		<div class="dd-container">
			<div class="dd-page-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
