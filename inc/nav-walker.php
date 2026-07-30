<?php
defined( 'ABSPATH' ) || exit;

class DD_Nav_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '<ul class="primary-nav__submenu">';
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</ul>';
	}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $id = 0 ) {
		$item    = $data_object;
		$classes = empty( $item->classes ) ? [] : (array) $item->classes;
		$class   = implode( ' ', array_filter( $classes ) );

		$output .= '<li class="' . esc_attr( $class ) . '">';

		$atts                = [];
		$atts['href']        = $item->url;
		$atts['target']      = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']         = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['aria-current'] = in_array( 'current-menu-item', $classes, true ) ? 'page' : '';

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( '' !== $value ) {
				$attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
			}
		}

		$title   = apply_filters( 'the_title', $item->title, $item->ID );
		$output .= '<a' . $attributes . '>' . esc_html( $title ) . '</a>';
	}

	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}
