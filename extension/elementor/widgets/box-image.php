<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ichiro_widget_box_image extends Widget_Base {

	public function get_categories() {
		return array( 'ichiro_widgets' );
	}

	public function get_name() {
		return 'ichiro-box-image';
	}

	public function get_title() {
		return esc_html__( 'Box Image', 'ichiro' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Box Image', 'ichiro' ),
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

		$this->add_responsive_control(
			'height',
			[
				'label' => __( 'Height', 'ichiro' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					]
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 326,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 326,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .element-box-image .image-box' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_title',
			[
				'type' => Controls_Manager::DIVIDER,
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
			'avatar',
			[
				'label' => esc_html__( 'Choose avatar', 'ichiro' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'hr_btn',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'ichiro' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Subtitle', 'ichiro' ),
				'label_block' => true
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
					'{{WRAPPER}} .element-box-image .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .element-box-image .title',
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
					'{{WRAPPER}} .element-box-image .link' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'link_background_color',
			[
				'label'     => __( 'Background Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-box-image .link' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'selector' => '{{WRAPPER}} .element-box-image .link',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['link_btn']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link_btn']['nofollow'] ? ' rel="nofollow"' : '';
    ?>

        <div class="element-box-image">
            <div class="image-box">
                <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
            </div>

            <div class="warp">
                <div class="heading">
		            <?php if ( $settings['avatar']['id'] ) : ?>
                        <div class="avatar">
				            <?php echo wp_get_attachment_image( $settings['avatar']['id'], 'full' ); ?>
                        </div>
		            <?php endif; ?>

                    <h3 class="title">
			            <?php echo esc_html( $settings['title'] ); ?>
                    </h3>
                </div>

                <div class="content">
                    <h4 class="subtitle">
			            <?php echo esc_html( $settings['subtitle'] ); ?>
                    </h4>

                    <a class="link" href="<?php echo esc_url( $settings['link_btn']['url'] ) ?>"<?php echo $target . $nofollow ?>>
			            <?php echo esc_html( $settings['text_btn'] ); ?>
                    </a>
                </div>
            </div>
        </div>

    <?php

	}

	protected function content_template() {

    ?>
        <#
        var target = settings.link_btn.is_external ? ' target="_blank"' : '';
        var nofollow = settings.link_btn.nofollow ? ' rel="nofollow"' : '';
        #>

        <div class="element-box-image">
            <div class="image-box">
                <img src="{{ settings.image.url }}">
            </div>

            <div class="warp">
                <div class="heading">
                    <# if ( '' !== settings.avatar.url ) { #>
                        <div class="avatar">
                            <img src="{{ settings.avatar.url }}">
                        </div>
                    <# } #>

                    <h3 class="title">
                        {{{ settings.title }}}
                    </h3>
                </div>

                <div class="content">
                    <h4 class="subtitle">
                        {{{ settings.subtitle }}}
                    </h4>

                    <a class="link" href="{{ settings.link_btn.url }}"{{ target }}{{ nofollow }}>
                        {{{ settings.text_btn }}}
                    </a>
                </div>
            </div>
        </div>
    <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new ichiro_widget_box_image );