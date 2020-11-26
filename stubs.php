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
 * Escape single quotes, htmlspecialchar " < > &, and fix line endings.
 *
 * Escapes text strings for echoing in JS. It is intended to be used for inline JS
 * (in a tag attribute, for example onclick="..."). Note that the strings have to
 * be in single quotes. The {@see 'js_escape'} filter is also applied here.
 *
 * @since 2.8.0
 *
 * @param string $text The text to be escaped.
 * @return string Escaped text.
 *
 * @psalm-taint-escape html
 */
function esc_js( $text ) {}

/**
 * Escaping for HTML blocks.
 *
 * @since 2.8.0
 *
 * @param string $text
 * @return string
 *
 * @psalm-taint-escape html
 */
function esc_html( $text ) {}

/**
 * Escaping for textarea values.
 *
 * @since 3.1.0
 *
 * @param string $text
 * @return string
 *
 * @psalm-taint-escape html
 */
function esc_textarea( $text ) {}

/**
 * Escaping for HTML attributes.
 *
 * @since 2.8.0
 *
 * @param string $text
 * @return string
 *
 * @psalm-taint-escape html
 */
function esc_attr( $text ) {}

/**
 * Retrieves post data given a post ID or post object.
 *
 * See sanitize_post() for optional $filter values. Also, the parameter
 * `$post`, must be given as a variable, since it is passed by reference.
 *
 * @since 1.5.1
 *
 * @global WP_Post $post Global post object.
 *
 * @param int|WP_Post|null $post   Optional. Post ID or post object. Defaults to global $post.
 * @param string           $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which
 *                                 correspond to a WP_Post object, an associative array, or a numeric array,
 *                                 respectively. Default OBJECT.
 * @param string           $filter Optional. Type of filter to apply. Accepts 'raw', 'edit', 'db',
 *                                 or 'display'. Default 'raw'.
 * @return (
 *     $output is 'OBJECT'
 *         ? ?WP_Post
 *         : (
 *             $output is 'ARRAY_A'
 *                 ? ?array<string, mixed>
 *                 : (
 *                 		$output is 'ARRAY_N'
 *                 			? list<mixed>
 *                 			: WP_Post|array|null
 *                 )
 *          )
 *  )
 */
function get_post( $post = null, $output = OBJECT, $filter = 'raw' ) {}