<?php
/**
 * Display Site Nav
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$address      = get_field( 'business_street_address', 'option' );
$address2     = get_field( 'business_city_state_zip', 'option' );
$address_link = get_field( 'business_address_link', 'option' );
?>

<nav class="site-nav">
	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php get_template_part( 'components/svg/logo' ); ?>
	</a>
	<div class="right--nav">
		<div class="top--nav">
		<?php if ( $address_link && $address && $address2 ) : ?>
		<p class="address--nav"><i class="fas fa-map-marker-alt"></i> <a href="<?php echo esc_attr( $address_link ); ?>" target="_blank">
			<?php echo esc_attr( $address ); ?>, <?php echo esc_attr( $address2 ); ?></a></p>
		<?php endif; ?>
			<?php get_template_part( 'components/call' ); ?>
			<?php get_template_part( 'components/social-icons' ); ?>
			<div class="button--area">
				<a href="/contact/" class="btn btn--primary">Request an appointment <i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
		<div class="bottom-nav">
			<?php
			$args = array(
				'theme_location' => 'header-menu',
				'container'      => false,
				'menu_class'     => 'menu',
			);
			wp_nav_menu( $args );
			?>
		</div>
	</div>
	<button data-toggle="menu">
		<span></span>
		<span></span>
		<span></span>
	</button>
</nav>
