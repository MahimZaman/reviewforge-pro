<?php

defined('ABSPATH') || exit;

class RF_Meta
{

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta']);
    }

    public function add_meta_boxes()
    {
        add_meta_box('rf_review_meta', 'Review Details', [$this, 'render'], 'rf_review');
    }

    public function render($post)
    {
        $rating = get_post_meta($post->ID, 'rating', true);
        $post_id = get_post_meta($post->ID, 'post_id', true);

        echo "<label>Rating:</label>";
        echo "<input type='number' name='rating' value='$rating' min='1' max='5' />";

        echo "<br><label>Post ID:</label>";
        echo "<input type='number' name='post_id' value='$post_id' />";
    }

    public function save_meta($post_id)
    {
        if (isset($_POST['rating'])) {
            update_post_meta($post_id, 'rating', $_POST['rating']);
        }

        if (isset($_POST['post_id'])) {
            update_post_meta($post_id, 'post_id', $_POST['post_id']);
        }
    }
}
