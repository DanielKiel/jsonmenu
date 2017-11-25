<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 12:21
 */

if (!function_exists('jsonmenu_storage_path')) {
    function jsonmenu_storage_path($menu = null) {
        if (! is_null($menu)) {
            return storage_path('menus/' . $menu .'.json');
        }

        return storage_path('menus/');
    }
}