<?php

add_action( 'after_setup_theme', function(){
  remove_theme_support( 'post-thumbnails' );
}, 11 ); 

// Show Open Graph
if(class_exists('open_graph')):
    add_action('wp_head', function(){
        open_graph::general();
        open_graph::facebook();
        open_graph::twitter();
  });
endif;

// Add Image size
add_action( 'after_setup_theme', function() {
    add_image_size( 'full', 1920, 1080 , true );
    add_image_size( 'mobile', 640, 360 , true );
    add_image_size( 'threetwo', 600, 400 , true );
    remove_image_size('thumbnail');
    remove_image_size('medium');
    remove_image_size('large');
    remove_image_size('twentyseventeen');
});

// Add Title tag support
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );

// Remove unused functions
remove_filter('template_redirect', 'redirect_canonical');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator'); 

/** 
 * Remove globel styles
 * @see https://github.com/WordPress/gutenberg/issues/36834
 **/
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

// Remove styles from Contact Form 7
add_action( 'wp_enqueue_scripts', 'wap8_wpcf7_css', 10 );
function wap8_wpcf7_css() {
    if ( !is_admin() ) {
        if ( class_exists( 'WPCF7_ContactForm' ) ) {
            wp_deregister_style( 'contact-form-7' ); // deregister Contact Form 7 stylesheet
        }
    }
}

// Dump everything
if (!function_exists('dump')) {
    function dump($in = null) {
        echo '<pre style="
            white-space: pre-wrap;
            margin-left: 0px; 
            margin-right: 0px; 
            padding: 10px; 
            border: solid 5px rgba(50,50,50,.5); 
            background-color: ghostwhite; 
            color: black; 
            text-align: left;">';
        foreach ( func_get_args() as $var ) {
            echo "\n";
            if ( is_string($var) ) {
                echo "$var\n";
            } else {
                var_dump($var);
            }
        }
        echo '</pre>' . "\n";
        return $in;
    } # dump()

}