<?php
/*
 * Template Name: Backend Settings Blank
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
			<div class="app-settings-menu-overlay"></div>
			<div class="app-settings-menu">
				<?php
				$pluginname = basename(get_permalink());
				$get_all_menu = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "front_end_menu WHERE is_active = 1 AND front_display = 0  AND plugin_name = '" . $pluginname . "'");
				if (count($get_all_menu) > 0) {
					$result = '<ul>';
					foreach ($get_all_menu as $menu) {
						$result .= '<li><a href="javascript:;" id=' . $menu->menu_slug . ' onclick="show_page_for_backend(\'' . $menu->menu_url . '\',\'' . $menu->menu_callback . '\' )" >' . __( $menu->menu_name ) .'</a></li>';
					}
					$result .= '</ul>';
					echo $result;
				}
				?>
			</div><!-- .entry-content -->
			<div class="menu-icon"></div>
			<div id="innerpage_content"></div>
		</article><!-- #post-## -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
