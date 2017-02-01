<?php
/*
  Template Name: VMMC Settings Full Width
 */
global $current_user;
if (( defined('VM_DEVICE') && VM_DEVICE == "vmhotspot" && !is_user_logged_in()) || !user_can($current_user, 'siteadmin')) {
    wp_redirect(home_url());
}
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- <a href="javascript:history.back()">Back</a> -->
            <!-- <div class="entry-content"> -->
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile; // End of the loop.
            ?>
        </article><!-- #post-## -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
