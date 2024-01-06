<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newman_Tactical
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 offset-3">
					<a href="<?php echo esc_attr(home_url()); ?>">
						<img class="d-block mx-auto" src="<?php echo wp_get_attachment_image_url('21', 'full'); ?>" alt="">
					</a>
					<nav>
						<?php
							wp_nav_menu(array(
								'theme_location' 	=> 'menu-2', 
								'menu_class'		=> 'd-flex justify-content-center flex-wrap text-uppercase'
							));
						?>
					</nav>
					<ul class="social-icons d-flex justify-content-between mx-auto">
						<li><a href="https://web.facebook.com/NewmanTactical"><img src="<?php echo get_template_directory_uri(); ?>/icons/facebook.png" alt=""></a></li>
						<li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/icons/twitter.png" alt=""></a></li>
						<li><a href="https://www.instagram.com/newmantactical/"><img src="<?php echo get_template_directory_uri(); ?>/icons/instagram.png" alt=""></a></li>
						<li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/icons/tik-tok.png" alt=""></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="copyright-footer small">
		<div class="container-fluid">
			<div class="row justify-content-between">
				<div class="col">
					<span>&copy; <?php echo date('Y'); ?> Newman Tacticals. All rights reserved.</span>
				</div>
				<div class="col-3">
					<?php
						wp_nav_menu(array(
							'theme_location'=> 'menu-3', 
							'menu_id'		=> 'policies-menu',
							'menu_class'	=> 'd-flex text-capitalize small justify-content-center justify-content-between text-dark'
						));
					?>
				</div>
				<div class="col text-end">
					<span>Built by <a class="theme-color" target="_blank" href="https://edgarwanjala.co.ke">Edgar</a></span>
				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
