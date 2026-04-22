<?php
/**
 * Title: About Section
 * Slug: authorpro/about-section-v2
 * Categories: authorpro-patterns
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"metadata":{"categories":["authorpro-patterns"],"patternName":"authorpro/about-section-v2","name":"About Section"},"align":"full","className":"py-24 bg-white border-b border-slate-100"} -->
<div class="wp-block-group alignfull py-24 bg-white border-b border-slate-100">
    <!-- wp:group {"className":"authorpro-container px-4 sm:px-6 lg:px-8"} -->
    <div class="wp-block-group authorpro-container px-4 sm:px-6 lg:px-8">
        <!-- wp:columns {"verticalAlignment":"center","className":"gap-16"} -->
        <div class="wp-block-columns are-vertically-aligned-center gap-16">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:image {"id":2037,"sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_theme_file_uri('/assets/images/about.jpg')); ?>" alt="" class="wp-image-2037" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"className":"space-y-6"} -->
            <div class="wp-block-column space-y-6">
                <!-- wp:paragraph {"className":"text-brand-600 font-bold tracking-wider uppercase text-xs mb-2"} -->
                <p class="text-brand-600 font-bold tracking-wider uppercase text-xs mb-2">About Me</p>
                <!-- /wp:paragraph -->
                <!-- wp:heading {"className":"text-3xl md:text-4xl font-serif font-bold text-slate-900 leading-tight"} -->
                <h2 class="wp-block-heading text-3xl md:text-4xl font-serif font-bold text-slate-900 leading-tight">Writing about habits, decision making, and <span class="text-slate-500 italic">continuous improvement.</span></h2>
                <!-- /wp:heading -->
                <!-- wp:group {"className":"prose prose-lg text-slate-600 leading-relaxed"} -->
                <div class="wp-block-group prose prose-lg text-slate-600 leading-relaxed">
                    <!-- wp:paragraph -->
                    <p>Hi, I'm James. I've been writing about habits and human potential since 2012. My work has been featured in the New York Times, Entrepreneur, and Time magazine.</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"className":"mt-4"} -->
                    <p class="mt-4">I believe that you don't rise to the level of your goals, you fall to the level of your systems. My goal is to help you build better systems.</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:buttons -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"className":"is-style-authorpro-outline"} -->
                        <div class="wp-block-button is-style-authorpro-outline"><a class="wp-block-button__link wp-element-button">Read my full story</a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
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