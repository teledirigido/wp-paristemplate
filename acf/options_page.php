<?php

if( function_exists('acf_add_options_page') ):

  $parent = acf_add_options_page(array(
    'page_title'  => 'Julie Rollinson',
    'menu_title'  => 'Julie Rollinson',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Free E-book',
    'menu_title'  => 'Free E-book',
    'parent_slug'   => $parent['menu_slug'],
  ));

  // acf_add_options_sub_page(array(
  //   'page_title'  => 'Bio',
  //   'menu_title'  => 'Bio',
  //   'parent_slug'   => $parent['menu_slug'],
  // ));
  
endif;