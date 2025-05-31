<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 
?>

<main class="cpz-main">
	<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();

			if ( apply_filters( 'cpz_elementor_page_title', true ) ) : ?>
				<div class="page-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			<?php endif; ?>

			<div class="page-content">
				<?php the_content(); ?>
			</div>

		<?php endwhile;
	else : ?>
		<p><?php echo esc_html__( 'No content found.', 'cpz-naked-theme' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>