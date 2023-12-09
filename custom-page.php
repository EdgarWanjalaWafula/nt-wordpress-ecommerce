<?php

/**
 * Template name: Newman Custom Page. 
 * 
 * This template displays content from ACF fields. All the pages that utilize this template should have custom fields setup and their file created under /pages folder. 
 * 
 * @package Newman_Tactical
 */


get_header();
global $post;
$post_slug = $post->post_name;
?>

<main data-barba="container" data-barba-namespace="<?php echo $post_slug; ?>" id="primary"
    class="site-main page-<?php echo $post_slug; ?>">
    <?php

    while (have_posts()):
        the_post();
        
        if (!is_page('home')): // Show custom page header
            get_template_part('template-parts/content', 'page-header');
        endif;
        
        get_template_part('pages/page', $post_slug);
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->
<?php
get_footer();