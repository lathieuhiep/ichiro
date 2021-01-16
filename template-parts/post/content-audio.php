<?php

    $ichiro_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $ichiro_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $ichiro_audio ) ) : ?>

                <?php echo wp_oembed_get( $ichiro_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $ichiro_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>