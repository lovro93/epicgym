<?php
/**
 * Workouts page template
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

<?php
get_header();
query_posts(array(
    'post_type' => 'workout'
));
?>

<section class="page-content">
    <div class="container">
        <h1 class="heading-spacer-center"><?php the_title();?></h1>

        <div class="workouts-wrapper">
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="workout">
                    <a href="<?php the_permalink() ?>">
                        <div class="image"><?php the_post_thumbnail();?></div>
                        <div class="desc">
                            <span class="warm-red text-uppercase text-bold text-small"><?php echo get_post_meta(get_the_ID(), 'workout_level', true)?></span>
                            <h2><?php the_title(); ?></h2>
                            <p>
                                <?php
                                echo '<span class="text-small">' . get_post_meta( get_the_ID(), 'workout_duration', true) . '</span><span class="warm-red"> | </span>';
                                echo '<span class="text-small">' . get_post_meta( get_the_ID(), 'workout_weekly-schedule', true) . '</span>';
                                ?>
                            </p>
                            <p><?php the_excerpt() ?></p>
                            <!--                    <a href="--><?php //the_permalink() ?><!--" class="btn">Read more...</a>-->
                        </div>
                    </a>
                </div>

            <?php endwhile; // end of the loop. ?>
        </div>

    </div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>





