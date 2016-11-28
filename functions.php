<?php 
require_once('functions/base-functions.php');

//Enable Featured Images
add_theme_support( 'post-thumbnails' ); 

function jj_excerpt_length( $length ){
  return 16;
}
//last param makes the fucntion execute later
add_filter( 'excerpt_length', 'jj_excerpt_length', 999);

function register_theme_menus(){
  register_nav_menus(
    array(
      'main-menu' => __('Main Menu')
    )
  );
}
add_action('init', 'register_theme_menus');


//Namespace: jj 
//Enqueue CSS
function jj_theme_styles(){
  //for local files use 'get_template_directory_uri() . /folder/file_name.css'
  wp_enqueue_style('normalize_css', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/normalize.min.css');
 # wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
  wp_enqueue_style('googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic');
  wp_enqueue_style('googlefont_css', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300,700');
  wp_enqueue_style('fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
  wp_enqueue_style('main_css', get_template_directory_uri(). '/style.less');
}
add_action('wp_enqueue_scripts', 'jj_theme_styles');

//Enqueue JS
function jj_theme_js(){
  //Params: name, link_to_file, dependent_files (array), set verison, appear in footer (boolean)
  #wp_enqueue_script('modernizr_js', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/vendor/modernizr.js', '','',false);
  #wp_enqueue_script('retina_js', 'https://cdnjs.cloudflare.com/ajax/libs/retina.js/1.3.0/retina.min.js', '','',false);
  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js', array('jquery'),'',false);
  wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'),'',true);
  wp_enqueue_script('mobile_menu', get_stylesheet_directory_uri() . '/js/menu.js', array('jquery'),'',true);
  wp_enqueue_script('lazyload', get_stylesheet_directory_uri() . '/js/jquery.lazyload.min.js', array('jquery'),'',false);
}
add_action('wp_enqueue_scripts','jj_theme_js');

// Image sizes to be resized by Regenerate Thumbnails
add_image_size('home_image', '1500', '800', true);
add_image_size('top_header_image', '1700', '550', true);
add_image_size('logo_resize', '940', '588', true);
add_image_size('image_row', '640', '480', true);
add_image_size('logo_resize', '640', '400', true);
add_image_size('to_dos', '350', '300', true);

//Get Google Fonts
jj_get_webfont('Suranna', 'normal, bold');


function jj_cleanup_wp_head() {

  //Remove unneeded hooks in the head
  remove_action( 'wp_head', 'wp_generator');
  remove_action( 'wp_head', 'wp_shortlink_wp_head');
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
  remove_action( 'wp_head', 'wp_oembed_add_host_js');
  remove_action( 'wp_head', 'rest_output_link_wp_head');
  remove_action( 'wp_head', 'rsd_link');
  remove_action( 'wp_head', 'wlwmanifest_link');
  remove_action( 'rest_api_init', 'wp_oembed_register_route');
  remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10);
  add_filter( 'emoji_svg_url', '__return_false' );

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'jj_cleanup_wp_head' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

require_once('wp_bootstrap_navwalker.php');
