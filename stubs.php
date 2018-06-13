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