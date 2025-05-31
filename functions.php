<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function cpz_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo');
    add_theme_support('menus');

    register_nav_menus([
        'main-menu' => __('Main Menu', 'cpz-naked-theme')
    ]);

    // Remove Gutenberg's automatic <style> output
    remove_action('wp_enqueue_scripts', 'wp_enqueue_block_styles');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
}
add_action('after_setup_theme', 'cpz_theme_setup');

function cpz_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'cpz_elementor_support');

function cpz_enqueue_all_styles() {
    /* optional reset */
    wp_enqueue_style('cpz-light-reset', get_template_directory_uri() . '/assets/css/light-reset.css', [], null);
    /* end optional reset */
    wp_enqueue_style('cpz-style', get_stylesheet_uri());
    if (cpz_conditional_css_fallback_should_enqueue()) {
        wp_enqueue_style('cpz-fallback-style', get_template_directory_uri() . '/starter.css');
    }
}
add_action('wp_enqueue_scripts', 'cpz_enqueue_all_styles');

function cpz_naked_theme_setup() {
    load_theme_textdomain('cpz-naked-theme', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'cpz_naked_theme_setup');

function cpz_naked_add_body_class($classes) {
    $classes[] = 'cpz-nk-' . md5('Cpz Naked Theme');
    return $classes;
}
add_filter('body_class', 'cpz_naked_add_body_class');


function cpz_e_active() {
    return defined('ELEMENTOR_VERSION');
}

if ( ! function_exists( 'cpz_elementor_check_hide_title' ) ) {
	/**
	 * Check whether to display the page title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function cpz_elementor_check_hide_title( $val ) {
		if ( cpz_e_active() ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'cpz_elementor_page_title', 'cpz_elementor_check_hide_title' );

if ( cpz_e_active() ) {

    // Elementor-related global variables and functions
    global $elementor_header_output, $elementor_footer_output, $elementor_header_enabled, $elementor_footer_enabled, $custom_header_output;

    // Safely include a PHP partial and return its output as a string
    function get_partial_output($path) {
        $theme_dir = realpath(get_template_directory());
        $real_path = realpath($path);
        if ($real_path && strpos($real_path, $theme_dir) === 0 && file_exists($real_path)) {
            ob_start();
            include $real_path;
            return ob_get_clean();
        }
        return '';
    }

    function check_elementor_location_once($location) {
        static $cache = [];

        if (isset($cache[$location])) {
            return $cache[$location];
        }

        if (!function_exists('elementor_theme_do_location')) {
            return false;
        }

        ob_start();
        $result = elementor_theme_do_location($location);
        $output = ob_get_clean();

        if ($location === 'header') {
            $GLOBALS['elementor_header_output'] = $output;
        } elseif ($location === 'footer') {
            $GLOBALS['elementor_footer_output'] = $output;
        }

        $cache[$location] = $result;
        return $result;
    }

    function get_elementor_header_enabled() {
        global $elementor_header_enabled;
        if (!isset($elementor_header_enabled)) {
            $elementor_header_enabled = check_elementor_location_once('header');
        }
        return $elementor_header_enabled;
    }

    function get_elementor_footer_enabled() {
        global $elementor_footer_enabled;
        if (!isset($elementor_footer_enabled)) {
            $elementor_footer_enabled = check_elementor_location_once('footer');
        }
        return $elementor_footer_enabled;
    }

    add_action('template_redirect', function () {
        global $elementor_header_enabled, $elementor_footer_enabled, $custom_header_output;

        // Popola flags e output Elementor
        $elementor_header_enabled = get_elementor_header_enabled();
        $elementor_footer_enabled = get_elementor_footer_enabled();

        // Cattura l'output del partial custom se serve
        if (!$elementor_header_enabled && $elementor_footer_enabled) {
            $partial_path = locate_template('partials/header.php');
            $custom_header_output = get_partial_output($partial_path);
        }

        // Apply buffer
        ob_start(function ($buffer) use ($elementor_header_enabled, $elementor_footer_enabled, $custom_header_output) {
            if ($elementor_header_enabled) {
                $buffer = preg_replace('/<body([^>]*)>/', '<body$1>' . $GLOBALS['elementor_header_output'], $buffer, 1);
            } elseif (!$elementor_header_enabled && $elementor_footer_enabled && $custom_header_output) {
                $buffer = preg_replace('/<body([^>]*)>/', '<body$1>' . $custom_header_output, $buffer, 1);
            }
            return $buffer;
        });
    });


    add_action('wp_footer', function() {

        global $elementor_footer_output, $elementor_footer_enabled, $elementor_header_enabled;

        if ($elementor_footer_enabled) {
            echo $elementor_footer_output;
            get_template_part('partials/footer');
        } elseif ($elementor_header_enabled && ! $elementor_footer_enabled) {
            get_template_part('partials/footer');
        }
    });


}

function cpz_conditional_css_fallback_should_enqueue() {
    if ( cpz_e_active() && class_exists('\Elementor\Plugin') && (is_single() || is_archive() || is_tax() ) &&
        ! \Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor()
    ) {
        return true;
    } elseif ( ! cpz_e_active() ) {
        return true;
    }
    return false;
}

function cpz_enqueue_theme_scripts() {
    wp_enqueue_script(
        'cpz-script', get_template_directory_uri() . '/assets/js/script.js',
        [], null, true
    );
}
add_action('wp_enqueue_scripts', 'cpz_enqueue_theme_scripts');
