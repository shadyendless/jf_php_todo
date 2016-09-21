<?php

$app['database']->insert('todos', [
    'description' => $_POST['task'],
    'completed' => 0
]);

header('Location: /');
