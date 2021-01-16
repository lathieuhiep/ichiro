<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'ichiro_widgets_init');

function ichiro_widgets_init() {

	$ichiro_widgets_arr  =   array(

		'ichiro-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'ichiro' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'ichiro' )
		),

		'ichiro-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'ichiro' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'ichiro' )
		),

		'ichiro-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'ichiro' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'ichiro' )
		),

		'ichiro-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'ichiro' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'ichiro' )
		),

		'ichiro-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'ichiro' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'ichiro' )
		),

		'ichiro-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'ichiro' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'ichiro' )
		)

	);

	foreach ( $ichiro_widgets_arr as $ichiro_widgets_id => $ichiro_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $ichiro_widgets_value['name'] ),
			'id'            =>  esc_attr( $ichiro_widgets_id ),
			'description'   =>  esc_attr( $ichiro_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}