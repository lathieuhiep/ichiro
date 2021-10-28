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
				'label'       => esc_html__( 'Subtitle', 'ichiro' ),
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
					'{{WRAPPER}} .element-about-text__heading .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .element-about-text__heading .title',
			]
		);

		$this->end_controls_section();

		/* Tab style subtitle */
		$this->start_controls_section(
			'style_subtitle',
			[
				'label' => __( 'Subtitle', 'ichiro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => __( 'Color', 'ichiro' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-about-text__heading .sub-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .element-about-text__heading .sub-title',
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
					'{{WRAPPER}} .element-about-text__description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .element-about-text__description',
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

				<?php if ( !empty($settings['sub_title']) ) : ?>

                    <span class="sub-title">
                        <?php echo esc_html( $settings['sub_title'] ); ?>
                    </span>

				<?php endif; ?>
            </div>

			<?php if ( !empty( $settings['description'] ) ) : ?>

                <div class="element-about-text__description">
					<?php echo wp_kses_post( $settings['description'] ); ?>
                </div>

			<?php
            endif;

            if ( !empty( $settings['text_btn'] ) ) :
            ?>
                <div class="element-about-text__btn">
                    <?php if ( !empty( $settings['link_btn']['url'] ) ) : ?>

                        <a class="link" href="<?php echo esc_url( $settings['link_btn']['url'] ) ?>"<?php echo $target . $nofollow ?>>
                            <?php echo esc_html( $settings['text_btn'] ); ?>
                        </a>

                    <?php else: ?>

                        <span class="link">
                            <?php echo esc_html( $settings['text_btn'] ); ?>
                        </span>

                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

		<?php

	}

	protected function content_template() {

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

                <# if ( '' !== settings.sub_title ) { #>
                    <span class="sub-title">
                        {{{ settings.sub_title }}}
                    </span>
                <# } #>
            </div>

            <# if ( '' !== settings.description ) { #>
                <div class="element-about-text__description">
                    {{{ settings.description }}}
                </div>
            <# } #>

            <# if ( '' !== settings.text_btn ) { #>
                <div class="element-about-text__btn">
                    <# if ( '' !== settings.link_btn.url ) { #>
                        <a class="link" href="{{ settings.link_btn.url }}"{{ target }}{{ nofollow }}>
                            {{{ settings.text_btn }}}
                        </a>
                    <# } else { #>
                        <span class="link">
                            {{{ settings.text_btn }}}
                        </span>
                    <# } #>
                </div>
            <# } #>
        </div>

		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new ichiro_widget_about_text );