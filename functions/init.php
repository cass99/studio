<?php

function getComponent($template, $args = []) {
    global $componentPath;

    if (!isset($componentPath[$template])) {
        return;
    }

    if (!empty($args)) {
        foreach ($args as $key => $value) {
            set_query_var($key, $value);
        }
    }

    get_template_part($componentPath[$template]);
}

if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => __('Theme-Options', 'studio'),
        'menu_title' => __('Theme-Options', 'studio'),
        'redirect'   => false
    ));
}

// Add formats to wysiwyg
function addFormatsToWysiwyg($buttons) {
	array_unshift($buttons, 'styleselect');

	return $buttons;
}

add_filter('mce_buttons_2', 'addFormatsToWysiwyg');

// Add custom format type to wysiwyg
function addCustomFormats($initArray) {  
    $customFormats = [  
        [  
            'title' => 'Highlight',  
            'inline' => 'span',  
            'classes' => 'highlight',
            'wrapper' => true,
        ]  
    ];  

    // Insert the array, JSON ENCODED, into 'style_formats'
    $initArray['style_formats'] = json_encode($customFormats);  
        
    return $initArray;  
} 

add_filter( 'tiny_mce_before_init', 'addCustomFormats' );
 