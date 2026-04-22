=== AuthorPro ===
Contributors: rswpthemes
Tags: blog, e-commerce, grid-layout, one-column, two-columns, three-columns, four-columns, left-sidebar, right-sidebar, custom-background, custom-colors, custom-header, custom-logo, custom-menu, editor-style, footer-widgets, flexible-header, theme-options, translation-ready, featured-images, block-styles, wide-blocks, sticky-post, full-width-template, threaded-comments, accessibility-ready
Requires at least: 6.0
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
AuthorPro is a modern, high-performance WordPress Theme designed specifically for authors, writers, and publishers who want to showcase their books and write blogs. Built with the powerful Tailwind CSS framework, it offers a blazing-fast loading speed and a clean, responsive design. The theme seamlessly integrates with WooCommerce, allowing you to sell books directly from your site with a custom-designed cart and shop experience. It comes with "Starter Content" which automatically sets up your Home and Blog pages upon installation, making it incredibly easy to get started.

AuthorPro is fully optimized for the Block Editor (Gutenberg) and includes custom block patterns for Hero sections, About Me, and Book Showcases. It features advanced Customizer options to control typography (Inter, Libre Baskerville, etc.), brand colors, and layouts without writing any code. With SEO-optimized markup and schema.org readiness, AuthorPro helps your content rank higher in search engines.

== Development & Build Process ==
This theme uses Tailwind CSS and Webpack. The source configuration files (`package.json`, `tailwind.config.js`, `webpack.config.js`, `postcss.config.js`) and the `/src` directory are deliberately included in this theme package to comply with WordPress.org review guidelines.

To replicate the build environment and compile the assets:
1. Open your terminal and navigate to the theme directory.
2. Run `npm install` to install necessary Node.js dependencies.
3. Run `npm run build` to compile and minify the CSS and JS files into the `/build` directory.

== Frequently Asked Questions ==

= How to Install Theme =
1. In your admin panel, go to Appearance > Themes and click the Add New button and Search for AuthorPro, OR
2. If you have the theme zip file, click Upload and choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

= Does this theme support WooCommerce? =
Yes, AuthorPro is fully compatible with WooCommerce and includes a custom-designed cart page and header mini-cart icon.

== Changelog ==

= 1.0.4 - April 16, 2026 =
* Solved About section image not found issue
* Added Pro link in customizer panel.
* Updated Description

= 1.0.3 - April 11, 2026 =
* Fixed skip id issue.

= 1.0.2 - April 02, 2026 =
* Added Word Breaks to title

= 1.0.1 - April 01, 2026 =
* Added
* Local Webfonts: Added support for locally hosted webfonts (Inter, Libre Baskerville) to comply with WordPress.org Privacy/GDPR guidelines.
* System Fonts: Added safe system fonts as fallback options in the Customizer Typography settings.
* Build Tools Inclusion: Included essential build configuration files (package.json, tailwind.config.js, webpack.config.js) in the final distribution package for reviewer reproducibility.
* Custom Header Output: Implemented frontend rendering for the Custom Header image feature in header-template.php.

* Fixed
* Menu Accessibility: Resolved desktop submenu accessibility issues by ensuring full keyboard (Tab key) navigation support using focus-within and proper ARIA attributes.
* Global Float Layouts: Fixed container height collapse issues globally for floated elements (e.g., .alignleft, .alignright) using modern CSS display: flow-root and the :has() selector.
* WooCommerce Compatibility: Prevented a fatal error (Call to undefined function WC()) when WooCommerce is deactivated by adding a strict sanity check inside the authorpro_woo_cart_fragments filter.
* Late Escaping Standards: Enforced strict late escaping rules (esc_html, esc_url, esc_attr) for all dynamic variables output directly at the echo boundaries in header and footer templates.
* Custom Background Visibility: Resolved an issue where hardcoded background classes (like bg-white on .innerbody) were hiding the WordPress core Custom Background feature.
* Dynamic CSS Safelisting: Fixed an issue where dynamically generated Tailwind classes for deeply nested submenus were being stripped during the build process.

* Removed
* Remote Font Requests: Completely removed all remote requests to Google Fonts API (fonts.googleapis.com and fonts.gstatic.com) to ensure strict GDPR compliance.


= 1.0.0 - March 07, 2026 =
* Initial release
* Integrated Tailwind CSS
* Added Custom Block Patterns

== Copyright ==
AuthorPro WordPress Theme, Copyright 2026 rswpthemes.com
AuthorPro is distributed under the terms of the GNU GPL
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

AuthorPro bundles the following third-party resources:
* Unless otherwise specified, all the theme files, scripts and images are licensed under GNU General Public License Version 2 or later.
* Based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Tailwind CSS https://tailwindcss.com/, (C) Tailwind Labs, Inc., [MIT License](https://github.com/tailwindlabs/tailwindcss/blob/master/LICENSE)
* Google Fonts (Inter, Libre Baskerville, JetBrains Mono), [SIL Open Font License, 1.1](http://scripts.sil.org/OFL)

== License/copyright for images ==
* screenshot.png & Book Cover Image self created.
* Demo images are licensed under CC0 Universal

Image for theme about section, Copyright Pexels
License: CC0 1.0 Universal (CC0 1.0)
Source: https://www.pexels.com/photo/man-wearing-eyeglasses-262391/
