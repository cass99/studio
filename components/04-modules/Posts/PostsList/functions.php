<?php

global $componentPath;
$componentPath['PostsList'] = 'components/04-modules/Posts/PostsList/PostsList';

if (function_exists('acf_register_block')) {
    acf_register_block(array(
        'name' => 'postsList',
        'title' => __('Posts list', 'studio'),
        'description' => __(''),
        'render_callback' => 'acfRenderCallback',
        'category' => 'components',
        'icon' => 'admin-post',
        'keywords' => array('postsList'),
        'mode' => 'edit',
        'supports' => array('align' => false),
    ));
}