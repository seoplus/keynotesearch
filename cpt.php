<?php 

function news() {

    $labels = array(
        'name'                  => _x( 'News', 'Post Type General Name', 'website' ),
        'singular_name'         => _x( 'News', 'Post Type Singular Name', 'website' ),
        'menu_name'             => __( 'News', 'website' ),
        'name_admin_bar'        => __( 'News', 'website' ),
        'archives'              => __( 'News', 'website' ),
        'attributes'            => __( 'News Attributes', 'website' ),
        'parent_item_colon'     => __( 'Parent News:', 'website' ),
        'all_items'             => __( 'All News', 'website' ),
        'add_new_item'          => __( 'Add New News', 'website' ),
        'add_new'               => __( 'Add New', 'website' ),
        'new_item'              => __( 'New News', 'website' ),
        'edit_item'             => __( 'Edit News', 'website' ),
        'update_item'           => __( 'Update News', 'website' ),
        'view_item'             => __( 'View News', 'website' ),
        'view_items'            => __( 'View News', 'website' ),
        'search_items'          => __( 'Search News', 'website' ),
        'not_found'             => __( 'Not found', 'website' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'website' ),
        'featured_image'        => __( 'Featured Image', 'website' ),
        'set_featured_image'    => __( 'Set featured image', 'website' ),
        'remove_featured_image' => __( 'Remove featured image', 'website' ),
        'use_featured_image'    => __( 'Use as featured image', 'website' ),
        'insert_into_item'      => __( 'Insert into News', 'website' ),
        'uploaded_to_this_item' => __( 'Uploaded to this News', 'website' ),
        'items_list'            => __( 'News list', 'website' ),
        'items_list_navigation' => __( 'News list navigation', 'website' ),
        'filter_items_list'     => __( 'Filter News list', 'website' ),
    );
    $args = array(
        'label'                 => __( 'News', 'website' ),
        'description'           => __( 'News part of The Website' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'about-us/news'
        ),
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-megaphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true, 
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ); 
    register_post_type( 'news', $args );

}
add_action( 'init', 'news', 0 );



