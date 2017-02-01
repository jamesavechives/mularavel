<?php
/*
 * Template Name: Blank
 */

while (have_posts()) : the_post();
	the_content();
endwhile;
?>

<?php wp_footer(); ?>
