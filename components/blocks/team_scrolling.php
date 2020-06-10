<?php
/**
 * Display Team Scrolling Block
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

<div class="container">
	<div class="row">
		<div class="col-12">
			<?php
				$args = array(
					'post_type'      => 'team_member',
					'posts_per_page' => -1,
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
				);

				$staff = new WP_Query( $args );

				if ( $staff->have_posts() ) :
					?>
				<div class="swiper-container team--scroller">
					<div class="swiper-wrapper">
					<?php while ( $staff->have_posts() ) : ?>
						<?php $staff->the_post(); ?>
						<div class="swiper-slide">
							<div class="row">
								<div class="col-xl-7">
									<div class="content--area">
										<h2><?php echo esc_attr( get_the_title() ); ?></h2>
										<?php the_content(); ?>
									</div>
								</div>
								<div class="col-xl-5">
									<div class="image__holder">
										<?php echo get_the_post_thumbnail( $post->ID, 'team_thumb' ); ?>
									</div>
								</div>
							</div>
						</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
					</div>
					<?php get_template_part( 'components/swiper-nav' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
