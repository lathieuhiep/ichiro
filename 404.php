<?php
get_header();

global $ichiro_options;

$ichiro_title = $ichiro_options['ichiro_404_title'];
$ichiro_content = $ichiro_options['ichiro_404_editor'];
$ichiro_background = $ichiro_options['ichiro_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $ichiro_background ) ):
                        echo wp_get_attachment_image( $ichiro_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $ichiro_title != '' ):
                        echo esc_html( $ichiro_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'ichiro' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $ichiro_content != '' ) :
                        echo wp_kses_post( $ichiro_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'ichiro' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'ichiro' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'ichiro' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'ichiro'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'ichiro'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>