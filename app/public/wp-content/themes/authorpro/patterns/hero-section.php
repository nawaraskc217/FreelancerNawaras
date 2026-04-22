<?php
/**
 * Title: Hero Section (Book Release)
 * Slug: authorpro/hero-book
 * Categories: authorpro-patterns
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"metadata":{"categories":["authorpro-patterns"],"patternName":"authorpro/hero-book","name":"Hero Section (Book Release)"},"align":"full","className":"py-20 md:py-32 bg-slate-50 border-b border-slate-200"} -->
<div class="wp-block-group alignfull py-20 md:py-32 bg-slate-50 border-b border-slate-200">
    <!-- wp:group {"className":"authorpro-container px-4 sm:px-6 lg:px-8"} -->
    <div class="wp-block-group authorpro-container px-4 sm:px-6 lg:px-8">
        <!-- wp:columns {"verticalAlignment":"center","className":"gap-12 items-center"} -->
        <div class="wp-block-columns are-vertically-aligned-center gap-12 items-center">
            <!-- wp:column {"verticalAlignment":"center","className":"space-y-8"} -->
            <div class="wp-block-column is-vertically-aligned-center space-y-8">
                <!-- wp:paragraph {"className":"inline-block px-3 py-1 bg-brand-600/10 text-brand-600 rounded-full text-xs font-bold uppercase tracking-wider"} -->
                <p class="inline-block px-3 py-1 bg-brand-600/10 text-brand-600 rounded-full text-xs font-bold uppercase tracking-wider">
                    #1 New York Times Bestseller
                </p>
                <!-- /wp:paragraph -->
                <!-- wp:heading {"level":1,"className":"text-4xl md:text-6xl font-serif font-extrabold text-slate-900 leading-tight tracking-tight","fontSize":"5xl"} -->
                <h1 class="wp-block-heading text-4xl md:text-6xl font-serif font-extrabold text-slate-900 leading-tight tracking-tight has-5-xl-font-size">The Clarity <span class="text-brand-600 italic">Paradox</span></h1>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"text-lg text-slate-600 leading-relaxed"} -->
                <p class="text-lg text-slate-600 leading-relaxed">In a world drowned out by noise, true clarity is rare. This book explores how to reclaim your attention, cultivate deep focus, and unlock your best creative work by embracing stillness instead of constant connectivity.</p>
                <!-- /wp:paragraph -->
                <!-- wp:buttons {"className":"flex flex-wrap gap-4 pt-2"} -->
                <div class="wp-block-buttons flex flex-wrap gap-4 pt-2">
                    <!-- wp:button {"className":"is-style-authorpro-primary"} -->
                    <div class="wp-block-button is-style-authorpro-primary"><a class="wp-block-button__link wp-element-button" href="#">Buy on Amazon</a></div>
                    <!-- /wp:button -->
                    <!-- wp:button {"className":"is-style-authorpro-outline"} -->
                    <div class="wp-block-button is-style-authorpro-outline"><a class="wp-block-button__link wp-element-button" href="#">Read Chapter 1</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"verticalAlignment":"center","className":"relative flex justify-center md:justify-end","layout":{"type":"constrained","justifyContent":"right"}} -->
            <div class="wp-block-column is-vertically-aligned-center relative flex justify-center md:justify-end">
                <!-- wp:group {"className":"relative","layout":{"type":"constrained","justifyContent":"right"}} -->
                <div class="wp-block-group relative">
                    <!-- wp:image {"id":2023,"aspectRatio":"3/4","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(get_theme_file_uri('/assets/images/featured-book.png')); ?>" alt="" class="wp-image-2023" style="aspect-ratio:3/4;object-fit:contain" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->