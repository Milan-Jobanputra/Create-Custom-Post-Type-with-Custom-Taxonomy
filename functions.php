<?php
/**
 * Your code here.
 *
 */
 
 
function cw_post_type_news() {
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
$labels = array(
'name' => _x('Programs', 'plural'),
'singular_name' => _x('Program', 'singular'),
'menu_name' => _x('Programs', 'admin menu'),
'name_admin_bar' => _x('Programs', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Program'),
'new_item' => __('New Program'),
'edit_item' => __('Edit Program'),
'view_item' => __('View Program'),
'all_items' => __('All Programs'),
'search_items' => __('Search Programs'),
'not_found' => __('No news found.'),
);
$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'program'),
'has_archive' => true,
'hierarchical' => false,
);
register_post_type('program', $args);
}
add_action('init', 'cw_post_type_news');


add_action( 'init', 'create_discog_taxonomies', 0 );

function create_discog_taxonomies()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Colleges', 'taxonomy general name' ),
    'singular_name' => _x( 'College', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Colleges' ),
    'popular_items' => __( 'Popular Colleges' ),
    'all_items' => __( 'All Colleges' ),
    'parent_item' => __( 'Parent College' ),
    'parent_item_colon' => __( 'Parent College:' ),
    'edit_item' => __( 'Edit College' ),
    'update_item' => __( 'Update College' ),
    'add_new_item' => __( 'Add New College' ),
    'new_item_name' => __( 'New College Name' ),
  );
  register_taxonomy('Colleges',array('program'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Colleges' ),
  ));
}