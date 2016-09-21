<?php

$app['database']->update('todos',
    $_POST['taskID'],
    [
        'completed' => $_POST['taskStatus']
    ]
);

header('Location: /');
