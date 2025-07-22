<?php
/*
Plugin Name: Department Members
Description: A custom plugin for managing department members.
Version: 1.0
Author: Amiran Kimadze
*/

// Register Custom Post Type for Department Members
function department_members_post_type() {
    $labels = array(
        'name'               => 'Department Members',
        'singular_name'      => 'Department Member',
        'menu_name'          => 'Department Members',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Department Member',
        'edit_item'          => 'Edit Department Member',
        'new_item'           => 'New Department Member',
        'view_item'          => 'View Department Member',
        'search_items'       => 'Search Department Members',
        'not_found'          => 'No department members found',
        'not_found_in_trash' => 'No department members found in Trash',
        'parent_item_colon'  => '',
        'all_items'          => 'All Department Members',
        'featured_image'     => 'Member Image',
        'set_featured_image' => 'Set image',
        'remove_featured_image' => 'Remove image',
        'use_featured_image'    => 'Use as image',
        'menu_icon'          => 'dashicons-businessman', // Icon for the menu item (change as needed)
        'public'             => true,
        'has_archive'        => false,
        'supports'           => array('title', 'thumbnail', 'custom-fields'),
    );

    $args = array(
        'labels'          => $labels,
        'public'          => true,
        'menu_position'   => 5,
        'menu_icon'       => 'dashicons-businessman', // Icon for the post type (change as needed)
        'capability_type' => 'post',
        'rewrite'         => array('slug' => 'department-member'),
        'supports'        => array('title', 'thumbnail', 'custom-fields'),
    );

    register_post_type('department_member', $args);
}
add_action('init', 'department_members_post_type');

// ACF: Define Custom Fields for Department Members
// ACF: Define Custom Fields for Department Members
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_department_member',
        'title' => 'Department Member Fields',
        'fields' => array(
            array(
                'key' => 'field_word_position_ge',
                'label' => 'Word Position (GE)',
                'name' => 'word_position_ge',
                'type' => 'text',
                'required' => false,
            ),
            array(
                'key' => 'field_word_position_en',
                'label' => 'Word Position (EN)',
                'name' => 'word_position_en',
                'type' => 'text',
                'required' => false,
            ),
            array(
                'key' => 'field_biography_ge',
                'label' => 'Biography (GE)',
                'name' => 'biography_ge',
                'type' => 'wysiwyg',
                'required' => false,
            ),
            array(
                'key' => 'field_biography_en',
                'label' => 'Biography (EN)',
                'name' => 'biography_en',
                'type' => 'wysiwyg',
                'required' => false,
            ),
            array(
                'key' => 'field_sort_position',
                'label' => 'Enter sort position',
                'name' => 'sort_position',
                'type' => 'number', // Use number type for ordering
                'required' => false,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'department_member',
                ),
            ),
        ),
    ));
}


// Add custom columns to the admin table for Department Members
function department_members_columns($columns) {
    $new_columns = array(
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'avatar' => 'Avatar',
        'work_position_ge' => 'Word Position (GE)',
        'sort_position' => 'Order/Position',
    );
    return $new_columns;
}
add_filter('manage_department_member_posts_columns', 'department_members_columns');

// Populate custom columns with data for Department Members
function department_members_column_data($column, $post_id) {
    switch ($column) {
        case 'avatar':
            echo get_the_post_thumbnail($post_id, array(70, 70));
        break;
        case 'work_position_ge':
            echo get_field('word_position_ge', $post_id);
            break;
        case 'sort_position':
            echo get_field('sort_position', $post_id);
            break;
        default:
            break;
    }
}
add_action('manage_department_member_posts_custom_column', 'department_members_column_data', 10, 2);

// Modify the main query before it is executed
function custom_department_members_query($query) {
    // Check if we're on the admin panel and on the department_member post type
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'department_member') {
        // Set the orderby parameter to sort by the 'sort_position' field in ascending order
        $query->set('orderby', 'meta_value_num');
        $query->set('meta_key', 'sort_position');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'custom_department_members_query');

?>
