<?php

defined('ABSPATH') || exit;

class RF_Assets
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue()
    {

        wp_enqueue_style('rf-style', RF_URL . 'assets/css/style.css');

        wp_enqueue_script('rf-script', RF_URL . 'assets/js/script.js', ['jquery'], null, true);

        wp_localize_script('rf-script', 'rf_ajax', [
            'url' => admin_url('admin-ajax.php')
        ]);
    }
}
