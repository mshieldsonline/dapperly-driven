<?php
defined( 'ABSPATH' ) || exit;

function dd_pagination() {
	$links = paginate_links( [
		'prev_text' => '&larr;',
		'next_text' => '&rarr;',
		'type'      => 'array',
	] );

	if ( ! $links ) {
		return;
	}

	echo '<nav class="dd-pagination" aria-label="' . esc_attr__( 'Posts pagination', 'dapperly-driven' ) . '">';
	foreach ( $links as $link ) {
		echo $link; // phpcs:ignore WordPress.Security.EscapeOutput
	}
	echo '</nav>';
}
