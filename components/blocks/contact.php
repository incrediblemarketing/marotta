<?php
/**
 * Display Contact Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$address         = get_field( 'business_street_address', 'option' );
$address2        = get_field( 'business_city_state_zip', 'option' );
$address_link    = get_field( 'business_address_link', 'option' );
$phone           = get_field( 'business_phone_display', 'option' );
$phone_url       = get_field( 'business_phone_url', 'option' );
$fax             = get_field( 'business_fax', 'option' );
$map_image       = get_field( 'map_image', 'option' );
$direction_left  = get_sub_field( 'direction_left' );
$direction_right = get_sub_field( 'direction_right' );

?>

<div class="container content--top">
	<div class="row">
		<div class="col-xl-4 col-lg-5 col-md-5">
			<div class="content--area">
					<div class="address--area">
						<?php if ( $address_link && $address && $address2 ) : ?>
						<p><i class="fas fa-map-marker-alt"></i> 	<a href="<?php echo esc_attr( $address_link ); ?>" class="btn--teal" target="_blank"><?php echo esc_attr( $address ); ?><br /><?php echo esc_attr( $address2 ); ?></a></p>
						<?php endif; ?>
					</div>
					<div class="phone--area">
						<?php if ( $phone_url && $phone ) : ?>
						<p><i class="fas fa-phone"></i> <a href="tel:+1-<?php echo esc_attr( $phone_url ); ?>"><?php echo esc_attr( $phone ); ?></a></p>
						<?php endif; ?>
						<p><i class="fas fa-fax"></i> <?php echo esc_attr( $fax ); ?></p>
					</div>
					<?php get_template_part( 'components/social-icons' ); ?>
				</div>
		</div>
		<div class="col-xl-8 col-lg-7 col-md-7">
			<div class="form--area">
				<h2>Book a Consultation</h2>
				<?php echo do_shortcode( '[gravityforms id="2" title="false" description="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid map--area">
	<div class="row">
		<div class="col-12">
			<img src="<?php echo esc_attr( $map_image['sizes']['hero_thumb'] ); ?>" class="map--area"/>
		</div>
	</div>
</div>
<div class="container directions--area">
	<div class="row justify-content-center">
		<div class="col-12">
			<h2>Directions</h2>
		</div>
		<div class="col-xl-5">
			<?php echo $direction_left; ?>
		</div>
		<div class="col-xl-5 offset-xl-1">
			<?php echo $direction_right; ?>
		</div>
	</div>
</div>
