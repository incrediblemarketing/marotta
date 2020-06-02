<?php
/**
 * Display Testimonial Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$testimonials = get_sub_field( 'testimonials' );
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 px-0">
			<h2>See What Our Patients Are Saying</h2>
			<div class="swiper-container testimonial-container">
				<div class="swiper-wrapper">
					<?php
					if ( $testimonials ) :
						$post = $testimonials;
						setup_postdata( $post );
						?>
						<?php foreach ( $testimonials as $post ) : ?>
							<?php setup_postdata( $post ); 
							$section_title = get_the_title( );
							if ( empty( $section_title ) ) {
								$section_title = 'Patient';
							} ?>
							<div class="swiper-slide">
								<div class="quote">
									<i class="fas fa-quote-right"></i>
									<?php echo the_content(); ?>
									<hr/>
									<p><?php echo esc_attr( $section_title ); ?></p>
								</div>
							</div>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
				<?php get_template_part( 'components/swiper-nav' ); ?>
			</div>
		</div>
	</div>
</div>
