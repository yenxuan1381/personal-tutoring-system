<?php
    use View\View;
    include 'index.php';
    session_start();

	include_once('Connection.php');
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Tutor") and ($_SESSION['category'] != "Student")))
	{
		header("Location:Loginpage.php");
	}
    $userid = $_SESSION['userid'];

    View::render("Appointment_calender",compact(["userid"]));
?>




