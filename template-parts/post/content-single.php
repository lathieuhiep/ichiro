<?php

global $ichiro_options;

$ichiro_on_off_share_single = $ichiro_options['ichiro_on_off_share_single'];

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php ichiro_post_formats(); ?>

    <div class="site-post-content">
        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <?php ichiro_post_meta(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            ichiro_link_page();
            ?>
        </div>

        <div class="site-post-cat-tag">

            <?php if( get_the_category() != false ): ?>

                <p class="site-post-category">
                    <?php
                    esc_html_e('Category: ','ichiro');
                    the_category( ' ' );
                    ?>
                </p>

            <?php

            endif;

            if( get_the_tags() != false ):

            ?>

                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Tag: ','ichiro' );
                    the_tags('',' ');
                    ?>
                </p>

            <?php endif; ?>

        </div>
    </div>

    <?php

    if ( $ichiro_on_off_share_single == 1 || $ichiro_on_off_share_single == null ) :

        ichiro_post_share();

    endif;

    ?>
</div>

<?php
ichiro_comment_form();

get_template_part( 'template-parts/post/inc','related-post' );




