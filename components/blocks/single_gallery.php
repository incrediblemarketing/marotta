<?php
/**
 * Display Single Gallery Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$gallery = get_sub_field( 'gallery' );
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Before <small>&</small> After</h2>

			<?php
			if ( $gallery ) :
					$post = $gallery;
					setup_postdata( $post );
					$gallery_images = get_field( 'gallery_images' );

				if ( $gallery_images ) :
					?>
				<div class="swiper-container gallery-container">
					<div class="swiper-wrapper">
					<?php foreach ( $gallery_images as $image ) : ?>
							<div class="swiper-slide">
								<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
							</div>
						<?php endforeach; ?>
					</div>
					<?php get_template_part( 'components/swiper-nav' ); ?>
				</div>
				<div class="swiper-container gallery-thumb">
					<div class="swiper-wrapper">
					<?php foreach ( $gallery_images as $image ) : ?>
							<div class="swiper-slide">
								<img src="<?php echo esc_url( $image['sizes']['gallery_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
