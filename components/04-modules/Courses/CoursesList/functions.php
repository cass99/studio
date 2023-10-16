<?php

global $componentPath;
$componentPath['CoursesList'] = 'components/04-modules/Courses/CoursesList/CoursesList';

if (function_exists('acf_register_block')) {
    acf_register_block(array(
        'name' => 'coursesList',
        'title' => __('Courses list', 'studio'),
        'description' => __(''),
        'render_callback' => 'acfRenderCallback',
        'category' => 'components',
        'icon' => 'list-view',
        'keywords' => array('coursesList'),
        'mode' => 'edit',
        'supports' => array('align' => false),
    ));
}
