<?php
/**
 * Display Homepage Doctor Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$block_title = get_sub_field( 'title' );
$testimonial = get_sub_field( 'testimonial' );
$content     = get_sub_field( 'content' );
$gallery     = get_sub_field( 'gallery' );
$reviews     = get_sub_field( 'review_area' );

?>

<div class="container">
  <div class="row">
		<div class="col-lg-6">
			<h2 class="fade-in-left"><?php echo esc_attr( $block_title ); ?></h2>
			<?php
			if ( $testimonial ) :
				echo '<div class="swiper-container testimonial--slider fade-in-bottom">';
					echo '<div class="swiper-wrapper">';
				foreach ( $testimonial as $post ) :
					setup_postdata( $post );
					$title = the_title();
					if ( empty( $title ) ) {
						$title = 'Patient';
					}
					?>
				<div class="swiper-slide">
					<div class="quote">
						<?php the_content(); ?>
						<strong><?php echo $title; ?></strong>
					</div>
				</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				</div>
				</div>
			<?php endif; ?>
			<a href="/testimonials/" class="btn--teal fade-in-bottom">More patient experiences <i class="fal fa-long-arrow-right"></i></a>
			<?php if ( have_rows( 'review_area' ) ) : ?>
				<div class="review--area">
				<?php
				while ( have_rows( 'review_area' ) ) :
					the_row();
					?>
					<?php
						$image = get_sub_field( 'review_logo' );
						$num   = get_sub_field( 'number_of_reviews' );
					?>
					<div class="review--item">
						<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" />
						<p>5 STARS / <span class="number" data-number="<?php echo $num; ?>">0</span>+ Reviews</p>
					</div>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-xl-5 offset-xl-1 col-lg-6">
			<?php echo do_shortcode( '[elfsight_instagram_feed id="1"]' ); ?>
		</div>
  </div>
</div>
