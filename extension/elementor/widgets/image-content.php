<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ichiro_widget_image_content extends Widget_Base {

	public function get_categories() {
		return array( 'ichiro_widgets' );
	}

	public function get_name() {
		return 'ichiro-image-content';
	}

	public function get_title() {
		return esc_html__( 'Image Content', 'ichiro' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Image Content', 'ichiro' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'ichiro' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Title', 'ichiro' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'ichiro' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'ichiro' ),
				'type'    => Controls_Manager::TEXTAREA,
				'rows'    => 10,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
			]
		);

		$this->add_control(
			'hr_btn',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'text_btn',
			[
				'label'       => esc_html__( 'Text Button', 'ichiro' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Learn More', 'ichiro' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'link_btn',
			[
				'label'         => esc_html__( 'Link', 'ichiro' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'ichiro' ),
				'show_external' => false,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->end_controls_section();

		/* Tab style title */
		$this->start_controls_section(
			'style_title',
			[
				'label' => __( 'Title', 'ichiro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-image-content .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .element-image-content .title',
			]
		);

		$this->end_controls_section();

		/* Tab style description */
		$this->start_controls_section(
			'style_description',
			[
				'label' => __( 'Description', 'ichiro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => __( 'Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-image-content .desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .element-image-content .desc',
			]
		);

		$this->end_controls_section();

		/* Tab style link */
		$this->start_controls_section(
			'style_link',
			[
				'label' => __( 'Link', 'ichiro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'link_color',
			[
				'label'     => __( 'Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-image-content .link' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'link_background_color',
			[
				'label'     => __( 'Background Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-image-content .link' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'selector' => '{{WRAPPER}} .element-image-content .link',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['link_btn']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link_btn']['nofollow'] ? ' rel="nofollow"' : '';
    ?>

        <div class="element-image-content">
            <div class="image-box">
                <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
            </div>

            <h4 class="title">
                <?php echo esc_html( $settings['title'] ); ?>
            </h4>

            <div class="desc">
                <?php echo esc_textarea( $settings['description'] ); ?>
            </div>

            <a class="link" href="<?php echo esc_url( $settings['link_btn']['url'] ) ?>"<?php echo $target . $nofollow ?>>
                <?php echo esc_html( $settings['text_btn'] ); ?>
            </a>
        </div>

    <?php

	}

	protected function content_template() {

    ?>
        <#
        var target = settings.link_btn.is_external ? ' target="_blank"' : '';
        var nofollow = settings.link_btn.nofollow ? ' rel="nofollow"' : '';
        #>

        <div class="element-image-content">
            <div class="image-box">
                <img src="{{ settings.image.url }}">
            </div>

            <h4 class="title">
                {{{ settings.title }}}
            </h4>

            <div class="desc">
                {{{ settings.description }}}
            </div>

            <a class="link" href="{{ settings.link_btn.url }}"{{ target }}{{ nofollow }}>
                {{{ settings.text_btn }}}
            </a>
        </div>

    <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new ichiro_widget_image_content );