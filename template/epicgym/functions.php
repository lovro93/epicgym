<?php

require('inc/contact-form.php');


/**
 * Enqueue the CSS styles associated with template.
 */
//// insert style to template
//wp_enqueue_style( 'style', get_stylesheet_uri() );

function template_styles() {
    // Main template style
    wp_enqueue_style( 'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css',
        array(), '1.00', 'all' );

    wp_enqueue_style( 'styles',
        get_template_directory_uri() . '/assets/css/styles.css',
        array(), '1.00', 'all' );
    // Contact form style
    wp_enqueue_style( 'contact-form',
        get_template_directory_uri() . '/assets/css/contact-form.css',
        array(), '1.00', 'all' );
}

add_action( 'wp_enqueue_scripts', 'template_styles' );

/**
 * Enqueue the JavaScript scripts associated with template.
 */

function template_scripts() {
    wp_enqueue_script( 'fontawesome',
        'https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js',
        array(), '', false);
    wp_enqueue_script( 'template',
        get_template_directory_uri() . '/assets/js/app.js',
        array(), '', true );
    wp_enqueue_script( 'contact-form',
        get_template_directory_uri() . '/assets/js/contact-form.js',
        array(), '', true);
}



add_action( 'wp_enqueue_scripts', 'template_scripts',1 );


// insert custom menu in template
function add_custom_menus() {
    register_nav_menus(
        array(
          'top-menu'    => __('Top navigation'),
          'bottom-menu' => __('Bottom navigation')  
        )
    );
  }

add_action( 'init', 'add_custom_menus' );

// custom Excerpt Lenght
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// add featured image
add_theme_support( 'post-thumbnails' );

/*@ Change WordPress Admin Login Logo */
if ( !function_exists('tf_wp_admin_login_logo') ) :

    function tf_wp_admin_login_logo() { ?>
        <style type="text/css">
            :root {
                --warm-red: #F06A6A;
                --white: #f2f2f2;
                --grey: #3e3e3e;
                --bg-lightgrey: #e7e7e7;
                --padding: 50px;
                --padding-desktop: 80px;
                --padding-mobile: 30px;
                --margin: 2em;
                --dark: #121315;
                --dark-transparent: #121315a6;
                --gap: 20px;
            }

            body.login-action-register {

            }
            body.login div#login h1 a {
                background-image: url('<?php echo get_template_directory_uri()."/assets/svg/epic_gym.svg"; ?>');
                background-size: 160px;
                width:160px;
                height:40px;
            }
            .wp-core-ui #wp-submit {
                background: var(--warm-red);
                border-color: var(--warm-red);
                transition: background-color .5s;
            }
            .wp-core-ui #wp-submit:hover {
                background: #ce5656;
                border-color: #ce5656;
            }

        </style>
    <?php }

    add_action( 'login_enqueue_scripts', 'tf_wp_admin_login_logo',999 );

endif;