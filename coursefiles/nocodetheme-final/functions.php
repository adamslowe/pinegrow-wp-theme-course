<?php
$pinegrow_run_code = true;

/* Begin - Prevent broken project from crashing the Pinegrow editor */
if(defined('DOING_AJAX') && DOING_AJAX && !empty($_REQUEST['action']) && strpos($_REQUEST['action'], 'pinegrow_api') === 0) {
    $pinegrow_run_code = false; //do not run during Pinegrow API calls
}
if(strpos($_SERVER['REQUEST_URI'], '/wp-admin/admin.php?page=pinegrow-projects') === 0 || strpos($_SERVER['REQUEST_URI'], '/wp-login') === 0 || (strpos($_SERVER['REQUEST_URI'], '/wp-admin/plugins.php') === 0 && strpos($_SERVER['REQUEST_URI'], '/wp-admin/plugins.php?action=activate') === false)) {
    //do not load when editor is loading, during login and plugin manipulation in admin, except when plugin is being activated
    $pinegrow_run_code = false;
}
if( $pinegrow_run_code ) :

/* End - Prevent broken project from crashing the Pinegrow editor */            
?><?php
if ( ! function_exists( 'nocodetheme_setup' ) ) :

function nocodetheme_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'nocodetheme', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    //Support custom logo
    add_theme_support( 'custom-logo' );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'nocodetheme' ),
        'social'  => __( 'Social Links Menu', 'nocodetheme' ),
    ) );

/*
     * Register custom menu locations
     */
    /* Pinegrow generated Register Menus Begin */

    /* Pinegrow generated Register Menus End */
    
/*
    * Set image sizes
     */
    /* Pinegrow generated Image sizes Begin */

    /* Pinegrow generated Image sizes End */
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    /*
     * Enable support for Page excerpts.
     */
     add_post_type_support( 'page', 'excerpt' );
}
endif; // nocodetheme_setup

add_action( 'after_setup_theme', 'nocodetheme_setup' );


if ( ! function_exists( 'nocodetheme_init' ) ) :

function nocodetheme_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    register_post_type('contact_form', array(
        'labels' => 
            array(
                'name' => __( 'Contact Form Entries', 'nocodetheme' ),
                'singular_name' => __( 'Contact Form Entry', 'nocodetheme' )
            ),
        'public' => false,
        'supports' => array( 'title', 'editor', 'author' ),
        'show_in_rest' => false,
        'show_ui' => true,
        'show_in_menu' => true
    ));

    register_post_type('employees', array(
        'labels' => 
            array(
                'name' => __( 'Employees', 'nocodetheme' ),
                'singular_name' => __( 'Employee', 'nocodetheme' )
            ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        'has_archive' => true,
        'show_in_rest' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-businessperson',
        'menu_position' => 20
    ));

    /* Pinegrow generated Custom Post Types End */
    
    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    register_taxonomy('departments', 'employees', array(
        'labels' => 
            array(
                'name' => __( 'Departments', 'nocodetheme' ),
                'singular_name' => __( 'Department', 'nocodetheme' )
            ),
        'show_in_rest' => true,
        'hierarchical' => true
    ));

    /* Pinegrow generated Taxonomies End */

}
endif; // nocodetheme_setup

add_action( 'init', 'nocodetheme_init' );


if ( ! function_exists( 'nocodetheme_custom_image_sizes_names' ) ) :

function nocodetheme_custom_image_sizes_names( $sizes ) {

    /*
     * Add names of custom image sizes.
     */
    /* Pinegrow generated Image Sizes Names Begin*/
    /* This code will be replaced by returning names of custom image sizes. */
    /* Pinegrow generated Image Sizes Names End */
    return $sizes;
}
add_action( 'image_size_names_choose', 'nocodetheme_custom_image_sizes_names' );
endif;// nocodetheme_custom_image_sizes_names



if ( ! function_exists( 'nocodetheme_widgets_init' ) ) :

