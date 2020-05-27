<?php

if( function_exists('acf_add_options_page') ):

  $parent = acf_add_options_page(array(
    'page_title'  => 'Page title',
    'menu_title'  => 'Menu Title',
    'menu_slug'   => 'page-title-slug',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Sub Page 1',
    'menu_title'  => 'Sub Page 1',
    'parent_slug'   => $parent['menu_slug'],
  ));
  
endif;