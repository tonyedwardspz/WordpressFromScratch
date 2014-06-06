<?php 

//Create custom post type
add_action('init' , 'business_manager_register');

function business_manager_register(){
    
    //Arguments to create post type
    $args = array(
        'label' => __('Business Manager'),
        'singular_label' => __('Business'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'heirarchical' => 'true'
        'has_archive' => 'true',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'business' , 'width_front' => false),);
    
    //Register type and custom taxonomy. 
    register_post_type( 'businesses', $args );
    
    register_taxonomy('business-type', array('businesses'),
        array(
            'hierarchial' => true, 
            'label' => 'Business Types',
            'singular_label' => 'Business Type',
            'rewrite' => 'true',
            'slug' => 'business-type'));
}

// Add featured Images
if (function_exists('add_theme_support')){
    add_theme_support('post-thumbnails');  
    set_post_thumbnail_size( 220, 150 );
    add_image_size('storefront', 620, 270, true);
 }

add_action('admin_init', 'business_manager_add_meta');

function business_manager_add_meta(){
    add_meta_box(
        'business-meta',  
        'Business Options',
        'business_manager_meta_options',
        'businesses',
        'normal',
        'high');
}





}?>