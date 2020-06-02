<?php
/**
 * Filters
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

/**
 * Excerpt_more
 */
function im_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'im_excerpt_more' );

/**
 * Add class to next_posts_link.
 */
function im_next_posts_link_attributes() {
	return 'class="ml-auto"';
}
add_filter( 'next_posts_link_attributes', 'im_next_posts_link_attributes' );

/**
 * Add class to next_post_link
 *
 * @param string $output string of the next link.
 */
function im_next_post_link_attributes( $output ) {
	$attr = 'class="ml-auto"';
	return str_replace( '<a href=', '<a ' . $attr . ' href=', $output );
}
add_filter( 'next_post_link', 'im_next_post_link_attributes' );

/**
 * Disable Gutenberg by post type
 *
 * @param bool   $use_block_editor boolean that tells whether or not to use the Gutenberg block editor.
 * @param string $post_type string of the post type you want to disable.
 */
function im_disable_gutenberg( $use_block_editor, $post_type ) {
	$disabled = array(
	// 'page',
	// 'testimonial',
	// 'team_member',
	// 'patient',
	);
	if ( in_array( $post_type, $disabled, true ) ) {
		return false;
	}
	return $use_block_editor;
}
add_filter( 'use_block_editor_for_post_type', 'im_disable_gutenberg', 10, 2 );

/**
 * Use <button> for gravity forms submit buttons
 */
add_filter(
	'gform_submit_button',
	function ( $button, $form ) {
		return "<button class='btn--white gform_button' id='gform_submit_button_{$form['id']}'>" . $form['button']['text'] . '</button>';
	},
	10,
	2
);
