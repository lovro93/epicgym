<?php
/**
 * The 404 template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage EpicGym
 * @since EpicGym 1.0
 */
?>

<?php get_header(); ?> 

<section class="page-content">
    <div class="container">

    <h1>404</h1>
    <a href="/">Back to home</a>

    </div>
</section>

<?php get_footer(); ?>