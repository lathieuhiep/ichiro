
<?php if( is_active_sidebar( 'ichiro-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( ichiro_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'ichiro-sidebar-main' ); ?>
    </aside>

<?php endif; ?>