<?php

add_filter('rwmb_meta_boxes', 'ichiro_register_meta_boxes');

function ichiro_register_meta_boxes($ichiro_meta_boxes)
{

	$ichiro_meta_boxes[] = array(
		'id' => 'ichiro_meta_box_oil',
		'title' => esc_html__('Thông số kỹ thuật', 'ichiro'),
		'post_types' => array('oil'),
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(

			array(
				'id'      => 'ichiro_meta_box_oil_model_number',
				'name'    => 'Số hiệu',
				'type'    => 'text',
				'size'    => 50,
				'placeholder' => 'ICR 1233 10W-30',
			),

			array(
				'id'      => 'ichiro_meta_box_oil_model_name',
				'name'    => 'Loại dầu',
				'type'    => 'text',
				'size'    => 50,
				'placeholder' => 'Dầu động cơ thủy lực',
			),

		)
	);

	return $ichiro_meta_boxes;
}