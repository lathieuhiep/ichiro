<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Core\Schemes;

class ichiro_widget_post_carousel extends Widget_Base {

    public function get_categories() {
        return array( 'ichiro_widgets' );
    }

    public function get_name() {
        return 'ichiro-post-carousel';
    }

    public function get_title() {
        return esc_html__( 'Posts Carousel', 'ichiro' );
    }

    public function get_icon() {
        return 'eicon-posts-carousel';
    }

    public function get_script_depends() {
        return ['ichiro-elementor-custom'];
    }

    protected function _register_controls() {

        /* Section Query */
        $this->start_controls_section(
            'section_query',
            [
                'label' =>  esc_html__( 'Query', 'ichiro' )
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label'         =>  esc_html__( 'Select Category', 'ichiro' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  ichiro_check_get_cat( 'category' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'ichiro' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  6,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'ichiro' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'    =>  esc_html__( 'Post ID', 'ichiro' ),
                    'title' =>  esc_html__( 'Title', 'ichiro' ),
                    'date'  =>  esc_html__( 'Date', 'ichiro' ),
                    'rand'  =>  esc_html__( 'Random', 'ichiro' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     =>  esc_html__( 'Order', 'ichiro' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'ichiro' ),
                    'DESC'  =>  esc_html__( 'Descending', 'ichiro' ),
                ],
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label'     =>  esc_html__( 'Show excerpt', 'ichiro' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    '1' => [
                        'title' =>  esc_html__( 'Yes', 'ichiro' ),
                        'icon'  =>  'fa fa-check',
                    ],
                    '0' => [
                        'title' =>  esc_html__( 'No', 'ichiro' ),
                        'icon'  =>  'fa fa-ban',
                    ]
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label'     =>  esc_html__( 'Excerpt Words', 'ichiro' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  '10',
                'condition' =>  [
                    'show_excerpt' => '1',
                ],
            ]
        );

        $this->end_controls_section();

        /* Section Layout */
        $this->start_controls_section(
            'section_layout',
            [
                'label' =>  esc_html__( 'Layout Settings', 'ichiro' )
            ]
        );

	    $this->add_control(
		    'loop',
		    [
			    'type'          =>  Controls_Manager::SWITCHER,
			    'label'         =>  esc_html__('Loop Slider ?', 'ichiro'),
			    'label_off'     =>  esc_html__('No', 'ichiro'),
			    'label_on'      =>  esc_html__('Yes', 'ichiro'),
			    'return_value'  =>  'yes',
			    'default'       =>  'yes',
		    ]
	    );

	    $this->add_control(
		    'autoplay',
		    [
			    'label'         =>  esc_html__('Autoplay?', 'ichiro'),
			    'type'          =>  Controls_Manager::SWITCHER,
			    'label_off'     =>  esc_html__('No', 'ichiro'),
			    'label_on'      =>  esc_html__('Yes', 'ichiro'),
			    'return_value'  =>  'yes',
			    'default'       =>  'no',
		    ]
	    );

	    $this->add_control(
		    'nav',
		    [
			    'label'         =>  esc_html__('Nav Slider', 'ichiro'),
			    'type'          =>  Controls_Manager::SWITCHER,
			    'label_on'      =>  esc_html__('Yes', 'ichiro'),
			    'label_off'     =>  esc_html__('No', 'ichiro'),
			    'return_value'  =>  'yes',
			    'default'       =>  'yes',
		    ]
	    );

	    $this->add_control(
		    'dots',
		    [
			    'label'         =>  esc_html__('Dots Slider', 'ichiro'),
			    'type'          =>  Controls_Manager::SWITCHER,
			    'label_on'      =>  esc_html__('Yes', 'ichiro'),
			    'label_off'     =>  esc_html__('No', 'ichiro'),
			    'return_value'  =>  'yes',
			    'default'       =>  'yes',
		    ]
	    );

