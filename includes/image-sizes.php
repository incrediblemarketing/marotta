<?php
/**
 * Image Sizes
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

add_image_size( 'blog_preview_thumb', 290, 175, true );
add_image_size( 'featured_thumb', 535, 402, true );
add_image_size( 'parent_thumb', 715, 715, true );
add_image_size( 'background_thumb', 1430, 569, true );
add_image_size( 'hero_thumb', 1920, 1080, true );
add_image_size( 'page_header_thumb', 1920, 548, true );
add_image_size( 'blog_row_thumb', 370, 223, true );
add_image_size( 'post_large', 1430, 796, true );
add_image_size( 'gallery_thumb', 370, 150, true );

/**
 * Add Image Sizes to Array
 *
 * @param array $sizes array of all image sizes.
 */
function im_image_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'blog_preview_thumb' => __( 'Blog Preview Thumbnail' ),
			'featured_thumb'     => __( 'Featured Thumbnail' ),
			'parent_thumb'       => __( 'Parent Thumbnail' ),
			'background_thumb'   => __( 'Background Thumbnail' ),
			'hero_thumb'         => __( 'Hero Thumbnail' ),
			'page_header_thumb'  => __( 'Page Header Thumbnail' ),
			'blog_row_thumb'     => __( 'Blog Row Thumbnail' ),
			'post_large'         => __( 'Post Large' ),
			'gallery_thumb'      => __( 'Gallery Thumb' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'im_image_sizes' );

/**
 * Get Placeholder Image
 *
 * @param array|string $size sometimes a string | someimtes an array for the size.
 * @param string       $class any additional classes that need to be added.
 * @param string|int   $bg_color string or int (usually a HEX) as it is the background color.
 * @param string|int   $text_color string or int (usually a HEX) as its the text color.
 */
function im_get_placeholder_image( $size = full, $class = '', $bg_color = '252525', $text_color = 'FFFFFF' ) {
	$image_sizes  = im_get_all_image_sizes();
	$image_height = $image_sizes[ $size ]['height'];
	$image_width  = $image_sizes[ $size ]['width'];
	ob_start(); ?>
	<img class="<?php echo esc_attr( $class ); ?>" src="//placehold.it/<?php echo esc_attr( $image_width ); ?>x<?php echo esc_attr( $image_height ); ?>/<?php echo esc_attr( $bg_color ); ?>/<?php echo esc_attr( $text_color ); ?>" alt="">
	<?php
		return ob_get_clean();
}

/**
 * Display Placeholder Image
 *
 * @param array|string $size sometimes a string | someimtes an array for the size.
 * @param string       $class any additional classes that need to be added.
 * @param string|int   $bg_color string or int (usually a HEX) as it is the background color.
 * @param string|int   $text_color string or int (usually a HEX) as its the text color.
 */
function im_the_placeholder_image( $size = full, $class = '', $bg_color = '252525', $text_color = 'FFFFFF' ) {
	echo im_get_placeholder_image( $size, $class, $bg_color, $text_color );
}

/**
 * Retrieve all sizes that may be used for the placeholder image
 */
function im_get_all_image_sizes() {
	global $_wp_additional_image_sizes;
	$image_sizes = array(
		'blog_preview_thumb' => array(
			'width'  => 290,
			'height' => 175,
		),
		'featured_thumb'     => array(
			'width'  => 535,
			'height' => 402,
		),
		'parent_thumb'       => array(
			'width'  => 715,
			'height' => 715,
		),
		'background_thumb'   => array(
			'width'  => 1430,
			'height' => 569,
		),
		'blog_row_thumb'     => array(
			'width'  => 370,
			'height' => 223,
		),
		'post_large'         => array(
			'width'  => 1430,
			'height' => 796,
		),
		'hero_thumb'         => array(
			'width'  => 1920,
			'height' => 1080,
		),
	);
	return array_merge( $image_sizes, $_wp_additional_image_sizes );
}
