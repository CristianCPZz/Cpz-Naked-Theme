<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
  <meta name="cpz-theme" content="naked-v1">
</head>
<body <?php body_class(); ?>>
  <header role="banner">
    <div class="header-inner">
      <div class="site-branding">
        <?php
          if (has_custom_logo()) {
              $custom_logo_id = get_theme_mod('custom_logo');
              $logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
              $logo_alt = $logo_alt ? $logo_alt : get_bloginfo('name');
              ?>
              <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Homepage', 'cpz-naked-theme'); ?>">
                <?php echo wp_get_attachment_image($custom_logo_id, 'full', false, ['class' => 'custom-logo', 'alt' => esc_attr($logo_alt)]); ?>
              </a>
              <?php
          } else {
              if (is_front_page() || is_home()) {
                  echo '<h1 class="site-name"><a href="' . esc_url(home_url('/')) . '" aria-label="' . esc_attr__('Homepage', 'cpz-naked-theme') . '">' . esc_html(get_bloginfo('name')) . '</a></h1>';
              } else {
                  echo '<div class="site-name"><a href="' . esc_url(home_url('/')) . '" aria-label="' . esc_attr__('Homepage', 'cpz-naked-theme') . '">' . esc_html(get_bloginfo('name')) . '</a></div>';
              }
          }
        ?>
      </div>
      <button class="menu-toggle" aria-controls="main-menu" aria-expanded="false">
        <span class="menu-toggle-icon" aria-hidden="true">&#9776;</span>
        <span class="screen-reader-text"><?php esc_html_e('Open menu', 'cpz-naked-theme'); ?></span>
      </button>
      <nav role="navigation" aria-label="Main menu">
          <?php wp_nav_menu([
              'theme_location' => 'main-menu',
              'container' => false,
              'menu_class' => 'main-menu',
              'fallback_cb' => false,
              'menu_id' => 'cpz-main-menu'
            ]);
          ?>
      </nav>
    </div>
  </header>
