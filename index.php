<?php
/*
Plugin Name: Life Gate Farms Investment
Plugin URI: http://itmister.com/
Description: This is a privately developed software application, for xyz business. You are not expected to disable or uninstall this application, as doing so will make all products under invisible to users.
Version: 1.0
Author: Stephen Tete
Author URI: http://itmister.com/
License: GPLv2
*/

add_action( 'init', 'create_stephen_wp_custom_pt' );

function create_stephen_wp_custom_pt() {
    register_post_type( 'stephen_wp_custom_pt',
        array(
            'labels' => array(
                'name' => 'Stephen CPT Plugin',
                'singular_name' => 'Stephen Custom Product',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Stephen Custom Product',
                'edit' => 'Edit',
                'edit_item' => 'Edit Stephen Custom Product',
                'new_item' => 'New Stephen Custom Product',
                'view' => 'View',
                'view_item' => 'View Stephen Custom Product',
                'search_items' => 'Search Stephen Custom Product',
                'not_found' => 'No Stephen Custom Product found',
                'not_found_in_trash' => 'No Stephen Custom Product found in Trash',
                'parent' => 'Parent Stephen Custom Product'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( 'stephen' ),
            'menu_icon' => plugins_url( 'images/check-icon.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

function wporg_add_custom_post_types($query)
{
    if (is_home() && $query->is_main_query()) {
        $query->set('post_type', ['post', 'page', 'stephen_wp_custom_pt']);
    }
    return $query;
}
add_action('pre_get_posts', 'wporg_add_custom_post_types');

?>
