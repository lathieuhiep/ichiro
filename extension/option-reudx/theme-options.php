<?php
/**
 * ReduxFramework Config File
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}


// This is your option name where all the Redux data is stored.
$ichiro_opt_name = "ichiro_options";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * */

$ichiro_theme = wp_get_theme(); // For use with some settings. Not necessary.

$ichiro_opt_args = array(

    'opt_name'             => $ichiro_opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $ichiro_theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $ichiro_theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => false,
    // Show the sections below the admin menu item or not
    'menu_title'           => $ichiro_theme->get( 'Name' ) . esc_html__(' Options', 'ichiro'),
    'page_title'           => $ichiro_theme->get( 'Name' ) . esc_html__(' Options', 'ichiro'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,

    // OPTIONAL -> Give you extra features
    'page_priority'        => 2,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'             =>  array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     =>  array(
            'color'     => 'red',
            'shadow'    =>  true,
            'rounded'   =>  false,
            'style'     =>  '',
        ),
        'tip_position'  =>  array(
            'my'        =>  'top left',
            'at'        =>  'bottom right',
        ),
        'tip_effect'    =>  array(
            'show'      =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'mouseover',
            ),
            'hide'  =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'click mouseleave',
            ),
        ),
    )
);
Redux::setArgs( $ichiro_opt_name, $ichiro_opt_args );
/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$ichiro_opt_tabs = array(
    array(
        'id'        =>  'redux-help-tab-1',
        'title'     =>  esc_html__( 'Theme Information 1', 'ichiro' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'ichiro' )
    ),
    array(
        'id'        =>  'redux-help-tab-2',
        'title'     =>  esc_html__( 'Theme Information 2', 'ichiro' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'ichiro' )
    )
);
Redux::setHelpTab( $ichiro_opt_name, $ichiro_opt_tabs );

// Set the help sidebar
$ichiro_opt_content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'ichiro' );
Redux::setHelpSidebar( $ichiro_opt_name, $ichiro_opt_content );


/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

// -> START option background

Redux::setSection( $ichiro_opt_name, array(
    'id'                =>   'ichiro_theme_option',
    'title'             =>   $ichiro_theme->get( 'Name' ).' '.$ichiro_theme->get( 'Version' ),
    'customizer_width'  =>   '400px',
    'icon'              =>   '',
));

// -> END option background

/* Start General Options */

Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( 'General Options', 'ichiro' ),
    'id'                =>  'ichiro_general',
    'desc'              =>  esc_html__( 'General all config', 'ichiro' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-th-large',
));

// Favicon Config
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Favicon', 'ichiro' ),
    'id'            =>  'ichiro_favicon_config',
    'desc'          =>  esc_html__( '', 'ichiro' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'ichiro_favicon_upload',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload Favicon Image', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'Favicon image for your website', 'ichiro' ),
            'desc'      =>  esc_html__( '', 'ichiro' ),
            'default'   =>  false,
        ),
    )
));

//Loading config
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Loading config', 'ichiro' ),
    'id'            =>  'ichiro_general_loading',
    'desc'          =>  esc_html__( '', 'ichiro' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'ichiro_general_show_loading',
            'type'      =>  'switch',
            'title'     =>  esc_html__( 'Loading On/Off', 'ichiro' ),
            'default'   =>  false,
        ),
        array(
            'id'        =>  'ichiro_general_image_loading',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload image loading', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'Upload image .gif', 'ichiro' ),
            'default'   =>  '',
            'required'  =>  array( 'ichiro_general_show_loading', '=', true ),
        ),
    )
));

//Background Options
Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( 'Background', 'ichiro' ),
    'id'                =>  'ichiro_background',
    'desc'              =>  esc_html__( 'Background all config', 'ichiro' ),
    'customizer_width'  =>  '400px',
    'subsection'        => true,
    'fields'            => array(
        array(
            'id'        =>  'ichiro_background_body',
            'output'    =>  'body',
            'type'      =>  'background',
            'clone'     =>  'true',
            'title'     =>  esc_html__( 'Body background', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'Body background with image, color, etc.', 'ichiro' ),
            'hint'      =>  array(
                'content'   =>  'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
            )
        ),
    ),
));

