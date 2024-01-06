<?php
/**
 * Page for displaying About Us page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newman_Tactical
 */

?>

<div class="theme-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'newman-tactical' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newman-tactical' ),
				'after'  => '</div>',
			)
		);
		?>
            </div>
        </div>
    </div>
</div>

