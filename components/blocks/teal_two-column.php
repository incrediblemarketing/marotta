<?php
/**
 * Display Teal Two-Column Block
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
$content       = get_sub_field( 'content' );
$content2      = get_sub_field( 'content_2' );
?>

<div class="container">
	<div class="row">
		<?php if ( $section_title ) : ?>
			<div class="col-xl-6">
				<h2 class="mar-bot"><?php echo $section_title; ?></h2>
			</div>
			<div class="col-xl-6"></div>
		<?php endif; ?>
		<div class="col-lg-6">
			<?php echo $content; ?>
		</div>
		<div class="col-lg-6 content_2">
			<?php echo $content2; ?>
		</div>
	</div>
</div>
