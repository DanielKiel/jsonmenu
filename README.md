# dependencies

this is a package for framework laravel 5.5+

# about

This is a simple json file storage to save one or more menus. There are no rules about the struct of a menu - it is yours to define one at your backend and / or frontend.

Saved menu will be cached forever - when saving again, this menu will be cached again.
Deleted menu will do a forget at his cache key before deleting.

Cache keys are build with jsonmenu_{name of your menu}.

# why saving as a json file?

I am using this at some minor projects where I do not want to build a huge database solution with stuff like a nested set or a construct of  parent_id. These solutions are some overhead at this projects, cause there is a lot of code needed to get a json structure - some queries, some models, etc.

# using jsonmenu

using as php code

```php

    $api = app(\Dionyseos\JsonMenu\API\Menu::class);
    
    //saving the menu
    $api->save('name-of-my-menu', [
        'name' => 'some name',
        'src' => 'some.target.de',
        'children' => [
            // ... build some struct here
        ]
    ]);
    
    //getting the menu
    $menu = $api->get('name-of-my-menu');
    
    //deleting the menu
    $api->delete('name-of-my-menu');
    
```

using the REST API

```
    POST /services/jsonmenu/v1/name-of-my-menu
    {
        "menu": {
            "name" : "some name",
            "src" : "some.target.de",
            "children" : [
                // some nested stuff here
            ]
        }
    }
    
    
    GET /services/jsonmenu/v1/name-of-my-menu
    
    DELETE /services/jsonmenu/v1/name-of-my-menu
    
```