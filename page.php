<?php
/**
 * Page.php
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php if ( is_shop() ) : ?>
			<?php get_template_part( 'woocommerce/archive-product' ); ?>
		<?php else : ?>
			<?php get_template_part( 'components/blocks' ); ?>
		<?php endif; ?>
	<?php endwhile; ?> 
<?php endif; ?>  

<?php
get_footer();
