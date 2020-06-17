<?php
/**
 * Shortcode to display testimonials
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
 * Testimonials shortcode [testimonials]
 */
function shortcode_testimonials() {
	global $post;

	$args = array(
		'post_type'      => 'testimonial',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	);

	$testimonials   = new WP_Query( $args );
	$content = '';
	if ( $testimonials->have_posts() ) :
		while ( $testimonials->have_posts() ) :
			$testimonials->the_post();
			$content .= '<div class="block__testimonial">';
			$content .= get_the_content();
			$content .= '<h3>- ' . get_the_title() . '</h3>';
			$content .= '</div>';
			endwhile;
		wp_reset_postdata();
		endif;

	return $content;
}
add_shortcode( 'testimonials', 'shortcode_testimonials' );
