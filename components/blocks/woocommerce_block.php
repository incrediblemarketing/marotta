<?php
/**
 * Display Woocommerce Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content = get_sub_field( 'content' );
$content = apply_filters( 'the_content', $content );
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<?php echo $content; ?>
		</div>
	</div>
</div>
