<?php

/**
 * vmmc functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vmmc
 */
if (!function_exists('vmmc_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function vmmc_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on vmmc, use a find and replace
         * to change 'vmmc' to the name of your theme in all the template files.
         */
        load_theme_textdomain('vmmc', get_template_directory() . '/languages');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'vmmc'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('vmmc_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif;
add_action('after_setup_theme', 'vmmc_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vmmc_content_width() {
    $GLOBALS['content_width'] = apply_filters('vmmc_content_width', 640);
}

add_action('after_setup_theme', 'vmmc_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vmmc_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'vmmc'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'vmmc'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'vmmc_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function vmmc_scripts() {
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.12.1');
    //wp_enqueue_script('jquery-ui-touch', get_template_directory_uri() . '/js/jquery.ui.touch-punch.min.js', array('jquery', 'jquery-ui'), '1.0');
    wp_enqueue_script('vmmc-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.12.1', true);
    wp_localize_script('vmmc-custom', 'siteData', array('site_url' => get_site_url()));
    wp_enqueue_style('jquery-ui-smoothness', get_template_directory_uri() . '/css/jquery-ui.min.css', '1.12.1', 'all');
    wp_enqueue_style('vmmc-style', get_stylesheet_uri(), '1.0');
    wp_localize_script('vmmc-custom', 'vmmc_admin_url', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_enqueue_script('vmmc-hammer', get_template_directory_uri() . '/js/hammer.min.js', array(), '2.0.8', true);
    wp_enqueue_script('vmmc-hammer-time', get_template_directory_uri() . '/js/hammer-time.min.js', array('vmmc-hammer'), '1.1.0', true);
    wp_enqueue_script('vmmc-hammer-jquery', get_template_directory_uri() . '/js/jquery.hammer.js', array('vmmc-hammer'), '1.0', true);

    wp_enqueue_style('vmmc-custom-temp', get_template_directory_uri() . '/css/custom.css', '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'vmmc_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load custom menu added from plugin
 */
function has_children($rows, $id) {
    foreach ($rows as $row) {
        if ($row->parent_menu_id == $id)
            return true;
    }
    return false;
}

function build_menu($rows, $parent = 0) {
    $result = "<ul>";
    foreach ($rows as $row) {
        if ($row->parent_menu_id == $parent) {
            $result.= "<a class='test' data-mk=" . $row->menu_url . " href=" . $row->menu_url . "><li>" . $row->menu_name;
            if (has_children($rows, $row->id))
                $result.= build_menu($rows, $row->id);
            $result.= "</a></li>";
        }
    }
    $result.='<li><a href="menu-1" data-test123="menu-test123" class="test123">TEST123</a></li>';
    $result.= "</ul>";
    return $result;
}

function show_page_content() {
    global $wpdb;
    $page_name = $_POST['page_name'];
    if ($page_name == "about") {
        $get_page_content = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'front_end_menu');
        //print_r($get_page_content);exit;
        wp_send_json($result);
    }
}

add_action('wp_ajax_show_page_content', 'show_page_content');
add_action('wp_ajax_nopriv_show_page_content', 'show_page_content');

/**
 * Disable black admin header for all users
 */
show_admin_bar(false);

/**
 * Remove WP DNS PREFETCH
 */
function remove_dns_prefetch($hints, $relation_type) {
    if ('dns-prefetch' === $relation_type) {
        return array_diff(wp_dependencies_unique_hosts(), $hints);
    }

    return $hints;
}

add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);

// Cleaning header
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
