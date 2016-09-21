<?php

$router->get('',        'controllers/index.php');
$router->get('about',   'controllers/about.php');
$router->get('culture', 'controllers/about-culture.php');
$router->get('contact', 'controllers/contact.php');

$router->post('tasks',          'controllers/add-task.php');
$router->post('tasks/complete', 'controllers/complete-task.php');

$router->delete('tasks/delete',   'controllers/delete-task.php');
