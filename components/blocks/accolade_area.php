<?php
/**
 * Display Accolade Area Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content     = get_sub_field( 'content' );
$acc_gallery = get_sub_field( 'accolade_gallery' );
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<?php echo $content; ?>
			<?php if ( $acc_gallery ) : ?>
					<div class="acc--gallery">
						<?php foreach ( $acc_gallery as $image ) : ?>
							<div class="gallery--item">
								<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
		</div>
	</div>
</div>
