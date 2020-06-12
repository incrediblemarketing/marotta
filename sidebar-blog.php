<?php
/**
 * Sidebar Blog
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
<aside class="sidebar sidebar-blog">
	<h2>Filters</h2>
	<?php if ( is_active_sidebar( 'sidebar_blog' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar_blog' ); ?>
	<?php endif; ?>
</aside>
