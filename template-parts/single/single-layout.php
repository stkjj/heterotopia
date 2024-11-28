<?php
/**
 * Template for Single Post
 *
 * @package Astra
 */

?>

<div <?php astra_blog_layout_class( 'single-layout-1' ); ?>>

    <?php astra_single_header_before(); ?>

    <header class="entry-header <?php astra_entry_header_class(); ?>">

        <?php astra_single_header_top(); ?>

        <?php astra_blog_post_thumbnail_and_title_order(); ?>

        <?php astra_single_header_bottom(); ?>

    </header><!-- .entry-header -->

    <?php astra_single_header_after(); ?>

    <div class="entry-content clear">
        <?php astra_entry_content_before(); ?>

        <?php the_content(); ?>

        <?php
        astra_edit_post_link(
            sprintf(
                esc_html__( 'Edit %s', 'astra' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>

        <?php astra_entry_content_after(); ?>

        <?php
        wp_link_pages(
            array(
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'astra' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-link">',
                'link_after'  => '</span>',
            )
        );
        ?>
    </div><!-- .entry-content -->
</div>
