<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 12:35
 */

namespace Dionyseos\JsonMenu\Repositories;


use Dionyseos\JsonMenu\API\Menu as MenuAPI;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;

class Menu implements MenuAPI
{
    /**
     * @param string $name
     * @param array $menu
     * @return array
     */
    public function save(string $name, array $menu): array
    {
        $fs = new Filesystem();

        if (! $fs->isDirectory(jsonmenu_storage_path()) ) {
            $fs->makeDirectory(jsonmenu_storage_path(), 0755, true);
        }

        $fs->put(jsonmenu_storage_path($name), json_encode($menu));

        $this->forgetCache($name);

        return Cache::rememberForever('jsonmenu_' . $name, function() use ($name) {
            return $this->getFileContent($name);
        });
    }

    /**
     * @param string $name
     * @return array
     */
    public function get(string $name): array
    {
        return Cache::rememberForever('jsonmenu_' . $name, function() use ($name) {
            return $this->getFileContent($name);
        });
    }

    /**
     * @param string $name
     * @return bool
     */
    public function delete(string $name): bool
    {
        $fs = new Filesystem();

        if (! $fs->isFile(jsonmenu_storage_path($name))) {
            $this->forgetCache($name);

            return true;
        }

        $fs->delete(jsonmenu_storage_path($name));

        $this->forgetCache($name);

        return true;
    }

    /**
     * @param string $name
     */
    protected function forgetCache(string $name)
    {
        if (Cache::has('jsonmenu_' . $name)) {
            Cache::forget('jsonmenu_' . $name);
        }
    }

    /**
     * @param string $name
     * @return mixed
     */
    protected function getFileContent(string $name)
    {
        $fs = new Filesystem();

        if (! $fs->isFile(jsonmenu_storage_path($name))) {
            $fs->put(jsonmenu_storage_path($name), json_encode([]));
        }

        return json_decode($fs->get(jsonmenu_storage_path($name)));
    }
}