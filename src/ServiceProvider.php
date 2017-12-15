<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 12:20
 */

namespace Dionyseos\JsonMenu;


use Illuminate\Support\ServiceProvider as BaseProvider;
use Dionyseos\JsonMenu\API\Menu as MenuAPI;
use Dionyseos\JsonMenu\Repositories\Menu;

class ServiceProvider extends BaseProvider
{
    public function boot()
    {
        require_once __DIR__ .'/helper/jsonmenu.php';

        $this->app->bind(MenuAPI::class, Menu::class);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->publishes([
            __DIR__.'/config/jsonmenu.php' => config_path('jsonmenu.php')
        ], 'config');
    }

    public function register()
    {

    }
}