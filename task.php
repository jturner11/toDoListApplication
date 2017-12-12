<?php

class Task
{
    protected $id;
    protected $task;
    protected $done;
    protected $db;
    /**
     * task constructor.
     */
//    $db = your database and db equal the variable you pass database into as.
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function updateTaskById($id)
    {
        $query = $this->db->prepare('UPDATE toDo SET done=1 WHERE id=:id ');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function getAllTasks()
    {
        $sql = 'SELECT task, id, done FROM toDo;';
        $query = $this->db->query($sql, PDO::FETCH_ASSOC);
        $tasks = $query->fetchAll();
        return $tasks;
    }

    public function createTask($task)
    {
        $query = $this->db->prepare(' INSERT INTO toDo (task) VALUES (:task);');
        $query->bindParam(':task', $task);
        $query->execute();
    }

    protected function checkDoneStatus($done, $task)
    {
        return $task['done'] == $done;
    }

    protected function displayToDo($task)
    {
        return "<td>" . $task['task'] . "</td>";
    }

    public function outputPendingTasksToTable($tasks)
    {
        foreach ($tasks as $task) {
            if ($this->checkDoneStatus(0, $task)) {
                echo "<tr>";
                echo $this->displayToDo($task);
                echo "<td><form method=\"GET\" action=\"done.php\">
                        <button value='" . $task['id'] . "' type=\"submit\" class=\"btn btn-success\"name=\"id\">
                            DONE
                         </button>
                    </form>
                  </td>";
                echo "<tr>";
            }
        }
    }

    public function outputDoneTasksToTable($tasks)
    {
        foreach ($tasks as $task) {
            if ($this->checkDoneStatus(1, $task)) {
                echo "<tr>";
                echo $this->displayToDo($task);
                echo "<tr>";
            }
        }
    }
}