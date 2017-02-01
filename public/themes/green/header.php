<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vmmc
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">

            <header id="masthead" class="site-header" role="banner">
                <div class="header-logo">
                    <?php if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/images/logo-vm.png'; ?>" width="" height=""/></a>
                    <?php
                    endif;
                    ?>
                </div><!-- .site-branding -->

                <div class="header-newsfeed">
                    <?php
                    do_action("show_info", "get_info");
                    ?>
                </div><!--#Display News Feed -->

                <div class="header-status">
                    <?php do_action("show_status", "get_status"); ?>

                    <span class="home_time"><div id="clock"></div></span>
                    <span class=""><img src="<?php echo get_template_directory_uri() . '/images/wifi-icon.png'; ?>" /></span>
                    <span class=""><?php echo date('F, d Y') ?></span>

                </div><!--#Display Status-->

                <div class="header-login">
                    <?php if (defined('VM_DEVICE') && VM_DEVICE == "vmhotspot") { ?>
                    <?php if (is_user_logged_in()) { ?>
                        
                            <a class="admin" href="admin-dashboard"><img src="<?php echo get_template_directory_uri() . '/images/admin-icon.png'; ?>"></a>
                        
                        <a class="logout" href="<?php echo wp_logout_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri() . '/images/login-icon.png'; ?>"></a>
                    <?php } else { ?>
                        <a class="login" href="login" ><img src="<?php echo get_template_directory_uri() . '/images/login-icon.png'; ?>"></a>    
                    <?php } ?>
                    <?php } ?>
                </div>
            </header><!-- #masthead -->

            <div id="content" class="site-content">