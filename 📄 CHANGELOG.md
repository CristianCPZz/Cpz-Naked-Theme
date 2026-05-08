# Changelog

## 1.1.0 - Accessibility & Elementor Fix

### Added
- Skip link injected into buffer before Elementor header (always correct position)
- `$content_width` set to 1920 for full-width classic editor support
- `:focus-visible` rules for WCAG 2.4.13 (Focus Appearance)

### Changed
- `header.php`: theme header is now conditional (skips rendering when Elementor handles it)
- `footer.php`: theme footer is now conditional (skips rendering when Elementor handles it)
- Versione tema 1.0.0 → 1.1.0

### Fixed
- removed debug `console.log`, added escaping and `aria-label`, hardcoded URL, duplicate closing tags
- Redundant ARIA roles removed from HTML5 elements (`banner`, `navigation`, `main`, `contentinfo`)
- `date()` → `gmdate()` with escaping in footer.php and partials/footer.php (timezone safety)
- Yoda conditions in functions.php (WordPress coding standards)
- Added phpcs:ignore for Elementor output (required for Elementor integration)

## 1.0.1 - Improved WooCommerce Compatibility
- Improved compatibility with WooCommerce

## 1.0.0 - Initial Release
- First public release
- Elementor and WooCommerce compatibility
- Basic styling and accessibility setup
- Translation-ready
