<?php

require_once('CoursesList/functions.php');
require_once('CoursesTile/functions.php');

global $componentPath;
$componentPath['Courses'] = 'components/04-modules/Courses/Courses';

/**
 * Register the 'Courses' post type
 */
function coursesPostType() {
    register_post_type('courses', [
        'labels' => [
            'name' => __('Kursy', 'studio'),
            'singular_name' => __('Kurs', 'studio')
        ],
        'public' => true,
        'has_archive' => false,
        'supports' => ['title'],
        'show_in_rest' => true
    ]);
}

add_action('init', 'coursesPostType');

/**
 * Register the 'Genre' taxonomy
 */
function coursesGenreTaxonomy() {
    register_taxonomy(
        'genre',
        'courses',
        [
            'labels' => [
                'name' => __('Kategoria', 'studio'),
                'add_new_item' => __('Add New Kategorie', 'studio'),
            ],
            'supports' => ['title'],
            'show_ui' => true,
            'show_admin_column' => true,
        ]
    );
}

add_action('init', 'coursesGenreTaxonomy');