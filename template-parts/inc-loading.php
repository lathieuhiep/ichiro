<?php

global $ichiro_options;

$ichiro_show_loading = $ichiro_options['ichiro_general_show_loading'] == '' ? '0' : $ichiro_options['ichiro_general_show_loading'];

if(  $ichiro_show_loading == 1 ) :

    $ichiro_loading_url  = $ichiro_options['ichiro_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $ichiro_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $ichiro_loading_url ); ?>" alt="<?php esc_attr_e('loading...','ichiro') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','ichiro') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>