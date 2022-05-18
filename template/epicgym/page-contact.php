<?php
/**
 * Contact page template
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

<?php

    // ref: https://daext.com/blog/create-a-contact-form-in-wordpress-without-a-plugin/

    $validation_messages = [];
    $success_message = '';

    // Check if form is posted, if form is posted proceed
    if ( isset( $_POST['contact_form'] ) ) {

        //Sanitize the data
        $full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
        $email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

        //Validate the data
        if ( strlen( $full_name ) === 0 ) {
        $validation_messages[] = esc_html__( 'Please enter a valid name.', 'epicgym' );
        }

        if ( strlen( $email ) === 0 or
        ! is_email( $email ) ) {
        $validation_messages[] = esc_html__( 'Please enter a valid email address.', 'epicgym' );
        }

        if ( strlen( $message ) === 0 ) {
        $validation_messages[] = esc_html__( 'Please enter a valid message.', 'epicgym' );
        }

        //Send an email to the WordPress administrator if there are no validation errors
        if ( empty( $validation_messages ) ) {

        $mail    = get_option( 'admin_email' );
        $subject = 'New message from ' . $full_name;
        $message = $message . ' - The email address of the customer is: ' . $mail;

        wp_mail( $mail, $subject, $message );

        $success_message = esc_html__( 'Your message has been successfully sent.', 'epicgym' );

        }

    }?>




<section class="page-content">
    <div class="container">
        <div class="site-info">
            <?php if(have_posts()) : while(have_posts()) : the_post();?>

                <h1 class="heading-spacer"><?php the_title();?></h1>
                <?php the_content();?>

            <?php endwhile; endif;?>
        </div>
        <div class="web-contact">
            <?php
            //Display the validation errors
            if (!empty($validation_messages)) {
                foreach ($validation_messages as $validation_message) {
                    echo '<div class="validation-message">' . esc_html($validation_message) . '</div>';
                }
            }

            //Display the success message
            if (strlen($success_message) > 0) {
                echo '<div class="success-message">' . esc_html($success_message) . '</div>';
            }

            ?>

            <!-- Echo a container used that will be used for the JavaScript validation -->

            <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>"
                  method="post">

                <input type="hidden" name="contact_form">

                <div class="form-section">
                    <label for="full-name"><?php echo esc_html( 'Full Name', 'epicgym' ); ?></label>
                    <input type="text" id="full-name" name="full_name">
                </div>

                <div class="form-section">
                    <label for="email"><?php echo esc_html( 'Email', 'epicgym' ); ?></label>
                    <input type="text" id="email" name="email">
                </div>

                <div class="form-section">
                    <label for="message"><?php echo esc_html( 'Message', 'epicgym' ); ?></label>
                    <textarea id="message" row="5" name="message"></textarea>
                </div>

                <input type="submit" class="btn" id="contact-form-submit" value="<?php echo esc_attr( 'Submit', 'epicgym' ); ?>">

            </form>

            <div id="validation-messages-container"></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>