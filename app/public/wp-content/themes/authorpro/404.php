<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AuthorPro
 */

get_header();
?>
<main id="main" class="flex-grow flex items-center justify-center pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center">

        <div class="relative inline-block mb-8">
            <h1 class="text-9xl font-extrabold text-slate-200 tracking-tighter">404</h1>
        </div>

        <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-4">
            <?php esc_html_e( 'Oops! This page is missing from our shelf.', 'authorpro' ); ?>
        </h2>
        <p class="text-lg text-slate-500 mb-10 max-w-xl mx-auto">
            <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Let\'s get you back on track.', 'authorpro' ); ?>
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                class="inline-flex items-center justify-center px-8 py-3 bg-brand-600 text-white font-bold rounded-lg shadow-lg hover:bg-brand-700 transition transform hover:-translate-y-0.5 w-full sm:w-auto">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <?php esc_html_e( 'Return Home', 'authorpro' ); ?>
            </a>
            <a href="<?php echo esc_url( get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' ) ); ?>"
                class="inline-flex items-center justify-center px-8 py-3 bg-white text-slate-700 font-bold rounded-lg border border-slate-200 hover:border-brand-600 hover:text-brand-600 shadow-sm transition w-full sm:w-auto">
                <?php esc_html_e( 'Read our Blog', 'authorpro' ); ?>
            </a>
        </div>

        <div class="mt-12 max-w-md mx-auto">
            <?php get_search_form(); ?>
        </div>
    </div>
</main>
<?php
get_footer();
