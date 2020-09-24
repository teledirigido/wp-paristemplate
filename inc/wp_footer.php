<?php 

add_action('wp_footer', function(){

  global $post;
  
  // Site Variables
  $site = array(
    'url' => get_bloginfo('url'),
    'template' => get_bloginfo( 'template_url'),
    'rest' => esc_url_raw( rest_url() ),
    'nonce' => wp_create_nonce( 'wp_rest' ),
  );

  if ($post) {
    $site['post_type'] = get_post_type( $post->ID );
    $site['post_name'] = $post->post_name;
  }

  // Example if you want to get the term_id on your JS Object, not needed here
  // add term_id, useful for vue
  // if( is_tax('type-of-project') || is_post_type_archive() ){
  //   $site['term_id'] = isset(get_queried_object()->term_id) ? get_queried_object()->term_id : 0;
  // }
  
  echo '<script> var site='.json_encode($site).';</script>';
  ?>

  <link rel="icon" 
      type="image/png"
      href="<?php echo get_stylesheet_directory_uri() ?>/favicons/favicon.png">
  
  <?php
  
});