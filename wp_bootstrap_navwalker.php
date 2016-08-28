<?php

// bootstrap nav walker
  class Bootstrap_Dropdown_Walker_Texas_Ranger extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = array()) {
      $indent = str_repeat("\t", $depth);

      $output.= "\n$indent".'<ul role="menu" class="dropdown-menu">'."\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

      $class_names = '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;
      $classes[] = 'i-hover';
      if($args->has_children) {
        $classes[] = 'dropdown';
      }

      /**
       * Filter the CSS class(es) applied to a menu item's <li>.
       */
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      /**
       * Filter the ID applied to a menu item's <li>.
       */
      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

      $output .= $indent . '<li' . $id . $class_names .'>';

      $atts = array();
      $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
      $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
      $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
      $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

      /**
       * Filter the HTML attributes applied to a menu item's <a>.
       */
      $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

      $attributes = '';
      foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
          $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
          $attributes .= ' ' . $attr . '="' . $value . '"';
        }
      }

      $item_output = $args->before;
      

      $item_output .= '<a'. $attributes .'>';

      /** This filter is documented in wp-includes/post-template.php */
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ). $args->link_after;
      $item_output .= '</a>';
      
      
      $item_output .= $args->after;

      /**
       * Filter a menu item's starting output.
       */
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
      if(is_object($args[0])) {
        $args[0]->has_children = !empty($children_elements[$element->{$this->db_fields['id']}]);
      }
      parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
  }