	    $this->add_control(
		    'margin_item',
		    [
			    'label'     =>  esc_html__( 'Space Between Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  30,
			    'min'       =>  0,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_1200',
		    [
			    'label'     =>  esc_html__( 'Min Width 1200px', 'ichiro' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  3,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_992',
		    [
			    'label'     =>  esc_html__( 'Min Width 992px', 'ichiro' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_992',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  2,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_768',
		    [
			    'label'     =>  esc_html__( 'Min Width 768px', 'ichiro' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_768',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  2,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'min_width_568',
		    [
			    'label'     =>  esc_html__( 'Min Width 568px', 'ichiro' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_568',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  2,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'margin_item_568',
		    [
			    'label'     =>  esc_html__( 'Space Between Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  15,
			    'min'       =>  0,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'max_width_567',
		    [
			    'label'     =>  esc_html__( 'Max Width 567px', 'ichiro' ),
			    'type'      =>  Controls_Manager::HEADING,
			    'separator' =>  'before',
		    ]
	    );

	    $this->add_control(
		    'item_567',
		    [
			    'label'     =>  esc_html__( 'Number of Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  1,
			    'min'       =>  1,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

	    $this->add_control(
		    'margin_item_567',
		    [
			    'label'     =>  esc_html__( 'Space Between Item', 'ichiro' ),
			    'type'      =>  Controls_Manager::NUMBER,
			    'default'   =>  0,
			    'min'       =>  0,
			    'max'       =>  100,
			    'step'      =>  1,
		    ]
	    );

        $this->end_controls_section();

        /* Section style post */
        $this->start_controls_section(
            'section_style_post',
            [
                'label' => esc_html__( 'Color & Typography', 'ichiro' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        // Style title post
        $this->add_control(
            'title_post_options',
            [
                'label'     =>  esc_html__( 'Title Post', 'ichiro' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'title_post_color',
            [
                'label'     =>  esc_html__( 'Color', 'ichiro' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post__title a'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_post_color_hover',
            [
                'label'     =>  esc_html__( 'Color Hover', 'ichiro' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post__title a:hover'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_post_typography',
                'selector' => '{{WRAPPER}} .element-post-carousel .item-post .item-post__title',
            ]
        );

        $this->add_control(
            'title_post_alignment',
            [
                'label'     =>  esc_html__( 'Title Alignment', 'ichiro' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'ichiro' ),
                        'icon'  =>  'fa fa-align-left',
                    ],
                    'center' => [
                        'title' =>  esc_html__( 'Center', 'ichiro' ),
                        'icon'  =>  'fa fa-align-center',
                    ],
                    'right' => [
                        'title' =>  esc_html__( 'Right', 'ichiro' ),
                        'icon'  =>  'fa fa-align-right',
                    ],
                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'ichiro' ),
                        'icon'  =>  'fa fa-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post .item-post__title'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        // Style excerpt post
        $this->add_control(
            'excerpt_post_options',
            [
                'label'     =>  esc_html__( 'Excerpt Post', 'ichiro' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label'     =>  esc_html__( 'Color', 'ichiro' ),
                'type'      =>  Controls_Manager::COLOR,
                'default'   =>  '',
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post .item-post__content p'   =>  'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'selector' => '{{WRAPPER}} .element-post-carousel .item-post .item-post__content p',
            ]
        );

        $this->add_control(
            'excerpt_alignment',
            [
                'label'     =>  esc_html__( 'Excerpt Alignment', 'ichiro' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'ichiro' ),
                        'icon'  =>  'fa fa-align-left',
                    ],
                    'center' => [
                        'title' =>  esc_html__( 'Center', 'ichiro' ),
                        'icon'  =>  'fa fa-align-center',
                    ],
                    'right' => [
                        'title' =>  esc_html__( 'Right', 'ichiro' ),
                        'icon'  =>  'fa fa-align-right',
                    ],
                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'ichiro' ),
                        'icon'  =>  'fa fa-align-justify',
                    ],
                ],
                'toggle'    =>  true,
                'selectors' =>  [
                    '{{WRAPPER}} .element-post-carousel .item-post .item-post__content p'   =>  'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $cat_post       =   $settings['select_cat'];
        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];

	    $data_settings_owl  =   [
		    'loop'          =>  ( 'yes' === $settings['loop'] ),
		    'nav'           =>  ( 'yes' === $settings['nav'] ),
		    'dots'          =>  ( 'yes' === $settings['dots'] ),
		    'margin'        =>  $settings['margin_item'],
		    'autoplay'      =>  ( 'yes' === $settings['autoplay'] ),
		    'responsive'    => [
			    '0' => array(
				    'items'     =>  $settings['item_567'],
				    'margin'    =>  $settings['margin_item_567']
			    ),
			    '576' => array(
				    'items'     =>  $settings['item_568'],
				    'margin'    =>  $settings['margin_item_568']
			    ),
			    '768' => array(
				    'items'     =>  $settings['item_768']
			    ),
			    '992' => array(
				    'items'     =>  $settings['item_992']
			    ),
			    '1200' => array(
				    'items'     =>  $settings['item']
			    ),
		    ],
	    ];

	    if ( !empty( $cat_post ) ) :

            $args = array(
                'post_type'             =>  'post',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'cat'                   =>  $cat_post,
                'ignore_sticky_posts'   =>  1,
            );

        else:

            $args = array(
                'post_type'             =>  'post',
                'posts_per_page'        =>  $limit_post,
                'orderby'               =>  $order_by_post,
                'order'                 =>  $order_post,
                'ignore_sticky_posts'   =>  1,
            );

        endif;

        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) :

    ?>

            <div class="element-post-carousel">
                <div class="custom-owl-carousel custom-equal-height-owl owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                    <?php while ( $query->have_posts() ): $query->the_post(); ?>

                        <div class="item-post">
                            <div class="item-post__thumbnail">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php
                                    if ( has_post_thumbnail() ) :

                                        the_post_thumbnail( 'large' );

                                    else:

                                    ?>

                                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/no-image.png' ) ) ?>" alt="<?php the_title(); ?>" />

                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="item-post_content">
                                <h2 class="item-post__title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <?php if ( $settings['show_excerpt'] == 1 ) : ?>

                                    <div class="item-post__desc">
                                        <p>
                                            <?php
                                            if ( has_excerpt() ) :
                                                echo esc_html( wp_trim_words( get_the_excerpt(), $settings['excerpt_length'], '...' ) );
                                            else:
                                                echo esc_html( wp_trim_words( get_the_content(), $settings['excerpt_length'], '...' ) );
                                            endif;
                                            ?>
                                        </p>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>

    <?php

        endif;
    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new ichiro_widget_post_carousel );