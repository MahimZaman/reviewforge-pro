<?php

defined('ABSPATH') || exit;

class RF_PostTypes
{

    public function __construct()
    {
        add_action('init', [$this, 'register_review_cpt']);
    }

    public function register_review_cpt()
    {
        register_post_type('rf_review', [
            'label' => 'Reviews',
            'public' => false,
            'show_ui' => true,
            'supports' => ['title', 'editor'],
        ]);
    }
}
