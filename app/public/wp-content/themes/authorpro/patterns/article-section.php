<?php
/**
 * Title: Article Section
 * Slug: authorpro/latest-articles-grid-v1
 * Categories: authorpro-patterns
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"py-24 bg-slate-50"} -->
<section class="wp-block-group alignfull py-24 bg-slate-50">
    <!-- wp:group {"className":"authorpro-container px-4 sm:px-6 lg:px-8"} -->
    <div class="wp-block-group authorpro-container px-4 sm:px-6 lg:px-8">
        <!-- wp:group {"className":"flex flex-col sm:flex-row justify-between items-end mb-12 border-b border-slate-200 pb-6"} -->
        <div class="wp-block-group flex flex-col sm:flex-row justify-between items-end mb-12 border-b border-slate-200 pb-6">
            <!-- wp:group -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"text-brand-600 font-bold tracking-wider uppercase text-xs mb-2"} -->
                <p class="text-brand-600 font-bold tracking-wider uppercase text-xs mb-2">Writing</p>
                <!-- /wp:paragraph -->
                <!-- wp:heading {"className":"text-3xl font-serif font-bold text-slate-900"} -->
                <h2 class="wp-block-heading text-3xl font-serif font-bold text-slate-900">Latest from the Blog</h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->
            <!-- wp:paragraph {"className":"hidden sm:inline-flex items-center font-bold text-slate-900 hover:text-brand-600 transition mt-4 sm:mt-0"} -->
            <p class="hidden sm:inline-flex items-center font-bold text-slate-900 hover:text-brand-600 transition mt-4 sm:mt-0">
                <a href="#">View All</a>
            </p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        <!-- wp:query {"queryId":1,"query":{"perPage":3,"postType":"post","order":"desc","orderBy":"date"}} -->
        <div class="wp-block-query">
            <!-- wp:post-template {"className":"grid grid-cols-1 md:grid-cols-3 gap-8 items-start"} -->
            <!-- wp:group {"tagName":"article","className":"bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition border border-slate-200 group h-full flex flex-col"} -->
            <article class="wp-block-group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition border border-slate-200 group h-full flex flex-col self-start">
                <!-- wp:post-featured-image {"isLink":true,"className":"h-56 overflow-hidden bg-slate-100"} /-->
                <!-- wp:group {"className":"p-6 flex-1 flex flex-col"} -->
                <div class="wp-block-group p-6 flex-1 flex flex-col">
                    <!-- wp:post-terms {"term":"category","className":"text-xs font-bold text-brand-600 uppercase mb-2"} /-->
                    <!-- wp:post-title {"level":3,"isLink":true,"className":"text-xl font-bold text-slate-900 mb-3 leading-snug group-hover:text-brand-600 transition"} /-->
                    <!-- wp:post-excerpt {"className":"text-sm text-slate-600 mb-6 leading-relaxed flex-grow"} /-->
                    <!-- wp:read-more {"content":"Read More","className":"inline-flex items-center text-sm font-bold text-slate-900 hover:text-brand-600 transition mt-auto"} /-->
                </div>
                <!-- /wp:group -->
            </article>
            <!-- /wp:group -->
            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->