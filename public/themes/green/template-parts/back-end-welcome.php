<?php
/*
 * Template Name: Backend Welcome
 */
global $current_user;
if ( ( defined( 'VM_DEVICE' ) && VM_DEVICE == 'vmhotspot' && ! is_user_logged_in() )
	|| ( is_multisite() && ! user_can( $current_user, 'siteadmin' ) ) ) {
	wp_redirect( home_url() );
}

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php //the_title('<h1 class="entry-title">', '</h1>'); ?>

			<div class="entry-content">
				<div class="app-menu-wrapper">
					<div class="app-menu-container">
						<div class="app-menu app-slide-1 slide-show">
							<?php
							the_content();
							/**
							 * Get icons with URL of active plugins
							 */
							global $wpdb;
							$get_page_content = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'dashboard_icon');
							if (count($get_page_content) > 0) {
								?>
								<div class="app-card">
									<?php
									foreach ($get_page_content as $plugin_detail) {
										if ($plugin_detail->plugin_cat == "none") {
											?>
											<a href="<?php echo $plugin_detail->plugin_url ?>">
												<img src="<?php echo plugins_url($plugin_detail->plugin_url) . '/images/plugin-icon.png'; ?>" />
												<span class="app-name"><?php echo $plugin_detail->plugin_name ?></span>
											</a> 
										<?php
										}
									}
									?>
									<div id="content_box" class="modal" style="display:none">
                                        <?php
                                        foreach ($get_page_content as $plugin_detail) {

                                            if ($plugin_detail->plugin_cat == "content") {
                                                ?>
                                                <div class="modal-content">
                                                    <a href="<?php echo $plugin_detail->plugin_url ?>">
                                                        <img src="<?php echo plugins_url($plugin_detail->plugin_url) . '/images/plugin-icon.png'; ?>" />
                                                        <span class="app-name"><?php echo $plugin_detail->plugin_name ?></span>
                                                    </a> 
                                                </div>


                                          <?php } 
                                        }
                                        ?>
                                        <input type="submit" id="close_popup" class="btn btn-50 btn-default" value="<?php echo __('Close') ?>" >
                                    </div>
                                    <div id="target_box" class="modal" style="display:none">
                                         <?php
                                        foreach ($get_page_content as $plugin_detail) {
                                            if ($plugin_detail->plugin_cat == "target") { ?>
                                                <div class="modal-content">
                                                    <a href="<?php echo $plugin_detail->plugin_url ?>">
                                                        <img src="<?php echo plugins_url($plugin_detail->plugin_url) . '/images/plugin-icon.png'; ?>" />
                                                        <span class="app-name"><?php echo $plugin_detail->plugin_name ?></span>
                                                    </a> 
                                                </div>


                                            <?php
                                            }
                                        }
                                        ?>
                                        <input type="submit" id="close_popup" class="btn btn-50 btn-default" value="<?php echo __('Close') ?>" >
                                    </div>
                                    <?php } ?>
                                <a href="javascript:;" id="show_content_box">
                                    <img src="<?php echo get_template_directory_uri() .'/images/content.jpg' ?>" />
                                    <span class="app-name">Content</span>
                                </a> 
                                <a href="javascript:;" id="show_target_box">
                                    <img src="<?php echo get_template_directory_uri() .'/images/target.jpg' ?>" />
                                    <span class="app-name">Target</span>
                                </a>

                            </div>

                        </div>
                    </div>
                </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- #main -->
</div><!-- #primary -->
<?php
//get_sidebar();
get_footer();
