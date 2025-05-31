# Cpz Naked Theme

A lightweight, minimal WordPress theme built for developers and Elementor/WooCommerce compatibility.

## Features

- Clean, minimal structure
- Optional `light-reset.css` for consistent styling across browsers
- Fully compatible with Elementor and WooCommerce
- Accessibility and SEO friendly
- Translation ready (`languages/` included)


## Installation

1. Download the latest ZIP file from GitHub.
2. Go to your WordPress admin panel.
3. Navigate to Appearance > Themes > Add New > Upload Theme.
4. Upload and activate the theme.

## Optional CSS Reset

This theme includes a lightweight `cpz-light-reset.css` file to help normalize styles across different browsers. It is **loaded by default**.

To disable it, remove the following line from your `functions.php` file:

--- 
```
  /* optional reset */
    wp_enqueue_style('cpz-light-reset', get_template_directory_uri() . '/assets/css/light-reset.css', [], null);
  /* end optional reset */
```
---


## License

See `LICENSE.txt` for full licensing terms.

## Commercial Use

Free for personal use. Commercial use is allowed free of charge, but requires prior approval from the author.
See `LICENSE.txt`.

---

© Cristian Cpz
https://www.linkedin.com/in/cristian-cpz

