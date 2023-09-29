<?php
// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 300, 300, true );      // Normal post thumbnails
		
add_image_size( 'smk_fn_thumb-1000-1000', 1000, 1000, true);		// Portfolio Categories
add_image_size( 'smk_fn_thumb-1000-9999', 1000, 9999, false);		// Portfolio Page
add_image_size( 'smk_fn_thumb-300-300', 300, 300, true);			// Clients, Commentary


add_action( 'after_setup_theme', 'smk_setup', 50 );

function smk_setup(){
    add_action( 'admin_enqueue_scripts', 'smk_admin_scripts' );
    add_action( 'wp_enqueue_scripts', 'smk_scripts' );
    add_action('wp_enqueue_scripts', 'smk_styles');

    // CONSTANT
    $my_theme 		= wp_get_theme( 'smk' );
    $version		= '1.0.0';
    if ( $my_theme->exists() ){
        $version 	= (string)$my_theme->get( 'Version' );
    }
    $version		= 'ver_'.$version;
    define('SMK_VERSION', $version);
    define('SMK_THEME_URL', get_template_directory_uri());


}

// Enqueue Scripts Here
function smk_scripts() {
    wp_enqueue_script('smk-fn-jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), SMK_VERSION, TRUE);
    wp_enqueue_script('smk-fn-jsa', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), SMK_VERSION, TRUE);
    wp_enqueue_script('smk-fn-init', get_template_directory_uri() . '/assets/js/init.js', array('jquery'), SMK_VERSION, TRUE);

    wp_enqueue_script('smk-fn-lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js', array('jquery'), SMK_VERSION, TRUE);

    wp_enqueue_script('smk-fn-lightgallery2', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/zoom/lg-zoom.min.js', array('jquery'), SMK_VERSION, TRUE);

    wp_enqueue_script('smk-fn-lightgallery3', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/thumbnail/lg-thumbnail.min.js', array('jquery'), SMK_VERSION, TRUE);

    wp_enqueue_script('smk-fn-lightgallery4', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/video/lg-video.min.js', array('jquery'), SMK_VERSION, TRUE);

    
    // wp_enqueue_script('ie8', get_template_directory_uri() . '/assets/js/ie8.js', array('jquery'), SMK_VERSION, TRUE);
    // wp_enqueue_script('modernizr-custom', get_template_directory_uri() . '/assets/js/modernizr-custom.js', array('jquery'), SMK_VERSION, FALSE);
  }


// Admin Scripts Here
function smk_admin_scripts(){


}


function smk_styles(){
    wp_enqueue_style('smk-fn-base', get_template_directory_uri().'/assets/css/base.css', array(), SMK_VERSION, 'all');
    wp_enqueue_style('smk-fn-plugins', get_template_directory_uri().'/assets/css/plugins.css', array(), SMK_VERSION, 'all');
    wp_enqueue_style('smk-fn-skeleton', get_template_directory_uri().'/assets/css/skeleton.css', array(), SMK_VERSION, 'all');
//     wp_enqueue_style('fontello', get_template_directory_uri().'/assets/css/fontello.css', array(), SMK_VERSION, 'all');
    wp_enqueue_style('smk-style', get_template_directory_uri().'/assets/css/style.css', array(), SMK_VERSION, 'all');
    wp_enqueue_style('smk-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', array(), SMK_VERSION, 'all');
    wp_enqueue_style('smk-rubik', 'https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900', array(), SMK_VERSION, 'all');
    wp_enqueue_style('smk-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i', array(), SMK_VERSION, 'all');
}

if(!function_exists('load_my_script')){
    function load_my_script() {
        global $post;
        $deps = array('jquery');
        $version= '1.0'; 
        $in_footer = true;
        wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/assets/js/my-script.js', $deps, $version, $in_footer);
        wp_localize_script('my-script', 'my_script_vars', array(
                'postID' => $post->ID
            )
        );
    }
}
add_action('wp_enqueue_scripts', 'load_my_script');


add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height' => 480,
    'width'  => 720,
) );

add_theme_support('automatic-feed-links');