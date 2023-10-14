<?php

// Add assets
function addAssets() {
	wp_enqueue_style('main-css', get_stylesheet_uri());
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/app.js', false, uniqid(), true);
}

add_action('wp_enqueue_scripts', 'addAssets');

// Allow to use import in javascripts
function addTypeModule($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ('main-js' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
}

add_filter('script_loader_tag', 'addTypeModule' , 10, 3);

// Add styles to wysiwyg
function editorStyles() {
    add_editor_style(get_stylesheet_uri());
}
add_action('init', 'editorStyles');