<?php
/**
 * Display Hero Block
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
$video   = get_sub_field( 'background_video' );
?>

<video autoplay muted loop id="m-video">
	<source src="<?php echo $video; ?>" type="video/mp4">
	Your browser does not support HTML5 video.
</video>

<div class="container-fluid">
	<div class="row">
		<div class="col-xxl-6 offset-xl-1 col-xl-7 col-lg-8">
			<?php echo $content; ?>
		</div>
	</div>
</div>
