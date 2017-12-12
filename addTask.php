<?php
include "task.php";
include "dbConnector.php";
$dbConnector = new dbConnector();
$task = new Task($dbConnector->db);
$task->createTask($_GET['sendTask']);
header('Location: index.php');