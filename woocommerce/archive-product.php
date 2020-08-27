<?php
/**
 * archive-product.php
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

global $woocommerce;
$bg_image = get_field( 'treat_background_image', 'option' );
$content  = get_field( 'treat_content', 'option' );
get_header(); ?>
<section class="block block--homepage_treat_yourself shop--top">
	<div class="image__holder">
		<img src="<?php echo esc_attr( $bg_image['sizes']['hero_thumb'] ); ?>" />
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
</section>

<section class="blog--page">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9">
				<div class="products--header">
					<h1>Products</h1>
					<a href="/wishlist/" class="text-link"><i class="fas fa-star"></i> Wishlist</a>
					<a href="<?php echo wc_get_cart_url(); ?>" class="text-link cart-button"><i class="fas fa-shopping-cart"></i> Check out (<?php echo $woocommerce->cart->cart_contents_count; ?>) items</a>
				</div>
				<?php echo do_shortcode( '[products rows="5" columns="3" orderby="popularity" paginate="true" ]' ); ?>
			</div>
			<?php if ( is_active_sidebar( 'woocommerce_blog' ) ) : ?>
				<div class="col-lg-3">
					<div class="woocommerce-sidebar">
						<?php dynamic_sidebar( 'woocommerce_blog' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
