<?php

$route[] = ['/login', 'UserController@login'];
$route[] = ['/login/auth', 'UserController@auth'];
$route[] = ['/logout', 'UserController@logout'];

$route[] = ['/user/create', 'UserController@create'];
$route[] = ['/user/store', 'UserController@store'];
$route[] = ['/user/{id}/edit', 'UserController@edit'];
$route[] = ['/user/{id}/update', 'UserController@update'];

$route[] = ['/', 'HomeController@index'];

/* Protected route */
$route[] = ['/home', 'HomeController@home', 'auth'];

/* Adicionei */
$route[] = ['/posts', 'PostsController@index'];
$route[] = ['/post/{id}/edit', 'PostsController@edit'];
$route[] = ['/post/{id}/update', 'PostsController@update'];
$route[] = ['/post/{id}/delete', 'PostsController@delete'];
$route[] = ['/post/{id}/show', 'PostsController@show'];
$route[] = ['/post/create', 'PostsController@create'];
$route[] = ['/post/store', 'PostsController@store'];

return $route;
