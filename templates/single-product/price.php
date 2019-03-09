<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if (!$product->is_visible()) return;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p class="price table">

		<span class="row">
			<span class="label-container">Cena:</span>
			<span class="vat">
				<?php
					if ( $product->is_on_sale() ) {
						$regularPrice = price_add_trailing_zeros($product->get_price_including_tax( 1, $product->get_regular_price() ));
						echo '<del>' . $regularPrice . '&nbsp;' . get_woocommerce_currency_symbol() . '</del>';
					}
					echo $product->get_price_including_tax(1, null, true) . '&nbsp;' . get_woocommerce_currency_symbol();
			?>
			</span>
		</span>

		<span class="row">
			<span class="label-container">Cena bez DPH:</span><span class="vat-excluded"><?php echo $product->get_price_excluding_tax() . ' ' . get_woocommerce_currency_symbol(); ?></span>
		</span>
		<?php

		if ( !$product->is_on_sale() ) {
			?>
			<span class="row">
				<span class="label-container">Cena za <?php echo potichu_get_measuring_unit(get_the_ID()) . ' bez DPH: '; ?> </span><span class="vat-excluded"><?php echo potichu_compute_unit_price(get_the_ID(), $product->get_price_excluding_tax()) . '  ' . get_woocommerce_currency_symbol();?></span>		
			</span>
		<?php } ?>

	</p>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>