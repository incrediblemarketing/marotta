<?php
/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$copyright    = get_field( 'copyright', 'option' );
	$address      = get_field( 'business_street_address', 'option' );
	$address2     = get_field( 'business_city_state_zip', 'option' );
	$address_link = get_field( 'business_address_link', 'option' );
	$phone        = get_field( 'business_phone_display', 'option' );
	$phone_url    = get_field( 'business_phone_url', 'option' );
	$fax          = get_field( 'business_fax', 'option' );
	$hours        = get_field( 'business_hours', 'option' );
	$map_image    = get_field( 'map_image', 'option' );
	$bg_image     = get_field( 'treat_background_image', 'option' );
	$content      = get_field( 'treat_content', 'option' );
	$bottom_text  = get_field( 'footer_bottom_text', 'option' );

?>
<?php if ( ! is_woocommerce() ) : ?>
<section class="block block--homepage_treat_yourself ">
	<div class="image__holder">
		<img src="<?php echo esc_attr( $bg_image['sizes']['hero_thumb'] ); ?>" />
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="content--area">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="block block--info_area">
	<div class="image__holder">
		<img src="<?php echo esc_attr( $map_image['sizes']['hero_thumb'] ); ?>" />
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 px-0">
				<div class="content--area">
					<div class="address--area fade-in-left">
						<?php if ( $address_link && $address && $address2  && $hours) : ?>
						<p><i class="fas fa-map-marker-alt"></i> <?php echo esc_attr( $address ); ?><br /><?php echo esc_attr( $address2 ); ?></p>
						<p><i class="far fa-clock"></i> <?php echo $hours; ?></p>
						<a href="<?php echo esc_attr( $address_link ); ?>" class="btn--teal" target="_blank">Get directions <i class="fal fa-long-arrow-right"></i></a>
						<?php endif; ?>
					</div>
					<div class="phone--area fade-in-left">
						<?php if ( $phone_url && $phone ) : ?>
						<p><i class="fas fa-phone"></i> <a href="tel:+1-<?php echo esc_attr( $phone_url ); ?>"><?php echo esc_attr( $phone ); ?></a></p>
						<?php endif; ?>
						<p><i class="fas fa-fax"></i> <?php echo esc_attr( $fax ); ?></p>

						<a href="/contact/" class="btn--teal">Contact us <i class="fal fa-long-arrow-right"></i></a>
					</div>
					<?php get_template_part( 'components/social-icons' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="block block--footer-form">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-xl-9">
					<h3 class="fade-in-left">Schedule a consultation</h3>
					<div class="fade-in-bottom">
						<?php echo do_shortcode( '[gravityforms id="1" title="false" description="false"]' ); ?>
					</div>
			</div>
		</h3>
	</div>
</section>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php echo $bottom_text; ?>
				<p>&copy; <?php echo esc_attr( gmdate( 'Y' ) ); ?> <?php echo esc_attr( $copyright ) ?: esc_attr( get_bloginfo() ); ?> | <a href="#">HIPAA</a> | All Rights Reserved | <a href="#">Patient Rights & Responsibilities</a> | <a href="#">Privacy Policy</a> | <a href="#">Sitemap</a> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part( 'components/svg/incredible-marketing' ); ?>Incredible Marketing</a></p>
			</div>
		</div>
	</div>
</footer>
</div><!-- end of .site-wrap -->

<?php wp_footer(); ?>
</body>

</html>