/* End General Options */

/* Start Header Options */
Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( 'Header Options', 'ichiro' ),
    'id'                =>  'ichiro_header',
    'desc'              =>  esc_html__( 'Header all config', 'ichiro' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-up',
));

//Logo Config
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Logo', 'ichiro' ),
    'id'            =>  'ichiro_logo_config',
    'desc'          =>  esc_html__( '', 'ichiro' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'ichiro_logo_image',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload logo', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'logo image for your website', 'ichiro' ),
            'desc'      =>  esc_html__( '', 'ichiro' ),
            'default'   =>  false,
        ),

        array(
            'id'                => 'ichiro_logo_images_size',
            'type'              => 'dimensions',
            'units'             => array( 'em', 'px', '%' ),
            'title'             => esc_html__( 'Set width/height for logo', 'ichiro' ),
            'subtitle'          => esc_html__( '', 'ichiro' ),
            'units_extended'    => 'true',
            'default'           => array(
                'width'     =>  '',
                'height'    =>  '',
            ),
            'output'         => array('.site-logo img'),
        ),

        array(
            'id'        =>  'ichiro_nav_top_sticky',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Sticky Menu', 'ichiro' ),
            'default'   =>  1,
            'options'   =>  array(
                1   =>  esc_html__( 'Yes', 'ichiro' ),
                0   =>  esc_html__( 'No', 'ichiro' )
            )
        ),

    )
));

// information
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Information', 'ichiro' ),
    'id'            =>  'ichiro_information_config',
    'desc'          =>  esc_html__( '', 'ichiro' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'ichiro_information_show_hide',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Show Or Hide Information', 'ichiro' ),
            'default'   =>  1,
            'options'   =>  array(
                1   =>  esc_html__( 'Show', 'ichiro' ),
                0   =>  esc_html__( 'Hide', 'ichiro' )
            )
        ),

        array(
            'id'        =>  'ichiro_information_address',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Address', 'ichiro' ),
            'default'   =>  '988782, Our Street, S State.',
        ),

        array(
            'id'        =>  'ichiro_information_mail',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Mail', 'ichiro' ),
            'default'   =>  'info@domain.com',
        ),

        array(
            'id'        =>  'ichiro_information_phone',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Phone', 'ichiro' ),
            'default'   =>  '+1 234 567 186',
        ),

    )
));

/* End Header Options */

/* Start Blog Option */
Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( 'Blog Options', 'ichiro' ),
    'id'                =>  'ichiro_blog_option',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-blogger',
    'fields'            =>  array(

        array(
            'id'        =>  'ichiro_blog_sidebar_archive',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Sidebar Archive', 'ichiro' ),
            'desc'      =>  esc_html__( 'Use for archive, index, page search', 'ichiro' ),
            'default'   =>  'right',
            'options'   =>  array(
                'hide' =>  array(
                    'alt'   =>  'None Sidebar',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/1col.png'
                ),

                'left' =>  array(
                    'alt'   =>  'Sidebar Left',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cl.png'
                ),

                'right' =>  array(
                    'alt'   =>  'Sidebar Right',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cr.png'
                ),

            ),
        ),

	    array(
		    'id'        =>  'ichiro_blog_per_row',
		    'type'      =>  'select',
		    'title'     =>  esc_html__( 'Blog Per Row', 'ichiro' ),
		    'default'   =>  2,
		    'options'   =>  array(
			    2   =>  '2 Column',
			    3   =>  '3 Column',
			    4   =>  '4 Column',
		    )
	    ),

    )
));

