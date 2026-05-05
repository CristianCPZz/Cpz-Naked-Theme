<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Salta l'header del tema se Elementor lo gestisce o se inietta un partial header
$cpz_skip_theme_header = false;
if ( function_exists( 'get_elementor_header_enabled' ) ) {
	$cpz_skip_theme_header = get_elementor_header_enabled();
}
if ( ! $cpz_skip_theme_header && function_exists( 'get_elementor_footer_enabled' ) ) {
	$cpz_skip_theme_header = get_elementor_footer_enabled();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
	<meta name="cpz-theme" content="naked-v1">
</head>
<body <?php body_class(); ?>>
<?php if ( ! $cpz_skip_theme_header ) : ?>
<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'cpz-naked-theme' ); ?></a>
	<header class="site-header">
	<div class="header-inner">
		<div class="site-branding">
		<?php
		if ( has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo_alt       = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
			$logo_alt       = $logo_alt ? $logo_alt : get_bloginfo( 'name' );
			?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Homepage', 'cpz-naked-theme' ); ?>">
				<?php
				echo wp_get_attachment_image(
					$custom_logo_id,
					'full',
					false,
					array(
						'class' => 'custom-logo',
						'alt'   => esc_attr( $logo_alt ),
					)
				);
				?>
				</a>
				<?php
		} elseif ( is_front_page() || is_home() ) {
				echo '<h1 class="site-name"><a href="' . esc_url( home_url( '/' ) ) . '" aria-label="' . esc_attr__( 'Homepage', 'cpz-naked-theme' ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a></h1>';
		} else {
			echo '<div class="site-name"><a href="' . esc_url( home_url( '/' ) ) . '" aria-label="' . esc_attr__( 'Homepage', 'cpz-naked-theme' ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a></div>';
		}
		?>
		</div>
		<button class="menu-toggle" aria-controls="cpz-main-menu" aria-expanded="false">
		<span class="menu-toggle-icon" aria-hidden="true">&#9776;</span>
		<span class="screen-reader-text"><?php esc_html_e( 'Open menu', 'cpz-naked-theme' ); ?></span>
		</button>
		<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Main menu', 'cpz-naked-theme' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'container'      => false,
					'menu_class'     => 'main-menu',
					'fallback_cb'    => false,
					'menu_id'        => 'cpz-main-menu',
				)
			);
			?>
		</nav>
	</div>
	</header>
<?php endif; ?>
