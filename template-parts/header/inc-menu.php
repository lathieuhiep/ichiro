<?php
global $ichiro_options;

$ichiro_nav_top_sticky   =   $ichiro_options['ichiro_nav_top_sticky'];
?>

<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $ichiro_nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp d-flex justify-content-between">
                <?php get_template_part( 'template-parts/header/inc', 'logo' ); ?>
                <div class="site-menu collapse navbar-collapse justify-content-end">

                    <?php

                    if ( has_nav_menu('primary') ) :

                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav',
                            'container'      => false,
                        ) ) ;

                    else:

                    ?>

                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','ichiro' ); ?>
                                </a>
                            </li>
                        </ul>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</nav>