Redux::setSection( $ichiro_opt_name, array(
	'title'         =>  esc_html__( 'Single Post', 'ichiro' ),
	'id'            =>  'ichiro_single_post_option',
	'desc'          =>  esc_html__( '', 'ichiro' ),
	'subsection'    =>  true,
	'fields'        =>  array(

		array(
			'id'        =>  'ichiro_blog_sidebar_single',
			'type'      =>  'image_select',
			'title'     =>  esc_html__( 'Sidebar Single', 'ichiro' ),
			'default'   =>  'right',
			'options'   =>  array(
				'hide' =>  array(
					'alt'   =>  'None Sidebar',
					'img'   =>  ReduxFramework::$_url . 'assets/img/1col.png'
				),

				'left' =>  array(
					'alt'   =>  'Sidebar Left',
					'img'   =>  ReduxFramework::$_url . 'assets/img/2cl.png'
				),

				'right' =>  array(
					'alt'   =>  'Sidebar Right',
					'img'   =>  ReduxFramework::$_url . 'assets/img/2cr.png'
				),

			),
		),

		array(
			'id'        =>  'ichiro_on_off_share_single',
			'type'      =>  'switch',
			'title'     =>  esc_html__( 'On/Off Share Post Single', 'ichiro' ),
			'default'   =>  true,
		),

		array(
			'id'            =>  'ichiro_related_post_limit',
			'type'          =>  'slider',
			'title'         =>  esc_html__( 'Related Post Limit', 'ichiro' ),
			'min'           =>  1,
			'step'          =>  1,
			'max'           =>  250,
			'default'       =>  3,
			'display_value' => 'text'
		),

	)
));
/* End Blog Option */

/* Start Social Network */
Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( 'Social Network', 'ichiro' ),
    'id'                =>  'ichiro_social_network',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-globe-alt',
    'fields'            =>  array(

        array(
            'id'        =>  'ichiro_social_network_facebook',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Facebook', 'ichiro' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'ichiro_social_network_youtube',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Youtube', 'ichiro' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'ichiro_social_network_twitter',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Twitter', 'ichiro' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'ichiro_social_network_instagram',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Instagram', 'ichiro' ),
            'default'   =>  '#',
        ),

    )
));
/* End Social Network */

/* Start Typography Options */
Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( 'Typography', 'ichiro' ),
    'id'                =>  'ichiro_typography',
    'desc'              =>  esc_html__( 'Typography all config', 'ichiro' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-fontsize'
));

// Body font
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Body Typography', 'ichiro' ),
    'id'            =>  'ichiro_body_typography',
    'desc'          =>  esc_html__( '', 'ichiro' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'ichiro_body_typography_font',
            'type'      =>  'typography',
            'output'    =>  array( 'body' ),
            'title'     =>  esc_html__( 'Body Font', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'Specify the body font properties.', 'ichiro' ),
            'google'    =>  true,
            'default'   =>  array(
                'color'         =>  '',
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
            ),
        ),

        array(
            'id'        =>  'ichiro_link_color',
            'type'      =>  'link_color',
            'output'    =>  array( 'a' ),
            'title'     =>  esc_html__( 'Link Color', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'Controls the color of all text links.', 'ichiro' ),
            'default'   =>  ''
        ),
    )
));

// Header font
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Custom Typography', 'ichiro' ),
    'id'            =>  'ichiro_custom_typography',
    'desc'          =>  esc_html__( '', 'ichiro' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'ichiro_custom_typography_1',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 1 Typography', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 1.', 'ichiro' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 1
        array(
            'id'        =>  'ichiro_custom_typography_1_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 1', 'ichiro' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'ichiro' ),
            'default'   =>  ''
        ),

        array(
            'id'        =>  'ichiro_custom_typography_2',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 2 Typography', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 2.', 'ichiro' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 2
        array(
            'id'        => 'ichiro_custom_typography_2_selector',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Selectors 2', 'ichiro' ),
            'desc'      => esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'ichiro' ),
            'default'   => ''
        ),

        array(
            'id'        =>  'ichiro_custom_typography_3',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 3 Typography', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 3.', 'ichiro' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
            'output'    =>  '',
        ),

        //selector custom typo 3
        array(
            'id'        =>  'ichiro_custom_typography_3_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 3', 'ichiro' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'ichiro' ),
            'default'   =>  ''
        ),

    )
));

/* End Typography Options */

/* Start 404 Options */
Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( '404 Options', 'ichiro' ),
    'id'                =>  'ichiro_404',
    'desc'              =>  esc_html__( '404 page all config', 'ichiro' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-warning-sign',
    'fields'            =>  array(

        array(
            'id'        =>  'ichiro_404_background',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( '404 Background', 'ichiro' ),
            'default'   =>  false,
        ),

        array(
            'id'        =>  'ichiro_404_title',
            'type'      =>  'text',
            'title'     =>  esc_html__( '404 Title', 'ichiro' ),
            'default'   =>  'Awww...Do Not Cry',
        ),

        array(
            'id'        =>  'ichiro_404_editor',
            'type'      =>  'editor',
            'title'     =>  esc_html__( '404 Content', 'ichiro' ),
            'default'   =>  esc_html__( 'It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', 'ichiro' ),
            'args'          =>  array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
                'quicktags'     => true,
            )
        ),

    )
));
/* End 404 Options */

