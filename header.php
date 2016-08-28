<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri() ?>/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicons/safari-pinned-tab.svg" color="#ffffff">
    <meta name="theme-color" content="#c13376">
    <?php 
    //At the end of the head tag, tell plugins to add their stuff and add CSS in functions.php
    wp_head(); 
    ?>
  </head>

  <body <?php body_class(); ?> >
  <header>
         <div class="mobile-button">
          <a href="javascript:void(0)" class="icon">
            <div class="hamburger">
              <div class="menui top-menu"></div>
              <div class="menui mid-menu"></div>
              <div class="menui bottom-menu"></div>
              <div class="menu">MENU</div>
            </div>
          </a>
        </div>  
       <nav class="mobilenav" id="main-navigation" role="navigation">
          <?php wp_nav_menu(array('container_class'=>'main-navigation', 'container_id'=>'', 'depth'=>2, 'menu'=>2, 'menu_class'=>'nav sidebar-nav', 'walker'=>new Bootstrap_Dropdown_Walker_Texas_Ranger)); ?>
         </nav>
      </div>
  </header>