<?php

$router->get('',        'PagesController@home');
$router->get('about',   'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->post('tasks',          'TasksController@store');
$router->post('tasks/complete', 'TasksController@complete');

$router->delete('tasks/delete',   'TasksController@delete');
