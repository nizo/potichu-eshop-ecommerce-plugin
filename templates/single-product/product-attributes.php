<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$has_row    = false;
$alt        = 1;
$attributes = $product->get_attributes();

ob_start();
?>
<table class="shop_attributes">

	<?php if ( $product->enable_dimensions_display() ) : ?>

		<?php if ( $product->has_weight() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Weight', 'woocommerce' ) ?></th>
				<td class="product_weight"><?php echo round($product->get_weight(), 2) . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ); ?></td>
			</tr>

		<?php endif; ?>

		<?php
		$productDimension = get_post_meta($product->id, 'objem', true);
		
		if (strlen($productDimension) > 10) {
			$productDimension = substr($productDimension, 0, strlen($productDimension) - 3);  
			$productDimension = round($productDimension,2);
		}
		
		if (($productDimension != '' )) : 
			$has_row = true;		?>
			<tr>
				<th><?php _e( 'Dimension', 'woocommerce' ) ?></th>
				<td class="product_dimensions"><?php echo $productDimension . ' m<sup>3</sup>' ?></td>
			</tr>
		<?php endif; ?>

	<?php endif; ?>

	<?php foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
		?>
		<tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
			<th><?php echo wc_attribute_label( $attribute['name'] ); ?></th>
			<td><?php
				if ( $attribute['is_taxonomy'] ) {

					$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				} else {

					// Convert pipes to commas and display values
					$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				}
			?></td>
		</tr>
	<?php endforeach; ?>
	
</table>
<?php
if ( $has_row ) {
	echo ob_get_clean();
} else {
	ob_end_clean();
}