<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EpicGym</title>
    <!-- First add the elements you need in <head>; then last, add: -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="page-header">
        <div class="container">
            <div id="brand"><a href="<?php bloginfo('url'); ?>"><h1><span class="warm-red">epic</span> <span class="thin">|</span> gym</h1></a></div>
            <a id="mobile-menu" href=""><img src="<?php bloginfo('stylesheet_directory');?>/svg/hamburger-menu.svg" /></a>
            <a id="mobile-menu-close" href=""><img src="<?php bloginfo('stylesheet_directory');?>/svg/hamburger-menu-close.svg" /></a>
            <?php
                wp_nav_menu( array( 
                    'theme_location' => 'top-menu', 
                    'menu_id' => 'top-nav',
                    'container' => '')); 
            ?>
            <div id="user-actions">
                <a href="/sign-in" class="btn" >Sign In</a>
            </div>
        </div>
    </header>