function opportunity() {

    $labels = array(
        'name'                  => _x( 'Opportunities', 'Post Type General Name', 'website' ),
        'singular_name'         => _x( 'Opportunity', 'Post Type Singular Name', 'website' ),
        'menu_name'             => __( 'Opportunities', 'website' ),
        'name_admin_bar'        => __( 'Opportunities', 'website' ),
        'archives'              => __( 'Opportunities', 'website' ),
        'attributes'            => __( 'Opportunities Attributes', 'website' ),
        'parent_item_colon'     => __( 'Parent Opportunity:', 'website' ),
        'all_items'             => __( 'All Opportunities', 'website' ),
        'add_new_item'          => __( 'Add New Opportunity', 'website' ),
        'add_new'               => __( 'Add New', 'website' ),
        'new_item'              => __( 'New Opportunity', 'website' ),
        'edit_item'             => __( 'Edit Opportunity', 'website' ),
        'update_item'           => __( 'Update Opportunity', 'website' ),
        'view_item'             => __( 'View Opportunity', 'website' ),
        'view_items'            => __( 'View Opportunities', 'website' ),
        'search_items'          => __( 'Search Opportunities', 'website' ),
        'not_found'             => __( 'Not found', 'website' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'website' ),
        'featured_image'        => __( 'Featured Image', 'website' ),
        'set_featured_image'    => __( 'Set featured image', 'website' ),
        'remove_featured_image' => __( 'Remove featured image', 'website' ),
        'use_featured_image'    => __( 'Use as featured image', 'website' ),
        'insert_into_item'      => __( 'Insert into Opportunity', 'website' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Opportunity', 'website' ),
        'items_list'            => __( 'Opportunities list', 'website' ),
        'items_list_navigation' => __( 'Opportunities list navigation', 'website' ),
        'filter_items_list'     => __( 'Filter Opportunities list', 'website' ),
    );
    $args = array(
        'label'                 => __( 'Opportunities', 'website' ),
        'description'           => __( 'Opportunities part of The Website' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'method_cat' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'opportunities'
        ),
        'menu_icon'             => 'dashicons-book-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true, 
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ); 
    register_post_type( 'opportunities', $args );

}
add_action( 'init', 'opportunity', 0 );


function industries() {

    $labels = array(
        'name'                  => _x( 'Industries', 'Post Type General Name', 'website' ),
        'singular_name'         => _x( 'Industry', 'Post Type Singular Name', 'website' ),
        'menu_name'             => __( 'Industries', 'website' ),
        'name_admin_bar'        => __( 'Industries', 'website' ),
        'archives'              => __( 'Industries', 'website' ),
        'attributes'            => __( 'Industries Attributes', 'website' ),
        'parent_item_colon'     => __( 'Parent Industry:', 'website' ),
        'all_items'             => __( 'All Industries', 'website' ),
        'add_new_item'          => __( 'Add New Industry', 'website' ),
        'add_new'               => __( 'Add New', 'website' ),
        'new_item'              => __( 'New Industry', 'website' ),
        'edit_item'             => __( 'Edit Industry', 'website' ),
        'update_item'           => __( 'Update Industry', 'website' ),
        'view_item'             => __( 'View Industry', 'website' ),
        'view_items'            => __( 'View Industries', 'website' ),
        'search_items'          => __( 'Search Industries', 'website' ),
        'not_found'             => __( 'Not found', 'website' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'website' ),
        'featured_image'        => __( 'Featured Image', 'website' ),
        'set_featured_image'    => __( 'Set featured image', 'website' ),
        'remove_featured_image' => __( 'Remove featured image', 'website' ),
        'use_featured_image'    => __( 'Use as featured image', 'website' ),
        'insert_into_item'      => __( 'Insert into Industry', 'website' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Industry', 'website' ),
        'items_list'            => __( 'Industries list', 'website' ),
        'items_list_navigation' => __( 'Industries list navigation', 'website' ),
        'filter_items_list'     => __( 'Filter Industries list', 'website' ),
    );
    $args = array(
        'label'                 => __( 'Industries', 'website' ),
        'description'           => __( 'Industries part of The Website' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'method_cat' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'industries'
        ),
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-admin-multisite',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true, 
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ); 
    register_post_type( 'industries', $args );

}
add_action( 'init', 'industries', 0 );



function guides() {

    $labels = array(
        'name'                  => _x( 'Guides', 'Post Type General Name', 'website' ),
        'singular_name'         => _x( 'Guide', 'Post Type Singular Name', 'website' ),
        'menu_name'             => __( 'Guides', 'website' ),
        'name_admin_bar'        => __( 'Guides', 'website' ),
        'archives'              => __( 'Guides', 'website' ),
        'attributes'            => __( 'Guides Attributes', 'website' ),
        'parent_item_colon'     => __( 'Parent Guide:', 'website' ),
        'all_items'             => __( 'All Guides', 'website' ),
        'add_new_item'          => __( 'Add Guide Guides', 'website' ),
        'add_new'               => __( 'Add Guide', 'website' ),
        'new_item'              => __( 'New Guide', 'website' ),
        'edit_item'             => __( 'Edit Guide', 'website' ),
        'update_item'           => __( 'Update Guide', 'website' ),
        'view_item'             => __( 'View Guide', 'website' ),
        'view_items'            => __( 'View Guides', 'website' ),
        'search_items'          => __( 'Search Guides', 'website' ),
        'not_found'             => __( 'Not found', 'website' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'website' ),
        'featured_image'        => __( 'Featured Image', 'website' ),
        'set_featured_image'    => __( 'Set featured image', 'website' ),
        'remove_featured_image' => __( 'Remove featured image', 'website' ),
        'use_featured_image'    => __( 'Use as featured image', 'website' ),
        'insert_into_item'      => __( 'Insert into Guide', 'website' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Guide', 'website' ),
        'items_list'            => __( 'Guides list', 'website' ),
        'items_list_navigation' => __( 'Guides list navigation', 'website' ),
        'filter_items_list'     => __( 'Filter Guides list', 'website' ),
    );
    $args = array(
        'label'                 => __( 'Guides', 'website' ),
        'description'           => __( 'Guides part of The Website' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'resources/guides'
        ),
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-format-aside',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true, 
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ); 
    register_post_type( 'guides', $args );

}
add_action( 'init', 'guides', 0 );




function videos() {

    $labels = array(
        'name'                  => _x( 'Videos', 'Post Type General Name', 'website' ),
        'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'website' ),
        'menu_name'             => __( 'Videos', 'website' ),
        'name_admin_bar'        => __( 'Videos', 'website' ),
        'archives'              => __( 'Videos', 'website' ),
        'attributes'            => __( 'Videos Attributes', 'website' ),
        'parent_item_colon'     => __( 'Parent Video:', 'website' ),
        'all_items'             => __( 'All Videos', 'website' ),
        'add_new_item'          => __( 'Add Video Videos', 'website' ),
        'add_new'               => __( 'Add Video', 'website' ),
        'new_item'              => __( 'New Video', 'website' ),
        'edit_item'             => __( 'Edit Video', 'website' ),
        'update_item'           => __( 'Update Video', 'website' ),
        'view_item'             => __( 'View Video', 'website' ),
        'view_items'            => __( 'View Videos', 'website' ),
        'search_items'          => __( 'Search Videos', 'website' ),
        'not_found'             => __( 'Not found', 'website' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'website' ),
        'featured_image'        => __( 'Featured Image', 'website' ),
        'set_featured_image'    => __( 'Set featured image', 'website' ),
        'remove_featured_image' => __( 'Remove featured image', 'website' ),
        'use_featured_image'    => __( 'Use as featured image', 'website' ),
        'insert_into_item'      => __( 'Insert into Video', 'website' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Video', 'website' ),
        'items_list'            => __( 'Videos list', 'website' ),
        'items_list_navigation' => __( 'Videos list navigation', 'website' ),
        'filter_items_list'     => __( 'Filter Videos list', 'website' ),
    );
    $args = array(
        'label'                 => __( 'Videos', 'website' ),
        'description'           => __( 'Videos part of The Website' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'resources/videos'
        ),
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-video-alt2',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true, 
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ); 
    register_post_type( 'videos', $args );

}
add_action( 'init', 'videos', 0 );



function webinars() {

    $labels = array(
        'name'                  => _x( 'Webinars', 'Post Type General Name', 'website' ),
        'singular_name'         => _x( 'Webinar', 'Post Type Singular Name', 'website' ),
        'menu_name'             => __( 'Webinars', 'website' ),
        'name_admin_bar'        => __( 'Webinars', 'website' ),
        'archives'              => __( 'Webinars', 'website' ),
        'attributes'            => __( 'Webinars Attributes', 'website' ),
        'parent_item_colon'     => __( 'Parent Webinar:', 'website' ),
        'all_items'             => __( 'All Webinars', 'website' ),
        'add_new_item'          => __( 'Add Webinar Webinars', 'website' ),
        'add_new'               => __( 'Add Webinar', 'website' ),
        'new_item'              => __( 'New Webinar', 'website' ),
        'edit_item'             => __( 'Edit Webinar', 'website' ),
        'update_item'           => __( 'Update Webinar', 'website' ),
        'view_item'             => __( 'View Webinar', 'website' ),
        'view_items'            => __( 'View Webinars', 'website' ),
        'search_items'          => __( 'Search Webinars', 'website' ),
        'not_found'             => __( 'Not found', 'website' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'website' ),
        'featured_image'        => __( 'Featured Image', 'website' ),
        'set_featured_image'    => __( 'Set featured image', 'website' ),
        'remove_featured_image' => __( 'Remove featured image', 'website' ),
        'use_featured_image'    => __( 'Use as featured image', 'website' ),
        'insert_into_item'      => __( 'Insert into Webinar', 'website' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Webinar', 'website' ),
        'items_list'            => __( 'Webinars list', 'website' ),
        'items_list_navigation' => __( 'Webinars list navigation', 'website' ),
        'filter_items_list'     => __( 'Filter Webinars list', 'website' ),
    );
    $args = array(
        'label'                 => __( 'Webinars', 'website' ),
        'description'           => __( 'Webinars part of The Website' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'resources/webinars'
        ),
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-format-video',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true, 
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ); 
    register_post_type( 'webinars', $args );

}
add_action( 'init', 'webinars', 0 );




function team() {

    $labels = array(
        'name'                  => _x( 'Team Members', 'Post Type General Name', 'website' ),
        'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'website' ),
        'menu_name'             => __( 'Team Members', 'website' ),
        'name_admin_bar'        => __( 'Team Members', 'website' ),
        'archives'              => __( 'Team Members', 'website' ),
        'attributes'            => __( 'Team Members Attributes', 'website' ),
        'parent_item_colon'     => __( 'Parent Team Members:', 'website' ),
        'all_items'             => __( 'All Team Members', 'website' ),
        'add_new_item'          => __( 'Add New Team Member', 'website' ),
        'add_new'               => __( 'Add New', 'website' ),
        'new_item'              => __( 'New Team Member', 'website' ),
        'edit_item'             => __( 'Edit Team Member', 'website' ),
        'update_item'           => __( 'Update Team Member', 'website' ),
        'view_item'             => __( 'View Team Member', 'website' ),
        'view_items'            => __( 'View Team Members', 'website' ),
        'search_items'          => __( 'Search Team Members', 'website' ),
        'not_found'             => __( 'Not found', 'website' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'website' ),
        'featured_image'        => __( 'Featured Image', 'website' ),
        'set_featured_image'    => __( 'Set featured image', 'website' ),
        'remove_featured_image' => __( 'Remove featured image', 'website' ),
        'use_featured_image'    => __( 'Use as featured image', 'website' ),
        'insert_into_item'      => __( 'Insert into Team Member', 'website' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Team Members', 'website' ),
        'items_list'            => __( 'Team Members list', 'website' ),
        'items_list_navigation' => __( 'Team Members list navigation', 'website' ),
        'filter_items_list'     => __( 'Filter Team Members list', 'website' ),
    );
    $args = array(
        'label'                 => __( 'Team Members', 'website' ),
        'description'           => __( 'Team Members part of The Website' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'rewrite' => array(
            'with_front' => false,
            'slug' => 'about-us/team'
        ),
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-admin-users',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true, 
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ); 
    register_post_type( 'team', $args );

}
add_action( 'init', 'team', 0 );

?>