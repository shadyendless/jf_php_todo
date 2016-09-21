<?php require 'views/partials/head.php' ?>

<h1>My Tasks</h1>

<h5>New Task</h5>
<form method="POST" action="/tasks">
    <input type="text" name="task"></input>
    <button type="submit">Add Task</button>
</form>

<ul>
  <?php foreach ($tasks as $task) : ?>
      <li>
          <?php if ($task->completed) : ?>
              <strike><?= $task->description; ?></strike>
          <?php else: ?>
              <?= $task->description; ?>
          <?php endif; ?>
          <form method="POST" action="/tasks/complete">
              <input type="hidden" name="taskID" value="<?= $task->id ?>"></task>
              <input type="hidden" name="taskStatus" value="<?= !$task->completed ? '1' : '0' ?>"></input>
              <button type="submit">
                  <?php if ($task->completed) : ?>
                      Not Finished
                  <?php else: ?>
                      Finished
                  <?php endif; ?>
              </button>
          </form>
          <form method="POST" action="/tasks/delete">
              <input type="hidden" name="taskID" value="<?= $task->id ?>"></task>
              <button type="submit">Delete</button>
          </form>
      </li>
      <br />
  <?php endforeach; ?>
</ul>

<?php require 'views/partials/footer.php' ?>
