<?php

/*
 * Add this in your functions.php:

  if( class_exists('open_graph')):
    add_action('wp_head', function(){
        open_graph::general();
        open_graph::facebook();
        open_graph::twitter();
    });
  endif;

 * This helper works better with ACF PRO or the following custom fields:
  og_title
  og_description

*/
 
class open_graph {

  // Title
  public static function _get_title(){
    if( class_exists('acf') && get_field('og_title') ){
      return get_field('og_title');
    }

    return wp_title('|',false,'right') . get_bloginfo('name');
  }

  // URL
  public static function _get_url(){
    global $post;
    $permalink = false;
    if ($post) {
      $permalink = get_the_permalink($post->ID);
    }
    return $permalink;
  }


  // Image
  public static function _get_featured_image( $img ) {
    if( get_field('image') )
      return get_field('image')['url'];

    if( get_field('featured_image') )
      return get_field('featured_image')['url'];

    $img_id = get_post_thumbnail_id();
    $img_url = wp_get_attachment_image_src( $img_id, $img );
    $img_url = $img_url[0];
    return $img_url;
  }

  public static function _get_image(){
    if ( is_single() || is_singular() && !is_front_page())
      return self::_get_featured_image( 'full' );
    
    return get_template_directory_uri() . '/og_image.jpg';
  }

  // Description
  public static function _get_description(){

    if( class_exists('acf') && get_field('og_description') ){
      return get_field('og_description');
    }

    if( is_home() || is_front_page() ){
      return get_bloginfo('description');
    }

    if( is_tax() ){
      $obj = get_queried_object();
      return $obj->description;
    }

    if( is_single() || is_singular() ){
      global $post;
      $_post = get_post($post->ID);
      setup_postdata($_post);
      return get_the_excerpt();
    }
  }

  public static function general(){
    $og  = '<title>'.self::_get_title().'</title>' . "\n";
    $og .= '<meta property="title" content="'.self::_get_title().'">' . "\n";
    $og .= '<meta property="description" content="'.self::_get_description().'">' . "\n";

    echo $og;
  }


  public static function facebook(){
    $og  = '<meta property="og:title" content="'.self::_get_title().'">' . "\n";
    $og .= '<meta property="og:type" content="website"> ' . "\n";
    $og .= '<meta property="og:url" content="'.self::_get_url().'">' . "\n";
    $og .= '<meta property="og:image" content="'.self::_get_image().'">' . "\n";
    $og .= '<meta property="og:description" content="'.self::_get_description().'">' . "\n";

    echo $og;

  }

  public static function twitter(){
    $og =  '<meta name="twitter:card" content="summary_large_image">' . "\n";
    $og .= '<meta name="twitter:title" content="'.self::_get_title().'">' . "\n";
    $og .= '<meta name="twitter:description" content="'.self::_get_description().'">' . "\n";
    $og .= '<meta name="twitter:image:src" content="'.self::_get_image().'">' . "\n";
    
    echo $og;

  }
}


/**
 * @uses
 * You'll need to define which post types you want to display this meta boxes.
 */
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (

    /* This is just an example You'll need to add your owns */
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'events',
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'projects',
        ),
      ),
    ),
    /* From here you're all good to go */

    'key' => 'group_56cb8bf63ffa4',
    'title' => 'Open Graph and Meta Tags',
    'fields' => array (
      array (
        'key' => 'field_56cb8c196d32a',
        'label' => 'Title',
        'name' => 'og_title',
        'type' => 'text',
        'instructions' => 'Google typically displays the first 50-60 characters of a title tag. If you keep your titles under 55 characters, you can expect at least 95% of your titles to display properly. <a href="https://moz.com/learn/seo/title-tag" target="_blank">More Info</a>',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_56cb8c216d32b',
        'label' => 'Description',
        'name' => 'og_description',
        'type' => 'textarea',
        'instructions' => 'Optimally be between 150-160 characters. <a href="https://moz.com/learn/seo/meta-description" target="_blank">More info</a>',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 3,
        'new_lines' => 'none',
        'readonly' => 0,
        'disabled' => 0,
      ),
    ),
    'menu_order' => 2,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));

endif;

?>