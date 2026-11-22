<?php

defined('ABSPATH') || exit;

class RF_ReviewListWidget extends Widget_Base
{

    public function get_name()
    {
        return 'rf_list';
    }
    public function get_title()
    {
        return 'Review List';
    }

    protected function render()
    {

        $post_id = get_the_ID();

        $reviews = get_posts([
            'post_type' => 'rf_review',
            'meta_key' => 'post_id',
            'meta_value' => $post_id,
            'post_status' => 'publish'
        ]);

        foreach ($reviews as $r) {

            $rating = get_post_meta($r->ID, 'rating', true);

            echo "<div class='rf-review'>";
            echo "<strong>{$r->post_title}</strong>";
            echo "<div>$rating ⭐</div>";
            echo "<p>{$r->post_content}</p>";
            echo "</div>";
        }
    }
}
