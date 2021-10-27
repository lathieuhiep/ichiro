<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ichiro_widget_about_text extends Widget_Base {

	public function get_categories() {
		return array( 'ichiro_widgets' );
	}

	public function get_name() {
		return 'ichiro-about-text';
	}

	public function get_title() {
		return esc_html__( 'About Text', 'ichiro' );
	}

	public function get_icon() {
		return 'eicon-text-field';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_heading',
			[
				'label' => esc_html__( 'Heading', 'ichiro' ),
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
			'sub_title',
			[
				'label'       => esc_html__( 'Sub Title', 'ichiro' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Sub Title', 'ichiro' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'ichiro' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed imperdiet orci',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button', 'ichiro' ),
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

		/*STYLE TAB*/
		$this->start_controls_section( 'style', array(
			'label' => esc_html__( 'Text', 'ichiro' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-about-text__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'text_editor_color',
			[
				'label'     => __( 'Text Editor Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-about-text__description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hide_line',
			[
				'label'   => esc_html__( 'Hide Line', 'ichiro' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'no'  => esc_html__( 'No', 'ichiro' ),
					'yes' => esc_html__( 'Yes', 'ichiro' ),
				],
			]
		);

		$this->add_responsive_control(
			'margin_bottom_line',
			[
				'label'     => esc_html__( 'Margin Bottom Line', 'ichiro' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => '',
				],
				'range'     => [
					'px' => [
						'min' => 10,
						'max' => 600,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .element-about-text__line' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'hide_line' => 'no',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['link_btn']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link_btn']['nofollow'] ? ' rel="nofollow"' : '';

		?>

        <div class="element-about-text">
            <div class="element-about-text__heading">
                <h2 class="title">
					<?php echo esc_html( $settings['title'] ); ?>
                </h2>

				<?php if ( $settings['sub_title'] ) : ?>

                    <span class="sub-title">
                        <?php echo esc_html( $settings['sub_title'] ); ?>
                    </span>

				<?php endif; ?>
            </div>

			<?php if ( ! empty( $settings['description'] ) ) : ?>

                <div class="element-about-text__description">
					<?php echo esc_html( $settings['description'] ); ?>
                </div>

			<?php endif; ?>

            <div class="element-about-text__btn">
                <span class="element-about-text__line">&nbsp;</span>

                <a class="link" href="<?php echo esc_url( $settings['link_btn']['url'] ) ?>"<?php echo $target . $nofollow ?>>
	                <?php echo esc_html( $settings['text_btn'] ); ?>
                </a>
            </div>
        </div>

		<?php

	}

	protected function _content_template() {

		?>
        <#
        var target = settings.link_btn.is_external ? ' target="_blank"' : '';
        var nofollow = settings.link_btn.nofollow ? ' rel="nofollow"' : '';
        #>

        <div class="element-about-text">
            <div class="element-about-text__heading">
                <h2 class="title">
                    {{{ settings.title }}}
                </h2>

                <# if ( settings.sub_title ) {#>
                <span class="sub-title">
                    {{{ settings.sub_title }}}
                </span>
                <# } #>
            </div>

            <# if ( '' !== settings.description ) {#>

            <div class="element-about-text__description">
                {{{ settings.description }}}
            </div>

            <# } #>

            <div class="element-about-text__btn">
                <span class="element-about-text__line">&nbsp;</span>

                <a class="link" href="{{ settings.link_btn.url }}"{{ target }}{{ nofollow }}>
                    {{{ settings.text_btn }}}
                </a>
            </div>
        </div>

		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new ichiro_widget_about_text );