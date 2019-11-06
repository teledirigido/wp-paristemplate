<?php 

// Adding custom CSS and JS in regards to the website
add_action('wp_enqueue_scripts', 'register_custom_css_scripts', 100000); // initiate the function  

function register_custom_css_scripts(){

  wp_deregister_script('wp-embed');

  // Styles
  wp_enqueue_style('style-default', get_stylesheet_uri(), __FILE__, '1.0', 'all' );
  
  // Scripts
  wp_register_script('scripts', get_stylesheet_directory_uri() . '/dist/scripts/scripts.js',  __FILE__, false, true );

  $arrayParams = array(
    'nonce' => wp_create_nonce('wp_rest'),
  );
  if(isset($_REQUEST['X-WP-Nonce'])) {
    $arrayParams['nonce_verify'] = wp_verify_nonce($_REQUEST['X-WP-Nonce'], 'wp_rest');
  }
  // wp_localize_script('scripts', 'params', $arrayParams);
  wp_enqueue_script('scripts');
  
}

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );