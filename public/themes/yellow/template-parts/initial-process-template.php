<?php
/*
 * Template Name: Initial Process
 */

$initial_opt = get_option('initial_process');
if ( $initial_opt != null && $initial_opt == 1 ) {
	wp_redirect(home_url());
}
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
				while ( have_posts() ) {
					the_post();
					the_content();
				}
				?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
