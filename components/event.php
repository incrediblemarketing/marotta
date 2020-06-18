<?php
/**
 * Display Event Post
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

?>
<article class="post" id="post-<?php the_ID(); ?>">
	<div class="col-12">
		<h1><?php echo get_the_title(); ?></h1>
		<?php echo get_field( 'description' ); ?>
		<?php
		$images = get_field( 'gallery' );
		if ( $images ) :
			?>
				<div class="swiper-container event-swiper">
					<div class="swiper-wrapper">
						<?php foreach ( $images as $image ) : ?>
								<div class="swiper-slide">
									<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
								</div>
						<?php endforeach; ?>
					</div>
					<?php get_template_part('components/swiper-nav'); ?>
				</div>
		<?php endif; ?>
	</div> 
</article>
