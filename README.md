# about

This is a simple json file storage to save one or more menus. There are no rules about how to save a menu - it is yours to define one at your backend and / or frontend.

Saved menu will be cached forever - when saving again, this menu will be cached again.
Deleted menu will do a forget at his cache key before deleting.

Cache keys are build with jsonmenu_{name of your menu}.

# why saving as a json file?

I am using this at some minor projects where I do not want to build a huge database solution with stuff like a nested set or a construct of  parent_id. These solutions are some overhead at this projects, cause there is a lot of code needed to get a json structure - some queries, some models, etc.