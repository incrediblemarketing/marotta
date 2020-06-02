<?php
/**
 * Display Homepage Treat Yourself Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content  = get_sub_field( 'content' );
$bg_image = get_sub_field( 'background_image' );

?>

<div class="image__holder">
	<img src="<?php echo esc_url( $bg_image['sizes']['hero_thumb'] ); ?>" />
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="content--area">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</div>
