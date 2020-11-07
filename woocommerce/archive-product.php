<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

$bg_image = get_field( 'treat_background_image', 'option' );
$content  = get_field( 'treat_content', 'option' );

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>
<?php if ( have_rows( 'shop_slider', 'option' ) ) : ?>
	<section class="block block--shop-slider">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="swiper-container shop--slider">
						<div class="swiper-wrapper">
							<?php while ( have_rows( 'shop_slider', 'option' ) ) : ?>
								<?php the_row(); ?>
								<?php $image = get_sub_field( 'banner_image' ); ?>
								<?php $link = get_sub_field( 'banner_link' ); ?>
								<div class="swiper-slide">
									<?php
									if ( $link ) {
										echo '<a href="' . $link . '">'; }
									?>
										<img src="<?php echo $image['sizes']['shop_thumb']; ?>" />
									<?php
									if ( $link ) {
										echo '</a>'; }
									?>
								</div>
							<?php endwhile; ?>
						</div>
						<?php get_template_part( 'components/swiper-nav' ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="block--slider shop--top">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Featured Products</h2>
				<?php echo do_shortcode( '[featured_products_slider]' ); ?>
			</div>
		</div>
	</div>
</section>

<section class="blog--page woocommerce">
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
				}
				?>
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
<?php
get_footer( 'shop' );
