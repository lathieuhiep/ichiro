<?php
get_header();

$get_name_oil_cat = get_query_var( 'oil_cat' );
?>

    <div class="site-container site-oli-category">
        <div class="advanced-header">
            <figure class="image-cate">
	            <?php if (function_exists('z_taxonomy_image')) z_taxonomy_image(); ?>
            </figure>

            <div class="advanced-header__content">
                <h1 class="title">
                    <?php echo esc_html( $get_name_oil_cat ); ?>
                </h1>

                <div class="container">
	                <?php if(function_exists('bcn_display')) : ?>
                        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
	                        <?php bcn_display(); ?>
                        </div>
	                <?php endif; ?>
                </div>

            </div>
        </div>

        <?php if ( have_posts() ) : ?>
            <div class="site-oli-products">
                <div class="container">
                    <div class="row">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            $model_number = rwmb_meta( 'ichiro_meta_box_oil_model_number' );
                            $model_name = rwmb_meta( 'ichiro_meta_box_oil_model_name' );
                        ?>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-custom-mb">
                            <div class="item">
                                <figure class="item__thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large'); ?>
                                    </a>
                                </figure>

                                <div class="item__content">
                                    <h2 class="model-number">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo esc_html( $model_number ); ?>
                                        </a>
                                    </h2>

                                    <p class="modal-name">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo esc_html( $model_name ); ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>

                    <?php ichiro_pagination(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

<?php
get_footer();