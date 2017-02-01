<?php
/*
 * Template Name: Backend Left Menu Blank
 */
global $current_user;
if ( ( defined( 'VM_DEVICE' ) && VM_DEVICE == 'vmhotspot' && ! is_user_logged_in() )
	|| ( is_multisite() && ! user_can( $current_user, 'siteadmin' ) ) ) {
	wp_redirect( home_url() );
}

require 'left-menu-blank.php';
