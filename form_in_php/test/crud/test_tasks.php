<?php

use crud\TaskCRUD;
use models\Task;
require "form_in_php/config.php";
require "form_in_php/test/test_autoload.php";

$crud= new TaskCRUD();
$task = new Task();
$task2 = new Task();

$task->name="Uccidere tutti";
$task->due_date= "2023-04-04";
$task->done="false";
// $task->user_id=10;

$task2->name="Salvare il mondo";
$task2->due_date= "2023-04-04";
$task2->done="false";
// $task2->user_id=10;

$crud->create($task, 5);
// $crud->update($task2, 8);
// $crud->delete(9);
print_r($crud->read());
// print_r(($crud)->readByUser(1));
