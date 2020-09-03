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
				<?php
				if ( woocommerce_product_loop() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				} ?>
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
