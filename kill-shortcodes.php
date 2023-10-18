<?php
// Last Update: -[ 2023-10-18 CLC ]-
// This Code works fully

// Prevents shortcode and does not display disabled shortcode block
    /**     -[ Use Notes ]-
    //
    //  Must include full names of page, post, or category
    //
    //    Post Types Are:
    //    Post (Post Type: ‘post’)
    //    Page (Post Type: ‘page’)
    //    Attachment (Post Type: ‘attachment’)
    //    Revision (Post Type: ‘revision’)
    //    Navigation menu (Post Type: ‘nav_menu_item’)
    //    Block templates (Post Type: ‘wp_template’)
    //    Template parts (Post Type: ‘wp_template_part’)
    */
function kill_shortcodes_here($content) {
    // Define the IDs, names, and types of posts or pages where you want to disable shortcodes
    $ids_to_disable = array(1588,10000001,10000002); // Replace with your post or page IDs  //1588 is Blog Page
    $names_to_disable = array('blog', 'post-name-2'); // Replace with your post or page FULL names
    $types_to_disable = array('', ''); // Replace with 'post', 'page', or other post types  //Kills all. The word 'post' or 'page' remove shortcodes from all posts and/or pages. I have left them empty for now.

    // Get the current post or page
    global $post;

    // Check if the current post or page ID, name, or type is in the arrays defined above
    if (in_array($post->ID, $ids_to_disable) || in_array($post->post_name, $names_to_disable) || in_array($post->post_type, $types_to_disable)) {
        // If it is, remove all shortcodes from the content
        $content = strip_shortcodes($content);
    }

    // Return the content
    return $content;
}
add_filter('the_content', 'kill_shortcodes_here');
