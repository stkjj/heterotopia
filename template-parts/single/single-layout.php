<?php
/**
 * Template for Single post
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

?>

<div <?php astra_blog_layout_class( 'single-layout-1' ); ?>>

	<?php astra_single_header_before(); ?>
	<h2>This is the single post layout of this child theme</h2>

	<header class="entry-header <?php astra_entry_header_class(); ?>">

		<?php astra_single_header_top(); ?>
		
		<?php astra_blog_post_thumbnail_and_title_order();
		
	add_action('astra_single_post_title_after', 'callback_function');

		function callback_function(){
			if ( 'post' !== get_post_type() ){

				$enable_meta = apply_filters( 'astra_blog_post_meta_enabled', '__return_true' );
				$post_meta   = astra_get_option( 'blog-meta' );
		
				if ( is_array( $post_meta ) && $enable_meta ) {
		
					$output_str = astra_get_post_meta( $post_meta );
					
					if ( ! empty( $output_str ) ) {
						echo apply_filters( 'astra_blog_post_meta', '<div class="entry-meta het-test"><span class="extra">' . $output_str . '</span></div>', $output_str ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
				}

			}
		}
		        
        ?>

		<?php astra_single_header_bottom(); ?>

	</header><!-- .entry-header -->

	<?php astra_single_header_after(); ?>

	<div class="entry-content clear" 
	<?php
				echo astra_attr(
					'article-entry-content-single-layout',
					array(
						'class' => '',
					)
				);
				?>
	>

		<?php astra_entry_content_before(); ?>

		<?php the_content(); ?>

		<?php
			astra_edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
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
					'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
			?>
	</div><!-- .entry-content .clear -->
</div>
