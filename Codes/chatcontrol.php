<?php
	use View\View;
    include 'index.php';
	include ('Connection.php');
	session_start();
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}
	
	$userid = $_SESSION['userid'];
	$tutor = new Model\Tutor($userid);
    $tutor_info = $tutor->get_tutor_info();
	$chatroom = new Model\chatroom();
    $_SESSION['room']=1;
	// Change room id to 2 if the form is submitted by clicking the button
	if(isset($_POST['CSTutors'])){
        $_SESSION['room']=2;
	}
    $chatroom->set_room($_SESSION['room']);
	$message = $chatroom->read_message();

	// Display "Chatroom_view" view
	View::render("Chatroom_view",compact(["message"]));

?>