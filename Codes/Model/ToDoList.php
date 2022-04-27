<?php

namespace Model;

// Class for ToDoList model
class ToDoList {
    private $tutorid;
    private $conn;
    private $task;
    
    // Constructor for ToDoList model class
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

    // Function to add new task into the database after the form is submitted
    public function add_task(){
        if($_POST['task'] != ""){
			$task = $_POST['task'];
			$this->conn->query("INSERT INTO `task` VALUES('','$this->tutorid','$task', 'In Progress')");
			header('location:Todolist.php');
		}
    }

    // Function to delete the existing task according to the task_id
    public function delete_task(){
        $task_id = $_POST['id'];
		$this->conn->query("DELETE FROM `task` WHERE `task_id` = $task_id") or die(mysqli_error($this->conn));
		header("location: Todolist.php");
    }

    // Function to edit the existing task according to the task_id after the form is submitted
    public function update_task(){
        $task_id = $_POST['id'];
		$this->conn->query("UPDATE `task` SET `status` = 'Completed' WHERE `task_id` = $task_id") or die(mysqli_error($this->conn));
		header('location: Todolist.php');
    }
}
?>