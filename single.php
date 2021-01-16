<?php
get_header();

global $ichiro_options;

$ichiro_blog_sidebar_single = !empty( $ichiro_options['ichiro_blog_sidebar_single'] ) ? $ichiro_options['ichiro_blog_sidebar_single'] : 'right';

$ichiro_class_col_content = ichiro_col_use_sidebar( $ichiro_blog_sidebar_single, 'ichiro-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $ichiro_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $ichiro_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

