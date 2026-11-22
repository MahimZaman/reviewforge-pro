<?php

defined('ABSPATH') || exit;

class RF_ReviewSummaryWidget extends Widget_Base
{

    public function get_name()
    {
        return 'rf_summary';
    }
    public function get_title()
    {
        return 'Review Summary';
    }

    protected function render()
    {
        $post_id = get_the_ID();
        $data = RF_RatingCalculator::get_summary($post_id);

        if (!$data) return;

        echo "<h3>{$data['average']} ⭐ ({$data['total']} reviews)</h3>";

        foreach ($data['breakdown'] as $star => $count) {
            echo "<div>$star Star: $count</div>";
        }
    }
}
