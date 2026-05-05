<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<main id="main-content" class="cpz-main">
	<div class="container">
		<?php woocommerce_content(); ?>
	</div>
</main>

<?php
get_footer();

