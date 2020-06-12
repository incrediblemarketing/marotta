<?php
/**
 * Gallery Post Type
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

if ( ! function_exists( 'im_register_galleries' ) ) {

	/**
	 * Register Gallery Post Type
	 */
	function im_register_galleries() {

		$labels = array(
			'name'                  => _x( 'Galleries', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Galleries', 'text_domain' ),
			'name_admin_bar'        => __( 'Gallery', 'text_domain' ),
			'archives'              => __( 'Gallery Archives', 'text_domain' ),
			'attributes'            => __( 'Gallery Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Gallery:', 'text_domain' ),
			'all_items'             => __( 'All Galleries', 'text_domain' ),
			'add_new_item'          => __( 'Add New Gallery', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Gallery', 'text_domain' ),
			'edit_item'             => __( 'Edit Gallery', 'text_domain' ),
			'update_item'           => __( 'Update Gallery', 'text_domain' ),
			'view_item'             => __( 'View Gallery', 'text_domain' ),
			'view_items'            => __( 'View Galleries', 'text_domain' ),
			'search_items'          => __( 'Search Gallery', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Gallery', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Gallery', 'text_domain' ),
			'items_list'            => __( 'Galleries list', 'text_domain' ),
			'items_list_navigation' => __( 'Galleries list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Galleries list', 'text_domain' ),
		);
		$args   = array(
			'label'               => __( 'Gallery', 'text_domain' ),
			'description'         => __( 'Gallery Pages', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'post-formats' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-gallery',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
			'rewrite'             => array( 'with_front' => false ),
		);
		register_post_type( 'gallery', $args );

	}
	add_action( 'init', 'im_register_galleries', 0 );

}

function cptui_register_my_taxes_procedure_type() {

	/**
	 * Taxonomy: Procedure Type.
	 */

	$labels = [
		"name" => __( "Procedure Type", "custom-post-type-ui" ),
		"singular_name" => __( "Procedure Type", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Procedure Type", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'procedure_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "procedure_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "procedure_type", [ "gallery" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_procedure_type' );
