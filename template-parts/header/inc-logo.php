<?php
global $ichiro_options;

$ichiro_logo_image_id    =   $ichiro_options['ichiro_logo_image']['id'];
$ichiro_nav_top_sticky   =   $ichiro_options['ichiro_nav_top_sticky'];
?>
<div class="site-logo">
    <div class="site-logo__warp">
        <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
            <?php
            if ( !empty( $ichiro_logo_image_id ) ) :
                echo wp_get_attachment_image( $ichiro_logo_image_id, 'full' );
            else :
                echo'<img class="logo-default" src="'.esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';
            endif;
            ?>
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target=".site-menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
    </div>
</div>