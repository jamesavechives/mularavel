<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vmhs
 */
/**
 * Check if user has already completed initial process
 */
if (defined('VM_DEVICE') && VM_DEVICE == "vmhotspot") {
    $initial_opt = get_option('initial_process');
    if ($initial_opt == null || $initial_opt == 0) {
        print('<script>window.location.href="initial-process"</script>');
    }
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'vmhs'),
            'after' => '</div>',
        ));
        ?>
        <?php 
            if ( is_front_page() ) {
        ?>
            <div class="padding-wrapper">
                <div id="home-page" class="hotspot-home-menu">
                    <?php
                    global $wpdb;
                    $get_all_menu = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'front_end_menu WHERE front_display = 1 AND is_active = 1');
                    ?>
                    <ul>
                        <?php foreach ($get_all_menu as $menu) { ?>
                        <li><a href="<?php echo $menu->menu_url ?>" ><?php _e( $menu->menu_name ) ?></a></li>
                        <?php } ?>
                    </ul>
                    <div style="float:left;width:100%;" id="load-menu"></div>
                </div>
                <div id="show_content" style="float: left;width:100%;"></div>
            </div>
        <?php } ?>
    </div><!-- .entry-content -->


</article><!-- #post-## -->
