<?php
/**
 * Shortcode to display social icons
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
 * Child page shortcode [social_icons]
 */
function shortcode_social_icons() {
	ob_start();
	get_template_part( 'components/social-icons' );
	return ob_get_clean();
}
add_shortcode( 'social_icons', 'shortcode_social_icons' );
