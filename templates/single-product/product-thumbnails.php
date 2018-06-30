<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();


if ( $attachment_ids ) {
	?>
	<div class="thumbnails">
		<?php

		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );			
			
			if ($loop > 5) {
				$classes[] = 'hidden';
			}

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';
			

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;			
			
			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );

			//echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

			//woocommerce_single_product_image_thumbnail_html START
			$image_link = wp_get_attachment_url( $attachment_id );			
			$image = '<div style="background-image: url(\'' . $image_link. '\');"></div>';
			$image_title = esc_attr(get_post_field('post_content', $attachment_id));


			if (($loop == 5) && (count($attachment_ids) > 6)) {
				$text = '+' . (count($attachment_ids) - $loop);
				$image = '<div class="remaining-gallery-images-count">' . $text . '</div>';
			}

			$img = sprintf( '<a href="%s" class="%s" title="%s"  rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_title, $image );
			echo $img;

			$loop++;
		}
		

	?><div style="clear: both;"></div></div>	
	<?php
}