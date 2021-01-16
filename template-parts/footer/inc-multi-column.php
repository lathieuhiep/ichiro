<?php
//Global variable redux
global $ichiro_options;

$multi_column     =   $ichiro_options ["ichiro_footer_multi_column"];
$multi_column_l   =   $ichiro_options ["ichiro_footer_multi_column_1"];
$multi_column_2   =   $ichiro_options ["ichiro_footer_multi_column_2"];
$multi_column_3   =   $ichiro_options ["ichiro_footer_multi_column_3"];
$multi_column_4   =   $ichiro_options ["ichiro_footer_multi_column_4"];

if( is_active_sidebar( 'ichiro-sidebar-footer-multi-column-1' ) || is_active_sidebar( 'ichiro-sidebar-footer-multi-column-2' ) || is_active_sidebar( 'ichiro-sidebar-footer-multi-column-3' ) || is_active_sidebar( 'ichiro-sidebar-footer-multi-column-4' ) ) :

?>

    <div class="site-footer__multi--column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $multi_column; $i++ ):

                    $j = $i +1;

                    if ( $i == 0 ) :
                        $ichiro_col = $multi_column_l;
                    elseif ( $i == 1 ) :
                        $ichiro_col = $multi_column_2;
                    elseif ( $i == 2 ) :
                        $ichiro_col = $multi_column_3;
                    else :
                        $ichiro_col = $multi_column_4;
                    endif;

                    if( is_active_sidebar( 'ichiro-sidebar-footer-multi-column-'.$j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $ichiro_col ); ?>">

                        <?php dynamic_sidebar( 'ichiro-sidebar-footer-multi-column-'.$j ); ?>

                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>