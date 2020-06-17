<?php
/**
 * Display Blog Loop Navigation
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$newer_link = get_previous_posts_link( '<i class="far fa-angle-left"></i> Newer' );
	$older_link = get_next_posts_link( 'Older <i class="far fa-angle-right"></i>' );
?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<?php if ( $older_link || $newer_link ) : ?>
		<nav class="d-flex align-items-center navigation navigation-loop">
			<?php echo $newer_link; ?>
			<?php echo $older_link; ?>
		</nav>
	<?php endif; ?>
<?php endif; ?>
