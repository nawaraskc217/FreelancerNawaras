<div class="theme-offer">
   <?php
        // Check if the demo import has been completed
        $freelancer_plus_demo_import_completed = get_option('freelancer_plus_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($freelancer_plus_demo_import_completed) {
            echo '<br>';
            echo '<div class="success">Demo Import Successful</div>';
            echo '<br>';
            echo '<hr>';
            echo '<br>';
            echo '<span>' . esc_html__( 'You can now visit your site or customize it further.', 'freelancer-plus' ) . '</span>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<div class="view-site-btn">';
            echo '<a href="' . esc_url(home_url()) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">View Site</a>';
            echo '<a href="' . esc_url( admin_url('customize.php') ) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">Customize Demo Content</a>';
            echo '</div>';
        }
     // POST and update the customizer and other related data of Freelancer Plus
    if ( isset( $_POST['submit'] ) ) {

        // Check if Classic Blog Grid plugin is installed
        if (!is_plugin_active('classic-blog-grid/classic-blog-grid.php')) {
            // Plugin slug and file path for Classic Blog Grid
            $freelancer_plus_plugin_slug = 'classic-blog-grid';
            $freelancer_plus_plugin_file = 'classic-blog-grid/classic-blog-grid.php';
        
            // Check if Classic Blog Grid is installed and activated
            if ( ! is_plugin_active( $freelancer_plus_plugin_file ) ) {
        
                // Check if Classic Blog Grid is installed
                $freelancer_plus_installed_plugins = get_plugins();
                if ( ! isset( $freelancer_plus_installed_plugins[ $freelancer_plus_plugin_file ] ) ) {
        
                    // Include necessary files to install plugins
                    include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
                    include_once( ABSPATH . 'wp-admin/includes/file.php' );
                    include_once( ABSPATH . 'wp-admin/includes/misc.php' );
                    include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
        
                    // Download and install Classic Blog Grid
                    $freelancer_plus_upgrader = new Plugin_Upgrader();
                    $freelancer_plus_upgrader->install( 'https://downloads.wordpress.org/plugin/classic-blog-grid.latest-stable.zip' );
                }
        
                // Activate the Classic Blog Grid plugin after installation (if needed)
                activate_plugin( $freelancer_plus_plugin_file );
            }
        }

        // ------- Create Main Menu --------
        $freelancer_plus_menuname = 'Primary Menu';
        $freelancer_plus_bpmenulocation = 'primary';
        $freelancer_plus_menu_exists = wp_get_nav_menu_object( $freelancer_plus_menuname );

        if ( !$freelancer_plus_menu_exists ) {
            $freelancer_plus_menu_id = wp_create_nav_menu( $freelancer_plus_menuname );

            // Create Home Page
            $freelancer_plus_home_title = 'Home';
            $freelancer_plus_home = array(
                'post_type'    => 'page',
                'post_title'   => $freelancer_plus_home_title,
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'home'
            );
            $freelancer_plus_home_id = wp_insert_post($freelancer_plus_home);
            // Assign Home Page Template
            add_post_meta($freelancer_plus_home_id, '_wp_page_template', '/template-home-page.php');
            // Update options to set Home Page as the front page
            update_option('page_on_front', $freelancer_plus_home_id);
            update_option('show_on_front', 'page');
            // Add Home Page to Menu
            wp_update_nav_menu_item($freelancer_plus_menu_id, 0, array(
                'menu-item-title' => __('Home', 'freelancer-plus'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $freelancer_plus_home_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create a new Page 
            $freelancer_plus_pages_title = 'Pages';
            $freelancer_plus_pages_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>';
            $freelancer_plus_pages = array(
                'post_type'    => 'page',
                'post_title'   => $freelancer_plus_pages_title,
                'post_content' => $freelancer_plus_pages_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'pages'
            );
            $freelancer_plus_pages_id = wp_insert_post($freelancer_plus_pages);
            // Add Pages Page to Menu
            wp_update_nav_menu_item($freelancer_plus_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'freelancer-plus'),
                'menu-item-classes' => 'pages',
                'menu-item-url' => home_url('/pages/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $freelancer_plus_pages_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page 
            $freelancer_plus_about_title = 'About Us';
            $freelancer_plus_about_content = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>';
            $freelancer_plus_about = array(
                'post_type'    => 'page',
                'post_title'   => $freelancer_plus_about_title,
                'post_content' => $freelancer_plus_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'about-us'
            );
            $freelancer_plus_about_id = wp_insert_post($freelancer_plus_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($freelancer_plus_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'freelancer-plus'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $freelancer_plus_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Assign the menu to the primary location if not already set
            if ( ! has_nav_menu( $freelancer_plus_bpmenulocation ) ) {
                $freelancer_plus_locations = get_theme_mod( 'nav_menu_locations' );
                if ( empty( $freelancer_plus_locations ) ) {
                    $freelancer_plus_locations = array();
                }
                $freelancer_plus_locations[ $freelancer_plus_bpmenulocation ] = $freelancer_plus_menu_id;
                set_theme_mod( 'nav_menu_locations', $freelancer_plus_locations );
            }
        }

        // Header Section
        set_theme_mod( 'freelancer_plus_email_address', 'contact@gmail.com' );
        set_theme_mod( 'freelancer_plus_timming', '9:00 AM - 5:00 PM' );
        set_theme_mod( 'freelancer_plus_phone_number', '1800 123 4567' );
        set_theme_mod( 'freelancer_plus_phone_text', 'Call Anytime For Booking' );
        set_theme_mod( 'freelancer_plus_the_custom_logo', esc_url( get_template_directory_uri().'/images/Logo.png'));
        
        //Social Media Section
        set_theme_mod( 'freelancer_plus_fb_link', 'https://www.facebook.com');
        set_theme_mod( 'freelancer_plus_twitt_link', 'https://www.twitter.com');
        set_theme_mod( 'freelancer_plus_linked_link', 'https://www.linkedin.com');
        set_theme_mod( 'freelancer_plus_insta_link', 'https://www.instagram.com');
        set_theme_mod( 'freelancer_plus_youtube_link', 'https://www.youtube.com');
    
        //Slider Section
        set_theme_mod( 'freelancer_plus_button_text', 'Contact');
        set_theme_mod( 'freelancer_plus_youtube_link', '#');
        
        // Create the 'Freelancer' category and retrieve its ID
        $freelancer_plus_slider_category_id = wp_create_category('Freelancer');

        // Set the slider category in theme mods
        set_theme_mod('freelancer_plus_slidersection', $freelancer_plus_slider_category_id);
        
        $freelancer_plus_titles = array(
            'John Doe',
            'Jane Smith',
            'Alex Johnson'
        );
        // Create three posts and assign them to the 'Freelancer' category
        for ($freelancer_plus_i = 0; $freelancer_plus_i <= 2; $freelancer_plus_i++) {
            set_theme_mod('freelancer_plus_title' . ($freelancer_plus_i + 1), $freelancer_plus_titles[$freelancer_plus_i]);
    
            // Prepare the post object
            $freelancer_plus_my_post = array(
                'post_title'    => wp_strip_all_tags($freelancer_plus_titles[$freelancer_plus_i]),
                'post_status'   => 'publish',
                'post_content'  => 'Morbi praesent nascetur maecenas ligula habitasse tellus duis quisque efficitur sollicitudin senectus.',
                'post_type'     => 'post',
                'post_category' => array($freelancer_plus_slider_category_id),
            );
    
            // Insert the post into the database
            $freelancer_plus_post_id = wp_insert_post($freelancer_plus_my_post);
    
            // If the post was successfully created, set the featured image
            if (!is_wp_error($freelancer_plus_post_id)) {
                $freelancer_plus_image_url = get_template_directory_uri() . '/images/slider' . ($freelancer_plus_i + 1) . '.png';
                $freelancer_plus_image_id = media_sideload_image($freelancer_plus_image_url, $freelancer_plus_post_id, null, 'id');
                if (!is_wp_error($freelancer_plus_image_id)) {
                    set_post_thumbnail($freelancer_plus_post_id, $freelancer_plus_image_id);
                } else {
                    error_log('Failed to set post thumbnail for post ID: ' . $freelancer_plus_post_id);
                }
            } else {
                error_log('Failed to create post: ' . print_r($freelancer_plus_post_id, true));
            }
        }

        //Services Section
        set_theme_mod( 'freelancer_plus_main_title', 'My Services');

        // Include WordPress Filesystem API
        require_once( ABSPATH . 'wp-admin/includes/file.php' );

        // Initialize the filesystem
        global $wp_filesystem;
        if (false === ($freelancer_plus_creds = request_filesystem_credentials('', '', false, false, null))) {
            return; // Exit if credentials are needed
        }

        if (!WP_Filesystem($freelancer_plus_creds)) {
            return; // Exit if filesystem could not be initialized
        }

        $freelancer_plus_services_category_id = wp_create_category('Services');
        set_theme_mod('freelancer_plus_services_cat', $freelancer_plus_services_category_id);
        $freelancer_plus_service_titles = array('Business Card', 'Website Design', 'Mobile App');

        // Define the image URLs for each service
        $freelancer_plus_image_urls = array(
            esc_url(get_template_directory_uri() . '/images/freelancer-services/freelancer-service1.png'),
            esc_url(get_template_directory_uri() . '/images/freelancer-services/freelancer-service2.png'),
            esc_url(get_template_directory_uri() . '/images/freelancer-services/freelancer-service3.png'),
        );

        // Loop to create posts for each service
        for ($freelancer_plus_i = 0; $freelancer_plus_i < count($freelancer_plus_service_titles); $freelancer_plus_i++) {
            $freelancer_plus_title = $freelancer_plus_service_titles[$freelancer_plus_i];
            $freelancer_plus_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

            // Create the post object
            $freelancer_plus_service_post = array(
                'post_title'    => wp_strip_all_tags($freelancer_plus_title),
                'post_content'  => $freelancer_plus_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($freelancer_plus_services_category_id),
            );

            // Insert the post into the database
            $freelancer_plus_service_id = wp_insert_post($freelancer_plus_service_post);

            // If the post was successfully created
            if ($freelancer_plus_service_id && !is_wp_error($freelancer_plus_service_id)) {
                // Set the theme mod for selecting this post
                set_theme_mod('freelancer_plus_select_post' . ($freelancer_plus_i + 1), $freelancer_plus_service_id);

                // Fetch image data from the corresponding URL
                $freelancer_plus_image_data = file_get_contents($freelancer_plus_image_urls[$freelancer_plus_i]);

                if ($freelancer_plus_image_data !== false) {
                    // Prepare file information
                    $freelancer_plus_upload_dir = wp_upload_dir();
                    if (!file_exists($freelancer_plus_upload_dir['path'])) {
                        error_log("Upload directory does not exist: " . $freelancer_plus_upload_dir['path']);
                        continue; // Skip to the next service
                    }

                    // Use a consistent file name for the image
                    $freelancer_plus_image_name = 'freelancer-service' . ($freelancer_plus_i + 1) . '.png'; // Example: service1.png
                    $freelancer_plus_file = $freelancer_plus_upload_dir['path'] . '/' . $freelancer_plus_image_name;

                    // Use WordPress Filesystem API to write the image data
                    if (!$wp_filesystem->exists($freelancer_plus_file)) {
                        if ($wp_filesystem->put_contents($freelancer_plus_file, $freelancer_plus_image_data, FS_CHMOD_FILE) === false) {
                            error_log("Failed to write image to file: $freelancer_plus_file");
                            continue; // Skip to the next service
                        }
                    }

                    // Check the file type
                    $freelancer_plus_wp_filetype = wp_check_filetype($freelancer_plus_image_name, null);
                    if (!$freelancer_plus_wp_filetype['type']) {
                        error_log("Failed to determine MIME type for file: $freelancer_plus_image_name");
                        continue; // Skip to the next service
                    }

                    // Prepare attachment data
                    $freelancer_plus_attachment = array(
                        'post_mime_type' => $freelancer_plus_wp_filetype['type'],
                        'post_title'     => sanitize_file_name($freelancer_plus_image_name),
                        'post_content'   => '',
                        'post_status'    => 'inherit',
                    );

                    // Insert the attachment into the media library
                    $freelancer_plus_attach_id = wp_insert_attachment($freelancer_plus_attachment, $freelancer_plus_file, $freelancer_plus_service_id);
                    if (is_wp_error($freelancer_plus_attach_id)) {
                        error_log("Failed to insert attachment: " . $freelancer_plus_attach_id->get_error_message());
                        continue; // Skip to the next service
                    }

                    // Generate attachment metadata
                    $freelancer_plus_attach_data = wp_generate_attachment_metadata($freelancer_plus_attach_id, $freelancer_plus_file);
                    if (!$freelancer_plus_attach_data) {
                        error_log("Failed to generate attachment metadata for ID: $freelancer_plus_attach_id");
                        continue; // Skip to the next service
                    }

                    // Update attachment metadata
                    wp_update_attachment_metadata($freelancer_plus_attach_id, $freelancer_plus_attach_data);

                    // Set the attachment as the post's featured image
                    if (!set_post_thumbnail($freelancer_plus_service_id, $freelancer_plus_attach_id)) {
                        error_log("Failed to set featured image for post ID: $freelancer_plus_service_id");
                    } else {
                        error_log("Successfully set featured image for post ID: $freelancer_plus_service_id");
                    }
                } else {
                    error_log("Failed to fetch image data from URL: " . $freelancer_plus_image_urls[$freelancer_plus_i]);
                }
            } else {
                error_log("Failed to create post: " . print_r($freelancer_plus_service_id, true));
            }
        }

        // Show success message and the "View Site" button
        update_option('freelancer_plus_demo_import_completed', true);
        echo '<br>';
        echo '<div class="success">Demo Import Successful</div>';
        echo '<br>';
        echo '<hr>';
        echo '<br>';
        echo '<span>' . esc_html__( 'You can now visit your site or customize it further.', 'freelancer-plus' ) . '</span>';
        echo '<br>';
    }
     ?>
    <ul>
        <li>
        <?php 
        // Check if the form is submitted
        if ( !isset( $_POST['submit'] ) ) : ?>
            <!-- Show demo importer form only if it's not submitted -->
            <?php if (!get_option('freelancer_plus_demo_import_completed')) : ?>
                <span><?php echo esc_html( 'Click on the below content to get demo content installed.', 'freelancer-plus' ); ?></span>
                <br><br>
                <hr><br>
                <b class="note"><?php echo esc_html('Note :', 'freelancer-plus' ); ?></b><br><br>
                <small><b><?php echo esc_html('Please take a backup if your website is already live with data. This importer will overwrite existing data.', 'freelancer-plus' ); ?></b></small><br><br>
                <form id="demo-importer-form" action="" method="POST" onsubmit="return runDemoImport();">
                    <input type="submit" name="submit" value="<?php echo esc_attr('Run Importer','freelancer-plus'); ?>" class="button button-primary button-large">
                </form>
                <script type="text/javascript">
                    function runDemoImport() {
                        if (confirm('Do you really want to do this?')) {
                            document.getElementById('demo-import-loader').style.display = 'block';
                            return true;
                        }
                        return false;
                    }
                </script>
             <?php endif; ?>
         <?php 
        endif; 

        // Show "View Site" button after form submission
        if ( isset( $_POST['submit'] ) ) {
        echo '<div class="view-site-btn">';
        echo '<a href="' . esc_url(home_url()) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">View Site</a>';
        echo '<a href="' . esc_url( admin_url('customize.php') ) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">Customize Demo Content</a>';
        echo '</div>';
        }
        ?>
        </li>
    </ul>
 </div>