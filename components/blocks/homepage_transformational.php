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

$section_title = get_sub_field( 'title' );
$gallery       = get_sub_field( 'gallery' );
$bg_image      = get_sub_field( 'background_image' );

?>
<div class="background--image">
	<?php if ( $bg_image ) : ?>
		<img src="<?php echo $bg_image['sizes']['hero_thumb']; ?>" />
	<?php endif; ?>
</div>
<div class="container">
  <div class="row">
		<div class="col-xxl-5 col-lg-6">
		<?php if ( $gallery ) : ?>
					<div class="transform--gallery">
						<?php foreach ( $gallery as $image ) : ?>
							<div class="gallery--item">
								<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
		</div>
		<div class="col-xxl-7 col-lg-6">
			<h2><?php echo $section_title; ?></h2>
			<?php if ( have_rows( 'content' ) ) : ?>
				<?php $counter = 0; ?>
				<?php
				while ( have_rows( 'content' ) ) :
					the_row();
					?>
					
						<?php if ( get_row_layout() == 'content_block' ) : ?>
							<?php
									$block_title   = get_sub_field( 'block_title' );
									$block_content = get_sub_field( 'block_content' );

									if($counter < 1) {
										$active = 'active';
									}else{
										$active = '';
									}
							?>
									<div class="block--content content--<?php echo $counter; ?> <?php echo $active; ?>">
									<h3><?php echo esc_attr( $block_title ); ?></h3>
									<?php echo $block_content; ?>
								</div>
							<?php endif; ?>
							<?php $counter++; ?>
					<?php endwhile; ?>
				<?php endif; ?>
		</div>
		<div class="col-xl-12">
		<?php if ( have_rows( 'content' ) ) : ?>
			<?php $counter2 = 0; ?>
			<div class="section--titles">
			<?php while ( have_rows( 'content' ) ) : ?>
				<?php the_row(); ?>
				<?php if ( get_row_layout() == 'content_block' ) : ?>
					<?php
						$block_title2 = get_sub_field( 'block_title' );
						if($counter2 < 1) {
							$active = 'active';
						}else{
							$active = '';
						}
					?>
					<div class="item <?php echo $active; ?>" data-count="content--<?php echo $counter2; ?>"><?php echo $block_title2; ?></div>
				<?php endif; ?>
				<?php $counter2++; ?>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
		</div>
  </div>
</div>
