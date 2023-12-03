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
					<img class="d-block" src="<?php echo wp_get_attachment_image_url('21', 'full'); ?>" alt="">
					<nav>
						<?php
							wp_nav_menu(array(
								'menu_id' 		=> 'menu-2', 
								'menu_class'	=> 'd-flex justify-content-center flex-wrap text-capitalize'
							));
						?>
					</nav>
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
				<div class="col text-end">
					<span>Built by <a href="https://edgarwanjala.co.ke">Edgar</a></span>
				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
