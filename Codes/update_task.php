<?php
	require_once 'Connection.php';
	
	if($_GET['task_id'] != ""){
		$task_id = $_GET['task_id'];
		
		$conn->query("UPDATE `task` SET `status` = 'Completed' WHERE `task_id` = $task_id") or die(mysqli_error($conn));
		header('location: Todolist.php');
	}
?>