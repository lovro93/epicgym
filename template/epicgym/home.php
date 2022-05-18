<?php
/**
 * The frontpage template file
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

<section id="intro">
        <div id="slides">
            <div class="slide fade">
                <img src="<?php bloginfo('stylesheet_directory');?>/assets/images/slide-1.jpg" alt="slide-1-image">
                <div class="content">
                    <div class="container">
                        <div class="content-wrapper">
                            <h1>One<span class="warm-red">-</span>on<span class="warm-red">-</span>one virtual training</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Quis eu imperdiet id pellentesque posuere vivamus
                                pellentesque est consectetu.</p>
                            <a class="btn btn-slider" href="/wp-login.php?action=register">Sign up for free</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="slide fade">
                <img src="<?php bloginfo('stylesheet_directory');?>/assets/images/slide-2.jpg" alt="slide-2-image">
                <div class="content">
                    <div class="container">
                        <div class="content-wrapper">
                            <h1>Suitable for <span class="warm-red">all levels</span> of training</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Quis eu imperdiet id pellentesque posuere vivamus
                                pellentesque est consectetu.</p>
                            <a class="btn btn-slider" href="/wp-login.php?action=register">Sign up for free</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide fade">
                <img src="<?php bloginfo('stylesheet_directory');?>/assets/images/slide-3.jpg" alt="slide-2-image">
                <div class="content">
                    <div class="container">
                        <div class="content-wrapper">
                            <h1>Reach your <span class="warm-red">goals</span> starting today</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Quis eu imperdiet id pellentesque posuere vivamus
                                pellentesque est consectetu.</p>
                            <a class="btn btn-slider" href="/wp-login.php?action=register">Sign up for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <ul id="dots" class="slide-navigation">

        </ul>
        </div>
    </section>
    <section id="programs">
        <div class="container">
            <div class="title">
                <h1>Training types</h1>
            </div>
            <div id="program-cards">
                    <?php query_posts(array(
                                'post_type' => 'workout',
                                'posts_per_page' => 3
                            )); ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                        $categories = get_the_category();
                        ?>
                     <a href="<?php the_permalink() ?>">
                        <div class="card">
                            <?php the_post_thumbnail();?>
                            <div class="header">
                                <h3><?php echo $categories[0]->name ?></h3>
                                <p><?php echo get_post_meta(get_the_ID(), 'workout_weekly-schedule', true) ?></p>
                            </div>
                        </div>
                     </a>

                    <?php endwhile; // end of the loop. ?>

            </div>
        </div>
    </section>
    <section id="signup">
        <div class="container">
            <div id="call-for-action">
                <h1>Try for free</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Quis eu imperdiet id pellentesque posuere vivamus pellentesque est.</p>
                <a class="btn btn-slider" href="/wp-login.php?action=register">Sign up for free</a>
            </div>
        </div>
    </section>
    <section id="gallery">
        <div class="image"><img src="<?php bloginfo('stylesheet_directory');?>/assets/images/topless-man-holding-chain-in-grayscale-photography.jpg" alt=""></div>
        <div class="image"><img src="<?php bloginfo('stylesheet_directory');?>/assets/images/grayscale-photo-of-man-carrying-barbell.jpg" alt=""></div>
        <div class="image"><img src="<?php bloginfo('stylesheet_directory');?>/assets/images/grayscale-photo-of-man-lifting-barbell.jpg" alt=""></div>
        <div class="image"><img src="<?php bloginfo('stylesheet_directory');?>/assets/images/person-holding-barbell-plate.jpg" alt=""></div>
    </section>
    <section id="skill-levels">
        <div class="container">
            <div class="title">
                <h1>Choose your skill level</h1>
            </div>
            <div class="skill-level-cards">
                <div class="card">
                    <div class="icon">
                        <img src="<?php bloginfo('stylesheet_directory');?>/assets/svg/icon_beginner.svg" alt="" srcset="">
                        <div class="badge">3x</div>
                    </div>
                    <div class="header">
                        <h3>Beginner</h3>
                        <p>Quis eu imperdiet id pellentesque posuere vivamus pellentesque est.</p>
                        <a class="btn" href="/wp-login.php?action=register">Sign up for free</a>
                    </div>


                </div>
                <div class="card">
                    <div class="icon">
                        <img src="<?php bloginfo('stylesheet_directory');?>/assets/svg/icon_intermediate.svg" alt="" srcset="">
                        <div class="badge">4x</div>
                    </div>
                    <div class="header">
                        <h3>Intermediate</h3>
                        <p>Quis eu imperdiet id pellentesque posuere vivamus pellentesque est.</p>
                        <a class="btn" href="/wp-login.php?action=register">Sign up for free</a>
                    </div>

                </div>
                <div class="card">
                    <div class="icon">
                        <img src="<?php bloginfo('stylesheet_directory');?>/assets/svg/icon_advanced.svg" alt="" srcset="">
                        <div class="badge">5x</div>
                    </div>
                    <div class="header">
                        <h3>Advanced</h3>
                        <p>Quis eu imperdiet id pellentesque posuere vivamus pellentesque est.</p>
                        <a class="btn" href="/wp-login.php?action=register">Sign up for free</a>
                    </div>

                </div>
            </div>
        </div>

    </section>

<?php get_footer(); ?>
