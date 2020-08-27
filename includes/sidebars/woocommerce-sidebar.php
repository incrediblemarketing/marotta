<?php
/**
 * Woocommerce Sidebar
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
 * Register Blog Sidebar
 */
function im_register_sidebar_woocommerce() {
	register_sidebar(
		array(
			'name'          => 'Woocommerce Blog',
			'id'            => 'woocommerce_blog',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'im_register_sidebar_woocommerce' );
