<?php
/**
 * Display Page Header Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$bg_image = get_sub_field( 'background_image' );
?>
<div class="image__holder">
	<?php if ( $bg_image ) : ?>
		<img src="<?php echo esc_url( $bg_image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $bg_image['alt'] ); ?>" />
	<?php else : ?>
		<?php im_the_placeholder_image( 'hero_thumb', '' ); ?>
	<?php endif; ?>
</div>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="header--content">
				<h4>discover the difference.</h4>
				<a href="/contact/" class="btn--teal">Schedule a consultation <i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
	</div>
</div>
