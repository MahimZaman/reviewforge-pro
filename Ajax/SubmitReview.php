<?php

defined('ABSPATH') || exit;

class RF_SubmitReview
{

    public function __construct()
    {
        add_action('wp_ajax_rf_submit_review', [$this, 'handle']);
        add_action('wp_ajax_nopriv_rf_submit_review', [$this, 'handle']);
    }

    public function handle()
    {

        $post_id = intval($_POST['post_id']);
        $rating  = intval($_POST['rating']);
        $name    = sanitize_text_field($_POST['name']);
        $review  = sanitize_textarea_field($_POST['review']);

        $review_id = wp_insert_post([
            'post_type' => 'rf_review',
            'post_title' => $name,
            'post_content' => $review,
            'post_status' => 'pending'
        ]);

        update_post_meta($review_id, 'rating', $rating);
        update_post_meta($review_id, 'post_id', $post_id);

        wp_send_json_success(['message' => 'Review submitted']);
    }
}
