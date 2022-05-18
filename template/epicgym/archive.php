<?php
/**
 * Archive page template
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
        <h1 class="heading-spacer-center"><?php the_category();?></h1>

        <div class="workouts-wrapper">
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="workout">
                    <a href="<?php the_permalink() ?>">
                        <div class="image"><?php the_post_thumbnail();?></div>
                        <div class="desc">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt() ?></p>
                        </div>
                    </a>
                </div>

            <?php endwhile; // end of the loop. ?>
        </div>

    </div><!-- #content -->
</section><!-- #primary -->


<?php get_footer(); ?>
