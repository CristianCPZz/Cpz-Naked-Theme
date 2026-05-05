<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
	<header class="site-header">
	<div class="header-inner">
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				echo '<div class="site-name"><a href="' . esc_url( home_url( '/' ) ) . '" aria-label="' . esc_attr__( 'Homepage', 'cpz-naked-theme' ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a></div>';
			}
			?>
		</div>
		<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Main menu', 'cpz-naked-theme' ); ?>">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
	</div>
	</header>
