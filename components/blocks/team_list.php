<?php
/**
 * Display Team List Block
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
			<h2>Our Team</h2>
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
				<div class="team--grid">
					<?php while ( $staff->have_posts() ) : ?>
						<?php $staff->the_post(); ?>
						<div class="single--staff">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php echo get_the_post_thumbnail( $post->ID, 'team_thumb' ); ?>
							<?php else : ?>
								<?php im_the_placeholder_image( 'team_thumb', '' ); ?>
							<?php endif; ?>
							<div class="staff--content">
								<h3><?php echo esc_attr( get_the_title() ); ?></h3>
								<p><?php echo get_field( 'position' ); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
