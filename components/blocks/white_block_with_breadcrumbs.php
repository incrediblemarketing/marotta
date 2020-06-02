<?php
/**
 * Display White Block with Breadcrumbs
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$title = get_sub_field( 'title' );
$left  = get_sub_field( 'left_column' );
$right = get_sub_field( 'right_column' );
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="breadcrumbs">
				<?php echo breadcrumbs(); ?>
			</div>
			<h1><?php echo esc_attr( $title ? $title : get_the_title() ); ?></h1>
		</div>
		<div class="col-xl-6">
			<?php echo $left; ?>
		</div>
		<div class="col-xl-6">
			<?php echo $right; ?>
		</div>
	</div>
</div>
