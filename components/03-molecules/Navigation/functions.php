<?php

global $componentPath;
$componentPath['Navigation'] = 'components/03-molecules/Navigation/Navigation';

// Create navigation menus
register_nav_menus(array(
    'header' => __('Header', 'studio'),
    'footer' => __('Footer', 'studio'),
));

// Get menu data 
function getMenu($type = 'header') {
    $locations = get_nav_menu_locations();
    $menuItemsData = [];

    if (isset($locations[$type])) {
        $menu = wp_get_nav_menu_object($locations[$type]);
        $menuItems = wp_get_nav_menu_items($menu->term_id);
        
        foreach ($menuItems as $item) {
            if ((int) $item->menu_item_parent === 0) {
                $menuItemsData[$item->object_id] = handleMenuItemData($item);
            }
        }
        
        foreach ($menuItems as $item) {
            $parent = (int) $item->menu_item_parent;
            if ($parent !== 0 && isset($menuItemsData[$parent])) {
                $menuItemsData[$parent]['children'][$item->object_id] = handleMenuItemData($item);
            }
        }
    }

    return $menuItemsData;
}

function handleMenuItemData($item) {
    return [
        'title' => $item->title,
        'url' => $item->url,
        'target' => $item->target,
        'classes' => $item->classes
    ];
}