function nocodetheme_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    register_sidebar( array(
        'name' => __( 'Company Information', 'nocodetheme' ),
        'id' => 'company-information',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'nocodetheme_widgets_init' );
endif;// nocodetheme_widgets_init



if ( ! function_exists( 'nocodetheme_customize_register' ) ) :

function nocodetheme_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    $wp_customize->add_section( 'social_links', array(
        'title' => __( 'Social Links', 'nocodetheme' )
    ));

    $wp_customize->add_section( 'company_information', array(
        'title' => __( 'Company Information', 'nocodetheme' )
    ));
    $pgwp_sanitize = function_exists('pgwp_sanitize_placeholder') ? 'pgwp_sanitize_placeholder' : null;

    $wp_customize->add_setting( 'facebook_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'facebook_link', array(
        'label' => __( 'Facebook', 'nocodetheme' ),
        'type' => 'url',
        'section' => 'social_links'
    ));

    $wp_customize->add_setting( 'twitter_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'twitter_link', array(
        'label' => __( 'Twitter', 'nocodetheme' ),
        'type' => 'url',
        'section' => 'social_links'
    ));

    $wp_customize->add_setting( 'instagram_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'instagram_link', array(
        'label' => __( 'Instagram', 'nocodetheme' ),
        'type' => 'url',
        'section' => 'social_links'
    ));

    $wp_customize->add_setting( 'youtube_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'youtube_link', array(
        'label' => __( 'YouTube', 'nocodetheme' ),
        'type' => 'url',
        'section' => 'social_links'
    ));

    $wp_customize->add_setting( 'linkedin_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'linkedin_link', array(
        'label' => __( 'LinkedIn', 'nocodetheme' ),
        'type' => 'url',
        'section' => 'social_links'
    ));

    $wp_customize->add_setting( 'tiktioc_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'tiktioc_link', array(
        'label' => __( 'TikToc', 'nocodetheme' ),
        'type' => 'url',
        'section' => 'social_links'
    ));

    $wp_customize->add_setting( 'contact_info', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'contact_info', array(
        'label' => __( 'Contact Information', 'nocodetheme' ),
        'type' => 'textarea',
        'section' => 'company_information'
    ));

    $wp_customize->add_setting( 'logo_light', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_light', array(
        'label' => __( 'Light Logo', 'nocodetheme' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'title_tagline'
    ) ) );

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'nocodetheme_customize_register' );
endif;// nocodetheme_customize_register


if ( ! function_exists( 'nocodetheme_enqueue_scripts' ) ) :
    function nocodetheme_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_register_script( 'inline-script-1', '', [], '0.0.268', false );
    wp_enqueue_script( 'inline-script-1' );
    wp_add_inline_script( 'inline-script-1', '/* Pinegrow Interactions, do not remove */ (function(){try{if(!document.documentElement.hasAttribute(\'data-pg-ia-disabled\')) { window.pgia_small_mq=typeof pgia_small_mq==\'string\'?pgia_small_mq:\'(max-width:767px)\';window.pgia_large_mq=typeof pgia_large_mq==\'string\'?pgia_large_mq:\'(min-width:768px)\';var style = document.createElement(\'style\');var pgcss=\'html:not(.pg-ia-no-preview) [data-pg-ia-hide=""] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show=""] {opacity:1;visibility:visible;display:block;}\';if(document.documentElement.hasAttribute(\'data-pg-id\') && document.documentElement.hasAttribute(\'data-pg-mobile\')) {pgia_small_mq=\'(min-width:0)\';pgia_large_mq=\'(min-width:99999px)\'} pgcss+=\'@media \' + pgia_small_mq + \'{ html:not(.pg-ia-no-preview) [data-pg-ia-hide="mobile"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="mobile"] {opacity:1;visibility:visible;display:block;}}\';pgcss+=\'@media \' + pgia_large_mq + \'{html:not(.pg-ia-no-preview) [data-pg-ia-hide="desktop"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="desktop"] {opacity:1;visibility:visible;display:block;}}\';style.innerHTML=pgcss;document.querySelector(\'head\').appendChild(style);}}catch(e){console&&console.log(e);}})()');

    wp_deregister_script( 'nocodetheme-pgia' );
    wp_enqueue_script( 'nocodetheme-pgia', get_template_directory_uri() . '/pgia/lib/pgia.js', [], '0.0.268', true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'nocodetheme-theme' );
    wp_enqueue_style( 'nocodetheme-theme', get_template_directory_uri() . '/css/theme.css', [], '0.0.268', 'all');

    wp_deregister_style( 'nocodetheme-style' );
    wp_enqueue_style( 'nocodetheme-style', get_template_directory_uri() . '/css/style.css', [], '0.0.268', 'all');

    wp_deregister_style( 'nocodetheme-style-1' );
    wp_enqueue_style( 'nocodetheme-style-1', get_bloginfo('stylesheet_url'), [], '0.0.268', 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'nocodetheme_enqueue_scripts' );
