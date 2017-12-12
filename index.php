<?php
include "task.php";
include "dbConnector.php";
$dbConnector = new dbConnector();
$task = new Task($dbConnector->db);
$allTasks = $task->getAllTasks();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">TO DO LIST</h1>
    <div class="col-xs-10">
        <form class="form-horizontal" action="addTask.php" method="get">
            <div class="form-group">
                <label for="task" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="task" placeholder="Task" name="sendTask">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td class="info"><strong>Task</strong></td>
            <td class="info"><strong>Done</strong></td>
        </tr>
        </thead>
        <tbody>
        <?php $task->outputPendingTasksToTable($allTasks);
        ?>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td class="info"><strong>Completed</strong></td>
        </tr>
        </thead>
        <tbody>
        <?php $task->outputDoneTasksToTable($allTasks);
        ?>
        </tbody>
    </table>
</div>
</body>
</html>