<?php

$app['database']->delete('todos', $_POST['taskID']);
header('Location: /');
