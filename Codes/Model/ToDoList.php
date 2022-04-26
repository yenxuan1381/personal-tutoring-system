<?php

namespace Model;

class ToDoList {
    private $tutorid;
    private $conn;
    private $task;
    
    public function __construct($userid){
        include('Connection.php');
        $this->tutorid=$userid;
        $this->conn = $conn;
        $taskQuery = "SELECT * FROM `task` WHERE `Lect ID` = '$userid' ORDER BY `task_id` ASC";
        $getTask = mysqli_query($conn, $taskQuery) or die("Error fetching tutor's task.");
	    $this->task = $getTask;
    }

    public function get_task(){
        return $this->task;
    }

    public function add_task(){
        if($_POST['task'] != ""){
			$task = $_POST['task'];
			$this->conn->query("INSERT INTO `task` VALUES('','$this->tutorid','$task', 'In Progress')");
			header('location:Todolist.php');
		}
    }

    public function delete_task(){
        $task_id = $_POST['id'];
		$this->conn->query("DELETE FROM `task` WHERE `task_id` = $task_id") or die(mysqli_error($this->conn));
		header("location: Todolist.php");
    }

    public function update_task(){
        $task_id = $_POST['id'];
		$this->conn->query("UPDATE `task` SET `status` = 'Completed' WHERE `task_id` = $task_id") or die(mysqli_error($this->conn));
		header('location: Todolist.php');
    }
}
?>