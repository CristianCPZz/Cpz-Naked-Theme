<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<footer class="footer cpz-footer" role="contentinfo">
    <p class="cpz-copyright">
        <small>
            &copy; <?php echo date('Y'); ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Homepage', 'cpz-naked-theme'); ?>">
                <?php bloginfo('name'); ?>
            </a>
            - <?php esc_html_e('All rights reserved.', 'cpz-naked-theme'); ?>
        </small>
    </p>
</footer>
<?php wp_footer(); ?>
<!-- Cpz naked theme -->
</body>
</html>