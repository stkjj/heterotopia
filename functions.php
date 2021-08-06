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

function single_post_inner_wrap_before( $post_id, $attributes ) {
    echo '<div> I am at the beginning of the single post inner wrap. </div>'; 
} 
add_action( 'uagb_post_before_inner_wrap_grid', 'single_post_inner_wrap_before', 10, 2 );

function single_post_inner_wrap_after( $post_id, $attributes ) {
    echo '<div> I am at the end of the single post inner wrap. </div>'; 
} 
add_action( 'uagb_post_after_inner_wrap_grid', 'single_post_inner_wrap_after', 10, 2 );
