<?php

add_filter( 'rwmb_meta_boxes', 'ichiro_register_meta_boxes' );

function ichiro_register_meta_boxes() {

	/* Start meta box post */
	$ichiro_meta_boxes[] = array(
		'id'         => 'oil_option_meta_box',
		'title'      => esc_html__( 'Thông số kỹ thuật', 'ichiro' ),
		'post_types' => array( 'oil' ),
		'context'    => 'normal',
		'priority'   => 'low',
		'fields'     => array(

			array(
				'id'      => 'oil_viscosity',
				'name'    => 'Độ nhớt',
				'type'    => 'text',
				'size'    => 50,
				'placeholder' => 'ICR 1233 10W-30',
			),

		)
	);

	/* End meta box post */

	return $ichiro_meta_boxes;

}