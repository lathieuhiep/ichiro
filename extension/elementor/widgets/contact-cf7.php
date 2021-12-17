<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Core\Schemes;

class ichiro_widget_contact_cf7 extends Widget_Base {

	public function get_categories() {
		return array( 'ichiro_widgets' );
	}

	public function get_name() {
		return 'ichiro-contact-cf7';
	}

	public function get_title() {
		return esc_html__( 'Contact cf7', 'ichiro' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ichiro' ),
			]
		);

		$this->add_control(
			'select_cf7',
			[
				'label'     =>  esc_html__( 'Select Contact Form CF7', 'ichiro' ),
				'type'      =>  Controls_Manager::SELECT,
				'default'   =>  'id',
				'options'   =>  ichiro_get_form_cf7(),
				'label_block'   =>  true
			]
		);

		$this->end_controls_section();

		/* Tab style title */
		$this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'ichiro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => __( 'Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-contact-cf7 form.wpcf7-form label' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .element-contact-cf7 .wpcf7-not-valid-tip' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-contact-cf7 .wpcf7-response-output' => 'color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

        <div class="element-contact-cf7">
            <?php echo do_shortcode( '[contact-form-7 id="'.esc_attr( $settings['select_cf7'] ).'"]' ); ?>
        </div>

		<?php

	}

}

Plugin::instance()->widgets_manager->register_widget_type( new ichiro_widget_contact_cf7 );