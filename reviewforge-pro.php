<?php

/**
 * Plugin Name: ReviewForge Pro
 * Plugin URI: https://condixia.com
 * Author: Mahim Zaman (Condixia)
 * Author URI: https://mahimzaman.com
 * Description: Advanced Elementor-based review system for any post.
 * Version: 1.0.0
 * Text Domain: reviewforge
 */

if (!defined('ABSPATH')) exit;

define('RF_PATH', plugin_dir_path(__FILE__));
define('RF_URL', plugin_dir_url(__FILE__));

class ReviewForge
{

    public function __construct()
    {
        $this->includes();
        $this->init_hooks();
    }

    private function includes()
    {
        require_once RF_PATH . 'Core/PostTypes.php';
        require_once RF_PATH . 'Core/Meta.php';
        require_once RF_PATH . 'Core/Assets.php';

        require_once RF_PATH . 'Ajax/SubmitReview.php';

        require_once RF_PATH . 'Elementor/Widgets/ReviewSummaryWidget.php';
        require_once RF_PATH . 'Elementor/Widgets/ReviewFormWidget.php';
        require_once RF_PATH . 'Elementor/Widgets/ReviewListWidget.php';

        require_once RF_PATH . 'Utils/RatingCalculator.php';
    }

    private function init_hooks()
    {
        new RF_PostTypes();
        new RF_Meta();
        new RF_Assets();
        new RF_SubmitReview();

        add_action('elementor/widgets/register', [$this, 'register_widgets']);
    }

    public function register_widgets($widgets_manager)
    {
        $widgets_manager->register(new \RF_ReviewSummaryWidget());
        $widgets_manager->register(new \RF_ReviewFormWidget());
        $widgets_manager->register(new \RF_ReviewListWidget());
    }
}

new ReviewForge();
