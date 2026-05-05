<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Template Name: Shop Page
 */
get_header(); ?>

<main id="main-content" class="site-main">
	<div class="container">
		<?php woocommerce_content(); ?>
	</div>
</main>

<?php get_footer(); ?>
