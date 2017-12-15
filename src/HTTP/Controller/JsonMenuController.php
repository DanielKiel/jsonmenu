<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 13:01
 */

namespace Dionyseos\JsonMenu\HTTP\Controllers;


use Dionyseos\JsonMenu\API\Menu as MenuAPI;
use Illuminate\Http\Request;

class JsonMenuController
{
    public $api;

    public function __construct(MenuAPI $api)
    {
        $this->api = $api;
    }

    public function get(Request $request, $menu)
    {
        return $this->api->get($menu);
    }

    public function save(Request $request, $menu)
    {
        return $this->api->save($menu, $request->input('menu'));
    }

    public function delete(Request $request, $menu)
    {
        return $this->api->delete($menu);
    }
}