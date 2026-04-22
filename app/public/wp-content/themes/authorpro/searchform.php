<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @package authorpro
 */
?>
<form role="search" method="get" class="relative search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo esc_attr( uniqid( 'search-form-' ) ); ?>" class="sr-only"><?php echo esc_html_x( 'Search for:', 'label', 'authorpro' ); ?></label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input type="search" id="<?php echo esc_attr( uniqid( 'search-form-' ) ); ?>" class="block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-md leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-600 focus:border-transparent sm:text-sm transition duration-150 ease-in-out" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'authorpro' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="absolute inset-y-0 right-0 px-4 text-sm font-medium text-brand-600 hover:text-brand-500 focus:outline-none">
            <?php echo esc_html_x( 'Search', 'submit button', 'authorpro' ); ?>
        </button>
    </div>
</form>
