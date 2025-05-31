<?php
  if ( ! defined( 'ABSPATH' ) ) {
	  exit; // Exit if accessed directly.
  }
?>
  <header role="banner">
    <div class="header-inner">
      <div class="site-branding">
          <?php
          if (has_custom_logo()) {
              the_custom_logo();
          } else {
              echo '<div class="site-name">' . get_bloginfo('name') . '</div>';
          }
          ?>
      </div>
      <nav role="navigation">
        <?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
      </nav>
    </div>
  </header>
<script>console.log("Header partial incluso con Elementor");</script>
