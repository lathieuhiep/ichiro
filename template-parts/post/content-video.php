<?php

$ichiro_video_post = get_post_meta(  get_the_ID() , 'ichiro_video_post', true );

if ( !empty( $ichiro_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $ichiro_video_post ); ?>
    </div>

<?php endif;?>