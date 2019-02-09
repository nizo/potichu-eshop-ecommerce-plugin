<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );



// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>



<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<?php
		$saleActive = $product->is_on_sale();
		$price = $product->get_price_including_tax( 1, $product->get_regular_price());
		$discountPrice = $product->get_price_including_tax(1, null);
		$discountPriceFormatted = $product->get_price_including_tax(1, null, true);
		$discountInPercent = 100 - round(($discountPrice / $price) * 100);

		if (!$saleActive) {
			if ($product->get_total_stock() > get_option( 'woocommerce_notify_no_stock_amount' )) {
				echo '<div class="product-available">' . __( 'In stock', 'woocommerce' ) . '</div>';
			} else {
				echo '<div class="product-available externally">' . __( 'Available on backorder', 'woocommerce' ) . '</div>';
			}
		}
		?>
		<?php
			if ($saleActive) {
				echo '<div class="sale-label">' . __( 'Sale!', 'woocommerce' ) . ' ' . $discountInPercent . ' %</div>';
			}
		?>
	<a href="<?php the_permalink(); ?>">

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<h3><?php the_title(); ?></h3>

	
		<div class="front-page-price-info" itemprop="offers" itemscope itemtype="http://schema.org/Offer">


			<p class="price">
				<span class="vat">
					<?php

						if ( $saleActive ) {
							echo '<del>' . price_add_trailing_zeros($price) . '&nbsp;' . get_woocommerce_currency_symbol() . '</del><br/>';
						}
						echo $discountPriceFormatted . '&nbsp;' .  get_woocommerce_currency_symbol();
					?>
				</span>
				<span style="margin-top:5px; display: block;">Bez DPH: <?php echo $product->get_price_excluding_tax() . ' ' . get_woocommerce_currency_symbol(); ?></span>
				<?php
					if ( !$saleActive ) { ?>
						<span class="price-per-area">Cena za <?php echo potichu_get_measuring_unit(get_the_ID()) . ' bez DPH: ' . potichu_compute_unit_price(get_the_ID(), $product->get_price_excluding_tax()) . '  ' . get_woocommerce_currency_symbol();	?></span>
				<?php } ?>
			</p>

			<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
			<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency_symbol(); ?>" />
			<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

		</div>
	</a>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>