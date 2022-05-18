<?php

/**
 * Plugin Name: Epicgym Workouts Plugin
 * Author: Lovro Pavicic
 * Description: Workouts and plans management plugin
 * Version: 1.0
 */

/* Workout Custom Post Type
   ref: https://www.cloudways.com/blog/how-to-create-custom-post-types-in-wordpress/
*/

function my_custom_post_workout() {
    // define labels
    $labels = array(
        'name'               => _x( 'Workouts', 'post type general name' ),
        'singular_name'      => _x( 'Workout', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'workout' ),
        'add_new_item'       => __( 'Add New Workout' ),
        'edit_item'          => __( 'Edit Workout' ),
        'new_item'           => __( 'New Workout' ),
        'all_items'          => __( 'All Workouts' ),
        'view_item'          => __( 'View Workout' ),
        'search_items'       => __( 'Search Workouts' ),
        'not_found'          => __( 'No workouts found' ),
        'not_found_in_trash' => __( 'No workouts found in the Trash' ),
        'parent_item_colon'  => ’,
        'menu_name'          => 'Workouts'
    );

    // add features to custom post type
    $supports = array (
        'title',
        'editor',
        'thumbnail',
        'excerpt'
    );

    // define arguments
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our workouts and workout specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => $supports,
        'taxonomies' => array( 'category'),
        'has_archive'   => true,
        'show_in_rest' => true
    );

    // register post type
    register_post_type( 'workout', $args );
}

add_action( 'init', 'my_custom_post_workout' );


/* Workout Options Metaboxes
   ref: https://wordpress.stackexchange.com/questions/186026/add-special-meta-box-to-custom-post-type
*/

// Register Meta box "Workout Option" for custom type "workout"
add_action('add_meta_boxes_workout',function (){
    add_meta_box(
        'workouts-field',
        'Workout Options',
        'workout_custom_fields_html',
        'workout',
        'side',
        'default'
    );
});

//Meta callback function
function workout_custom_fields_html($post){
    $cs_meta_val=get_post_meta($post->ID);?>
    <p>
        <label class="components-base-control__label" for="workout_level">Difficulty</label>
        <select name="workout_level" id="workout_level">
            <option>Select difficulty level...</option>
            <option <?php if( isset( $cs_meta_val['workout_level']) && $cs_meta_val['workout_level'][0] == "beginner") echo 'selected' ?> value="beginner">Beginner</option>
            <option <?php if( isset( $cs_meta_val['workout_level']) && $cs_meta_val['workout_level'][0] == "intermediate") echo 'selected' ?> value="intermediate">Intermediate</option>
            <option <?php if( isset( $cs_meta_val['workout_level']) && $cs_meta_val['workout_level'][0] == "advanced") echo 'selected' ?> value="advanced">Advanced</option>
        </select>

<!--        <input type="text" name="workout_level" id="workout_level" value="--><?php //if( isset( $cs_meta_val['workout_level'])) echo $cs_meta_val['workout_level'][0] ?><!--">-->
    </p>
    <p>
        <label class="components-base-control__label" for="workout_duration">Duration</label>
        <input type="text" name="workout_duration" id="workout_duration" value="<?php if( isset( $cs_meta_val['workout_duration'])) echo $cs_meta_val['workout_duration'][0] ?>">
    </p>
    <p>
        <label for="workout_weekly-schedule">Weekly schedule</label>
        <input type="text" name="workout_weekly-schedule" id="workout_weekly-schedule" value="<?php if( isset( $cs_meta_val['workout_weekly-schedule'])) echo $cs_meta_val['workout_weekly-schedule'][0] ?>">
    </p>
    <p>
        <label for="workout_date">Starting date</label>
        <input type="date" name="workout_date" id="workout_date" value="<?php if( isset( $cs_meta_val['workout_date'])) echo $cs_meta_val['workout_date'][0] ?>">
    </p>
    <?php
}

//save meta value with save post hook
add_action('save_post', 'workout_save_custom_field_value');
function workout_save_custom_field_value( $post_id ){
    // check if option is posted, if not present delete it, if present save / update it
    if(isset($_POST['workout_level'])){
        update_post_meta($post_id,'workout_level', sanitize_text_field($_POST['workout_level']));
    } else {
        delete_post_meta( $post_id, 'workout_level' );
    }

    // check if option is posted, if not present delete it, if present save / update it
    if(isset($_POST['workout_duration'])){
        update_post_meta($post_id,'workout_duration', sanitize_text_field($_POST['workout_duration']));
    } else {
        delete_post_meta( $post_id, 'workout_duration' );
    }

    // check if option is posted, if not present delete it, if present save / update it
    if(isset($_POST['workout_weekly-schedule'])){
        update_post_meta($post_id,'workout_weekly-schedule', sanitize_text_field($_POST['workout_weekly-schedule']));
    } else {
        delete_post_meta( $post_id, 'workout_weekly-schedule' );
    }

    // check if option is posted, if not present delete it, if present save / update it
    if(isset($_POST['workout_date'])){
        update_post_meta($post_id,'workout_date', sanitize_text_field($_POST['workout_date']));
    } else {
        delete_post_meta( $post_id, 'workout_date' );
    }
}

// Inject custom post type in category
function my_query_post_type($query) {
    if ( is_category() && ( ! isset( $query->query_vars['suppress_filters'] ) || false == $query->query_vars['suppress_filters'] ) ) {
        $query->set( 'post_type', array( 'post', 'workout' ) );
        return $query;
    }
}
add_filter('pre_get_posts', 'my_query_post_type');