/* Start Footer Options */
Redux::setSection( $ichiro_opt_name, array(
    'title'             =>  esc_html__( 'Footer Options', 'ichiro' ),
    'id'                =>  'ichiro_footer',
    'desc'              =>  esc_html__( 'Footer all config', 'ichiro' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-down'
));

// Footer Sidebar Multi Column
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Sidebar Footer Multi Column', 'ichiro' ),
    'id'            =>  'ichiro_footer_sidebar_multi_column',
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'ichiro_footer_multi_column',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Number of Footer Columns', 'ichiro' ),
            'subtitle'  =>  esc_html__( 'Controls the number of columns in the footer', 'ichiro' ),
            'default'   =>  4,
            'options'   =>  array(
                0 =>  array(
                    'alt'   =>  'No Footer',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/no-footer.png' )
                ),

                1 =>  array(
                    'alt'   =>  '1 Columnn',
                    'img'   =>  get_theme_file_uri(  '/extension/assets/images/1column.png' )
                ),

                2 =>  array(
                    'alt'   =>  '2 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/2column.png' )
                ),
                3 =>  array(
                    'alt'   =>  '3 Columnn',
                    'img'   =>  get_theme_file_uri(   '/extension/assets/images/3column.png' )
                ),
                4 =>  array(
                    'alt'   =>  '4 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/4column.png' )
                ),
            ),
        ),

        array(
            'id'            =>  'ichiro_footer_multi_column_1',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 1', 'ichiro' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'ichiro' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'ichiro' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'ichiro_footer_multi_column', 'equals','1', '2', '3', '4' ),
                array( 'ichiro_footer_multi_column', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'ichiro_footer_multi_column_2',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 2', 'ichiro' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'ichiro' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'ichiro' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'ichiro_footer_multi_column', 'equals', '2', '3', '4' ),
                array( 'ichiro_footer_multi_column', '!=', '1' ),
                array( 'ichiro_footer_multi_column', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'ichiro_footer_multi_column_3',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 3', 'ichiro' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'ichiro' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'ichiro' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'ichiro_footer_multi_column', 'equals', '3', '4' ),
                array( 'ichiro_footer_multi_column', '!=', '1' ),
                array( 'ichiro_footer_multi_column', '!=', '2' ),
                array( 'ichiro_footer_multi_column', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'ichiro_footer_multi_column_4',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Column width 4', 'ichiro' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'ichiro' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'ichiro' ),
            'default'       =>  3,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'ichiro_footer_multi_column',  'equals', '4' ),
                array( 'ichiro_footer_multi_column', '!=', '1' ),
                array( 'ichiro_footer_multi_column', '!=', '2' ),
                array( 'ichiro_footer_multi_column', '!=', '3' ),
                array( 'ichiro_footer_multi_column', '!=', '0' ),
            )
        ),
    )

));

//Copyright
Redux::setSection( $ichiro_opt_name, array(
    'title'         =>  esc_html__( 'Copyright', 'ichiro' ),
    'id'            =>  'ichiro_footer_copyright',
    'desc'          =>  esc_html__( '', 'ichiro' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'            =>  'ichiro_footer_copyright_editor',
            'type'          =>  'editor',
            'title'         =>  esc_html__( 'Enter content copyright', 'ichiro' ),
            'full_width'    =>  true,
            'default'       =>  'Copyright &amp; DiepLK',
            'args'          =>  array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
                'quicktags'     => true,
            )
        ),
    )
));

/* End Footer Options */


/*
 * <--- END SECTIONS
 */

// Function to test the compiler hook and demo CSS output.
add_filter('redux/options/' . $ichiro_opt_name . '/compiler', 'compiler_action', 10, 3);

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        print_r($options); //Option values
        print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}
