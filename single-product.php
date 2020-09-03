<?php
/**
 * Single.php
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$bg_image = get_field( 'page_header', 'options' );
$product  = wc_get_product()->get_id();

get_header(); ?>

<section class="shop--single-product">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="products--header">
					<h1>Products</h1>
					<a href="/wishlist/" class="text-link"><i class="fas fa-star"></i> Wishlist</a>
					<a href="<?php echo wc_get_cart_url(); ?>" class="text-link cart-button"><i class="fas fa-shopping-cart"></i> Check out (<?php echo $woocommerce->cart->cart_contents_count; ?>) items</a>
				</div>
				<div class="product-info">
					<div class="breadcrumbs">
						<a href="/">Home</a> / <a href="/shop/">Shop</a> / <span><?php echo get_the_title(); ?></span>
					</div>
				</div>
			</div>
			<div class="col-12">
				<?php do_action( 'woocommerce_before_single_product' ); ?>
			</div>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
							<div class="col-xl-5">
								<?php wc_get_template( 'single-product/product-image.php' ); ?>
							</div>
							<div class="col-xl-7">
								<h2><?php echo get_the_title(); ?></h2>
								<?php wc_get_template( 'single-product/price.php' ); ?>
								<?php wc_get_template( 'single-product/tabs/additional-information.php' ); ?>
								<?php wc_get_template( 'single-product/short-description.php' ); ?>
								<?php wc_get_template( 'single-product/add-to-cart/simple.php' ); ?>
							</div>
					<?php endwhile; ?> 
				<?php endif; ?>
		</div>
	</div>
</section>
<section class="related--products">
	<div class="container">
		<div class="row">
			<div class="col-12">				
				<?php echo do_shortcode( '[related_products limit="3"]' ); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
