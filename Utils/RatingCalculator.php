<?php

defined('ABSPATH') || exit;

class RF_RatingCalculator
{

    public static function get_summary($post_id)
    {

        $reviews = get_posts([
            'post_type' => 'rf_review',
            'meta_query' => [
                [
                    'key' => 'post_id',
                    'value' => $post_id
                ]
            ],
            'post_status' => 'publish',
            'numberposts' => -1
        ]);

        $total = count($reviews);
        if (!$total) return [];

        $sum = 0;
        $breakdown = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

        foreach ($reviews as $r) {
            $rating = (int)get_post_meta($r->ID, 'rating', true);
            $sum += $rating;
            $breakdown[$rating]++;
        }

        return [
            'average' => round($sum / $total, 1),
            'total' => $total,
            'breakdown' => $breakdown
        ];
    }
}
