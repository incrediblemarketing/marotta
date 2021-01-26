<?php
/**
 * Display White Block with Breadcrumbs
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$title      = get_sub_field( 'title' );
$left       = get_sub_field( 'left_column' );
$right      = get_sub_field( 'right_column' );
$full_width = get_sub_field( 'full_width_column' );
global $post;

$parentId = $post->post_parent;
if ( $parentId ) {
	$parent = get_post( $parentId );
	if ( $parent->post_parent ) {
		$grandparent = get_post( $parent->post_parent );
	}
}

?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="breadcrumbs">
				<a href="/">Home</a> / 
				<?php if ( 0 !== $parent->post_parent && 0 !== $parentId ) { ?>
					<a href="<?php echo get_permalink( $grandparent->ID ); ?>"><?php echo get_the_title( $grandparent->ID ); ?></a> /
				<?php } ?>
				<?php if ( 0 !== $post->post_parent ) { ?>
					<a href="<?php echo get_permalink( $parentId ); ?>"><?php echo get_the_title( $parentId ); ?></a> /
				<?php } ?>
				<span><?php echo esc_attr( $title ? $title : get_the_title() ); ?></span>
			</div>
			<h1><?php echo esc_attr( $title ? $title : get_the_title() ); ?></h1>
		</div>
		<?php if ( $full_width ) : ?>
		<div class="col-12">
			<?php echo $left; ?>
			<?php echo $right; ?>
		</div>
		<?php else : ?>
		<div class="col-lg-6">
			<?php echo $left; ?>
		</div>
		<div class="col-lg-6 content_2">
			<?php echo $right; ?>
		</div>
		<?php endif; ?>
	</div>
</div>
