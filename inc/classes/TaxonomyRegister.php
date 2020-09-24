<?php

namespace MNZ;

/*

  $args = array(  
    'post_type' => array('news','events','resources'),
    'plural' => 'tag keys', 
    'singular' => 'tag key', 
    'slug' => 'updates-tags-key'
  );
  $_new = new taxonomy_register( $args , false );

*/
class TaxonomyRegister {

  private $plural;
  private $singular;
  private $slug;
  private $is_hierarchical;
  private $post_type;

   public function __construct( $options, $is_hierarchical = false ) {

    $this->post_type        = $options['post_type'];
    $this->plural           = $options['plural'];
    $this->singular         = $options['singular'];
    $this->slug             = $options['slug'];
    $this->is_hierarchical  = $is_hierarchical;
    $this->args             = isset($options['args']) ? $options['args'] : false;
    $this->labels           = isset($options['labels']) ? $options['labels'] : false;

    add_action( 'init', array( $this, 'register' ) );
  }

  public function register(){

    $labels = array(
      'name'                       => ucfirst($this->plural),
      'singular_name'              => ucfirst($this->singular),
      'search_items'               => 'Search' . ucfirst($this->plural),
      'popular_items'              => 'Popular' . ucfirst($this->plural),
      'all_items'                  => 'All ' . ucfirst($this->plural),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => 'Edit ' . ucfirst($this->singular),
      'update_item'                => 'Update ' . ucfirst($this->singular),
      'add_new_item'               => 'Add New ' . ucfirst($this->singular),
      'new_item_name'              => 'New ' . ucfirst($this->singular) . ' Name',
      'separate_items_with_commas' => 'Separate ' . strtolower($this->plural) . '  with commas',
      'add_or_remove_items'        => 'Add or remove ' . strtolower($this->plural),
      'choose_from_most_used'      => 'Choose from the most used ' . strtolower( $this->plural),
      'not_found'                  => 'No '  . strtolower( $this->plural) . ' found.',
      'menu_name'                  => ucfirst( $this->plural ),
    );

    $default_args = array(
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'hierarchical'          => true,
      'public'                => true,
      'publicly_queryable'    => true,
      'exclude_from_search'   => false,
      'query_var'             => true,
      'show_in_rest'          => true,
      'rewrite'               => array( 'slug' => $this->slug ),
      'rest_base'             => $this->slug,
      'rest_controller_class' => 'WP_REST_Terms_Controller'
    );

    if( $this->is_hierarchical == false ){
      $args['hierarchical'] = false;
      $args['update_count_callback'] = '_update_post_term_count';
    }

    if ($this->labels) {
      $default_args['labels'] = wp_parse_args( $this->labels, $default_args['labels'] );
    }
    
    $args = wp_parse_args( $this->args , $default_args );
    register_taxonomy( sanitize_title( $this->slug ), $this->post_type, $args );

  }

}