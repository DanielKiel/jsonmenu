<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 12:34
 */

namespace Dionyseos\JsonMenu\API;


interface Menu
{
    public function save(string $name, array $menu): array;

    public function get(string $name): array;

    public function delete(string $name): bool;
}