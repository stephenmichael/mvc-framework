<?php

/**
 * RouteConfig
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

/**
 * Route Name
 * Route URL
 * Route Area
 * Route Controller
 * Route Action
 */
 
 // Set Array
$routeArray = array();
		
$routeArray[] = Route::addRoute("BlogPosts",
                 "/blog/:params",
                 null,
                 "blog",
                 "post"
);

$routeArray[] = Route::addRoute("EventPosts",
                 "/events/:params",
                 null,
                 "events",
                 "details"
);

$routeArray[] = Route::addRoute("AdminRoadblock",
                 "/admin/roadblock/:params",
                 "admin",
                 "roadblock",
                 "index"
);
