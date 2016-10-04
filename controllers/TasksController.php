<?php

class TasksController
{
    public function store()
    {
        App::get('database')->insert('todos', [
            'description' => $_POST['task'],
            'completed' => 0
        ]);

        redirect('');
    }

    public function delete()
    {
        App::get('database')->delete('todos', $_POST['taskID']);
        redirect('');
    }

    public function complete()
    {
        App::get('database')->update('todos',
            $_POST['taskID'],
            [
                'completed' => $_POST['taskStatus']
            ]
        );

        redirect('');
    }
}
