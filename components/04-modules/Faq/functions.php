<?php

global $componentPath;
$componentPath['Faq'] = 'components/04-modules/Faq/Faq';

if (function_exists('acf_register_block')) {
    acf_register_block(array(
        'name' => 'faq',
        'title' => __('Faq', 'studio'),
        'description' => __(''),
        'render_callback' => 'acfRenderCallback',
        'category' => 'components',
        'icon' => 'excerpt-view',
        'keywords' => array('faq'),
        'mode' => 'edit',
        'supports' => array('align' => false),
    ));
}