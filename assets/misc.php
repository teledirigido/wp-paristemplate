<?php

add_action( 'after_setup_theme', function(){
  remove_theme_support( 'post-thumbnails' );
}, 11 ); 

// Dump everything
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