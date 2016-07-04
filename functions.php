<?php 
require_once('functions/base-functions.php');

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
}
add_action('wp_enqueue_scripts','jj_theme_js');

//
add_image_size('logo_resize', '940', '588', true);
add_image_size('logo_resize', '640', '400', true);

//Get Google Fonts
jj_get_webfont('Suranna', 'normal, bold');
#jj_get_webfont('Old Standard TT', 'normal, bold');

require_once('wp_bootstrap_navwalker.php');