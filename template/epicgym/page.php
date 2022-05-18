<?php
/**
 * The page template file
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

        <?php if(have_posts()) : while(have_posts()) : the_post();?>

            <h1><?php the_title();?></h1>
            <?php the_content();?>

        <?php endwhile; endif;?>

    </div>
</section>

<?php get_footer(); ?>