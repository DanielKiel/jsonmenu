<?php

/**
 * Created by PhpStorm.
 * User: dk
 * Date: 25.11.17
 * Time: 12:23
 */
class PackageTest extends \Tests\TestCase
{
    public function testStoragePath()
    {
        $this->assertEquals(storage_path('menus/'), jsonmenu_storage_path());

        $this->assertEquals(storage_path('menus/main.json'), jsonmenu_storage_path('main'));
    }

    public function testSaveAndGetAndDelete()
    {
        /** @var \Dionyseos\JsonMenu\API\Menu $repo */
        $repo = app(\Dionyseos\JsonMenu\API\Menu::class);

        //casue we are saving json, in this test we mock a valid return later with saving an array as a std object
        $mainMenu =  [
            (object) [
                'href' => 'href here',
                'label' => 'my label here',
                'class' => 'make some css stuff here',
                'childs' => [
                    (object) [
                        'href' => 'href here',
                        'label' => 'my label here',
                        'class' => 'make some css stuff here',
                    ],
                    (object) [
                        'href' => 'href here',
                        'label' => 'my label here',
                        'class' => 'make some css stuff here',
                    ]
                ]
            ]
        ];

        $repo->save('main', $mainMenu);

        $fs = new \Illuminate\Filesystem\Filesystem();

        $this->assertTrue($fs->isFile(jsonmenu_storage_path('main')));

        $this->assertTrue(\Illuminate\Support\Facades\Cache::has('jsonmenu_main'));

        $this->assertEquals($mainMenu, $repo->get('main'));

        $repo->delete('main');

        $this->assertFalse($fs->isFile(jsonmenu_storage_path('main')));

        $this->assertFalse(\Illuminate\Support\Facades\Cache::has('jsonmenu_main'));
    }
}
