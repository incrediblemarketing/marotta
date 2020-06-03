<?php
/**
 * Display Testimonial Single Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$youtube_id = get_sub_field( 'youtube_id' );
?>

<div class="container">
	<div class="row align-items-end">
		<div class="col-xl-5">
			<h2>Testimonials</h2>
			<a href="/testimonials/" class="btn--primary">Learn more <i class="fal fa-long-arrow-right"></i></a>
		</div>
		<div class="col-xl-7">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $youtube_id; ?>?rel=0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
