<?php
/**
 * Display Call Number
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$business_phone_display = get_field( 'business_phone_display', 'options' );
	$business_phone_url     = get_field( 'business_phone_url', 'options' );

?>

<?php if ( $business_phone_display && $business_phone_url ) : ?>
	<a class="phone--nav" href="tel:<?php echo esc_attr( $business_phone_url ); ?>">
	<i class="fas fa-mobile-alt"></i> <span><?php echo esc_attr( $business_phone_display ); ?></span>
	</a>
<?php endif; ?>
