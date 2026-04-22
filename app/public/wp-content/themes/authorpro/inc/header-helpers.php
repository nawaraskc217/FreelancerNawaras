<?php
/**
 * Header Menu Helpers
 *
 * Functions to handle dynamic menu rendering with custom Tailwind classes.
 *
 * @package AuthorPro
 */

/**
 * Build a tree from flat menu items.
 *
 * @param string $location Theme location.
 * @return array Multi-dimensional array of menu items.
 */
function authorpro_get_menu_tree( $location ) {
    $locations = get_nav_menu_locations();
    if ( ! isset( $locations[ $location ] ) ) {
        return array();
    }

    $menu_id = $locations[ $location ];
    $items   = wp_get_nav_menu_items( $menu_id );

    if ( ! $items ) {
        return array();
    }

    $child_items = array();
    $menu_tree   = array();

    // First pass: organize by parent ID
    foreach ( $items as $item ) {
        $child_items[ $item->menu_item_parent ][] = $item;
    }

    // Recursive function to build tree
    $build_tree = function( $parent_id ) use ( &$child_items, &$build_tree ) {
        $tree = array();
        if ( isset( $child_items[ $parent_id ] ) ) {
            foreach ( $child_items[ $parent_id ] as $item ) {
                $item->children = $build_tree( $item->ID );
                $tree[] = $item;
            }
        }
        return $tree;
    };

    return $build_tree( 0 );
}

/**
 * Render Desktop Header Menu.
 *
 * @param string $location Theme location.
 */
function authorpro_render_header_menu( $location = 'primary' ) {
    $tree = authorpro_get_menu_tree( $location );
    
    if ( empty( $tree ) ) {
        return;
    }

    foreach ( $tree as $item ) {
        authorpro_render_desktop_item( $item, 1 );
    }
}

/**
 * Recursive function to render a single desktop menu item.
 *
 * @param object $item Menu item object.
 * @param int    $level Depth level (1-based).
 */
function authorpro_render_desktop_item( $item, $level ) {
    $has_children = ! empty( $item->children );
    $url          = $item->url;
    $title        = $item->title;
    
    // Focus classes for accessibility
    $focus_classes = 'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:ring-offset-2 rounded-md';

    // Classes based on level
    if ( $level === 1 ) {
        if ( $has_children ) {
            // Level 1 Parent
            ?>
            <div class="relative group">
                <button aria-haspopup="true" aria-expanded="false" class="flex items-center text-slate-600 hover:text-brand-600 font-medium transition py-4 <?php echo esc_attr( $focus_classes ); ?>">
                    <?php echo esc_html( $title ); ?>
                    <svg class="w-4 h-4 ml-1 transform group-hover:rotate-180 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <ul class="absolute left-0 top-full w-56 bg-white border border-slate-100 shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0 text-left">
                    <?php
                    foreach ( $item->children as $child ) {
                        authorpro_render_desktop_item( $child, $level + 1 );
                    }
                    ?>
                </ul>
            </div>
            <?php
        } else {
            // Level 1 Component (Simple Link)
            ?>
            <a href="<?php echo esc_url( $url ); ?>" class="text-slate-600 hover:text-brand-600 font-medium transition <?php echo esc_attr( $focus_classes ); ?>"><?php echo esc_html( $title ); ?></a>
            <?php
        }
    } else {
        // Sub-menus (Level 2+)
        if ( $has_children ) {
            // Nested Parent (Level 2 or 3 trying to show next level)
            // Use different group names for nested hovers: group/level3, group/level4
            $group_name = 'level' . ( $level + 1 ); 
            ?>
            <li class="relative group/<?php echo esc_attr($group_name); ?> px-4 py-3 text-sm text-slate-600 hover:bg-slate-50 hover:text-brand-600 cursor-pointer flex justify-between items-center text-left">
                <a href="<?php echo esc_url( $url ); ?>" aria-haspopup="true" aria-expanded="false" class="<?php echo esc_attr( $focus_classes ); ?>"><?php echo esc_html( $title ); ?></a>
                <svg class="w-4 h-4 transform -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>

                <ul class="absolute left-full top-0 w-56 bg-white border border-slate-100 shadow-xl rounded-lg opacity-0 invisible group-hover/<?php echo esc_attr($group_name); ?>:opacity-100 group-hover/<?php echo esc_attr($group_name); ?>:visible group-focus-within/<?php echo esc_attr($group_name); ?>:opacity-100 group-focus-within/<?php echo esc_attr($group_name); ?>:visible transition-all duration-200 ml-2">
                    <?php
                    foreach ( $item->children as $child ) {
                        authorpro_render_desktop_item( $child, $level + 1 );
                    }
                    ?>
                </ul>
            </li>
            <?php
        } else {
            // Standard Sub-menu Link
            ?>
            <li>
                <a href="<?php echo esc_url( $url ); ?>" class="block px-4 py-3 text-sm text-slate-600 hover:bg-slate-50 hover:text-brand-600 text-left <?php echo esc_attr( $focus_classes ); ?>">
                    <?php echo esc_html( $title ); ?>
                </a>
            </li>
            <?php
        }
    }
}


