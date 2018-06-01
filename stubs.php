<?php

/**
 * @psalm-assert-if-true WP_Error $thing
 * @psalm-assert-if-false !WP_Error $thing
 *
 * @param  mixed  $thing
 * @return bool
 */
function is_wp_error ($thing) {
	return ( $thing instanceof WP_Error );
}

/**
 * @template T
 *
 * @param T $value
 * @return T
 */
function wp_slash( $value ) {
	if ( is_array( $value ) ) {
		foreach ( $value as $k => $v ) {
			if ( is_array( $v ) ) {
				$value[ $k ] = wp_slash( $v );
			} else {
				$value[ $k ] = addslashes( $v );
			}
		}
	} else {
		$value = addslashes( $value );
	}

	return $value;
}