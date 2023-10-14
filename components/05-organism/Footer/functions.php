<?php

global $componentPath;
$componentPath['Footer'] = 'components/05-organism/Footer/Footer';

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'  => __('Footer', 'studio'),
        'menu_title'  => __('Footer', 'studio'),
        'parent_slug' => $parent['menu_slug'],
    ));
}