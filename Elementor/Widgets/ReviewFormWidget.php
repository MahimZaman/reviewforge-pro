<?php

defined('ABSPATH') || exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class RF_ReviewFormWidget extends Widget_Base
{

    public function get_name()
    {
        return 'rf_review_form';
    }
    public function get_title()
    {
        return 'Review Form';
    }

    protected function register_controls()
    {

        $this->start_controls_section('style_section', [
            'label' => 'Style'
        ]);

        $this->add_control('star_color', [
            'label' => 'Star Color',
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rf-star' => 'color: {{VALUE}}'
            ]
        ]);

        $this->end_controls_section();
    }

    protected function render()
    {
        $post_id = get_the_ID();
?>

        <form class="rf-review-form">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

            <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="review" placeholder="Your Review"></textarea>

            <select name="rating">
                <option value="5">5 Star</option>
                <option value="4">4 Star</option>
                <option value="3">3 Star</option>
                <option value="2">2 Star</option>
                <option value="1">1 Star</option>
            </select>

            <button type="submit">Submit Review</button>
        </form>

<?php
    }
}
