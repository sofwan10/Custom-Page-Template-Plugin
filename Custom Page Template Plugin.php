<?php
/**
 * Plugin Name: Custom Page Template
 * Description: Creates a new page with a custom template. This plugin also programmatically creates the custom template file custom-template.php in the active theme directory on plugin activation.
 * Version: 1.0
 * Requires PHP: 7.4 or updated version
 * Author: Sofwan Rafiee
 * Author URI: https://sfn-site.netlify.app/
 * License: GPL2
 */

// Register the custom template
add_filter( 'theme_page_templates', 'custom_page_template' );

/**
 * This function adds the custom template file to the available templates
 * for pages in the WordPress admin.
 */
function custom_page_template( $page_templates ) {
    $page_templates['custom-template.php'] = 'Custom Template';
    return $page_templates;
}

// Create the new page and the custom template file on plugin activation
register_activation_hook( __FILE__, 'custom_page_template_create_page' );

/**
 * This function creates a new page with the custom template and 
 * creates a custom-template.php file in the active theme directory.
 */
function custom_page_template_create_page() {
    // Create the new page
    $page = array(
        'post_title'    => 'Custom Page',
        'post_content'  => 'This is a custom page created by the plugin.',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'page_template' => 'custom-template.php',
    );
    wp_insert_post( $page );
    
    // Get the active theme directory
    $theme_dir = get_template_directory();
    
    // Create the custom template file
    $template_file = $theme_dir . '/custom-template.php';
    if ( ! file_exists( $template_file ) ) {
        $handle = fopen( $template_file, 'w' );
        $template_content = "<?php /* Template Name: Custom Template */ ?>\n";
        fwrite( $handle, $template_content );
        fclose( $handle );
    }
}