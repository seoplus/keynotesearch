<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() { 
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/css/theme.min.css');
    wp_enqueue_style('custom-editor-style', get_template_directory_uri() . '/css/custom-editor-style.min.css');
    // wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));

	// Get the theme data
    $the_theme = wp_get_theme();
    
    // you might need to change the /build/css/child-theme.min.css to /build/css/child-theme.css when debugging css issues
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/build/css/child-theme.min.css', array(), false);
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/style.css', array(), false);
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'swiper-scripts', get_stylesheet_directory_uri() . '/build/js/swiper.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'isotope-scripts', get_stylesheet_directory_uri() . '/build/js/isotope.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/build/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}


function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


// Get the custom post tyles
require_once('cpt.php'); 


// Register widgets for the footer
function wpb_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer Menu',
        'id'            => 'footer-menu',
        'before_widget' => '<div class="footer-menu-widget">',
        'after_widget'  => '</div>',

    ) );

    register_sidebar( array(
        'name'          => 'Footer Logo',
        'id'            => 'footer-logo',
        'before_widget' => '<div class="footer-logo-widget">',
        'after_widget'  => '</div>',

    ) );

    register_sidebar( array(
        'name'          => 'Footer Submenu',
        'id'            => 'footer-submenu',
        'before_widget' => '<div class="footer-submenu-widget">',
        'after_widget'  => '</div>',

    ) );  
}

add_action( 'widgets_init', 'wpb_widgets_init' );

// Add theme options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// Custom Image Sizes
add_action( 'after_setup_theme', 'custom_image_sizes' );
function custom_image_sizes() {
    add_image_size( 'post-header-image', 1920 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'team-member', 700, 700 ); // 300 pixels wide (and unlimited height)
}


// Changing post to blog just so the naming is consistent
function change_post_menu_label() {
    global $menu, $submenu;

    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'New Blog';
    $submenu['edit.php'][16][0] = 'Blog Tags';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );


function change_post_object_label() {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'New Blog';
    $labels->add_new_item = 'New Blog';
    $labels->edit_item = 'Edit Blog';
    $labels->new_item = 'New Blog';
    $labels->view_item = 'View Blog';
    $labels->search_items = 'Search Blog';
    $labels->not_found = 'Not found';
    $labels->not_found_in_trash = 'Not found in trash';
}
add_action( 'init', 'change_post_object_label' );





// acf_add_options_page(array(
//     'page_title'    => 'Guides Archive',
//     'menu_title'    => 'Guides Archive',
//     'menu_slug'     => 'guides_archive',
//     'capability'    => 'edit_posts',
//     'parent_slug'   => 'edit.php?post_type=guides',
//     'position'      => false,
//     'icon_url'      => 'dashicons-admin-generic',
//     'redirect'      => false,
// ));



function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}



add_action('pre_get_posts', 'filter_videos_cpt');

function filter_videos_cpt( $query ){
if( $query->is_post_type_archive('videos')):
    $query->set('posts_per_page', 5);
    return;
endif;
}

add_action('pre_get_posts', 'industries_cpt');

function industries_cpt( $query ){
if( $query->is_post_type_archive('industries')):
    $query->set('posts_per_page', -1);
    return;
endif;
}


function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}