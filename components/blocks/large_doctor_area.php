<?php
/**
 * Display Large Doctor Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content    = get_sub_field( 'content' );
$content2   = get_sub_field( 'content_2' );
$content3   = get_sub_field( 'content_3' );
$youtube_id = get_sub_field( 'youtube_id' );

?>

<div class="container">
	<div class="row">
		<div class="col-12 content--top">
			<?php echo $content; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 youtube--id">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $youtube_id; ?>?rel=0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 content--middle">
			<?php echo $content2; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="content--bottom">
				<?php echo $content3; ?>
			</div>
		</div>
	</div>
</div>
