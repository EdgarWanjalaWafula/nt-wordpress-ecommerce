<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$this_product_id    = $product->id;
$size_meta          = get_post_meta($this_product_id, 'newman_shoe_size', true);
$sizes              = explode(',', $size_meta);
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<div class="d-flex justify-content-between align-items-center">
		<span class="price"><?php echo $price_html; ?></span>

		<?php 
			if(count($sizes) > 1):
				echo '<span class="small size-after-price">'.count($sizes).' sizes</span>';
			endif;
		?>
	</div>
<?php endif; ?>
