<?php

    /**
    * PARAMETERS
    * ----------
    *
    *
    * Required (Array)
    *
    * $options = array(
    *   @param 'plural'     => str 'Plural name',           # required
    *   @param 'singular'   => str 'singular name',         # required
    *   @param 'args'       => str 'Rest of arguments', # required
    * );
    *
    *
    * USAGE
    * -------
    * $post_type_news = new post_type_register( $options );
    *
    * NOTES
    * --------
    * If you're using ACF PRO and WP REST API use a custom field instead of the featured_image field provided by wordpress. Remember that :)
    *
    **/

class post_type_register {

    private $plural;
    private $singular;
    private $slug;
    private $args;

    public function __construct( $args ) {

        $this->args         = ( isset($args['args']) ? $args['args'] : '' );
        $this->plural       = $args['plural'];
        $this->singular     = $args['singular'];

        add_action( 'init', array( $this, 'register' ) );
    }
    
    public function register() {

        $labels = array(
            'name'               => ucfirst($this->plural),
            'singular_name'      => ucfirst($this->singular),
            'menu_name'          => ucfirst($this->plural),
            'add_new'            => 'Add ' . ucfirst($this->singular),
            'add_new_item'       => 'Add New ' . ucfirst($this->singular),
            'edit_item'          => 'Edit ' . ucfirst($this->singular),
            'new_item'           => 'New ' . ucfirst($this->singular),
            'all_items'          => 'All ' . ucfirst($this->plural),
            'view_item'          => 'View ' . ucfirst($this->singular),
            'search_items'       => 'Search ' . ucfirst($this->plural),
            'not_found'          => 'No ' . $this->plural . ' found',
            'not_found_in_trash' => 'No ' . $this->plural . ' found in the Trash'
        );

        $default_args = array(
            'labels'            => $labels,
            'description'       => 'Holds our ' . $this->plural . ' and specific data',
            'public'            => true,
            'menu_icon'         => 'dashicons-list-view',
            'supports'          => array( 'title' , 'editor' ),
            'map_meta_cap'      => true,
            'has_archive'       => true,
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'show_in_rest'      => true,
            'rest_base'         => sanitize_key( $this->plural ),
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        );

        $args = wp_parse_args( $this->args , $default_args );
        register_post_type( sanitize_key( $this->plural ), $args ); 

    }
}

/*

    $args = array(  
        'post_type' => array('news','events','resources'),
        'plural' => 'tag keys', 
        'singular' => 'tag key', 
        'slug' => 'updates-tags-key'
    );
    $_new = new taxonomy_register( $args , false );

*/
class taxonomy_register {

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

        $args = array(
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'hierarchical'          => true,
            'rewrite'               => array( 'slug' => $this->slug ),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'query_var'             => true,
            'show_in_rest'          => true,
            'rest_base'             => $this->slug,
            'rest_controller_class' => 'WP_REST_Terms_Controller'
        );

        if( $this->is_hierarchical == false ){
            $args['hierarchical'] = false;
            $args['update_count_callback'] = '_update_post_term_count';

        }
        
        register_taxonomy( sanitize_title( $this->slug ), $this->post_type, $args );

    }

}


/*

EXAMPLE

-----------------------------------
@return adventures post type
-----------------------------------

$args = array(
    'plural'    => 'Adventures',
    'singular'  => 'adventure',
    'args'      => array(
        'slug'      => 'adventures',
        'menu_icon' => 'dashicons-admin-site',
        'supports'  => array('title','editor','author')
    )
);
$_new = new post_type_register($args);



-----------------------------------
@return type of adventures taxonomy
-----------------------------------

$args = array(  
        'post_type' => array('adventures'),
        'plural' => 'Type of adventures', 
        'singular' => 'Type of adventure', 
        'slug' => 'type-of-adventure'
    );
$_new = new taxonomy_register( $args , true );


*/