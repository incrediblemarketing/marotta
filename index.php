<?php
/**
 * Index.php
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$bg_image = get_field('page_header','options');
get_header(); ?>
<section class="block--page_header">
	<div class="image__holder">
		<?php if ( $bg_image ) : ?>
			<img src="<?php echo esc_url( $bg_image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $bg_image['alt'] ); ?>" />
		<?php else : ?>
			<?php im_the_placeholder_image( 'hero_thumb', '' ); ?>
		<?php endif; ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="header--content">
					<h4>discover the difference.</h4>
					<a href="/contact/" class="btn--teal">Schedule a consultation <i class="fal fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog--page">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9">
				<h1>Blog</h1>
				<?php if ( have_posts() ) : ?>
					<div class="grid--blogs">
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<?php get_template_part( 'components/post-preview' ); ?>
						<?php endwhile; ?> 
					</div>
					<?php get_template_part( 'components/navigation-loop' ); ?>
				<?php else : ?>
					<?php get_template_part( 'components/post-not-found' ); ?>
				<?php endif; ?>
			</div>
			<div class="col-lg-3">
				<?php get_sidebar( 'blog' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
