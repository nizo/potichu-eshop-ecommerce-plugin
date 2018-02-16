<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

do_action( 'woocommerce_before_main_content' );?>


	


<?php

$frontpage_id = get_option( 'page_on_front' );
$includecontent = apply_filters('avia_builder_precompile', get_post_meta($frontpage_id, '_aviaLayoutBuilderCleanData', true));
$includecontent = apply_filters('the_content', $includecontent);
$includecontent = apply_filters('avf_template_builder_content', $includecontent);
echo $includecontent;
echo '<div style="clear:both;"></div>';

$prod_categories = get_terms( 'product_cat', array(
	'parent' => 0,
	'hide_empty' => false,
));


foreach( $prod_categories as $prod_cat ) :
	
	$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
	$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );		
						
	
	echo '<a class="homepage category-link" href="'. get_term_link( $prod_cat, 'product_cat' )  .'">';				
		echo '<div class="thumbnail" style="background-image: url(\'' . $cat_thumb_url . '\');"></div>';				
		echo '<div class="meta"><h3 class="title">' . $prod_cat->name . '</h3>';
		echo '<span class="description">' . wp_strip_all_tags($prod_cat->description) . '</span></div>';		
	echo '</a>';	
					

	$args = array(
		'post_type'           => 'product',					
		'posts_per_page'      => 4,
		'product_cat'         => $prod_cat->slug,
	);

	$products = new WP_Query( $args );

	if ( $products->have_posts() ) :
		$forceFullwidthProducts = true;
		woocommerce_product_loop_start();

			while ( $products->have_posts() ) : $products->the_post();

				wc_get_template_part( 'content', 'product' );

			endwhile;

		woocommerce_product_loop_end();

		echo '<div style="clear:both;"></div>';
		//echo '<div class="category-divider"></div>';
	endif;
endforeach;	

do_action( 'woocommerce_after_main_content' );
?>





<?php
get_footer();
?>