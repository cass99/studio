<?php

global $componentPath;
$componentPath['Stage'] = 'components/04-modules/Stage/Stage';

if (function_exists('acf_register_block')) {
    acf_register_block(array(
        'name' => 'stage',
        'title' => __('Stage'),
        'description' => __(''),
        'render_callback' => 'acfRenderCallback',
        'category' => 'components',
        'icon' => 'format-image',
        'keywords' => array('stage'),
        'mode' => 'edit',
        'supports' => array('align' => false),
    ));
}