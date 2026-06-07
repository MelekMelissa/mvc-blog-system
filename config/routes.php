<?php

$router->get(
    '/',
    'PostController@index'
);

$router->get(
    '/register',
    'AuthController@register'
);

$router->post(
    '/register',
    'AuthController@registerStore'
);

$router->get(
    '/login',
    'AuthController@login'
);

$router->post(
    '/login',
    'AuthController@loginStore'
);

$router->get(
    '/logout',
    'AuthController@logout'
);

$router->get(
    '/profile',
    'AuthController@profile'
);

$router->post(
    '/change-password',
    'AuthController@changePassword'
);

$router->get(
    '/posts/create',
    'PostController@create'
);

$router->post(
    '/posts/create',
    'PostController@store'
);

$router->get(
    '/posts/show',
    'PostController@show'
);

$router->get(
    '/posts/edit',
    'PostController@edit'
);

$router->post(
    '/posts/update',
    'PostController@update'
);

$router->post(
    '/posts/delete',
    'PostController@delete'
);

$router->get(
    '/categories',
    'CategoryController@index'
);

$router->get(
    '/categories/create',
    'CategoryController@create'
);

$router->post(
    '/categories/create',
    'CategoryController@store'
);

$router->get(
    '/categories/edit',
    'CategoryController@edit'
);

$router->post(
    '/categories/update',
    'CategoryController@update'
);

$router->post(
    '/categories/delete',
    'CategoryController@delete'
);

$router->post(
    '/comments/create',
    'CommentController@store'
);

$router->post(
    '/comments/delete',
    'CommentController@delete'
);

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

$router->get(
    '/admin',
    'AdminController@dashboard'
);