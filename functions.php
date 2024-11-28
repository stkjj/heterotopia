<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Enqueue Parent and Child Theme Styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
});

// Add classes to posts to access categories for styling
add_filter( 'uagb_enable_post_class', function( $value ) {
    return true;
});

// Modify default color palettes
add_filter( 'astra_color_palettes', function() {
    return array(
        '#ffffff',
        '#e6ffff',
        '#ffe6ff',
        '#ffffe6',
        '#e6e6e6',
        '#000000',
    );
});

// Customize single post meta output
add_filter( 'astra_single_post_meta', function( $dummy ) {
    $output_str = '<div class="entry-meta">';
    $separator = ' . ';
    $author = get_the_author();

    if ( ! empty( $author ) ) {
        $output_str .= '<span class="dashicons dashicons-admin-users"></span> ' . astra_post_author();
    }

    $output_str .= $separator . '<span class="dashicons dashicons-calendar"></span> ' . astra_post_date();

    $category = astra_post_categories();
    if ( ! empty( $category ) ) {
        $output_str .= $separator . '<span class="dashicons dashicons-tag"></span> ' . $category;
    }

    $output_str .= '</div>';
    return $output_str;
});

// Optimize script loading for Contact Form 7
// add_action( 'wp_enqueue_scripts', function() {
//     if ( is_singular() ) {
//         $post = get_post();
//         if ( has_shortcode( $post->post_content ?? '', 'contact-form-7' ) ) {
//             return;
//         }
//     }
// 
//     wp_dequeue_script( 'contact-form-7' );
//     wp_dequeue_script( 'google-recaptcha' );
//     wp_dequeue_style( 'contact-form-7' );
// }, 99 );
