<?php
//Global variable redux
global $ichiro_options;

$ichiro_copyright = $ichiro_options ['ichiro_footer_copyright_editor'] == '' ? 'Copyright &amp; DiepLK' : $ichiro_options ['ichiro_footer_copyright_editor'];

?>

<div class="site-footer__copyright">
    <div class="container">
	    <?php echo wp_kses_post( $ichiro_copyright ); ?>
    </div>
</div>