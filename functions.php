<?php

function expanded_init() {
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'wp_generator');
  add_action( 'wp_enqueue_scripts', 'register_scripts_and_styles', 999 );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'post-formats', array('image', 'video', 'audio') );
}
add_action('after_setup_theme', 'expanded_init');

function register_scripts_and_styles() {

  global $wp_styles;

  if ( !is_admin() ) {
    wp_register_script( 'plugins-js', get_stylesheet_directory_uri() . '/js/plugins.js', array('jquery'), '', true );
    wp_register_script( 'roll-js', get_stylesheet_directory_uri() . '/js/RollControls.js', array('jquery'), '', true );
    wp_register_script( 'trackball-js', get_stylesheet_directory_uri() . '/js/TrackballControls.js', array('jquery'), '', true );
    wp_register_script( 'expanded-js', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '', true );

    wp_enqueue_script('jquery');
    wp_enqueue_script('plugins-js');
    wp_enqueue_script('roll-js');
    wp_enqueue_script('trackball-js');
    wp_enqueue_script('expanded-js');
  }
}

add_image_size( 'thumb-200', 200, 200, true );