endif;

function pgwp_sanitize_placeholder($input) { return $input; }
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/custom.php";
if( !class_exists( 'PG_Helper_v2' ) ) { require_once "inc/wp_pg_helpers.php"; }
if( !class_exists( 'PG_Blocks' ) ) { require_once "inc/wp_pg_blocks_helpers.php"; }
if( !class_exists( 'PG_Pagination' ) ) { require_once "inc/wp_pg_pagination.php"; }
if( !class_exists( 'PG_Simple_Form_Mailer' ) ) { require_once "inc/wp_simple_form_mailer.php"; }
if( !class_exists( 'PG_Smart_Walker_Nav_Menu' ) ) { require_once "inc/wp_smart_navwalker.php"; }

    /* Pinegrow generated Include Resources End */

/* Creating Editor Blocks with Pinegrow */

if ( ! function_exists('nocodetheme_blocks_init') ) :
function nocodetheme_blocks_init() {
    // Register blocks. Don't edit anything between the following comments.
    /* Pinegrow generated Register Pinegrow Blocks Begin */
    require_once 'blocks/employee-grid/employee-grid_register.php';
    require_once 'blocks/contact-form/contact-form_register.php';

    /* Pinegrow generated Register Pinegrow Blocks End */
}
add_action('init', 'nocodetheme_blocks_init');
endif;

/* End of creating Editor Blocks with Pinegrow */


/* Register Blocks Categories */

function nocodetheme_register_blocks_categories( $categories ) {

    // Don't edit anything between the following comments.
    /* Pinegrow generated Register Blocks Category Begin */

$categories = array_merge( $categories, array( array(
        'slug' => 'custom-blocks',
        'title' => __( 'Custom Blocks', 'nocodetheme' )
    ) ) );

    /* Pinegrow generated Register Blocks Category End */
    
    return $categories;
}
add_action( version_compare('5.8', get_bloginfo('version'), '<=' ) ? 'block_categories_all' : 'block_categories', 'nocodetheme_register_blocks_categories');

/* End of registering Blocks Categories */


/* Setting up theme supports options */

function nocodetheme_setup_theme_supports() {
    // Don't edit anything between the following comments.
    /* Pinegrow generated Theme Supports Begin */
    
//Tell WP to scope loaded editor styles to the block editor                    
add_theme_support( 'editor-styles' );
    /* Pinegrow generated Theme Supports End */
}
add_action('after_setup_theme', 'nocodetheme_setup_theme_supports');

/* End of setting up theme supports options */


/* Loading editor styles for blocks */

function nocodetheme_add_blocks_editor_styles() {
// Add blocks editor styles. Don't edit anything between the following comments.
/* Pinegrow generated Load Blocks Editor Styles Begin */
    add_editor_style( 'css/theme.css' );
    add_editor_style( 'css/editor.css' );
    add_editor_style( 'css/blocks.css' );

    /* Pinegrow generated Load Blocks Editor Styles End */
}
add_action('admin_init', 'nocodetheme_add_blocks_editor_styles');

/* End of loading editor styles for blocks */

?><?php
endif; //end if ( $pinegrow_run_plugin )
