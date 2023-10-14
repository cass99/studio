<?php

// Create path where json should be saved
function createJsonPath($blockName) {
    global $componentPath;
    
    if (isset($componentPath[$blockName])) {
        $pathToParentFolder = substr($componentPath[$blockName], 0, strpos($componentPath[$blockName], $blockName));
        $pathToFolder = get_stylesheet_directory() . '/' . $pathToParentFolder . '/' . $blockName; 

        if (is_dir($pathToFolder)) {
            return $pathToFolder;
        }
    }

    return false;
}

// Save json to specific folder
function acfHandleSave($path) {
    if ($getAcfData = acfGetGroupRule()) {
        if ($getAcfData['param'] === 'block') {
            $blockName = ucfirst(str_replace('acf/', '', $getAcfData['value']));
            if ($blockJsonPath = createJsonPath($blockName)) {
                return $blockJsonPath;
            }
        }
        
        return get_stylesheet_directory() . '/acf-fields';
    }
    
    return;
}

add_filter('acf/settings/save_json', 'acfHandleSave');

// Include componets paths
function acfHandleLoad($paths) {
    global $componentPath;

    unset($paths[0]);
    foreach ($componentPath as $key => $path) {
        if ($blockAcfPath = createJsonPath($key)) {
            $paths[] = $blockAcfPath;
        }
    }

    $paths[] = get_stylesheet_directory() . '/acf-fields';

    return $paths;
}

add_filter('acf/settings/load_json', 'acfHandleLoad');

function acfGetGroupRule () {
    if (isset($_POST['acf_field_group'])) {
        return $_POST['acf_field_group']['location']['group_0']['rule_0'];
    }
    
    return false;
}

// Register custom category
function registerComponentsCategory ($categories) {
    $categories[] = [
		'slug'  => 'components',
		'title' => 'Components'
    ];

	return $categories;
}

add_filter('block_categories_all' , 'registerComponentsCategory');

// Handle rendering of custom post type
function acfRenderCallback ($block) {
    global $componentPath;

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = ucfirst(str_replace('acf/', '', $block['name']));
    $path = $componentPath[$slug] . ".php";

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path($path))) {
        include(get_theme_file_path($path));
    }
}
 
// Disable default gutenberg blocks
function disableDefaultBlocks($allowed_blocks, $editor_context) {
    $allowedBlocks = [];
    if ($blockTypes = acf_get_block_types()) {
        foreach($blockTypes as $key => $block) {
            $allowedBlocks[] = $key;
        }
    }
    
	return $allowedBlocks;
}

add_filter('allowed_block_types_all', 'disableDefaultBlocks', 25, 2);