/**
 * Render Mobile Menu.
 *
 * @param string $location Theme location.
 */
function authorpro_render_mobile_menu( $location = 'primary' ) {
    $tree = authorpro_get_menu_tree( $location );
    
    if ( empty( $tree ) ) {
        return;
    }

    echo '<div class="flex flex-col space-y-1">';
    foreach ( $tree as $item ) {
        authorpro_render_mobile_item( $item, 1 );
    }
    echo '</div>';
}

/**
 * Recursive function to render a single mobile menu item with Accordion style.
 *
 * @param object $item Menu item object.
 * @param int    $level Depth level (1-based).
 */
function authorpro_render_mobile_item( $item, $level ) {
    $has_children = ! empty( $item->children );
    $url          = $item->url;
    $title        = $item->title;
    $item_id      = $item->ID;
    $submenu_id   = 'mobile-submenu-' . $item_id;

    // Focus classes for accessibility (reused)
    $focus_classes = 'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:ring-offset-2';

    // Uniform styling for all levels
    $link_classes = 'block py-3 px-3 text-base font-medium text-slate-700 hover:text-brand-600 hover:bg-slate-50 flex-grow transition rounded-md ' . $focus_classes;
    $btn_classes  = 'mobile-menu-toggle focus:bg-slate-100 p-3 text-slate-500 hover:text-brand-600 rounded-r-md transition ' . $focus_classes;

    echo '<div>'; // Wrapper for the row + children

    if ( $has_children ) {
        // Flex container for Link + Button
        echo '<div class="flex items-center justify-between rounded-md hover:bg-slate-50 transition pr-1">';
        
        // Link
        echo '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $link_classes ) . '">' . esc_html( $title ) . '</a>';
        
        // Toggle Button
        echo '<button 
                type="button"
                class="' . esc_attr( $btn_classes ) . '"
                aria-expanded="false" 
                aria-controls="' . esc_attr( $submenu_id ) . '"
                aria-label="Toggle submenu for ' . esc_attr( $title ) . '"
              >';
        echo '<svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
        echo '</button>';
        
        echo '</div>'; // End flex row

        // Children Container (Hidden by default)
        echo '<div id="' . esc_attr( $submenu_id ) . '" class="hidden pl-4 border-l border-slate-100 space-y-1 ml-3 mb-2">';
        foreach ( $item->children as $child ) {
            authorpro_render_mobile_item( $child, $level + 1 );
        }
        echo '</div>';

    } else {
        // Simple Link (Leaf Node)
        echo '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $link_classes ) . '">' . esc_html( $title ) . '</a>';
    }

    echo '</div>'; // End wrapper
}

/**
 * Render Docs Sidebar.
 *
 * @param string $location Theme location.
 */
function authorpro_render_docs_sidebar( $location = 'docs_sidebar' ) {
    $tree = authorpro_get_menu_tree( $location );
    
    if ( empty( $tree ) ) {
        // Fallback or empty state handled in template
        return;
    }
    
    // Focus classes
    $focus_classes = 'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:ring-offset-2';

    echo '<div>';
    foreach ( $tree as $item ) {
        $title = $item->title;
        
        // Top Level (Section Header)
        echo '<h3 class="text-xs font-semibold text-slate-900 uppercase tracking-wider mb-3 mt-8 first:mt-0">' . esc_html( $title ) . '</h3>';

        if ( ! empty( $item->children ) ) {
            echo '<ul class="space-y-1">';
            foreach ( $item->children as $child ) {
                $child_url = $child->url;
                $child_title = $child->title;
                // Basic link style from Doc template
                echo '<li>';
                echo '<a href="' . esc_url( $child_url ) . '" class="block px-3 py-2 rounded-md text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition border border-transparent hover:border-slate-200 ' . esc_attr( $focus_classes ) . '">';
                echo esc_html( $child_title );
                echo '</a>';
                echo '</li>';
            }
            echo '</ul>';
        }
    }
    echo '</div>';
}
