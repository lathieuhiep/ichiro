<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','ichiro_config_theme' );

        function ichiro_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $ichiro_options;
                    $ichiro_favicon = $ichiro_options['ichiro_favicon_upload']['url'];

                    if( $ichiro_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $ichiro_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'ichiro_custom_css', 99 );

        function ichiro_custom_css() {

            global $ichiro_options;

            $ichiro_typo_selecter_1   =   $ichiro_options['ichiro_custom_typography_1_selector'];

            $ichiro_typo1_font_family   =   $ichiro_options['ichiro_custom_typography_1']['font-family'] == '' ? '' : $ichiro_options['ichiro_custom_typography_1']['font-family'];

            $ichiro_css_style = '';

            if ( $ichiro_typo1_font_family != '' ) :
                $ichiro_css_style .= ' '.esc_attr( $ichiro_typo_selecter_1 ).' { font-family: '.balanceTags( $ichiro_typo1_font_family, true ).' }';
            endif;

            if ( $ichiro_css_style != '' ) :
                wp_add_inline_style( 'ichiro-style', $ichiro_css_style );
            endif;

        }

    endif;
