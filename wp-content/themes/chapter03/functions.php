<?php

wp_enqueue_style('style', get_stylesheet_uri());
add_filter('use_block_editor_for_post', '__return_false', 10);


// Add menu
function wpb_custom_new_menu()
{
    register_nav_menus(
        array(
            'menu-main' => __('Menu main'),
            'menu-footer-1' => __('Footer 1'),
            'menu-footer-2' => __('Footer 2'),
            'menu-footer-3' => __('Footer 3')
        )
    );
}
add_action('init', 'wpb_custom_new_menu');

add_theme_support('custom-logo');
function themename_custom_logo_setup()
{
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'alt'                  => 'Allgrow labo',
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'themename_custom_logo_setup');

add_theme_support('post-thumbnails');
/*
* Creating a function to create our CPT
*/

function custom_public_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Publish', 'Post Type General Name'),
        'singular_name'       => _x('Publish', 'Post Type Singular Name'),
        'menu_name'           => __('Publish'),
        'parent_item_colon'   => __('Parent Publish'),
        'all_items'           => __('All Publishs'),
        'view_item'           => __('View Publish'),
        'add_new_item'        => __('Add New Publish'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Publish'),
        'update_item'         => __('Update Publish'),
        'search_items'        => __('Search Publish'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Publishs'),
        'description'         => __('Publish news and reviews'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array('genres'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('publish', $args);
}
add_action('init', 'custom_public_type', 0);

function custom_service_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Service', 'Post Type General Name'),
        'singular_name'       => _x('Service', 'Post Type Singular Name'),
        'menu_name'           => __('Services'),
        'parent_item_colon'   => __('Parent Service'),
        'all_items'           => __('All Services'),
        'view_item'           => __('View Service'),
        'add_new_item'        => __('Add New Service'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Service'),
        'update_item'         => __('Update Service'),
        'search_items'        => __('Search Service'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Services'),
        'description'         => __('Service news and reviews'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array('genres'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('services', $args);
}
add_action('init', 'custom_service_type', 0);

/**
 * Add custom taxonomies
 *
 */
function custom_taxonomy()
{
    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
	 */
    $labels = array(
        'name' => 'All Category',
        'singular' => 'Category',
        'menu_name' => 'Category',
        'search_items' =>  __('Search Category'),
        'all_items' => __('All Category'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
    );


    /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
	 */
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'rewrite'           => array('slug' => 'services_categories', 'with_front' => true),
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'show_in_rest'      => true, //be available via the REST API
    );


    /* Hàm register_taxonomy để khởi tạo taxonomy
	 */
    register_taxonomy('cat-services', 'services', $args);
}

// Hook into the 'init' action
add_action('init', 'custom_taxonomy', 0);
add_action('rest_api_init', 'register_rest_images' );
function register_rest_images(){
    register_rest_field( array('services'),
        'serimg_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}

include 'ajax-pagination/ajax_pagination_wp.php';

function wp_breadcrumbs()
{
    $delimiter = '&nbsp;&rsaquo;&nbsp;';
    $name = 'Home';
    $currentBefore = '<span class="current">';
    $currentAfter = '</span>';

    if (!is_home() && !is_front_page() || is_paged()) {

        global $post;
        $home = get_bloginfo('url');
        echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

        if (is_tax()) {
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            echo $currentBefore . $term->name . $currentAfter;
        } elseif (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $currentBefore . '';
            single_cat_title();
            echo '' . $currentAfter;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('d') . $currentAfter;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('F') . $currentAfter;
        } elseif (is_year()) {
            echo $currentBefore . get_the_time('Y') . $currentAfter;
        } elseif (is_single()) {
            $postType = get_post_type();
            if ($postType == 'post') {
                $cat = get_the_category();
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            } elseif ($postType == 'portfolio') {
                $terms = get_the_term_list($post->ID, 'portfolio-category', '', '###', '');
                $terms = explode('###', $terms);
                echo $terms[0] . ' ' . $delimiter . ' ';
            }
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_search()) {
            echo $currentBefore . __('Search Results for:', 'wpinsite') . ' &quot;' . get_search_query() . '&quot;' . $currentAfter;
        } elseif (is_tag()) {
            echo $currentBefore . __('Post Tagged with:', 'wpinsite') . ' &quot;';
            single_tag_title();
            echo '&quot;' . $currentAfter;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $currentBefore . __('Author Archive', 'wpinsite') . $currentAfter;
        } elseif (is_404()) {
            echo $currentBefore . __('Page Not Found', 'wpinsite') . $currentAfter;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo ' ' . $delimiter . ' ' . __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }
    }
}