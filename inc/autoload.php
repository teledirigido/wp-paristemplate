<?php

// Autoload Classes
spl_autoload_register('load_theme_helpers');
function load_theme_helpers($className) {
  
  // If the specified $class_name does not include our namespace, duck out.
  if ( false === strpos( $className, 'MNZ' ) ) {
      return;
  }

  $className = str_replace('MNZ\\', '', $className);
  $file = get_stylesheet_directory() . '/inc/classes/' . $className . '.php';
  $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
  echo $file . '<br>';
  if (file_exists($file)) {
    include $file;
  }
}