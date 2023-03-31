<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/article/save' => [[['_route' => 'adarticles', '_controller' => 'App\\Controller\\TestController::save'], null, null, null, false, false, null]],
        '/article/all' => [[['_route' => 'allArticles', '_controller' => 'App\\Controller\\TestController::home'], null, null, null, false, false, null]],
        '/article/new' => [[['_route' => 'addArticle', '_controller' => 'App\\Controller\\TestController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/article/(?'
                    .'|([^/]++)(*:27)'
                    .'|edit/([^/]++)(*:47)'
                    .'|delete/([^/]++)(*:69)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:105)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        27 => [[['_route' => 'article_show', '_controller' => 'App\\Controller\\TestController::show'], ['id'], null, null, false, true, null]],
        47 => [[['_route' => 'article_edit', '_controller' => 'App\\Controller\\TestController::edit'], ['id'], null, null, false, true, null]],
        69 => [[['_route' => 'article_delete', '_controller' => 'App\\Controller\\TestController::delete'], ['id'], null, null, false, true, null]],
        105 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
