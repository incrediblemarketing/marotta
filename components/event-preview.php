<?php
/**
 * Display Event Preview
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
<article class="post-preview" id="post-<?php the_ID(); ?>">
	<div class="bottom--card">
		<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( 'Permanent Link to %s', the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h3>
		<?php echo get_field('description'); ?>
		<a class="btn--primary" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( 'Permanent Link to %s', the_title_attribute( 'echo=0' ) ); ?>">See More <i class="fal fa-long-arrow-right"></i></a>
	</div>
</article>

