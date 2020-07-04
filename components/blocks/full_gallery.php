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
