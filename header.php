<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newman_Tactical
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	wp_body_open();

	if (class_exists("WooCommerce")) {
		$cart_url = WC()->cart->get_cart_url();
	}

	$items_count = WC()->cart->get_cart_contents_count();
	?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<div class="container-fluid">
				<div class="row justify-content-between align-items-center">
					<div class="col d-md-none d-sm-block d-flex align-items-center">
						<div class="menu-icon toggle-btn" data-target="mobile-menu">
							<div>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>
					<div class="col-md-2 col">
						<div class="site-branding d-none d-md-block">
							<?php
								the_custom_logo();
							?>
						</div><!-- .site-branding for desktop -->
						<div class="site-branding for-mobile d-md-none d-sm-block">
							<a href="<?php echo esc_attr(home_url()); ?>">
								<img class="d-block mx-auto"
									src="<?php echo wp_get_attachment_image_url('21', 'full'); ?>" alt="">
							</a>
						</div>
					</div>
					<div class="col-md-6 d-none d-md-block">
						<div class="d-flex align-items-center">
							<nav class="w-100">
								<ul class="header__product-categories d-flex justify-content-between text-uppercase">
									<?php

									$tax = 'product_cat';
									$terms = get_terms($tax, array(
										'orderby' 		=> 'id',
										'order' 		=> 'ASC',
										'hide_empty' 	=> 1,
									)
									);

									if (count($terms) > 0):
										foreach ($terms as $key => $term):
											?>
											<li>
												<a class="d-block" href="<?php echo esc_url(get_term_link($term)); ?>">
													<?php echo esc_html($term->name); ?>
												</a>
											</li>
										<?php
										endforeach;
									endif;

									wp_reset_postdata();
									?>
									<li>
										<a class="d-block" href="<?php echo esc_html(home_url('collections')); ?>">All collections <i class="bi bi-plus"></i></a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="col-md-2 col">
						<ul class="header__cart-search text-uppercase d-flex justify-content-between align-items-center">
							<li class="d-none d-md-block">
								<a href="#"><?php echo esc_html('Sign In'); ?></a>
							</li>
							<li class="toggle-btn align-items-center" data-target="search-panel">
								<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
									<path
										d="M781.692-136.924 530.461-388.155q-30 24.769-69 38.769t-80.692 14q-102.55 0-173.582-71.014t-71.032-173.537q0-102.524 71.014-173.601 71.014-71.076 173.538-71.076 102.523 0 173.6 71.032T625.384-580q0 42.846-14.385 81.846-14.385 39-38.385 67.846l251.231 251.231-42.153 42.153Zm-400.923-258.46q77.308 0 130.962-53.654Q565.385-502.692 565.385-580q0-77.308-53.654-130.962-53.654-53.654-130.962-53.654-77.308 0-130.962 53.654Q196.154-657.308 196.154-580q0 77.308 53.653 130.962 53.654 53.654 130.962 53.654Z" />
								</svg>
							</li>
							<li><a class="cart-contents position-relative d-flex align-items-center" href="<?php echo esc_url($cart_url); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
										width="24">
										<path
											d="M252.309-100.001q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h77.692v-10q0-62.154 43.923-106.077Q417.846-859.999 480-859.999q62.154 0 106.076 43.923 43.923 43.923 43.923 106.077v10h77.692q30.308 0 51.308 21t21 51.308v455.382q0 30.308-21 51.308t-51.308 21H252.309Zm0-59.999h455.382q4.616 0 8.463-3.846 3.846-3.847 3.846-8.463v-455.382q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846h-77.692v90.001q0 12.769-8.615 21.384T600-520q-12.769 0-21.384-8.615t-8.615-21.384V-640H389.999v90.001q0 12.769-8.615 21.384T360-520q-12.769 0-21.384-8.615t-8.615-21.384V-640h-77.692q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846Zm137.69-539.999h180.002v-10q0-37.616-26.193-63.808Q517.616-800 480-800t-63.808 26.193q-26.193 26.192-26.193 63.808v10ZM240-160V-640-160Z" />
									</svg>
									<span class="theme-small text-white">
										<?php echo $items_count ? $items_count : '0'; ?>
									</span>
								</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
		<div class="announcement-div small text-center text-white">
			<span class="d-block"><?php echo esc_html('Call Us: +254797411971'); ?></span>
		</div>

		<?php
		get_template_part('template-parts/content', 'menu-panel'); // mobile menu panel
		get_template_part('template-parts/content', 'search-panel'); // search menu panel

		if(is_page('home')){
			get_template_part('template-parts/content', 'newsletter-modal'); // show modal only on the homepage
		}
		?>