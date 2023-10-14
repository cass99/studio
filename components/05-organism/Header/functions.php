<?php

global $componentPath;
$componentPath['Header'] = 'components/05-organism/Header/Header';

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'  => __('Header', 'studio'),
        'menu_title'  => __('Header', 'studio'),
        'parent_slug' => $parent['menu_slug'],
    ));
}