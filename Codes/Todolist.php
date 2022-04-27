<?php
    use View\View;
    include 'index.php';
    session_start();
    include_once('Connection.php');

    // If haven't login, then change to login page
    if ((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor")) {
        header("Location:Loginpage.php");
    }

    $userid = $_SESSION['userid'];
    $tutor = new Model\Tutor($userid);
    $tutor_info = $tutor->get_tutor_info();
    $todolist = new Model\ToDoList($userid);
    $getlist = $todolist->get_task();

    // Run functions according to the form submitted
	if(isset($_POST['add'])) {
		$todolist->add_task();
	}
    if(isset($_POST['delete'])) {
		$todolist->delete_task();
	}	
    if(isset($_POST['update'])){
		$todolist->update_task();
	}

    // Display "Todolist_view" view
    View::render("Todolist_view",compact(["getlist"]));
?>



