<?php
include "task.php";
include "dbConnector.php";
$dbConnector = new dbConnector();
$task = new Task($dbConnector->db);
$task->updateTaskById($_GET['id']);
header('Location: index.php');