<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

// add classes to posts to get access to categories for styling

add_filter ( 'uagb_enable_post_class', 'het_uagb_enable_post_class' );
function het_uagb_enable_post_class( $value ) {
    return true;
}

// change default colors for palette

function het_astra_color_palettes() {

  $color_palettes = array(
 '#ffffff',
 '#e6ffff',
 '#ffe6ff',
 '#ffffe6',
 '#e6e6e6',
 '#000000',
  );
  
  return $color_palettes;
}

add_filter( 'astra_color_palettes', 'het_astra_color_palettes' );


add_filter( 'astra_single_post_meta', 'het_astra_single_post_meta');
function het_astra_single_post_meta( $dummy ) {
    $output_str = '';
    $separator = '.';
    $loop_count = 2;
    $author = get_the_author();
    if ( ! empty( $author ) ) {
        $output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
        $output_str .=  "<span class=\"dashicons-admin-users dashicons\"></span>".  astra_post_author();
    }

    $output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
    $output_str .= "<span class=\"dashicons-calendar dashicons\"></span>" . astra_post_date();

    $category = astra_post_categories();
    if ( '' != $category ) {
        $output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
        $output_str .= "<span class=\"dashicons-tag dashicons\"></span>" . $category;
    }
    return $output_str;
}

