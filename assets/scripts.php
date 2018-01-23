<?php 

// Adding custom CSS and JS in regards to the website
add_action('wp_enqueue_scripts', 'register_custom_css_scripts'); // initiate the function  

function register_custom_css_scripts(){

  wp_deregister_script('wp-embed');
  // Styles
  wp_enqueue_style( 'style', get_stylesheet_uri() , __FILE__ , '1.0' , 'all' );  

}