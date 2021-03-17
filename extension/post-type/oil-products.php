<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post type oil product
*---------------------------------------------------------------------
*/

add_action('init', 'ichiro_create_oil_products', 10);

function ichiro_create_oil_products() {

	/* Start post type oil */
	$labels = array(
		'name'                  =>  _x( 'Dầu Nhớt', 'post type general name', 'ichiro' ),
		'singular_name'         =>  _x( 'Dầu Nhớt', 'post type singular name', 'ichiro' ),
		'menu_name'             =>  _x( 'Dầu Nhớt', 'admin menu', 'ichiro' ),
		'name_admin_bar'        =>  _x( 'Danh sách sản phẩm', 'add new on admin bar', 'ichiro' ),
		'add_new'               =>  _x( 'Thêm mới', 'Dầu nhớt', 'ichiro' ),
		'add_new_item'          =>  esc_html__( 'Thêm mới', 'ichiro' ),
		'edit_item'             =>  esc_html__( 'Sửa', 'ichiro' ),
		'new_item'              =>  esc_html__( 'Sản phẩm mới', 'ichiro' ),
		'view_item'             =>  esc_html__( 'Xem sản phẩm', 'ichiro' ),
		'all_items'             =>  esc_html__( 'Danh sách sản phẩm', 'ichiro' ),
		'search_items'          =>  esc_html__( 'Tìm kiếm sản phẩm', 'ichiro' ),
		'not_found'             =>  esc_html__( 'Không tìm thấy', 'ichiro' ),
		'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thúng rác', 'ichiro' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-cart',
		'rewrite'            => array('slug' => 'dau' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type('oil', $args );
	/* End post type oil */

	/* Start taxonomy oil */
	$taxonomy_labels = array(

		'name'              => _x( 'Danh mục sản phẩm', 'taxonomy general name', 'ichiro' ),
		'singular_name'     => _x( 'Danh mục sản phẩm', 'taxonomy singular name', 'ichiro' ),
		'search_items'      => __( 'Tìm kiếm danh mục', 'ichiro' ),
		'all_items'         => __( 'Tất cả danh mục', 'ichiro' ),
		'parent_item'       => __( 'Danh mục cha', 'ichiro' ),
		'parent_item_colon' => __( 'Danh mục cha:', 'ichiro' ),
		'edit_item'         => __( 'Sửa danh mục', 'ichiro' ),
		'update_item'       => __( 'Cập nhật danh mục', 'ichiro' ),
		'add_new_item'      => __( 'Thêm mới danh mục', 'ichiro' ),
		'new_item_name'     => __( 'Tên danh mục mới', 'ichiro' ),
		'menu_name'         => __( 'Danh mục', 'ichiro' ),

	);

	$taxonomy_args = array(

		'labels'            => $taxonomy_labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'danh-muc' ),

	);

	register_taxonomy( 'oil_cat', array( 'oil' ), $taxonomy_args );
	/* End taxonomy oil */

}