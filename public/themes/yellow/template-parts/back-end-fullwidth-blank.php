<?php
/*
 * Template Name: Backend Fullwidth Blank
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
			<?php
			while ( have_posts() ) {
				the_post();
				the_content();
			}
			?>
		</article><!-- #post-## -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
