<?php
	use View\View;
    include 'index.php';
    session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}

	// Store id variable obtained from GET method
    $id = $_GET['id'];
    $announcement = new Model\announcement("NULL",$id);
    $result1 = $announcement->get_announcement();

	
	// Run "edit_announcement" function when the form is submitted
    if(isset($_POST['text'])){
		$announcement->edit_announcement();
	}
	
	// Display "Announcement_edit" view
	View::render("Announcement_edit",compact(["result1"]));
	

?>
