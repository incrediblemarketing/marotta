<?php
/**
 * Display Homepage Gallery Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$gallery_item = get_sub_field( 'gallery_item' );
$face_item    = get_sub_field( 'face_item' );
$hair_item    = get_sub_field( 'hair_item' );
$skin_item    = get_sub_field( 'skin_item' );
?>

<div class="container">
  <div class="row">
		<div class="col-12">
			<h2 class="fade-in-left">Before <small>&</small> After</h2>
		</div>
		<div class="col-lg-6">
			<?php
				$terms   = get_terms(
					array(
						'taxonomy' => 'procedure_type',
						'parent'   => 0,
						'orderby'  => 'menu_order',
						'order'    => 'ASC',
						'exclude'  => 15,
					)
				);
				$counter = 0;
				foreach ( $terms as $term ) :
					if ( $counter < 1 ) {
						$active = 'active';
					} else {
						$active = ''; }
					?>
				<div class="term--area">
				  <h3 data-toggle="gallery--toggle" data-name="<?php echo esc_attr( $term->name ); ?>"><?php echo esc_attr( $term->name ); ?></h3>
					<?php
					$terms2 = get_terms(
						array(
							'taxonomy' => 'procedure_type',
							'parent'   => $term->term_id,
						)
					);
					?>
					<div class="child--terms <?php echo esc_attr( $active ); ?>">
					<?php foreach ( $terms2 as $term1 ) : ?>
							<div class="child--item">
								<a href="<?php echo get_term_link( $term1 ); ?>" ><?php echo $term1->name; ?></a>
							</div>
					<?php endforeach; ?>
					</div>
				</div>
					<?php $counter++; ?>
			<?php endforeach; ?>
		</div>
		<div class="col-lg-6">
			<div class="fade-in-right">
			<?php
			if ( $gallery_item ) :
				$counter = 0;
				foreach ( $gallery_item as $post ) :
					setup_postdata( $post );
					$images = get_field( 'gallery_images' );
					$size   = 'large';
					if ( $images ) :
						?>
						<div class="image__holder active" data-toggle="Face">
							<?php
							foreach ( $images as $image_id ) :
								if ( $counter < 1 ) :
									echo wp_get_attachment_image( $image_id['id'], $size );
									$gallery_terms = wp_get_post_terms( get_the_ID(), 'procedure_type' );
									echo '<div class="categories">';
									foreach ( $gallery_terms as $item ) :
										echo '<div class="category--item">' . $item->name . '</div>';
									endforeach;
									echo '</div>';
								endif;
								$counter++;
							endforeach;
							?>
						</div>
						<?php
					endif;
				endforeach;
				wp_reset_postdata();
			endif;
			?>
			<?php
			if ( $face_item ) :
				$counter = 0;
				foreach ( $face_item as $post ) :
					setup_postdata( $post );
					$images = get_field( 'gallery_images' );
					$size   = 'large';
					if ( $images ) :
						?>
						<div class="image__holder" data-toggle="Body">
							<?php
							foreach ( $images as $image_id ) :
								if ( $counter < 1 ) :
									echo wp_get_attachment_image( $image_id['id'], $size );
									$gallery_terms = wp_get_post_terms( get_the_ID(), 'procedure_type' );
									echo '<div class="categories">';
									foreach ( $gallery_terms as $item ) :
										echo '<div class="category--item">' . $item->name . '</div>';
									endforeach;
									echo '</div>';
								endif;
								$counter++;
							endforeach;
							?>
						</div>
						<?php
					endif;
				endforeach;
				wp_reset_postdata();
			endif;
			?>
			<?php
			if ( $hair_item ) :
				$counter = 0;
				foreach ( $hair_item as $post ) :
					setup_postdata( $post );
					$images = get_field( 'gallery_images' );
					$size   = 'large';
					if ( $images ) :
						?>
						<div class="image__holder" data-toggle="Hair">
							<?php
							foreach ( $images as $image_id ) :
								if ( $counter < 1 ) :
									echo wp_get_attachment_image( $image_id['id'], $size );
									$gallery_terms = wp_get_post_terms( get_the_ID(), 'procedure_type' );
									echo '<div class="categories">';
									foreach ( $gallery_terms as $item ) :
										echo '<div class="category--item">' . $item->name . '</div>';
									endforeach;
									echo '</div>';
								endif;
								$counter++;
							endforeach;
							?>
						</div>
						<?php
					endif;
				endforeach;
				wp_reset_postdata();
			endif;
			?>
			<?php
			if ( $skin_item ) :
				$counter = 0;
				foreach ( $skin_item as $post ) :
					setup_postdata( $post );
					$images = get_field( 'gallery_images' );
					$size   = 'large';
					if ( $images ) :
						?>
						<div class="image__holder" data-toggle="Skin">
							<?php
							foreach ( $images as $image_id ) :
								if ( $counter < 1 ) :
									echo wp_get_attachment_image( $image_id['id'], $size );
									$gallery_terms = wp_get_post_terms( get_the_ID(), 'procedure_type' );
									echo '<div class="categories">';
									foreach ( $gallery_terms as $item ) :
										echo '<div class="category--item">' . $item->name . '</div>';
									endforeach;
									echo '</div>';
								endif;
								$counter++;
							endforeach;
							?>
						</div>
						<?php
					endif;
				endforeach;
				wp_reset_postdata();
			endif;
			?>
			</div>
		</div>
  </div>
</div>
