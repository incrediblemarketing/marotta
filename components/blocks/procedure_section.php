<?php
/**
 * Display Procedure Section Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$section_title = get_sub_field( 'title' );

?>

<div class="container">
	<div class="row">
		<div class="col-12 procedure--title-area">
			<h2><?php echo esc_attr( $section_title ); ?></h2>
			<a href="/procedures/" class="btn--teal">View all treatments <i class="fal fa-long-arrow-right"></i></a>
		</div>
		<div class="col-12 procedure--select-area">
			<div class="row">
				<div class="col-xl-5">
					<div class="image__holder">
						<img src="" />
					</div>
				</div>
				<div class="col-xl-7">
					<?php
					$args = array(
						'post_type'      => 'procedure',
						'posts_per_page' => -1,
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_parent'    => 0,
					);

					$procedures = new WP_Query( $args );
					$counter = 0;
					if ( $procedures->have_posts() ) :
						echo '<div class="top-procedures">';
						while ( $procedures->have_posts() ) :
							$procedures->the_post();
							if($counter < 1) :
								$active = 'active';
							else :
								$active = '';
							endif; 
							echo '<div class="procedure--item '.$active.'" data-image="' . get_the_post_thumbnail_url( $post->ID ) . '">';
								echo '<a href="' . esc_url( get_the_permalink() ) . '">' . esc_attr( get_the_title() ) . '</a>';
								$args2 = array(
									'post_type'      => 'procedure',
									'posts_per_page' => -1,
									'order'          => 'ASC',
									'orderby'        => 'menu_order',
									'post_parent'    => $post->ID,
								);
								$query = new WP_Query( $args2 );
								if ( $query->have_posts() ) :
									echo '<div class="sub--procedures">';
									while ( $query->have_posts() ) :
										$query->the_post();
										echo '<a href="' . esc_url( get_the_permalink() ) . '">' . esc_attr( get_the_title() ) . '</a>';
									endwhile;
									echo '</div>';
									wp_reset_postdata();
								endif;
								echo '</div>';
								$counter++;
						endwhile;
						echo '</div>';
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
