<?php
/**
 * Display Full Gallery Block
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
			<h2>Before &amp; After</h2>
			<div class="gallery__term--grid">
				<div class="term--area second--item">
					<img src="/wp-content/uploads/2020/06/shutterstock_1369618937-1.jpg">
					<h3>Body Procedures</h3>
					<div class="child--terms">
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/breast-augmentation/" title="Breast Augmentation">Breast Augmentation</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/breast-lift/" title="Breast Lift">Breast Lift</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/breast-reduction-surgery/" title="Breast Reduction Surgery">Breast Reduction Surgery</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/breast-cancer-reconstruction/" title="Breast Cancer Reconstruction">Breast Cancer Reconstruction</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/tummy-tuck/" title="Tummy Tuck">Tummy Tuck</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/arms/" title="Arm Lift">Arm Lift</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/liposuction/" title="Liposuction">Liposuction</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/sculpsure/" title="SculpSure™">SculpSure™</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/mommy-makeover/" title="Mommy Makeover">Mommy Makeover</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/procedure/body-procedures/buttock-augmentation/" title="Buttock Augmentation">Buttock Augmentation</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/large-volume-fat-transfer/" title="Large Volume Fat Transfer">Large Volume Fat Transfer</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/surgical-procedures-for-men/" title="Surgical Procedures for Men">Surgical Procedures for Men</a></div>
						<div class="child--item"><a href="http://marottamd.staging.wpengine.com/body-procedures/body-aesthetics/" title="Body Aesthetics">Body Aesthetics</a></div>
					</div>
				</div>
			<?php
				$terms = get_terms(
					array(
						'taxonomy' => 'procedure_type',
						'parent'   => 0,
						'exclude'  => 15,
					)
				);
				foreach ( $terms as $term ) :
					?>
				<div class="term--area">
					<img src="<?php echo esc_url( get_field( 'image', $term )['url'] ); ?>" class="term--image" />
					<h3 ><?php echo esc_attr( $term->name ); ?></h3>
					<?php
					$terms2 = get_terms(
						array(
							'taxonomy' => 'procedure_type',
							'parent'   => $term->term_id,
						)
					);
					?>
					<div class="child--terms">
						<?php foreach ( $terms2 as $term1 ) : ?>
							<div class="child--item">
								<a href="<?php echo esc_url( get_term_link( $term1 ) ); ?>" ><?php echo $term1->name; ?></a>
							</div>
					<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
