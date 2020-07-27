<?php

require "inc/options.php";
// require "inc/custom-fields.php";
require "inc/post-types.php";
require "inc/taxonomies.php";
require "inc/api.php";

function lbh_load_scripts_and_styles() {
    wp_enqueue_style("main", get_stylesheet_directory_uri()."/dist/css/index.css");
    wp_enqueue_style("fonts", "https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap");
    wp_enqueue_script("main", get_stylesheet_directory_uri()."/dist/js/index.js");
}
add_action("wp_enqueue_scripts", "lbh_load_scripts_and_styles");

add_theme_support( 'post-thumbnails' );

function lbh_register_menus() {
    register_nav_menus(
        array(
            "header-menu" => __( "Header area" ),
            "footer-left-menu" => __( "Left footer area" ),
            "footer-right-menu" => __( "Right footer area" )
        )
    );
}
add_action( "init", "lbh_register_menus" );

// Configure ACF Google Maps field
function lbh_acf_init() {
    acf_update_setting('google_api_key', GOOGLE_API_KEY);
}
add_action('acf/init', 'lbh_acf_init');


function lo_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'lo_custom_excerpt_length', 999 );

function lo_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'lo_excerpt_more');