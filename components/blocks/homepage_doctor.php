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

$doc_image   = get_sub_field( 'doctor_image' );
$block_title = get_sub_field( 'title' );
$subtitle    = get_sub_field( 'subtitle' );
$content     = get_sub_field( 'content' );
$acc_gallery = get_sub_field( 'accolade_gallery' );
$bc          = get_sub_field( 'board_certifications' );
$as          = get_sub_field( 'aesthetic_surgeries' );
$ap          = get_sub_field( 'aesthetic_procedures' );
$yse         = get_sub_field( 'years_of_surgical_experience' );
?>

<div class="container">
  <div class="row">
		<div class="col-xl-5 col-lg-6 col-12 d-flex">
			<?php if ( $doc_image ) : ?>
				<img src="<?php echo $doc_image['url']; ?>" class="doc-image fade-in-left" alt="<?php echo $doc_image['alt']; ?>" />
			<?php endif; ?>
		</div>
		<div class="col-xl-7 col-lg-6 col-12">
				<div class="number--area fade-in-bottom">
					<div class="number--item">
						<div class="number" data-number="<?php echo $bc; ?>">0</div>
						<p>board certifications</p>
					</div>
					<div class="number--item">
						<div class="number" data-number="<?php echo $as; ?>">0</div>
						<p>aesthetic surgeries</p>
					</div>
					<div class="number--item">
						<div class="number" data-number="<?php echo $ap; ?>">0</div>
						<p>aesthetic procedures</p>
					</div>
					<div class="number--item">
						<div class="number" data-number="<?php echo $yse; ?>">0</div>
						<p>years of surgical experience</p>
					</div>
				</div>
				<h2 class="fade-in-bottom"><?php echo $block_title; ?></h2>
				<h5 class="fade-in-bottom"><?php echo $subtitle; ?></h5>
				<?php echo $content; ?>
				<?php if ( $acc_gallery ) : ?>
					<div class="acc--gallery fade-in-right">
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
