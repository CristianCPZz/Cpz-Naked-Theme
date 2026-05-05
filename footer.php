<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Salta il footer del tema se Elementor lo gestisce o se carica un partial footer
$cpz_skip_theme_footer = false;
if ( function_exists( 'get_elementor_footer_enabled' ) ) {
	$cpz_skip_theme_footer = get_elementor_footer_enabled();
}
if ( ! $cpz_skip_theme_footer && function_exists( 'get_elementor_header_enabled' ) ) {
	$cpz_skip_theme_footer = get_elementor_header_enabled();
}
?>
<?php if ( ! $cpz_skip_theme_footer ) : ?>
<footer class="footer cpz-footer">
	<p class="cpz-copyright">
		<small>
			&copy; <?php echo date( 'Y' ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Homepage', 'cpz-naked-theme' ); ?>">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
			- <?php esc_html_e( 'All rights reserved.', 'cpz-naked-theme' ); ?>
		</small>
	</p>
</footer>
<?php endif; ?>
<?php wp_footer(); ?>
<!-- Cpz naked theme -->
</body>
</html>