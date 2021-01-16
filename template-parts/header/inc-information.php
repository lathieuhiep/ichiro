<?php
global $ichiro_options;

$ichiro_information_show_hide = $ichiro_options['ichiro_information_show_hide'] == '' ? 1 : $ichiro_options['ichiro_information_show_hide'];

if ( $ichiro_information_show_hide == 1 ) :

$ichiro_information_address   =   $ichiro_options['ichiro_information_address'];
$ichiro_information_mail      =   $ichiro_options['ichiro_information_mail'];
$ichiro_information_phone     =   $ichiro_options['ichiro_information_phone'];

?>

<div class="information">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <?php if ( $ichiro_information_address != '' ) : ?>

                    <span>
                        <i class="fas fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $ichiro_information_address ); ?>
                    </span>

                <?php
                endif;

                if ( $ichiro_information_mail != '' ) :
                ?>

                    <span>
                        <i class="fas fa-envelope"></i>
                        <?php echo esc_html( $ichiro_information_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $ichiro_information_phone != '' ) :
                ?>

                    <span>
                        <i class="fas fa-mobile-alt"></i>
                        <?php echo esc_html( $ichiro_information_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="information__social-network social-network-toTopFromBottom d-lg-flex justify-content-lg-end">
                    <?php ichiro_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

endif;